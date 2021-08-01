<?php
namespace API\pedido\Controller;

use Silex\Application;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;
use API\Core\Configure\Config;
use API\pedido\Controller\PedidoController;
use API\pedido\Model\Pmweb_Orders_Stats_Model;

class Pmweb_Orders_Stats_Controller extends PedidoController
{
	private $startDate;
	private $endDate;

    public function buscarDadosPedido(Application $app, Request $request,$startDate,$endDate)
	{
        
        $token = $this->validarRequisicao($app,'','');

        if($token['codigo'] != 200)
		{
            return $token['mensagem'];
        }

		$this->setStartDate($startDate);
		$this->setEndDate($endDate);

		$model = new Pmweb_Orders_Stats_Model();

		$ordersCount = $model->getOrdersCount($this->startDate,$this->endDate);
		$ordersRevenue = $model->getOrdersRevenue($this->startDate,$this->endDate);
		$ordersQuantity = $model->getOrdersQuantity($this->startDate,$this->endDate);
		$ordersRetailPrice = $model->getOrdersRetailPrice();
		$ordersAverageOrderValue = $model->getOrdersAverageOrderValue();

		$arrRetorno['orders'] = array('count'=> $ordersCount[0]['total'],
										'revenue'=> $ordersRevenue[0]['somatorio'],
										'quantity'=> $ordersQuantity[0]['totalProduto'],
										'averageRetailPrice'=> $ordersRetailPrice[0]['preco_medio'],
										'AverageOrderValue'=> $ordersAverageOrderValue[0]['media_venda'],

		);

		return $app->json($arrRetorno);
    }

	/**
	 * Define o período inicial da consulta.
	 * @param String $date Data de início, formato `Y-m-d` (ex, 2017-08-24).
	 *
	 * @return void
	 */
	public function setStartDate($date)
	{
		$this->startDate = $date;
	}

	/**
	 * Define o período final da consulta.
	 * 
	 * @param String $date Data final da consulta, formato `Y-m-d` (ex, 2017-08-24).
	 * 
	 * @return void
	 */
	public function setEndDate($date)
	{
		$this->endDate = $date;
	}
}
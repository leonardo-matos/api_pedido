<?php
	require_once __DIR__ . '/vendor/autoload.php';
	use Silex\Application;
	set_time_limit (9999);
	$app = new Silex\Application();

	$app['debug'] = true;

		//Cria e renova o token
		$app->match('/oauth2/token','API\Core\Auth\AuthServerController::generateAccessToken');
		$app->GET('pedido/buscarDadosPedido/startDate/{startDate}/endDate/{endDate}','API\pedido\Controller\Pmweb_Orders_Stats_Controller::buscarDadosPedido');
    	
$app->run();


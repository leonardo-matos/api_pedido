<?php

namespace API\pedido\Model;

use API\pedido\Model\PedidoModel;

class Pmweb_Orders_Stats_Model extends PedidoModel 
{   
    /**
     * Retorna o total de pedidos efetuados no período.
     * 
     * @return integer Total de pedidos.
     */
    public function getOrdersCount($startDate,$endDate)
    {
        $this->cachedQuery = false;
        
        $this->strSqlQuery = "SELECT COUNT(*) AS total FROM pedido WHERE order_date BETWEEN '".$startDate."' AND '".$endDate."'";
        
        $this->execute();

        return $this->getResultSet();
    }

    /**
	 * Retorna a receita total de pedidos efetuados no período.
	 * 
	 * @return float Receita total no período.
	 */
    public function getOrdersRevenue($startDate,$endDate)
    {
        $this->cachedQuery = false;
        
        $this->strSqlQuery = "SELECT ROUND(SUM(price * quantity),2) AS somatorio FROM pedido WHERE order_date BETWEEN '".$startDate."' AND '".$endDate."'";
        
        $this->execute();

        return $this->getResultSet();
    }

    /**
	 * Retorna o total de produtos vendidos no período (soma de quantidades).
	 * 
	 * @return integer Total de produtos vendidos.
	 */
    public function getOrdersQuantity($startDate,$endDate)
    {
        $this->cachedQuery = false;
        
        $this->strSqlQuery = "SELECT SUM(quantity) AS totalProduto
                                
                                FROM pedido
                                WHERE order_date BETWEEN '".$startDate."' AND '".$endDate."'";
        
        $this->execute();

        return $this->getResultSet();
    }

    /**
	 * Retorna o preço médio de vendas (receita / quantidade de produtos).
	 * 
	 * @return float Preço médio de venda.
	 */
    public function getOrdersRetailPrice()
    {
        $this->cachedQuery = false;
        
        $this->strSqlQuery = "SELECT ROUND(SUM(price * quantity) / SUM(quantity),2) AS preco_medio
                                
                                FROM pedido";
        
        $this->execute();

        return $this->getResultSet();
    }

    /**
	 * Retorna o ticket médio de venda (receita / total de pedidos).
	 * 
	 * @return float Ticket médio.
	 */
    public function getOrdersAverageOrderValue()
    {
        $this->cachedQuery = false;
        
        $this->strSqlQuery = "SELECT ROUND(SUM(price * quantity) / COUNT(order_id),2) AS media_venda
                                
                                FROM pedido";
        
        $this->execute();

        return $this->getResultSet();
    }
}
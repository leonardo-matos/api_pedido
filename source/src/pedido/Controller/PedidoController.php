<?php
namespace API\pedido\Controller;
use Silex\Application;
use API\Core\Auth\AuthServerController;
use API\Core\Configure\Config;

class PedidoController
{

    /**
     * Função para validar expiração do token de acesso
     */
	protected function validarRequisicao($app,$id='',$origem,$scope=null)
	{
		if(!Config::isDeveloper()){

			$auth = new AuthServerController();
			
			$tokenRequest = $auth->validateUserRequest($scope);

			if($tokenRequest->getStatusCode() != 200){
				
				return array(
								'codigo'=>$tokenRequest->getStatusCode(),
								'mensagem'=>'Token inválido. Gere um token válido para realizar a requisição.'
							);
			}else{
				
				return array(
					'codigo'=>$tokenRequest->getStatusCode(),
					'mensagem'=>'Token Autenticado'
				);
			}
		}else{
			return array(
				'codigo'=>200,
				'mensagem'=>'Token Autenticado'
			);
		}
	}
}
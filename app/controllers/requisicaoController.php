<?php

class requisicaoController{

	public function index(){

	}

	public function validar_login(){

		$usuario = new Usuario();
		$seguranca = new Seguranca();

		// Retorno
		$retorno = array('status' => false, 'alerta' => '', 'novoToken' => '');

		if($seguranca->destinoHttp()){

			$token = filter_input(INPUT_POST, 'token', FILTER_SANITIZE_STRING);

			if($_SESSION['token']['CSRF'] == $token){

				$login = filter_input(INPUT_POST, 'login', FILTER_SANITIZE_STRING);
				$senha = filter_input(INPUT_POST, 'senha', FILTER_SANITIZE_STRING);

				if($usuario->consultarLogin($login, $senha)){

					// Iniciar Sessão
					$_SESSION['login'] = true;

					$_SESSION['sessionHash'] = $seguranca->newSessionHash();

					$retorno['status'] = true;

				}else{
					$retorno['alerta'] = 1;
				}

			}else{
				$retorno['alerta'] = 2;
			}

		}else{
			$retorno['alerta'] = 3;
		}

		// Novo Token
		$retorno['novoToken'] = $seguranca->gerarToken();

		echo json_encode($retorno);
	}

}
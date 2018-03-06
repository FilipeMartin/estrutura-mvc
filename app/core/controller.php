<?php

class controller{

	public function loadTemplate($viewName, $viewData = array()){

		require_once '../app/views/template/template.php';

	}

	public function loadTemplateInView($viewName, $viewData = array()){

		extract($viewData);
		require_once '../app/views/'.$viewName.'.php';

	}

	public function loadTemplateLogado($viewName, $viewData = array()){

		$nome = $_SESSION['usuario']['login'];
		require_once '../app/views/template/templateLogado.php';

	}

	public function loadTemplateLogadoInView($viewName, $viewData = array()){

		extract($viewData);
		require_once '../app/views/'.$viewName.'.php';

	}

	public function statusLogin(){
		$usuario = new Usuario();
		$seguranca = new Seguranca();

		if(empty($_SESSION['login']) || !$seguranca->autentificarSession()){
			header('Location: '.BASE_URL);
		
		}else if($usuario->consultarIp()){
			$this->sair();
		}
	}
}
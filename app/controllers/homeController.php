<?php

class homeController extends controller{

	public function index(){
		$seguranca = new Seguranca();

		$this->statusLogado($seguranca);

		$dados = array(
			'token' => $seguranca->gerarToken()
		);

		$this->loadTemplate('home', $dados);
	}

	private function statusLogado($seguranca){
		
		if(!empty($_SESSION['login']) && $_SESSION['login'] == true && $seguranca->autentificarSession()){
			header('Location: '.BASE_URL.'restrito/');
		}	

	}

}
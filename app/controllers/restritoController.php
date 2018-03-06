<?php

class restritoController extends controller{

	public function index(){
		$this->statusLogin();

		$this->loadTemplateLogado('restrito');

	}

	public function produtos($valorPg){
		$this->statusLogin();

		$produtos = new Produtos;

		if(filter_var($valorPg, FILTER_VALIDATE_INT)){
			$valorPg = filter_var($valorPg, FILTER_SANITIZE_NUMBER_INT);

		}else{
			$valorPg = 1; 
		}

		$pg= ($valorPg - 1) * 10;

		$limitPg = 10;

		$totalPg = ceil($produtos->totalProdutos() / $limitPg);

		$dados = array(
			'produtos' => $produtos->listarProdutos($pg, $limitPg),
			'totalPg' => $totalPg
		);

		$this->loadTemplateLogado('produtos', $dados);

	}

	public function sair(){
		session_destroy();
		unset($_SESSION);
		header('Location: '.BASE_URL);
	}
}
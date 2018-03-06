<?php

class produtosController extends controller{

	public function index(){
		$produtos = new ProdutosFree;

		$pg = 0;
		$limitePg = 5;

		$totalPg = ceil($produtos->totalProdutos() / $limitePg);

		$dados = array(
			'produtos' => $produtos->listarProdutos($pg, $limitePg),
			'paginas' => $totalPg,
			'valorPg' => 1
		);

		$this->loadTemplate('produtosFree', $dados);

	}

	public function page($valorPg){
		$produtos = new ProdutosFree;

		if(filter_var($valorPg[0], FILTER_VALIDATE_INT)){
			$valorPg = filter_var($valorPg[0], FILTER_SANITIZE_NUMBER_INT);

		}else{
			$valorPg = 1;	
		}

		if($valorPg == 1){
			header('Location: '.BASE_URL.'produtos/');
			exit;
		}

		$limitePg = 5;

		$pg = ($valorPg - 1) * $limitePg;

		$totalPg = ceil($produtos->totalProdutos() / $limitePg);

		$produtos = $produtos->listarProdutos($pg, $limitePg);

		if($produtos == 0){
			header('Location: '.BASE_URL.'produtos/');
			exit;
		}

		$dados = array(
			'produtos' => $produtos,
			'paginas' => $totalPg,
			'valorPg' => $valorPg
		);

		$this->loadTemplate('produtosFree', $dados);
	}

}
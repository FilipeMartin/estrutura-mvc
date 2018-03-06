<?php

class ProdutosFree extends model{

	public function listarProdutos($pg, $limitePg){
		try{

			$sql = "SELECT * FROM `produtos` LIMIT :pg, :limitePg;";
			$sql = $this->db->prepare($sql);
			$sql->bindValue(':pg', $pg, PDO::PARAM_INT);
			$sql->bindValue(':limitePg', $limitePg, PDO::PARAM_INT);
			$sql->execute();

			if($sql->rowCount() > 0){

				return $sql->fetchAll();

			}else{
				return false;
			}

		} catch(PDOException $ex){
			echo "ERRO: ".$ex->getMessage();
		}
	}

	public function totalProdutos(){
		try{

			$sql = "SELECT COUNT(*) as resultado FROM `produtos`;";
			$sql = $this->db->prepare($sql);
			$sql->execute();

			if($sql->rowCount() > 0){

				$sql = $sql->fetch();

				return $sql['resultado'];

			}else{
				return 0;
			}

		} catch(PDOException $ex){
			echo "ERRO: ".$ex->getMessage();
		}
	}

}
<?php

class Produtos extends model{

	public function listarProdutos($pg, $limitPg){
		try{

			$sql = "SELECT * FROM `produtos` LIMIT :pg, :limitPg;";
			$sql= $this->db->prepare($sql);
			$sql->bindValue(":pg", $pg, PDO::PARAM_INT);
			$sql->bindValue(":limitPg", $limitPg, PDO::PARAM_INT);
			$sql->execute();

			if($sql->rowCount() > 0){

				$sql = $sql->fetchAll();

				return $sql;
			}else{
				return false;
			}

		} catch(PDOException $ex){
			echo "ERRO :".$ex->getMessage();
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
			echo "ERRO :".$ex->getMessage();
		}
	}

}
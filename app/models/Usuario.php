<?php

class Usuario extends model{

	private $seguranca;

	public function __construct(){
		parent::__construct();
		$this->seguranca = new Seguranca();
	}

	public function consultarLogin($login, $senha){
		try {
			$sql = "SELECT * FROM `usuarios` WHERE `login` = :login;";
			$sql = $this->db->prepare($sql);
			$sql->bindValue(":login", $login, PDO::PARAM_STR);
			$sql->execute();

			if($sql->rowCount() > 0){
				$sql = $sql->fetch();

				if(password_verify($senha, $sql['senha'])){

					if($this->addIp($sql['id'])){
						$_SESSION['usuario'] = $sql;

						return true;
					}

					return false;

				}else{
					return false;
				}
			}else{
				return false;
			}

		} catch(PDOException $ex){
			echo "ERRO: ".$ex->getMessage();
		}
	}

	private function addIp($id){

		try {

			$sessionHash = $this->seguranca->newSessionHash();

			$sql = "UPDATE `usuarios` SET `ip` = :ip WHERE `id` = :id;";
			$sql = $this->db->prepare($sql);
			$sql->bindValue(':ip', $sessionHash, PDO::PARAM_STR);
			$sql->bindValue(':id', $id, PDO::PARAM_INT);

			if($sql->execute()){
				return true;

			}else{
				return false;
			}

		} catch(PDOException $ex){
			echo "ERRO: ".$ex->getMessage();
		}
	}

	public function consultarIp(){
		try{

			$id = $_SESSION['usuario']['id'];
			$ip = $this->seguranca->newSessionHash();

			$sql = "SELECT `ip` FROM `usuarios` WHERE `id` = :id AND `ip` = :ip;";
			$sql = $this->db->prepare($sql);
			$sql->bindValue(":id", $id, PDO::PARAM_INT);
			$sql->bindValue(":ip", $ip, PDO::PARAM_STR);
			$sql->execute();

			if($sql->rowCount() > 0){
				return false;

			}else{
				return true;
			}

		} catch(PDOException $ex){
			echo "ERRO: ".$ex->getMessage();
		}
	}

}
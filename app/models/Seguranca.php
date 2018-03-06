<?php

class Seguranca{

	public function gerarToken(){
		$token = password_hash(rand(99, 999), PASSWORD_DEFAULT);

		$_SESSION['token']['CSRF'] = $token;

		return $token;
	}

	public function destinoHttp(){

		if(!empty($_SERVER['HTTP_REFERER']) && $_SERVER['HTTP_REFERER'] == BASE_URL){
			return true;
		}else{
			return false;
		}

	}

	public function newSessionHash(){
		$ip = $_SERVER['REMOTE_ADDR'];
		$cookie = $_SERVER['HTTP_COOKIE'];
		$browser = $_SERVER['HTTP_USER_AGENT'];

		$sessionHash = md5($ip.$cookie.$browser);
		return $sessionHash;
	}

	public function autentificarSession(){
		$sessionHash = $this->newSessionHash();

		if($_SESSION['sessionHash'] == $sessionHash){
			return true;
			
		}else{
			return false;
		}
	}

}
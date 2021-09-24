<?php 
	date_default_timezone_set('America/Bogota');
	
	function conectar(){
		$cn = new mysqli("localhost","root","","componentech");
		//$cn = new mysqli("sql212.ezyro.com","ezyro_29847105","5r0qybq778","ezyro_29847105_ctech");
		if ($cn->connect_errno) {
			echo "Problemas de conexión ".$cn->connect_error;
			die();
		} else {
			$cn->set_charset("utf8");
			return $cn;
		}
	}
 ?>
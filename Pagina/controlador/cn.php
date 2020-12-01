<?php 
	function conectar(){
		$cn = new mysqli("localhost","root","","componentech");
		if ($cn->connect_errno) {
			echo "Problemas de conexión ".$cn->connect_error;
			die();
		} else {
			return $cn;
		}
	}
 ?>
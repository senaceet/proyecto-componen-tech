<?php 
	function conectar(){
		$cn = new mysqli("localhost","root","","componentech");
		//$cn = new mysqli("sql307.epizy.com","epiz_27830796","gD8TXRE3ox","epiz_27830796_componentech");
		if ($cn->connect_errno) {
			echo "Problemas de conexión ".$cn->connect_error;
			die();
		} else {
			return $cn;
		}
	}
 ?>
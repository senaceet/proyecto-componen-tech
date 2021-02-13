<?php 

require_once ('../controlador/cn.php');

class Categoria {
	private $_idCategoria,$_categoria;

	public function __construct(){}

	public function getCategorias(){
		$sql = "select * from categoria";
		$cn = conectar();
		$res = $cn->query($sql);
		$cn->close();
		return $res;
	}
	public function getCategoria($cat){
		$sql = "select * from categoria where idCategoria = '$cat'";
		$cn = conectar();
		$res = $cn->query($sql);
		$cn->close();
		return $res;
	}

}
 ?>
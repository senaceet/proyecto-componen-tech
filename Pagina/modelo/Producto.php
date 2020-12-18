<?php
/**
 * @access public
 * @author Marlon, Yeren, Jhon, Kevin
 */
require_once ('../controlador/cn.php');

class Producto {
	
	private $_idProducto;
	private $_nombreProducto;
	private $_detalles;
	private $_precio;
	private $_iva;
	private $_categoria;
	private $_proveedor;
	private $_estado;
	private $_prodImg;

	public function getId_Producto() {
		return $this->_id_Producto;
	}

	public function setIdProducto($aIdProducto) {
		$this->_idProducto = $aIdProducto;
	}

	public function setNombreProducto($aNombreProducto) {
		$this->_nombreProducto = $aNombreProducto;
	}

	public function getNombreProducto() {
		return $this->_nombreProducto;
	}

	public function setDetalles($aDetalles) {
		$this->_detalles = $aDetalles;
	}

	public function getDetalles() {
		return $this->_detalles;
	}

	public function setPrecio($aPrecio) {
		$this->_precio = $aPrecio;
	}

	public function getPrecio() {
		return $this->_precio;
	}

	public function setIVA($aIVA) {
		$this->_iva = $aIVA;
	}

	public function getIVA() {
		return $this->_iva;
	}

	public function setCategoria($aCategoria) {
		$this->_categoria = $aCategoria;
	}

	public function getCategoria() {
		return $this->_categoria;
	}

	public function setProveedor($aProveedor) {
		$this->_proveedor = $aProveedor;
	}

	public function getProveedor() {
		return $this->_proveedor;
	}

	public function setEstado($aEstado) {
		$this->_estado = $aEstado;
	}

	public function getEstado() {
		return $this->_estado;
	}

	public function setProdImg($aProdImg) {
		$this->_prodImg = $aProdImg;
	}

	public function getProdImg() {
		return $this->_prodImg;
	}

	public function crearProducto($nombre,$detalles,$precio,$categoria,$proveedor,$estado,$img){
		$this->setNombreProducto($nombre);
		$this->setDetalles($detalles);
		$this->setPrecio($precio);
		$this->setIVA(19);
		$this->setCategoria($categoria);
		$this->setProveedor($proveedor);
		$this->setEstado($estado);
		$this->setProdImg($img);
	}

	public function insertar(){
		$sql = "insert into producto values('','$this->_nombreProducto','$this->_detalles','$this->_precio','$this->_iva','$this->_categoria','$this->_proveedor','$this->_estado','$this->_prodImg')";
		$cn = conectar();
		$res = $cn->query($sql);
		$cn->close();
		return $res;
	}

	public function getProductos($startpage,$endpage){
		$sql = "select * from producto where ESTADO_idEstado = 1 limit $startpage,$endpage";
		$cn = conectar();
		$res = $cn->query($sql);
		$cn->close();
		return $res;
	}

	public function getProducto($p){
		$sql = "select * from producto where idProducto = '$p' and ESTADO_idEstado = 1";
		$cn = conectar();
		$res = $cn->query($sql);
		$cn->close();
		return $res;
	}

	public function getProdCantidad(){
		$sql = "SELECT count(*) as c from producto where ESTADO_idEstado = 1";
		$cn = conectar();
		$res = $cn->query($sql);
		$cn->close();
		$res = $res->fetch_array();
		return $res['c'];
	}

	public function getProductosSearch($s){
		$sql = "SELECT * from producto where (productoNombre like '%$s%' or detalles like '%$s%' or precio like '%$s%') and ESTADO_idEstado = 1";
		$cn = conectar();
		$res = $cn->query($sql);
		$cn->close();
		return $res;
	}

	public function getProductosCat($cat){
		$sql = "select * from producto where ESTADO_idEstado = 1 and CATEGORIA_idCategoria = $cat limit $startpage,$endpage";
		$cn = conectar();
		$res = $cn->query($sql);
		$cn->close();
		return $res;
	}

	public function eliminar($id){
		$sql = "delete from producto where idProducto='$id'";
		$cn = conectar();
		$res = $cn->query($sql);
		$cn->close();
		return $res;
	}

	public function subirFoto($foto,$destino){
		if (!$foto['error']>0) {
			if ($foto['size']<8192000){
				if (substr($foto['type'],0,5) == "image") {
					if (!file_exists($destino)) {
						if (move_uploaded_file($foto['tmp_name'], $destino)){
							$m = "ya se guardo la imagen";
						} else {
							$m = "error al guardar imagen";
						}
					} else {
						$m = "El archivo ya existe";
					}
				} else {
					$m = "error tipo de imagen";
				}
			} else {
				$m = "la imagen es muy pesada";
			}
		} else {
			$m = "error al subir imagen";
		}
		return $m;
	}
}
?>
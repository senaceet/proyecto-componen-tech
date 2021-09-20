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

		$fotoGuardada = $this->guardarFoto($img);
		if(!$fotoGuardada->error){
			$this->setProdImg($fotoGuardada->foto);

			return true;
		} else {
			$this->setProdImg(false);
			return $fotoGuardada;
		}
		
	}

	public function getCategoriaText($c){
		$sql = "select * from categoria where idCategoria=$c ";
		$cn = conectar();
		$res = $cn->query($sql);
		$cn->close();
		$res = $res->fetch_array();
		return $res;
	}

	public function insertar(){

		$sql = "insert into producto values(0,'$this->_nombreProducto','$this->_detalles','$this->_precio','$this->_iva','$this->_categoria','$this->_proveedor','$this->_estado','$this->_prodImg')";

		$cn = conectar(); 
		$res = $cn->query($sql);
		
		$cn->close();

		if(!$res)
			return '{"error":"Ocurrió un problema con la base de datos"}';

		return '{"error":false,"msj":"producto guardado"}';
	}

		
	public function actualizar($id){
		$data = new stdClass();

		if($this->_prodImg == false){
			$sql = "update producto set productoNombre='$this->_nombreProducto', detalles='$this->_detalles', precio='$this->_precio', CATEGORIA_idCategoria='$this->_categoria', PROVEEDOR_idProveedor='$this->_proveedor'
				where idProducto='$id'";
		} else {
			$sql = "update producto set productoNombre='$this->_nombreProducto', detalles='$this->_detalles', precio='$this->_precio', CATEGORIA_idCategoria='$this->_categoria', PROVEEDOR_idProveedor='$this->_proveedor', prodImg='$this->_prodImg'
				where idProducto='$id'";
		}
		
		$cn = conectar();
		$res = $cn->query($sql);
		if($res){
			$data->status=true;
			$data->message="Producto actualizado";
		} else {
			$data->status=false;
			$data->message="Error al actualizar producto";
		}

		$cn->close();
		return $data;
	}

	public function getProductos($limit,$offset,$estado,$categoria){
		if($estado == 1 || $estado == 2){
			$sql = "select idProducto,idCategoria,categoria,nEmpresa,productoNombre,precio,detalles,prodImg
			from producto,categoria,proveedor 
			where producto.ESTADO_idESTADO = $estado and (CATEGORIA_idCategoria = idCategoria and PROVEEDOR_idProveedor = idProveedor)
			order by idProducto desc limit $offset,$limit ";
			if($categoria!=0)
				$sql = "select idProducto,idCategoria,categoria,nEmpresa,productoNombre,precio,detalles,prodImg
				from producto,categoria,proveedor 
				where (CATEGORIA_idCategoria = idCategoria and PROVEEDOR_idProveedor = idProveedor) and (producto.ESTADO_idESTADO = $estado and idCategoria = $categoria) 
				order by idProducto desc limit $offset,$limit ";
		} else {
			$sql = "select idProducto,idCategoria,categoria,nEmpresa,productoNombre,precio,detalles,prodImg
			from producto,categoria,proveedor 
			where  (CATEGORIA_idCategoria = idCategoria and PROVEEDOR_idProveedor = idProveedor) 
			order by idProducto desc limit $offset,$limit ";
			if($categoria!=0)
				$sql = "select idProducto,idCategoria,categoria,nEmpresa,productoNombre,precio,detalles,prodImg
				from producto,categoria,proveedor 
				where (CATEGORIA_idCategoria = idCategoria and PROVEEDOR_idProveedor = idProveedor) and idCategoria=$categoria 
				order by idProducto desc limit $offset,$limit ";
		}
			

		$cn = conectar();
		$res = $cn->query($sql);
		echo $cn->error;
		$cn->close();
		
		return $res;
	}

	public function search($s,$estado,$categoria){
		if($estado == 1 || $estado == 2)
			if($categoria == 0)
				$sql = "SELECT * from producto,categoria,proveedor
					where (productoNombre like '%$s%' or detalles like '%$s%' or precio like '%$s%') 
					and (CATEGORIA_idCategoria = idCategoria and  producto.ESTADO_idEstado = $estado and idProveedor = PROVEEDOR_idProveedor)";
			else
				$sql = "SELECT * from producto,categoria,proveedor 
					where (productoNombre like '%$s%' or detalles like '%$s%' or precio like '%$s%') 
					and (CATEGORIA_idCategoria = idCategoria and  producto.ESTADO_idEstado = $estado and idCategoria = $categoria and idProveedor = PROVEEDOR_idProveedor)";
		else
			if($categoria == 0)
				$sql = "SELECT * from producto,categoria,proveedor 
					where (productoNombre like '%$s%' or detalles like '%$s%' or precio like '%$s%') 
					and (CATEGORIA_idCategoria = idCategoria and idProveedor = PROVEEDOR_idProveedor)";
			else
				$sql = "SELECT * from producto,categoria,proveedor  
					where (productoNombre like '%$s%' or detalles like '%$s%' or precio like '%$s%') 
					and (CATEGORIA_idCategoria = idCategoria and idCategoria = $categoria and idProveedor = PROVEEDOR_idProveedor)";
		$cn = conectar();
		$res = $cn->query($sql);
		$data = new StdClass();
		$data->data = [];

		while ($a = $res->fetch_object()) {
			array_push($data->data, $a);
		}
		
		$cn->close();
		return $data;
	}



	// --------------------

	public function getProductosInventario($startpage,$endpage){
		$sql = "select * from producto left join inventario ON idProducto = PRODUCTO_idProducto limit $startpage,$endpage";
		$cn = conectar();
		$res = $cn->query($sql);
		$cn->close();
		return $res;
	}

	public function getProducto($p){
		$data = new stdClass();
		$sql = "select * from producto,categoria where CATEGORIA_idCategoria = idCategoria and idProducto = '$p' ";
		$cn = conectar();
		$res = $cn->query($sql);
		if($res){
			$data->status = true;
			$data->data = $res->fetch_object();
		} else {
			$data->status = false;
			$data->data = "No se encontró el producto";
		}
		$cn->close();
		return $data;
	}


	public function getProducto1($p){
		$sql = "select * from producto,categoria where CATEGORIA_idCategoria = idCategoria and idProducto = '$p' ";
		$cn = conectar();
		$res = $cn->query($sql);
		$cn->close();
		return $res;
	}

	public function getProductoInventario($p){
		$sql = "select * from producto where idProducto = '$p'";
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
	public function getProdInventarioCantidad(){
		$sql = "SELECT count(*) as c from producto left join inventario ON idProducto = PRODUCTO_idProducto";
		$cn = conectar();
		$res = $cn->query($sql);
		$cn->close();
		$res = $res->fetch_array();
		return $res['c'];
	}

	public function getProductosSearch($s){
		$sql = "SELECT * from producto,categoria where (productoNombre like '%$s%' or detalles like '%$s%' or precio like '%$s%') and (CATEGORIA_idCategoria = idCategoria and  ESTADO_idEstado = 1)";
		$cn = conectar();
		$res = $cn->query($sql);
		echo $cn->error;
		
		$cn->close();
		return $res;
	}

	public function getProductosSearchInventario($s){
		$sql = "SELECT * from producto where (productoNombre like '%$s%' or detalles like '%$s%' or precio like '%$s%')";
		$cn = conectar();
		$res = $cn->query($sql);
		$cn->close();
		return $res;
	}

	public function getProductosCat($cat,$startpage,$endpage){
		$sql = "select * from producto,categoria where ESTADO_idEstado = 1 and CATEGORIA_idCategoria = $cat and CATEGORIA_idCategoria = idCategoria limit $startpage,$endpage";
		$cn = conectar();
		$res = $cn->query($sql);
		$cn->close();
		return $res;
	}

	public function getProductosInventarioCat($cat,$startpage,$endpage){
		$sql = "select * from producto left join inventario ON idProducto = PRODUCTO_idProducto where CATEGORIA_idCategoria=$cat limit $startpage,$endpage";
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

	private function guardarFoto($foto){

		//crear carpeta por proveedor si no existe
		$ruta = "../img/productos/".$this->_proveedor."/";
		if (!file_exists($ruta)) {
			mkdir($ruta,0777,true);
		}
		$destino = $ruta.$foto['name']; 

		$res = new stdClass();
		$res->error = "";
		$res->destino = "";

		if($foto == 0){
			$res->error = false;
			$res->foto = false;
			return $res;
		}


		//control de errores de el archivo		 
		if ($foto['error']>0){
			$res->error = "Error al cargar imágen";
			return $res;
		}

		if( substr($foto['type'],0,5) != "image" ){
			$res->error = "El tipo de archivo es incorrecto";
			return $res;
		}

		if ($foto['size'] > 5*1024*1024){
			$res->error = "La imagen debe ser menor a 5mb";
			return $res;
		}

		if (file_exists($destino)) {
			$res->error = "Ya existe una foto con ese nombre";
			return $res;
		} 

		if (move_uploaded_file($foto['tmp_name'], $destino)){
			$res->error = false;
			$res->foto = $destino;
			return $res;
		} else {
			$res->error = "Error al guardar foto";
			return $res;
		}
	}

	public function getEstado($e){
		$sql = "select * from estado where idEstado=$e ";
		$cn = conectar();
		$res = $cn->query($sql);
		$cn->close();
		
		$res = $res->fetch_array();
		return $res;
	}

	public function getEstados(){
		$sql = "select * from estado where idEstado=1 or idEstado =2 ";
		$cn = conectar();
		$res = $cn->query($sql);
		$cn->close();
		return $res;
	}
	public function getCount($estado,$categoria){
		if($estado == 1 || $estado == 2){
			$sql = "select count(*) as c from producto where ESTADO_idEstado = $estado";
			if($categoria != 0)
				$sql = "select count(*) as c from producto where CATEGORIA_idCategoria = $categoria and ESTADO_idEstado = $estado";
		} else {
			$sql = "select count(*) as c from producto";
			if($categoria != 0)
			$sql = "select count(*) as c from producto where CATEGORIA_idCategoria = $categoria";
		} 
		$cn = conectar();
		$res = $cn->query($sql);
		$cn->close();
		$res = $res->fetch_array();
		return $res['c'];
	}

	public function getCategorias(){
		$sql = "select * from categoria";
		$cn = conectar();
		$res = $cn->query($sql);
		$data = new stdClass();
		$categorias=[];
        while ($a = $res->fetch_object()) {
            array_push($categorias,$a);
        }
		$cn->close();

		return $categorias;
	}

	public function getProductosP($startpage,$endpage){
		$sql = "select * from producto,categoria where CATEGORIA_idCategoria = idCategoria and ESTADO_idEstado = 1 limit $startpage,$endpage";
		$cn = conectar();
		$res = $cn->query($sql);
		$cn->close();
		return $res;
	}

}
?>
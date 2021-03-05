<?php
require_once '../controlador/cn.php';

/**
 * @access public
 * @author Marlon, Yeren, Jhon, Kevin
 */
class Movimiento {
	/**
	 * @AttributeType int
	 */
	private $_idMovimiento;
	/**
	 * @AttributeType string
	 */
	private $_fecha;
	/**
	 * @AttributeType int
	 */
	private $_cantidad;
	/**
	 * @AttributeType int
	 */
	private $_tipoMovimiento;
	/**
	 * @AttributeType int
	 */
	private $_productoIdProducto;
	/**
	 * @AttributeType int
	 */
	private $_facturaIdFactura;
	/**
	 * @AttributeType Factura
	 * /**
	 *  * @AssociationType Factura
	 *  * /
	 */
	public $_unnamed_Factura_;
	/**
	 * @AttributeType Inventario
	 * /**
	 *  * @AssociationType Inventario
	 *  * /
	 */
	public $_unnamed_Inventario_;

	/**
	 * @access public
	 * @return boolean
	 * @ReturnType boolean
	 */
	public function actualizarInventario() {
		// Not yet implemented
	}

	/**
	 * /**
	 *  * @access public
	 *  * @param int aIdMovimiento
	 *  * @ParamType aIdMovimiento int
	 *  * /
	 * @access public
	 * @param int aIdMovimiento
	 * @ParamType aIdMovimiento int
	 */
	public function setIdMovimiento($aIdMovimiento) {
		$this->_idMovimiento = $aIdMovimiento;
	}

	/**
	 * /**
	 *  * @access public
	 *  * @return int
	 *  * @ReturnType int
	 *  * /
	 * @access public
	 * @return int
	 * @ReturnType int
	 */
	public function getIdMovimiento() {
		return $this->_idMovimiento;
	}

	/**
	 * /**
	 *  * @access public
	 *  * @param string aFecha
	 *  * @ParamType aFecha string
	 *  * /
	 * @access public
	 * @param string aFecha
	 * @ParamType aFecha string
	 */
	public function setFecha($aFecha) {
		$this->_fecha = $aFecha;
	}

	/**
	 * /**
	 *  * @access public
	 *  * @return string
	 *  * @ReturnType string
	 *  * /
	 * @access public
	 * @return string
	 * @ReturnType string
	 */
	public function getFecha() {
		return $this->_fecha;
	}

	/**
	 * /**
	 *  * @access public
	 *  * @param int aCantidad
	 *  * @ParamType aCantidad int
	 *  * /
	 * @access public
	 * @param int aCantidad
	 * @ParamType aCantidad int
	 */
	public function setCantidad($aCantidad) {
		$this->_cantidad = $aCantidad;
	}

	/**
	 * /**
	 *  * @access public
	 *  * @return int
	 *  * @ReturnType int
	 *  * /
	 * @access public
	 * @return int
	 * @ReturnType int
	 */
	public function getCantidad() {
		return $this->_cantidad;
	}

	/**
	 * /**
	 *  * @access public
	 *  * @param int aTipoMovimientoIdTipoMovimiento
	 *  * @ParamType aTipoMovimientoIdTipoMovimiento int
	 *  * /
	 * @access public
	 * @param int aTipoMovimientoIdTipoMovimiento
	 * @ParamType aTipoMovimientoIdTipoMovimiento int
	 */
	public function setTipoMovimiento($aTipoMovimiento) {
		$this->_tipoMovimiento = $aTipoMovimiento;
	}

	/**
	 * /**
	 *  * @access public
	 *  * @return int
	 *  * @ReturnType int
	 *  * /
	 * @access public
	 * @return int
	 * @ReturnType int
	 */
	public function getTipoMovimiento() {
		return $this->_tipoMovimiento;
	}

	/**
	 * /**
	 *  * @access public
	 *  * @param int aProductoIdProducto
	 *  * @ParamType aProductoIdProducto int
	 *  * /
	 * @access public
	 * @param int aProductoIdProducto
	 * @ParamType aProductoIdProducto int
	 */
	public function setProductoIdProducto($aProductoIdProducto) {
		$this->_productoIdProducto = $aProductoIdProducto;
	}

	/**
	 * /**
	 *  * @access public
	 *  * @return int
	 *  * @ReturnType int
	 *  * /
	 * @access public
	 * @return int
	 * @ReturnType int
	 */
	public function getProductoIdProducto() {
		return $this->_productoIdProducto;
	}

	/**
	 * /**
	 *  * @access public
	 *  * @param int aFacturaIdFactura
	 *  * @ParamType aFacturaIdFactura int
	 *  * /
	 * @access public
	 * @param int aFacturaIdFactura
	 * @ParamType aFacturaIdFactura int
	 */
	public function setFacturaIdFactura($aFacturaIdFactura) {
		$this->_facturaIdFactura = $aFacturaIdFactura;
	}

	/**
	 * /**
	 *  * @access public
	 *  * @return int
	 *  * @ReturnType int
	 *  * /
	 * @access public
	 * @return int
	 * @ReturnType int
	 */
	public function getFacturaIdFactura() {
		return $this->_facturaIdFactura;
	}


	public function crearMovimiento($id,$fecha,$cantidad,$tipo,$prod,$factura){
		$this->_idMovimiento = $id;
		$this->_fecha = $fecha;
		$this->_cantidad = $cantidad;
		$this->_tipoMovimiento = $tipo;
		$this->_productoIdProducto = $prod;
		$this->_facturaIdFactura = $factura;
	}

	public function insertar(){
		$sql = "INSERT into movimiento values ('$this->_idMovimiento','$this->_fecha','$this->_cantidad','$this->_tipoMovimiento','$this->_productoIdProducto',$this->_facturaIdFactura) ";
		$cn = conectar();
		$res = $cn->query($sql);
		$cn->close();
		return $res;
		
		
	}



	public function getMovimientos(){
		$sql = "SELECT fecha,cantidad,tipoMovimiento as tipo,productoNombre as producto,FACTURA_idFactura as factura FROM movimiento,tipomovimiento,producto 
		where movimiento.PRODUCTO_idProducto = producto.idProducto and movimiento.TIPOMOVIMIENTO_idTipoMovimiento = tipomovimiento.idTipomovimiento order by fecha desc";
		$cn = conectar();
		$res = $cn->query($sql);
		$cn->close();
		return $res;
	}
	public function getMovFecha($desde,$hasta){
		if($desde == ""){
			$sql = "SELECT fecha,cantidad,tipoMovimiento as tipo,productoNombre as producto,FACTURA_idFactura as factura FROM movimiento,tipomovimiento,producto 
		where (movimiento.PRODUCTO_idProducto = producto.idProducto and movimiento.TIPOMOVIMIENTO_idTipoMovimiento = tipomovimiento.idTipomovimiento) and (fecha<'$hasta') order by fecha desc";
		} elseif($hasta == ""){
			$sql = "SELECT fecha,cantidad,tipoMovimiento as tipo,productoNombre as producto,FACTURA_idFactura as factura FROM movimiento,tipomovimiento,producto 
		where (movimiento.PRODUCTO_idProducto = producto.idProducto and movimiento.TIPOMOVIMIENTO_idTipoMovimiento = tipomovimiento.idTipomovimiento) and (fecha>'$desde') order by fecha desc";
		} else {
			$sql = "SELECT fecha,cantidad,tipoMovimiento as tipo,productoNombre as producto,FACTURA_idFactura as factura FROM movimiento,tipomovimiento,producto 
		where (movimiento.PRODUCTO_idProducto = producto.idProducto and movimiento.TIPOMOVIMIENTO_idTipoMovimiento = tipomovimiento.idTipomovimiento) and (fecha>'$desde' and fecha<'$hasta')";
		}
		
		$cn = conectar();
		$res = $cn->query($sql);
		$cn->close();
		return $res;
	}
}
?>
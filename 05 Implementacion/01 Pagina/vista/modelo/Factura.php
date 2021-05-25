<?php
require_once('../controlador/cn.php');

/**
 * @access public
 * @author Marlon, Yeren, Jhon, Kevin
 */
class Factura {
	/**
	 * @AttributeType int
	 */
	private $_idFactura;
	/**
	 * @AttributeType string
	 */  
	private $_fecha;
	/**
	 * @AttributeType float
	 */
	private $_subTotal;
	/**
	 * @AttributeType float
	 */
	private $_total;
	/**
	 * @AttributeType int
	 */
	private $_tipoPago;
	/**
	 * @AttributeType string
	 */
	private $_iddocumento;
	/**
	 * @AttributeType int
	 */
	private $_estado;

	/**
	 * @access public
	 * @return boolean
	 * @ReturnType boolean
	 */
	public function EntregarFactura() {
		// Not yet implemented
	}

	public function getLastFactura($u){
		$sql = "SELECT * from factura where USUARIO_documento = $u order by idFactura desc limit 1";
		$cn = conectar();
		$res = $cn->query($sql);
		$cn->close();
		$res = $res->fetch_array();
		$this->crearFactura(
			$this->_idFactura = $res['idFactura'],
			$this->_fecha = $res['fecha'],
			$this->_subTotal = $res['subtotal'],
			$this->_total = $res['total'],
			$this->_tipoPago = $res['TIPOPAGO_idTipoPago'],
			$this->_iddocumento = $res['USUARIO_documento'],
			$this->_estado = $res['ESTADO_idEstado']
		);
	}

	Public function crearFactura($id,$fecha,$subtotal,$total,$pago,$documento,$estado){
		$this->_idFactura = $id;
		$this->_fecha = $fecha;
		$this->_subTotal = $subtotal;
		$this->_total = $total;
		$this->_tipoPago = $pago;
		$this->_iddocumento = $documento;
		$this->_estado = $estado;
	}
	public function insertar(){
		$sql = "INSERT into factura values ('$this->_idFactura','$this->_fecha','$this->_subTotal','$this->_total','$this->_tipoPago','$this->_iddocumento','$this->_estado')";
		$cn = conectar();
		$res = $cn->query($sql);
		$cn->close();
		return $res; 
	}


	public function getFacturasCantidad(){
		$sql = "SELECT count(*) as c from factura";
		$cn = conectar();
		$res = $cn->query($sql);
		$res = $res->fetch_array();
		$cn->close();
		//echo $res['c'];
		return $res['c'];
	}


	public function getFacturas($startpage,$limitpage){
		$sql = "SELECT idFactura,fecha,subtotal,total,tipo,documento,TIPODOCUMENTO_idTipo,estado from factura,usuario,estado,tipopago where
		tipopago.idTipoPago = factura.TIPOPAGO_idTipoPago and
		usuario.documento = factura.USUARIO_documento and
		estado.idEstado = factura.ESTADO_idEstado and
		tipopago.idTipoPago = factura.TIPOPAGO_idTipoPago
		order by fecha desc limit $startpage,$limitpage
		";
		$cn = conectar();
		$res = $cn->query($sql);
		$cn->close();
		//echo $res['c'];
		return $res;
	}

	public function getFacturasBusqueda($s){
		$sql = "SELECT idFactura,fecha,subtotal,total,tipo,documento,TIPODOCUMENTO_idTipo,estado from factura,usuario,estado,tipopago where
		tipopago.idTipoPago = factura.TIPOPAGO_idTipoPago and
		usuario.documento = factura.USUARIO_documento and
		estado.idEstado = factura.ESTADO_idEstado and
		tipopago.idTipoPago = factura.TIPOPAGO_idTipoPago
		and (idFactura like '%$s%' or fecha like '%$s%' or subtotal like '%$s%' or total like '%$s%' or tipo like '%$s%' or documento like '%$s%' or TIPODOCUMENTO_idTipo like '%$s%' or estado like '%$s%')
		order by fecha desc
		";
		$cn = conectar();
		$res = $cn->query($sql);
		$cn->close();
		//echo $res['c'];
		return $res;
	}


	public function getFactura($fac){
		$sql = "SELECT * from factura where idFactura= '$fac'";
		$cn = conectar();
		$res = $cn->query($sql);
		$cn->close();
		//echo $res['c'];
		return $res;
	}

	/**
	 * /**
	 *  * @access public
	 *  * @param int aIdFactura
	 *  * @ParamType aIdFactura int
	 *  * /
	 * @access public
	 * @param int aIdFactura
	 * @ParamType aIdFactura int
	 */
	public function setIdFactura($aIdFactura) {
		$this->_idFactura = $aIdFactura;
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
	public function getIdFactura() {
		return $this->_idFactura;
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
	 *  * @param float aSubTotal
	 *  * @ParamType aSubTotal float
	 *  * /
	 * @access public
	 * @param float aSubTotal
	 * @ParamType aSubTotal float
	 */
	public function setSubTotal($aSubTotal) {
		$this->_subTotal = $aSubTotal;
	}

	/**
	 * /**
	 *  * @access public
	 *  * @return float
	 *  * @ReturnType float
	 *  * /
	 * @access public
	 * @return float
	 * @ReturnType float
	 */
	public function getSubTotal() {
		return $this->_subTotal;
	}

	/**
	 * /**
	 *  * @access public
	 *  * @param float aTotal
	 *  * @ParamType aTotal float
	 *  * /
	 * @access public
	 * @param float aTotal
	 * @ParamType aTotal float
	 */
	public function setTotal($aTotal) {
		$this->_total = $aTotal;
	}

	/**
	 * /**
	 *  * @access public
	 *  * @return float
	 *  * @ReturnType float
	 *  * /
	 * @access public
	 * @return float
	 * @ReturnType float
	 */
	public function getTotal() {
		return $this->_total;
	}

	/**
	 * /**
	 *  * @access public
	 *  * @param int aTipoPago
	 *  * @ParamType aTipoPago int
	 *  * /
	 * @access public
	 * @param int aTipoPago
	 * @ParamType aTipoPago int
	 */
	public function setTipoPago($aTipoPago) {
		$this->_tipoPago = $aTipoPago;
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
	public function getTipoPago() {
		return $this->_tipoPago;
	}

	/**
	 * /**
	 *  * @access public
	 *  * @param string aIddocumento
	 *  * @ParamType aIddocumento string
	 *  * /
	 * @access public
	 * @param string aIddocumento
	 * @ParamType aIddocumento string
	 */
	public function setIddocumento($aIddocumento) {
		$this->_iddocumento = $aIddocumento;
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
	public function getIddocumento() {
		return $this->_iddocumento;
	}

	/**
	 * /**
	 *  * @access public
	 *  * @param int aEstado
	 *  * @ParamType aEstado int
	 *  * /
	 * @access public
	 * @param int aEstado
	 * @ParamType aEstado int
	 */
	public function setEstado($aEstado) {
		$this->_estado = $aEstado;
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
	public function getEstado() {
		return $this->_estado;
	}
}
?>
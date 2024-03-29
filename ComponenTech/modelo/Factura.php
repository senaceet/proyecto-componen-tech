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


	// public function getFacturasCantidad(){
	// 	$sql = "SELECT count(*) as c from factura";
	// 	$cn = conectar();
	// 	$res = $cn->query($sql);
	// 	$res = $res->fetch_array();
	// 	$cn->close();
	// 	//echo $res['c'];
	// 	return $res['c'];
	// }


	// public function getFacturas($startpage,$limitpage){
	// 	$sql = "SELECT idFactura,fecha,subtotal,total,tipo,documento,TIPODOCUMENTO_idTipo,estado from factura,usuario,estado,tipopago where
	// 	tipopago.idTipoPago = factura.TIPOPAGO_idTipoPago and
	// 	usuario.documento = factura.USUARIO_documento and
	// 	estado.idEstado = factura.ESTADO_idEstado and
	// 	tipopago.idTipoPago = factura.TIPOPAGO_idTipoPago
	// 	order by fecha desc limit $startpage,$limitpage
	// 	";
	// 	$cn = conectar();
	// 	$res = $cn->query($sql);
	// 	$cn->close();
	// 	//echo $res['c'];
	// 	return $res;
	// }

	// public function getFacturasBusqueda($s){
	// 	$sql = "SELECT idFactura,fecha,subtotal,total,tipo,documento,TIPODOCUMENTO_idTipo,estado from factura,usuario,estado,tipopago where
	// 	tipopago.idTipoPago = factura.TIPOPAGO_idTipoPago and
	// 	usuario.documento = factura.USUARIO_documento and
	// 	estado.idEstado = factura.ESTADO_idEstado and
	// 	tipopago.idTipoPago = factura.TIPOPAGO_idTipoPago
	// 	and (idFactura like '%$s%' or fecha like '%$s%' or subtotal like '%$s%' or total like '%$s%' or tipo like '%$s%' or documento like '%$s%' or TIPODOCUMENTO_idTipo like '%$s%' or estado like '%$s%')
	// 	order by fecha desc
	// 	";
	// 	$cn = conectar();
	// 	$res = $cn->query($sql);
	// 	$cn->close();
	// 	//echo $res['c'];
	// 	return $res;
	// }


	// public function getFactura($fac){
	// 	$sql = "SELECT * from factura where idFactura= '$fac'";
	// 	$cn = conectar();
	// 	$res = $cn->query($sql);
	// 	$cn->close();
	// 	//echo $res['c'];
	// 	return $res;
	// }

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



	 
	public function getCount(){

		$sql = "SELECT count(*) as c FROM Factura ";
	
		$cn = conectar();
		$res = $cn->query($sql);
	
        
		$cn->close();
		$res = $res->fetch_array();
		return $res['c'];

	}


	public function getDetalles($id_fac){
		$data = new stdClass();
		$data->error = false;
		$data->msj = null;
		$cn = conectar();

		// consulta de factura
		$sql_fac = "SELECT * from factura where idFactura = $id_fac";
		$fac = $cn->query($sql_fac);
		
		if($fac->num_rows!=1){
			$data->error = true;
			$data->msj = "no existe la factura";
			return $data;
		}
		$fac = $fac->fetch_object();

		
		
		// consulta de usuario
		$id_usuario = $fac->USUARIO_documento;

		$sql_user = "SELECT * from usuario where documento = $id_usuario";
		$user = $cn->query($sql_user);
		if($user->num_rows!=1){
			$data->error = true;
			$data->msj = "no existe el usuario";
			return $data;
		}
		$user = $user->fetch_object();

		// consulta detalles
		
		$sql_det = "select * from detalles,producto where FACTURA_idFactura = $id_fac and PRODUCTO_idProducto = idProducto";
		$detalles = $cn->query($sql_det);

		$data->detalles = [];

		foreach ($detalles as $detalle) {
			array_push($data->detalles,$detalle);
		}

		$data->factura = $fac;  
		$data->user = $user;
		

		return $data;

	}



	public function getFacturas($limit,$offset,$estado){
		if($estado == 7 || $estado == 8 || $estado == 6){
			if($limit == 0)
				$sql ="SELECT idFactura, fecha, subtotal, total, tipo, USUARIO_documento, nombres, apellidos, estado FROM factura, usuario, tipopago, estado 
					WHERE (USUARIO_documento = documento AND TIPOPAGO_idTipoPago = idTipoPago AND factura.ESTADO_idEstado = $estado AND factura.ESTADO_idEstado = estado.idEstado) ORDER BY fecha  DESC ";
			else
				$sql ="SELECT idFactura, fecha, subtotal, total, tipo, USUARIO_documento, nombres, apellidos, estado FROM factura, usuario, tipopago, estado 
					WHERE (USUARIO_documento = documento AND TIPOPAGO_idTipoPago = idTipoPago AND factura.ESTADO_idEstado = $estado AND factura.ESTADO_idEstado = estado.idEstado) ORDER BY fecha  DESC limit $offset, $limit";
		}else{

			if ($limit == 0)
				$sql ="SELECT idFactura, fecha, subtotal, total, tipo, USUARIO_documento, nombres, apellidos, estado FROM factura, usuario, tipopago, estado 
				WHERE (USUARIO_documento = documento AND TIPOPAGO_idTipoPago = idTipoPago AND factura.ESTADO_idEstado = estado.idEstado) ORDER BY fecha DESC ";
			else 
				$sql ="SELECT idFactura, fecha, subtotal, total, tipo, USUARIO_documento, nombres, apellidos, estado FROM factura, usuario, tipopago, estado 
				WHERE (USUARIO_documento = documento AND TIPOPAGO_idTipoPago = idTipoPago AND factura.ESTADO_idEstado = estado.idEstado) ORDER BY fecha DESC limit $offset, $limit";
			
		}

		$cn = conectar();
		$res = $cn->query($sql);
	
		$data = new stdClass();
		$data->data=[];
		
		$data->count=$this->getCount($estado);
	

		while($value = $res->fetch_object()) {
			array_push($data->data,$value);
		}
		
	   
		$cn->close();  
		return $data;
		
	}

	public function getFacturasBusqueda($s){
		
		$sql = "SELECT idFactura, fecha, subtotal, total, tipo, USUARIO_documento, nombres, apellidos, estado FROM factura, usuario, tipopago, estado  where
		tipopago.idTipoPago = factura.TIPOPAGO_idTipoPago and
		usuario.documento = factura.USUARIO_documento and
		estado.idEstado = factura.ESTADO_idEstado and
		tipopago.idTipoPago = factura.TIPOPAGO_idTipoPago
		and (idFactura like '%$s%' or fecha like '%$s%' or subtotal like '%$s%' or total like '%$s%' or tipo like '%$s%' or documento like '%$s%' or TIPODOCUMENTO_idTipo like '%$s%' or estado like '%$s%')
		order by fecha desc
		";
		$cn = conectar();
		$res = $cn->query($sql);

		$data = new stdClass();
		$data->data=[];
		
		while($value = $res->fetch_object()) {
			array_push($data->data,$value);
		}
		$cn->close();
		//echo $res['c'];
		return $data;
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
	public function getIdFactura() {
		return $this->_idFactura;
	}


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
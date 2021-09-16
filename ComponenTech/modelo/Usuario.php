<?php
/**
 * @access public
 * @author Marlon, Yeren, Jhon, Kevin
 */
require_once '../controlador/cn.php';
class Usuario {
	/**
	 * @AttributeType string
	 */
	protected $_documento;
	/**
	 * @AttributeType string
	 */
	protected $_nombres;
	/**
	 * @AttributeType string
	 */
	protected $_apellidos;
	/**
	 * @AttributeType string
	 */
	protected $_fechaNacimiento;
	/**
	 * @AttributeType string
	 */
	protected $_edad;
	/**
	 * @AttributeType string
	 */
	protected $_celular;
	/**
	 * @AttributeType string
	 */
	protected $_direccion;
	/**
	 * @AttributeType string
	 */
	protected $_correo;
	/**
	 * @AttributeType string
	 */
	protected $_cargo;
	/**
	 * @AttributeType int
	 */
	protected $_tipodocumento;
	/**
	 * @AttributeType int
	 */
	protected $_estado;

	/**
	 * @access public
	 * @return boolean
	 * @ReturnType boolean
	 */

	// crear usuario

	public function crearUsuario($_documento,$_nombres,$_apellidos,$_fechaNacimiento,$_edad,$_celular,$_direccion,$_correo,$_cargo,$_tipodocumento,$_estado,$_pass){
		$this->_documento = $_documento;
		$this->_nombres = $_nombres;
		$this->_apellidos = $_apellidos;
		$this->_fechaNacimiento = $_fechaNacimiento;
		$this->_edad = $_edad; 
		$this->_celular = $_celular;
		$this->_direccion = $_direccion;
		$this->_correo = $_correo;
		$this->_cargo = $_cargo;
		$this->_tipodocumento = $_tipodocumento;
		$this->_estado = $_estado;
		$this->_pass = $_pass;
	}


	public function insertar() {
		$sql = "INSERT INTO usuario values('$this->_documento','$this->_nombres','$this->_apellidos','$this->_fechaNacimiento',
		'$this->_edad','$this->_celular','$this->_direccion','$this->_correo','$this->_cargo','$this->_tipodocumento','$this->_estado')";
		$res = new stdClass();

		if( !$this->verifUsuario($this->_documento) ){
			if( !$this->verifCorreo($this->_correo) ){
				$cn = conectar();
					$res->status = $cn->query($sql);
				$cn->close();
				$this->registrarClave($this->_correo,$this->_pass);
			} else {
				$res->status=false;
				$res->error="El correo ingresado ya está registrado";
			}
		} else {
			$res->status=false;
			$res->error="El documento ingresado ya está registrado";
		}
		// echo $sql;
		return $res;
	}

	public function eliminar($u){
		$sql = "DELETE from usuario where documento='$u'";
		$cn = conectar();
		$res = $cn->query($sql);
		$cn->close();
		return $res;
	}
	
	public function registrarClave($c,$p){
		$sql="insert into clave values('$c','$p') ";
		$cn = conectar();
		$res = $cn->query($sql);
		$cn->close();
		return $res;
	}

	/**
	 * @access public
	 * @return boolean
	 * @ReturnType boolean
	 */
	public function actualizarDatos($doc) {
		$sql = "UPDATE usuario SET documento='$this->_documento', nombres='$this->_nombres', apellidos='$this->_apellidos', fechaNto='$this->_fechaNacimiento', edad='$this->_edad', celular='$this->_celular', direccion='$this->_direccion', correo='$this->_correo', CARGO_idCargo='$this->_cargo', TIPODOCUMENTO_idTipo='$this->_tipodocumento', ESTADO_idEstado='$this->_estado' WHERE documento = '$doc'";
		$cn = conectar();
		$res = $cn->query($sql);
		$cn->close();
		return $res;
	}

	// seleccionar a todos los usuarios activos

	public function getUsuarios(){
		$sql = "SELECT * FROM usuario WHERE CARGO_idCargo=3 AND ESTADO_idEstado = 9";
		$cn = conectar();
		$res = $cn->query($sql);
		$cn->close();
		return $res;
	}
	// verificar usuario

	public function verifUsuario($doc){
		$sql = "SELECT count(*) as c FROM usuario WHERE documento = $doc";
		$cn = conectar();
		$res = $cn->query($sql);
		$cn->close();
		$res = $res->fetch_array();
		return $res['c'];
	}



	public function verifCorreo($c){
		$sql = "SELECT count(*) as c FROM usuario WHERE correo = '$c'";
		$cn = conectar();
		$res = $cn->query($sql);
		$cn->close();
		$res = $res->fetch_array();
		return $res['c'];
	}


	// seleccionar unico usuario

	/**
	 * @access public
	 * @return array
	 * @ReturnType array
	 */

	public function getUsuario($u,$tipo){
		if ($tipo == 1) {
			$sql = "SELECT * FROM usuario,cargo WHERE documento = $u AND idCargo = CARGO_idCargo";
		} elseif ($tipo == 2) {
			$sql = "SELECT * FROM usuario,cargo WHERE correo = '$u' AND idCargo = CARGO_idCargo";
		}
		
		$cn = conectar();
		$res = $cn->query($sql);
		$cn->close();
		return $res;
	}

	/**
	 * @access public
	 * @return boolean
	 * @ReturnType boolean
	 */
	public function iniciarSesion($c,$p) {
		$data = new stdClass();
		$data->error="";
		$data->user="";
		$data->msj="";
		
		$sql = "SELECT * FROM clave WHERE (correo = '$c' and clave = '$p')";
		$cn = conectar();
		$res = $cn->query($sql);

		if($cn->error){
			$data->error = true;
			$data->msj = "Error al buscar usuario";      
			return $data;
		}

		$cn->close();

		$find_user = $this->getUsuario($c,2);

		if($find_user->num_rows == 1){
			if($res->num_rows == 1){
				$user = $find_user->fetch_object();

				if($user->ESTADO_idEstado == 10) {
					$data->error = true;
					$data->msj = "El usuario se encuentra desactivado";
				} else {
					$data->error = false;
					$data->msj = "Inicio correcto";
					$data->user = $user;
				}

				
			} else {
				$data->error = true;
				$data->msj = "Contraseña incorrecta";
			}
		} else {
			$data->error = true;
			$data->msj = "No existe el usuario";
		}

		
		return $data;
	}


	public function desactivar($u) {
		$sql = "UPDATE usuario set ESTADO_idEstado=10 where documento='$u'";
		$cn = conectar();
		$res = $cn->query($sql);
		$cn->close();
		return $res;
	}



	public function activar($u) {
		$sql = "UPDATE usuario set ESTADO_idEstado=9 where documento='$u'";
		$cn = conectar();
		$res = $cn->query($sql);
		$cn->close();
		return $res;
	}

	public function modificar($u,array $d){
		$sql = "UPDATE usuario set nombres='".$d['nombres']."',apellidos='".$d['apellidos']."',fechaNto='".$d['fechaNto']."',edad='".$d['edad']."',celular='".$d['celular']."',direccion='".$d['direccion']."' where documento = $u";
		$cn = conectar();
		$res = $cn->query($sql);
		$cn->close();
		return $res;
	}

	public function editar($u,array $d){
		$data = new stdClass();
		$sql = "UPDATE usuario set nombres='".$d['nombres']."',apellidos='".$d['apellidos']."',fechaNto='".$d['fnacimiento']."',edad='".$d['edad']."',celular='".$d['celular']."',direccion='".$d['direccion']."', correo = '".$d['correo']."' where documento = $u";
		$cn = conectar();
		$res = $cn->query($sql);
		if($cn->error){
			$data->status = false;
			$data->error = $cn->error;
		} else {
			$data->status = true;
			$data->data = $res;
		}
		$cn->close();
		return $data;
	}

	public function cambiarClave($u,$p){
		$sql = "UPDATE clave set clave='$p' where correo='$u'";
		$cn = conectar();
		$res = $cn->query($sql);
		$cn->close();
		return $res;
	}


	/**
	 * /**
	 *  * @access public
	 *  * @param string aDocumento
	 *  * @ParamType aDocumento string
	 *  * /
	 * @access public
	 * @param string aDocumento
	 * @ParamType aDocumento string
	 */
	public function setDocumento($aDocumento) {
		$this->_documento = $aDocumento;
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
	public function getDocumento() {
		return $this->_documento;
	}

	/**
	 * /**
	 *  * @access public
	 *  * @param string aNombre
	 *  * @ParamType aNombre string
	 *  * /
	 * @access public
	 * @param string aNombre
	 * @ParamType aNombre string
	 */
	public function setNombres($aNombres) {
		$this->_nombres = $aNombres;
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
	public function getNombres() {
		return $this->_nombres;
	}

	/**
	 * /**
	 *  * @access public
	 *  * @param string aApellidos
	 *  * @ParamType aApellidos string
	 *  * /
	 * @access public
	 * @param string aApellidos
	 * @ParamType aApellidos string
	 */
	public function setApellidos($aApellidos) {
		$this->_apellidos = $aApellidos;
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
	public function getApellidos() {
		return $this->_apellidos;
	}

	/**
	 * /**
	 *  * @access public
	 *  * @param string aCelular
	 *  * @ParamType aCelular string
	 *  * /
	 * @access public
	 * @param string aCelular
	 * @ParamType aCelular string
	 */
	public function setCelular($aCelular) {
		$this->_celular = $aCelular;
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
	public function getCelular() {
		return $this->_celular;
	}

	/**
	 * /**
	 *  * @access public
	 *  * @param string aDireccion
	 *  * @ParamType aDireccion string
	 *  * /
	 * @access public
	 * @param string aDireccion
	 * @ParamType aDireccion string
	 */
	public function setDireccion($aDireccion) {
		$this->_direccion = $aDireccion;
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
	public function getDireccion() {
		return $this->_direccion;
	}

	/**
	 * /**
	 *  * @access public
	 *  * @param string aCorreo
	 *  * @ParamType aCorreo string
	 *  * /
	 * @access public
	 * @param string aCorreo
	 * @ParamType aCorreo string
	 */
	public function setCorreo($aCorreo) {
		$this->_correo = $aCorreo;
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
	public function getCorreo() {
		return $this->_correo;
	}

	/**
	 * /**
	 *  * @access public
	 *  * @param string aContrase�a
	 *  * @ParamType aContrase�a string
	 *  * /
	 * @access public
	 * @param string aContrase�a
	 * @ParamType aContrase�a string
	 */
	public function setContrase�a($aContrase�a) {
		$this->_contrase�a = $aContrase�a;
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
	public function getContrase�a() {
		return $this->_contrase�a;
	}

	/**
	 * /**
	 *  * @access public
	 *  * @param int aCargo
	 *  * @ParamType aCargo int
	 *  * /
	 * @access public
	 * @param int aCargo
	 * @ParamType aCargo int
	 */
	public function setCargo($aCargo) {
		$this->_cargo = $aCargo;
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
	public function getCargo() {
		return $this->_cargo;
	}

	/**
	 * /**
	 *  * @access public
	 *  * @param string aFechaNacimiento
	 *  * @ParamType aFechaNacimiento string
	 *  * /
	 * @access public
	 * @param string aFechaNacimiento
	 * @ParamType aFechaNacimiento string
	 */
	public function setFechaNacimiento($aFechaNacimiento) {
		$this->_fechaNacimiento = $aFechaNacimiento;
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
	public function getFechaNacimiento() {
		return $this->_fechaNacimiento;
	}

	/**
	 * /**
	 *  * @access public
	 *  * @param int aTipodocumento
	 *  * @ParamType aTipodocumento int
	 *  * /
	 * @access public
	 * @param int aTipodocumento
	 * @ParamType aTipodocumento int
	 */
	public function setTipodocumento($aTipodocumento) {
		$this->_tipodocumento = $aTipodocumento;
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
	public function getTipodocumento() {
		return $this->_tipodocumento;
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

	/**
	 * /**
	 *  * @access public
	 *  * @param string aClave
	 *  * @ParamType aClave string
	 *  * /
	 * @access public
	 * @param string aClave
	 * @ParamType aClave string
	 */
	public function setClave($aClave) {
		$this->_clave = $aClave;
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
	public function getClave() {
		return $this->_clave;
	}
}
?>
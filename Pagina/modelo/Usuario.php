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

	public function crearUsuario($_documento,$_nombres,$_apellidos,$_fechaNacimiento,$_edad,$_celular,$_direccion,$_correo,$_cargo,$_tipodocumento,$_estado){
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
	}

	public function Registrarse() {
		$sql = "INSERT INTO usuario values('$this->_documento','$this->_nombres','$this->_apellidos','$this->_fechaNacimiento',
		'$this->_edad','$this->_celular','$this->_direccion','$this->_correo','$this->_cargo','$this->_tipodocumento','$this->_estado')";
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

	public function verifUsuario($tipo,$doc){
		$sql = "SELECT * FROM usuario WHERE documento = $doc and TIPODOCUMENTO_idTipo=$tipo";
		$cn = conectar();
		$res = $cn->query($sql);
		$cn->close();
		return $res;
	}



	public function verifCorreo($c){
		$sql = "SELECT * FROM usuario WHERE correo = '$c'";
		$cn = conectar();
		$res = $cn->query($sql);
		$cn->close();
		return $res;
	}


	// seleccionar unico usuario

	/**
	 * @access public
	 * @return array
	 * @ReturnType array
	 */

	public function getUsuario($u,$tipo){
		if ($tipo == 1) {
			$sql = "SELECT * FROM usuario WHERE documento = $u";
		} elseif ($tipo == 2) {
			$sql = "SELECT * FROM usuario WHERE correo = '$u'";
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
		$sql = "SELECT * FROM clave WHERE correo = '$c' and clave = '$p'";
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
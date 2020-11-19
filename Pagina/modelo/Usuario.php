<?php
/**
 * @access public
 * @author Marlon, Yeren, Jhon, Kevin
 */
require_once 'controlador/cn.php';
class Usuario {
	/**
	 * @AttributeType string
	 */
	protected $_documento;
	/**
	 * @AttributeType string
	 */
	protected $_nombre;
	/**
	 * @AttributeType string
	 */
	protected $_apellidos;
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
	protected $_contraseña;
	/**
	 * @AttributeType int
	 */
	protected $_cargo;
	/**
	 * @AttributeType string
	 */
	protected $_fechaNacimiento;
	/**
	 * @AttributeType int
	 */
	protected $_tipodocumento;
	/**
	 * @AttributeType int
	 */
	protected $_estado;
	/**
	 * @AttributeType string
	 */
	protected $_clave;

	/**
	 * @access public
	 * @return boolean
	 * @ReturnType boolean
	 */
	public function Registrarse() {
		// Not yet implemented
	}

	/**
	 * @access public
	 * @return boolean
	 * @ReturnType boolean
	 */
	public function ActualizarDatos() {
		// Not yet implemented
	}

	/**
	 * @access public
	 * @return boolean
	 * @ReturnType boolean
	 */
	public function IniciarSesion() {
		// Not yet implemented
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
	public function setNombre($aNombre) {
		$this->_nombre = $aNombre;
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
	public function getNombre() {
		return $this->_nombre;
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
	 *  * @param string aContraseña
	 *  * @ParamType aContraseña string
	 *  * /
	 * @access public
	 * @param string aContraseña
	 * @ParamType aContraseña string
	 */
	public function setContraseña($aContraseña) {
		$this->_contraseña = $aContraseña;
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
	public function getContraseña() {
		return $this->_contraseña;
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

	public function getUsuarios(){
		$sql = "select * from usuario where CARGO_idCargo=3 and ESTADO_idEstado = 9";
		$cn = conectar();
		$res = $cn->query($sql);
		$cn->close();
		return $res;
	}
}
?>
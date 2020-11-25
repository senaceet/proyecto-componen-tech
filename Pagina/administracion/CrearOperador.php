<?php 
require_once '../controlador/cn.php';
class Proveedor{

    private $idProveedor;
    private $nEmpresa;
    private $cNombre;
    private $cApellido;
    private $cCelular;
    private $eTelefono;
    private $USUARIO_documento;
    private $ESTADO_idEstado;


    public function crearProveedor($idProveedor,$nEmpresa,$cNombre,$cApellido,$cCelular,$eTelefono,$USUARIO_documento,$ESTADO_idEstado){
        $this->idProveedor = $idProveedor;
		$this->nEmpresa = $nEmpresa;
		$this->cNombre = $cNombre;
		$this->cApellido = $cApellido;
		$this->cCelular = $cCelular;
		$this->eTelefono = $eTelefono;
		$this->USUARIO_documento = $USUARIO_documento;
		$this->Estado_idEstado = $Estado_idEstado;
    }

    public function actualizarDatos($doc) {
		$sql = "UPDATE usuario SET documento='$this->$USUARIO_documento', nombres='$this->$cNombre', 
        apellidos='$this->$cApellido', celular='$this->$_celular', direccion='$this->$_direccion', correo='$this->$_correo', 
        CARGO_idCargo='$this->$_cargo', TIPODOCUMENTO_idTipo='$this->$_tipodocumento', 
        ESTADO_idEstado='$this->$_estado' WHERE documento = '$doc'";
		$cn = conectar();
		$res = $cn->query($sql);
		$cn->close();
		return $res;
	}

}







?>



<?php 
	require_once '../modelo/Usuario.php';

	$objUsuario = new Usuario();
	$con_usuarios = $objUsuario->getUsuario($_POST['documento']);
	$actUsuario = $con_usuarios->fetch_array(); 	
?>
<form class="actForm" method="post" action="../controlador/userEdit.php">
	<h1>Actualizacion de datos de usuario</h1>
	<div>
		<p>Numero de documento</p>
		<input name="documento" type="text" value="<?php echo $actUsuario['documento']; ?>">
	</div>
	<div>
		<p>Nombres</p>
		<input name="nombres" type="text" value="<?php echo $actUsuario['nombres']; ?>">
	</div>
	<div>
		<p>Apellidos</p>
		<input name="apellidos" type="text" value="<?php echo $actUsuario['apellidos']; ?>">
	</div>
	<div>
		<p>Fecha de nacimiento</p>
		<input name="fechaNto" type="date" value="<?php echo $actUsuario['fechaNto']; ?>">
	</div>
	<div>
		<p>Edad</p>
		<input name="edad" type="text" value="<?php echo $actUsuario['edad']; ?>">
	</div>
	<div>
		<p>Numero celular</p>
		<input name="celular" type="text" value="<?php echo $actUsuario['celular']; ?>">
	</div>
	<div>
		<p>Direccion de residencia</p>
		<input name="direccion" type="text" value="<?php echo $actUsuario['direccion']; ?>">	
	</div>
	<div>
		<p>Correo electrónico</p>
		<input name="correo" type="text" value="<?php echo $actUsuario['correo']; ?>">
	</div>
	<input type="hidden" name="actDoc" value="<?php echo $actUsuario['documento']; ?>">
	<input type="hidden" name="idCargo" value="<?php echo $actUsuario['CARGO_idCargo']; ?>">
	<input type="hidden" name="idTipo" value="<?php echo $actUsuario['TIPODOCUMENTO_idTipo']; ?>">
	<input type="hidden" name="idEstado" value="<?php echo $actUsuario['ESTADO_idEstado']; ?>">
	<input class="submitButton" type="submit" value="Actualizar">
</form>


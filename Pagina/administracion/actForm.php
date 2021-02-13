<?php 
	require_once '../modelo/Usuario.php';

	$objUsuario = new Usuario();

	if (empty($_POST['documento'])) {
		header('location:../vista/administracion.php');
	}
	
	$con_usuarios = $objUsuario->getUsuario($_POST['documento'],1);
	$actUsuario = $con_usuarios->fetch_array(); 	
?>

<form class="actForm" method="post" action="../controlador/userEdit.php">
	<h1>Actualizacion de datos de usuario</h1>
	<div>
		<p>Numero de documento</p>
		<input name="documento" maxlength="10" type="text" value="<?php echo $actUsuario['documento']; ?>" >
	</div>
	<div>
		<p>Nombres</p>
		<input name="nombres" maxlength="50" type="text" value="<?php echo $actUsuario['nombres']; ?>">
	</div>
	<div>
		<p>Apellidos</p>
		<input name="apellidos" type="text" maxlength="50" value="<?php echo $actUsuario['apellidos']; ?>">
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
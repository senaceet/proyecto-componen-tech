<!DOCTYPE html>
<html lang="es">
<?php 
	session_start();
	if (!$_SESSION['user']) {
		header('location:principal.php');
	}
 ?>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="css/styles.css">
	<link rel="stylesheet" href="css/Admin.css">
	<title>ComponenTech</title>
</head>
<body>
	<header>
		<div class="logo"><a href="principal.php"><img src="../icons/logo.png" alt="l"></a></div>
		<label class="busqueda">
			<input type="" placeholder="Buscar productos">
			<img src="../icons/lupa.svg">
		</label>
			
		</div>
		<nav class="navegador">
			<ul>
				<li><a href="principal.php">Inicio</a></li>
				<li><a href="../controlador/salir.php">Cerrar sesión</a></li>
			</ul>
		</nav>
	</header>
	<div class="contenedor">
		<form class="actForm" method="post" action="../controlador/editarCuenta.php">
			<h1>Modificar datos de la cuenta</h1>
			<div>
				<p>Numero de documento</p>
				<input disabled type="text" value="<?php echo $_SESSION['user']['documento']; ?>" >
			</div>
			<div>
				<p>Nombres</p>
				<input name="nombres" maxlength="50" type="text" value="<?php echo $_SESSION['user']['nombres']; ?>">
			</div>
			<div>
				<p>Apellidos</p>
				<input name="apellidos" type="text" maxlength="50" value="<?php echo $_SESSION['user']['apellidos']; ?>">
			</div>
			<div>
				<p>Fecha de nacimiento</p>
				<input name="fechaNto" type="date" value="<?php echo $_SESSION['user']['fechaNto']; ?>">
			</div>
			<div>
				<p>Edad</p>
				<input name="edad" type="text" value="<?php echo $_SESSION['user']['edad']; ?>">
			</div>
			<div>
				<p>Numero celular</p>
				<input name="celular" type="text" value="<?php echo $_SESSION['user']['celular']; ?>">
			</div>
			<div>
				<p>Direccion de residencia</p>
				<input name="direccion" type="text" value="<?php echo $_SESSION['user']['direccion']; ?>">	
			</div>
			<div>
				<p>Correo electrónico</p>
				<input name="correo" type="text" value="<?php echo $_SESSION['user']['correo']; ?>">
			</div>
			<input type="hidden" name="actDoc" value="<?php echo $_SESSION['user']['documento']; ?>">
			<input type="hidden" name="idCargo" value="<?php echo $_SESSION['user']['CARGO_idCargo']; ?>">
			<input type="hidden" name="idTipo" value="<?php echo $_SESSION['user']['TIPODOCUMENTO_idTipo']; ?>">
			<input type="hidden" name="idEstado" value="<?php echo $_SESSION['user']['ESTADO_idEstado']; ?>">
			<input class="submitButton" type="submit" value="Actualizar">
		</form>
		<form class="actForm" action="">
			<h1>Actualizar contraseña</h1>
			<div>
				<p>Contraseña</p>
				<input name="password" type="password" value="">	
			</div>
			<div>
				<p>Confirmar contraseña</p>
				<input name="password" type="password" value="">	
			</div>
			<input class="submitButton" type="submit" value="Actualizar">
		</form>
	</div>
	
<!--  -->
</body>
</html>
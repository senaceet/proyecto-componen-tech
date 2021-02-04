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
		<div class="logo"><a href="principal.php"><img src="../img/logo.png" alt="l"></a></div>
		<label class="busqueda">
			<input type="text" id="prodSearch" placeholder="Buscar productos">
			<i class="fas fa-search"></i>
		</label>
			
		</div>
		<nav class="navegador">
			<ul>
				<li><a href="principal.php">Inicio</a></li>
				<li><a href="../controlador/salir.php"><i class="fas fa-sign-out-alt"></i></a></li>
			</ul>
		</nav>
	</header>
	<div class="contenedor modCuenta">
		<?php 
		    if (isset($_GET['m'])) {
		        switch ($_GET['m']) {
		            case 1:
		                echo "<div class='getMensaje correcto'>Usuario Actualizado</div>";
		                break;
		            case 2:
		                echo "<div class='getMensaje incorrecto'>Error al actualizar</div>";
		                break;
		            case 3:
		                echo "<div class='getMensaje correcto'>Contraseña actualizada</div>";
		                break;
		            case 4:
		                echo "<div class='getMensaje incorrecto'>Error al actualizar contraseña</div>";
		                break;
		            case 5:
		                echo "<div class='getMensaje incorrecto'>Las contraseñas deben ser identicas</div>";
		                break;
		        }
		    }
     	?>
		<form class="actForm" method="post" action="../controlador/editarCuenta.php">
			<h1>Modificar datos de la cuenta</h1>
			<div>
				<p>Documento</p>
				<?php switch ($_SESSION['user']['TIPODOCUMENTO_idTipo']) {
					case 1:
						$doc = 'Cedula';
						break;
					case 2:
						$doc = 'Targeta de identidad';
						break;
					case 3:
						$doc = 'Cedula de extrangería';
						break;
					case 4:
						$doc = 'Pasaporte';
						break;
					
					default:
						$doc = 'error';
						break;
				} $doc = $doc.': '.$_SESSION['user']['documento'] ?>
				<input disabled type="text" value="<?php echo $doc; ?>" >
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
				<input disabled="" type="text" value="<?php echo $_SESSION['user']['correo']; ?>">
			</div>
			<input name="uptDatos" class="submitButton" type="submit" value="Actualizar">
		</form>
		<form class="actForm" method="post" action="../controlador/editarCuenta.php">
			<h1>Actualizar contraseña</h1>
			<div>
				<p>Contraseña</p>
				<input minlength="5" required name="clave" type="password" value="">	
			</div>
			<div>
				<p>Confirmar contraseña</p>
				<input minlength="5" required name="clave2" type="password" value="">	
			</div>
			<input name="uptClave" class="submitButton" type="submit" value="Actualizar contraseña">
		</form>
	</div>

<script src="https://kit.fontawesome.com/0b32f2b0be.js"></script>
	
<!--  -->
</body>
</html>
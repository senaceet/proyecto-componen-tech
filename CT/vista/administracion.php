<!DOCTYPE html>
<html lang="es">
<?php 
session_start();
if (!$_SESSION['user']) {
	header('location:principal.php');
}
if ($_SESSION['user']['CARGO_idCargo']==3) {
	header('location:principal.php');
}
function secciones(){
	if (isset($_GET['sec'])) {
		if (file_exists("../administracion/".$_GET['sec'].".php")) {
			include "../administracion/".$_GET['sec'].".php";
		} else {
			include '../administracion/clientes.php';
		}
		
	} else {
		include '../administracion/clientes.php';
	}
}
?>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="css/styles.css">
	<link rel="stylesheet" href="css/Admin.css">

	<link href="https://fonts.googleapis.com/icon?family=Material+Icons">
	<script src="https://code.jquery.com/jquery-3.4.1.js"></script>
	<script src="https://kit.fontawesome.com/0b32f2b0be.js"></script>
	
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
			<?php if (isset($_SESSION['user'])): ?>
				<li><a href="cuenta.php"><?php echo $_SESSION['user']['correo']; ?></a></li>
				<li><a href="principal.php">Inicio</a></li>
				<li><a href="../controlador/salir.php"><i class="fas fa-sign-out-alt"></i></a></li>
			<?php endif ?>
		</ul>
	</nav>
</header>
<div class="btn">
	<span class="fas fa-bars"></span>
</div>
<!--  -->
<nav class="Barra">
	<div class="texto">ComponenTech 🐉</div>
	<ul>
		<li><a href="#">Administrador 👔</a></li>

		<li>
			<a href="#" class="Base-btn">Usuarios ▼</a>
			<ul class="Base-show">
				<li><a href="administracion.php?sec=clientes">Clientes</a></li>
				<li><a href="administracion.php?sec=clientesdesactivados">Clientes desactivados</a></li>
				<li><a href="administracion.php?sec=Operadores">Operadores</a></li>
			</ul>
		</li>
		<li>
			<a href="#" class="Productos-btn">Productos ▼</a>

			<ul class="Productos-show">
				<li><a href="administracion.php?sec=productos">Gestionar productos</a></li>
				<li><a href="administracion.php?sec=Proveedores">Gestionar proveedores</a></li>
			</ul>
		</li>
		<li><a href="#" class="Configuraciones-btn">Inventario ▼</a>
			<ul class="Cuenta-show">
				<li><a href="administracion.php?sec=movimientos">Movimientos</a></li>
			</ul>
			<ul class="Cuenta-show">
				<li><a href="administracion.php?sec=inventario">Productos</a></li>
			</ul>
		</li>
		<li><a href="administracion.php?sec=facturas">Facturas 📊</a></li>
	</ul>
</nav>

<div class="contenedor secciones">
	<?php secciones(); ?>
</div>
<?php //include 'footer.php' ?>
</body>

<!-- Barra deslizable lateral izquierda -->
<script>
	$('.btn').click(function(){
		$(this).toggleClass("click");
		$('.Barra').toggleClass("show");
	});
	$('.Base-btn').click(function(){
		$('.Barra ul .Base-show').toggleClass("show");
	});
	$('.Productos-btn').click(function(){
		$('.Barra ul .Productos-show').toggleClass("show2");
	});
	$('.Configuraciones-btn').click(function(){
		$('.Barra ul .Cuenta-show').toggleClass("show3");
	});

	$('.Barra ul li').click(function(){
		$(this).addClass("active").siblings().removeClass("active");
	});

</script>
<script src="js/main.js"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<!-- Fin Deslizamiento -->
</html>
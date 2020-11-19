<!DOCTYPE html>
<html lang="es">
<?php 
	function secciones(){
		if (isset($_GET['sec'])) {
			include "administracion/".$_GET['sec'].".php";
		} else {
			include 'administracion/usuarios.php';
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
	<script src="https://kit.fontawesome.com/a076d05399.js"></script>
	<title>ComponenTech</title>
</head>
<body>
	<header>
		<div class="logo"><img src="icons/logo.png" alt="l"></div>
		
		</div>
		<div class="navegador">
			<nav>
				<ul>
					<li>Cerrar sesión ➤</li>
				</ul>
			</nav>
		</div>
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
		 		<a href="#" class="Base-btn">Administración ▼</a>
		 		<ul class="Base-show">
		 			<li><a href="administracion.php?sec=usuarios">Usuarios</a></li>
		 			<li><a href="administracion.php">Proveedores</a></li>
		 		</ul>
		 	</li>
		 	<li>
		 		<a href="#" class="Productos-btn">Productos ▼</a>

		 		<ul class="Productos-show">
		 			<li><a href="administracion.php?sec=productos">Gestionar Productos</a></li>
		 		</ul>
		 	</li>
		 	<li><a href="#">Configuraciones 🔧</a></li>
		 	<li><a href="#">Detalles 📊</a></li>
		 </ul>
	</nav>

	<div class="secciones">
		<?php secciones(); ?>
	</div>
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

       $('.Barra ul li').click(function(){
           $(this).addClass("active").siblings().removeClass("active");
       });
	</script>
  <!-- Fin Deslizamiento -->
</html>
<!DOCTYPE html>
<html lang="es">
<?php 
session_start();


function fPrecio($num){
	return "$".number_format($num,0,",",".");
}


require_once '../modelo/Detalles.php';

$objDetalles = new Detalles();

$compras = $objDetalles->getDetallesUsuario($_SESSION['user']->documento);
 ?>
<head>  
	<meta charset="UTF-8">
    <meta name="Description" content="Alguna descripción de esto">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<script src="js/jquery.js"></script>
	<script src="https://kit.fontawesome.com/0b32f2b0be.js" crossorigin="anonymous"></script>
	<link rel="stylesheet" href="css/styles.css">
	<title>ComponenTech</title>
</head>
<body>
	<header>
		<div class="logo"><a href="#recientes"><img src="../img/logo.png" alt="l"></a></div>
		<label class="busqueda">
			<input type="text" id="prodSearch" placeholder="Buscar productos">
			<i class="fas fa-search"></i>
		</label>
			
		</div>
		<nav class="navegador">
			<ul>
			<?php if (isset($_SESSION['user'])): ?>
				<li class="CuentaCorreo"><a href="cuenta.php"><?php echo $_SESSION['user']->correo; ?></a></li>
				<?php if ($_SESSION['user']->CARGO_idCargo==1): ?>
					<li><a href="administracion.php">Administración</a> </li>
				<?php endif ?>
				<li><a href="principal.php">Inicio</a></li>

				<li><a href="../controlador/salir.php"><i class="fas fa-sign-out-alt"></i></a></li>
			<?php else: ?>
				
				<li><a href="../index.php?r=1">Iniciar sesión / Crear cuenta</a></li>
			<?php endif ?>
			<li><a href="#" class="ListarProductos" ><i class="fa fa-shopping-cart"></i></a></li>	
			</ul>

		</nav>
	</header>
	

	<div class="contenedor">
		<!-- <div class="filtros">
			
		</div> -->
		<h1>Compras</h1>
		<table class="tabla-historial" width="80%" style="margin:auto">
			<thead>
				<td></td>
				<td>Producto</td>
				<td>Precio unitario</td>
				<td>Cantidad</td>
				<td>Total</td>
				<td>Fecha de compra</td>
			</thead>
		<?php while ($compra = $compras->fetch_array()): 
			$fecha = new DateTime($compra['fecha']);
			setlocale(LC_ALL,"es_ES");
			
			?>
			<tr>
				<td><img width="120px" src="<?php echo $compra['prodImg']; ?>" alt=""></td>
				<td><?php echo $compra['productoNombre']; ?></td>
				<td><?php echo fPrecio($compra['precio']); ?></td>
				<td><?php echo $compra['cantidad']; ?></td>
				<td><?php echo fPrecio($compra['totalCantidad']); ?></td>
				<td><?php  echo $fecha->format('D-d-F-Y'); ?></td>
			</tr>
		<?php endwhile ?>
			
			
		</table>
		
		
	</div>


	<nav class="BarraCarrito">
		<?php include 'minicarrito.php'; ?>
	</nav>	
	<?php include 'footer.php' ?>
</body>
<script>
	$('.ListarProductos').click(function(){
          
        $('.BarraCarrito').toggleClass("show");
	});
	$('#prodSearch').keydown(function(e){
		if (e.key=='Enter') {
			location.href='producto.php?search='+this.value;
		}
		
	})
</script>

<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script src="js/main.js" ></script>
</html>
<!DOCTYPE html>
<html lang="es">
<?php 
session_start();

if (!isset($_SESSION['user'])) {
	header('location:principal.php?m=1');
}

require_once '../modelo/Producto.php';
$objProducto = new Producto();
$con_productos = $objProducto->getProductos();
 ?>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="css/styles.css">
	<link rel="stylesheet" href="css/Admin.css">
  	<link href="https://fonts.google.com/specimen/Bebas+Neue?preview.text=Metodos%20de%20pago&preview.text_type=custom">
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons">
	<script src="https://code.jquery.com/jquery-3.4.1.js"></script>
	<script src="https://kit.fontawesome.com/a076d05399.js"></script>

	<title>ComponenTech</title>
</head>
<body>

	
	<header>
		<div class="logo"><a href="principal.php"><img src="../icons/logo.png" alt="l"> </a></div>
			
		</div>
		<nav class="navegador">
			<ul>
			<?php if (isset($_SESSION['user'])): ?>
				<li><a href="cuenta.php"><?php echo $_SESSION['user']['correo']; ?></a></li>
				<?php if ($_SESSION['user']['CARGO_idCargo']==1): ?>
					<li><a href="administracion.php">Administracion</a></li>
				<?php endif ?>
				<li><a href="../controlador/salir.php"><i class="fas fa-sign-out-alt"></i></a></li>
			<?php else: ?>
				<li><a href="../index.php?r=1">Iniciar sesion</a></li>
				<li><a href="../index.php?r=1">Crear cuenta</a></li>
			<?php endif ?>
				
			</ul>
		</nav>
	</header>

<h1 class="TituloFactura">Factura</h1>
	<section class="SecciónFactura">
		<!-- Productos factura -->
		<div class="ProductosFactura">
			<div class="ScrollFactura">
				<div class="ListaProductoFactura">
					<div class="ImagenListaProductoFactura">
						<img src="../img/productos/12/1015.jpg">
					</div>
						<div class="TituloFacturaProducto">
							<h2>Tarjeta De Video Asrock Radeon RTX 5600 XT Ch </h2>
						</div>
						<div class="PrecioOriginalProductoFactura">
							<h2>$310.000</h2>
						</div>
						<div class="CantidadProductoFactura">
							<input type="number" value="1">
						</div>

						<div class="PrecioTotalProductoFactura">
							<h2>$310.000</h2>
						</div>

						<div class="SacarProductoFactura">
							<button>Quitar</button>
						</div>
					</div>


					<div class="ListaProductoFactura">
					<div class="ImagenListaProductoFactura">
						<img src="../img/productos/11/1024.jpg">
					</div>
						<div class="TituloFacturaProducto">
							<h2>Tarjeta De Video Asrock Radeon RTX 5600 XT Ch </h2>
						</div>
						<div class="PrecioOriginalProductoFactura">
							<h2>$620.000</h2>
						</div>
						<div class="CantidadProductoFactura">
							<input type="number" value="1">
						</div>

						<div class="PrecioTotalProductoFactura">
							<h2>$1.240.000</h2>
						</div>

						<div class="SacarProductoFactura">
							<button>Quitar</button>
						</div>
					</div>
				</div>
			</div>




			
				
				
		


			<!-- Fin productos factura -->

			<!-- Inicio Metodos de pago -->

			<div class="MetodosPago" border="10px">
					<div class="ContenedorMetodosPago">
						<h1>Metodos de pago</h1>
						<div class="SubtotalFactura">
						<h2 class="SubtotalTitulo">Subtotal:</h2>
						<h2 class="SubtotalMP">1.550.000</h2>
					</div>

					<div class="TotalFactura">
						<h2 class="TotalTitulo">Total:</h2>
						<h2 class="TotalMP">1.550.000</h2>
					</div>

				<div class="OpcionMetodoPago">
					<form>
						<input type="radio" name="MetodoP" values="Tarjeta Debito" id="OpcionPago" ><h3>Tarjeta Debito</h3>	<br>	
						<input type="radio" name="MetodoP" values="Tarjeta credito" id="OpcionPago" ><h3>Tarjeta Cretido</h3> <br>
						<input type="radio" name="MetodoP" values="Efecty" id="OpcionPago" ><h3>Efecty</h3> <br>
						<input type="radio" name="MetodoP" values="Efectivo" id="OpcionPago" ><h3>Efectivo</h3> <br>


					
			</div>

			<div class="MarcadoFactura">
				<input type="checkbox" name="" id="Terminos"><h3>He leido y estoy de acuerdo con los terminos y condiciones de la web.</h3>
			</div>

			<div class="IniciarPagoFactura">
				<button id="FCompra">Finalizar Compra</button>
			</div>
			</form>
				</div>


			</div>


			<!-- Fin Metodos de pago -->
		
		
	</section>






	

</body>

<script>
	
	$('#Terminos').click(function(){
		$('.IniciarPagoFactura').toggleClass("Verificado2")
	});




	


	

</script>
</html>
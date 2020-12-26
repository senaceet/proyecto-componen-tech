<!DOCTYPE html>
<html lang="es">
<?php 
session_start();

if (!isset($_SESSION['user'])) {
	header('location:principal.php?m=1');
}

if (!isset($_SESSION['carrito'])) {
	header('location:principal.php?m=1');
} else {
	if (count( $_SESSION['carrito'] ) == 0) {
		header('location:principal.php?m=1');
	}
}

if (isset($_POST['sacarproducto'])) {
	unset($_SESSION['carrito'][$_POST['prod']]);
	if (count( $_SESSION['carrito'] ) == 0) {
		header('location:principal.php?m=1');
	}
}

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
			<?php foreach ($_SESSION['carrito'] as $key => $value): ?>
				<div class="ListaProductoFactura producto">
					<input class="precio" type="hidden" value="<?php echo $value['precio'] ?>">
					<div class="ImagenListaProductoFactura">
						<img src="<?php echo $value['img'] ?>">
					</div>
					<div class="TituloFacturaProducto">
						<h2><?php echo $value['nombre'] ?></h2>
					</div>
					<div class="PrecioOriginalProductoFactura">
						<h2><?php echo "$".number_format($value['precio'],0,",","."); ?></h2>
					</div>
					<div class="CantidadProductoFactura">
						<input onkeyup="this.value=1;calcularTotalCantidad(this.parentElement.parentElement)" onkeypress="this.value=1;" class="cantidad" type="number" min="1" max="5" value="1" oninput="calcularTotalCantidad(this.parentElement.parentElement)" >
					</div>

					<div class="PrecioTotalProductoFactura">
						<h2 class="totalCantidad"></h2>
					</div>

					<form method="post" action="<?php echo $_SERVER['PHP_SELF'] ?>" class="SacarProductoFactura">
						<input type="hidden" name="prod" value="<?php echo $key ?>">
						<button type="submit" name="sacarproducto">Quitar</button>
					</form>

				</div>
			<?php
				//$Subtotal += $value['precio'];
				endforeach;
				//$Total = ($Subtotal * 0.19) + $Subtotal;

			?>		
			</div>

		</div>
			<!-- Fin productos factura -->

			<!-- Inicio Metodos de pago -->

		<div class="MetodosPago" >
			<div class="ContenedorMetodosPago">
				<h1>Metodos de pago</h1>
				<div class="SubtotalFactura">
				<h2 class="SubtotalTitulo">Subtotal:</h2>
				<h2 class="SubtotalMP"></h2>
			</div>
			<div class="TotalFactura">
				<h2 class="TotalTitulo">Total:</h2>
				<h2 class="TotalMP"> </h2>
			</div>

			<div class="OpcionMetodoPago">
				<form>
					<input type="radio" name="MetodoP" values="Tarjeta Debito" ><h3>Tarjeta Debito</h3>	<br>	
					<input type="radio" name="MetodoP" values="Tarjeta credito" ><h3>Tarjeta Cretido</h3> <br>
					<input type="radio" name="MetodoP" values="Efecty" ><h3>Efecty</h3> <br>
					<input type="radio" name="MetodoP" values="Efectivo" ><h3>Efectivo</h3> <br>

				<label class="MarcadoFactura">
					<input type="checkbox" name="" id="Terminos"><h3>He leido y estoy de acuerdo con los terminos y condiciones de la web.</h3>
				</label>

				<div class="IniciarPagoFactura">
					<button id="FCompra">Finalizar Compra</button>
				</div>
				</form>
			</div>
		</div>
	</section>
</body>
<script>
	var total = 0;
	var subtotal = 0;
	const facturaSubtotal = document.querySelector('.SubtotalMP');

	const facturaTotal = document.querySelector('.TotalMP');

	var prods = document.querySelectorAll('.producto');

	function calcularPrecio(){
		prods = document.querySelectorAll('.producto');
		prods.forEach(e => {
			subtotal += parseInt(desFormat(e.querySelector('.totalCantidad').innerHTML));
		});
		facturaSubtotal.innerHTML = "$" + new Intl.NumberFormat().format(subtotal);
		total = subtotal + (subtotal * 0.19);

		facturaTotal.innerHTML = "$" + new Intl.NumberFormat().format(total);

		subtotal = 0;

	}

	function desFormat(e){
		return e.replaceAll(".","").replaceAll("$","").replaceAll(",","");
	}

	function calcularTotalCantidad(e){
		let	precioInicial = e.querySelector('.precio').value;
		let cantidad = e.querySelector('.cantidad').value;
		let totalCantidad = parseInt(precioInicial)*cantidad;

		e.querySelector('.totalCantidad').innerHTML = "$" + new Intl.NumberFormat().format(totalCantidad);
		calcularPrecio();
		
	}
	calcularPrecio();
	
	//subtotal += totalCantidad;
	//facturaSubtotal.innerHTML = new Intl.NumberFormat().format(subtotal);
	

	
	prods.forEach(e => {
		calcularTotalCantidad(e);
	});

	


	$('#Terminos').click(function(){
		$('.IniciarPagoFactura').toggleClass("Verificado2")
	});
</script>
</html>
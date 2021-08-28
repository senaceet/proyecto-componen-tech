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
	<script src="https://code.jquery.com/jquery-3.4.1.js"></script>
	<script src="https://kit.fontawesome.com/0b32f2b0be.js"></script>

	<title>ComponenTech</title>
</head>
<body>

	
	<header>
		<div class="logo"><a href="principal.php"><img src="../img/logo.png" alt="l"> </a></div>
		<h1 class="TituloFactura">Factura</h1>
	</div>
	<nav class="navegador">
		<ul>
			<?php if (isset($_SESSION['user'])): ?>
				<li><a href="cuenta.php"><?php echo $_SESSION['user']->correo; ?></a></li>
				<li><a href="principal.php">Inicio</a></li>
				<li><a href="../controlador/salir.php"><i class="fas fa-sign-out-alt"></i></a></li>
				<?php else: ?>
					<li><a href="../index.php?r=1">Iniciar sesion</a></li>
					<li><a href="../index.php?r=1">Crear cuenta</a></li>
				<?php endif ?>
				
			</ul>
		</nav>
	</header>
	
	<section class="SeccionFactura">

		<div class="ProductosFactura">
			<?php foreach ($_SESSION['carrito'] as $key => $value): ?>
				<div class="producto">
					<input class="precio" type="hidden" value="<?php echo $value['precio'] ?>">
					<div class="prodImg">
						<img src="<?php echo $value['img'] ?>">
					</div>
					<div>
						<div class="prodNombre">
							<p><?php echo $value['nombre'] ?></p>
						</div>

						<div class="precios">
							<div class="prodPrecio">
								<p ><?php echo "$".number_format($value['precio'],0,",","."); ?></p>
							</div>
							<div class="ProdCant">
								<input name="<?php echo $key ?>" onkeyup="this.value=1;calcularTotalCantidad(this.parentElement.parentElement.parentElement.parentElement); "
								onclick="cantidad(this)" 
								onkeypress="this.value=1;" class="cantidad" type="number" min="1" max="5" value="<?php echo $value['cantidad']?>" 
								oninput=" calcularTotalCantidad(this.parentElement.parentElement.parentElement.parentElement); " data-id_prod="<?php echo $key ?>">
							</div>

							<div class="prodTotal">
								<p class="totalCantidad"></p>
							</div>

							<form method="post" action="<?php echo $_SERVER['PHP_SELF'] ?>" class="SacarProductoFactura">
								<input type="hidden" name="prod" value="<?php echo $key ?>">
								<button type="submit" name="sacarproducto"><i class="fa fa-trash-alt"></i></button>
							</form>
							
						</div>
						
						
					</div>
					

				</div>
				<?php
			endforeach;
			?>
			<script>

					function cantidad(input){
						var id = $(input).data('id_prod');
						var cant = $(input).val();
						$.ajax({
							url:'../controlador/cantidad.php',
							method: 'post',
							data:{id,cant}
						});
					}
			</script>
		</div>

		<form method="POST" action="../controlador/correo.php" class=" MetodosPago CajaFormulario">
			<div>
				<h1>Metodos de pago</h1>
				<div class="totales">
					<h2 class="SubtotalTitulo">Subtotal:</h2>
					<h2 class="SubtotalMP"></h2>
				</div>
				<div class="totales">
					<h2 class="TotalTitulo">Total:</h2>
					<h2 class="TotalMP"> </h2>
				</div>
			</div>

			<div class="OpcionMetodoPago">
				
				<label><input type="radio" name="MetodoP" value="1" ><p>Tarjeta Debito</p></label>
				<label><input type="radio" name="MetodoP" value="2" ><p>Tarjeta Cretido</p></label>
				<label><input type="radio" name="MetodoP" value="3" ><p>Efecty</p></label>
				<label><input type="radio" name="MetodoP" value="4" ><p>Efectivo</p></label>				
			</div>
			<div>
				<label class="MarcadoFactura">
					<input type="checkbox" name="" id="Terminos"><p>He leido y estoy de acuerdo con los terminos y condiciones de la web.</p>
				</label>
				<button class="submitButton Verificado2" type="button" id="FCompra">Finalizar Compra</button>
			</div>
		</form>

	</section>
<?php include 'footer.php' ?>
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

	const terminar = document.querySelector('#FCompra');
	terminar.addEventListener('click',()=>{
		let selected = false;
		let form = terminar.form;
		let radios = form.querySelectorAll("input[type=radio]");
		let terminos = document.querySelector('#Terminos');
		radios.forEach(e=>{
			if(e.checked==true){
				selected = true;
			}
			
		});

		if(selected){
			if (terminos.checked) {
				form.submit();
			} else {
				swal('Debe aceptar los terminos','','error');
			}
		} else {
			swal('No ha seleccionado un metodo de pago','','error');
		} 

	});


	$('#Terminos').click(function(){

		$('.submitButton').toggleClass("Verificado2");
	});



	
</script>

<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

</html>
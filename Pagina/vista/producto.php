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
$producto = $objProducto->getProducto($_GET['p']);
$productoActual = $producto->fetch_array();
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
		<div class="logo"><img src="../icons/logo.png" alt="l"></div>
		<label class="busqueda">
			<input type="" placeholder="Buscar productos">
			<img src="../icons/lupa.svg">
		</label>
			
		</div>
		<nav class="navegador">
			<ul>
				<li><a href="#">Cuenta</a></li>
				<li><a href="administracion.php">Administracion</a></li>
				<li><a href="#" class="ListarProductos" ><img src="../icons/carrito.svg" alt=""></a></li>
			</ul>
		</nav>
	</header>
	<div class="contenedor">
		<section class="sec1 detalles">
			<div class="detImg">
				<img src="<?php echo $productoActual['prodImg']; ?>">
			</div>

			<div class="detallesProducto">
				<h1><?php echo $productoActual['productoNombre']; ?></h1>
				<div class="textoDetalles">
					<p><?php echo $productoActual['detalles']; ?></p>
				</div>
				<div class="precioDetalles">
						<p>Precio: <?php echo "$".number_format($productoActual['precio'],0,",",".")?></p>
				</div>

				<div class="botonesDetalles">
					<button>ATRÁS</button>
					<button>AÑADIR AL CARRITO</button>
				</div>
			</div>
		</section>
		<section class="recientes">
			<h1>Otros productos</h1>
			<br>
			<div class="container-card">
			<?php 
				while ($producto = $con_productos->fetch_array()) { ?>
					<div class="card">
						<figure>
							<img src="<?php echo $producto['prodImg'] ?>">
						</figure>
						<div class="contenido-card">
							<h3><?php echo $producto['productoNombre']; ?></h3>
					
							<p><?php echo $producto['detalles']; ?></p>
							<p><?php echo "$".number_format($producto['precio'],0,",",".");?></p>
							<a href="producto.php?p=<?php echo $producto['idProducto'] ?>">COMPRAR</a>
						</div>
					</div>
			<?php } ?>	
			</div>			
		</section>
	</div>

	<nav class="BarraCarrito">
		<div class="TituloCarrito">
			<h1>TUS PRODUCTOS</h1>
		</div>
		<div class="ContenedorProductosCarrito">
			<div class="ProductosCarrito">
			<div class="ImagenProductoCarrito">
				<img src="">  
			</div>

			<div class="TextoProductoCarrito">
					<p>Tarjeta De Video Asrock Radeon RTX 5600 XT Ch </p>
			</div>
			<div class="PrecioProductoCarrito">
					<p>$1.256.000</p>
			</div>
			<div class="SacarProductoCarrito">
				<button > ✖</button>
			</div>	
		</div>
		
		<div class="ProductosCarrito">
			<div class="ImagenProductoCarrito">
				<img src="">  
			</div>
			<div class="TextoProductoCarrito">
					<p>Tarjeta De Video Asrock Radeon RTX 5600 XT Ch </p>
			</div>
			<div class="PrecioProductoCarrito">
					<p>$1.256.000</p>
			</div>
			<div class="SacarProductoCarrito">
				<button > ✖</button>
			</div>	
		</div>

		<div class="ProductosCarrito">
			<div class="ImagenProductoCarrito">
				<img src="">  
			</div>
			<div class="TextoProductoCarrito">
					<p>Tarjeta De Video Asrock Radeon RTX 5600 XT Ch </p>
			</div>
			<div class="PrecioProductoCarrito">
					<p>$1.256.000</p>
			</div>
			<div class="SacarProductoCarrito">
				<button>✖</button>
			</div>	
		</div>
		
		</div>		

		<!-- Contenedor del total final (IMPORTANTE) -->
		<div class="TituloCarrito2">
			<h1>TOTAL:</h1>
			<h2>$1.256.000</h2>
		</div>
		<div class="BarraBotonComprarProductosCarrito">
			<button>Comprar</button>
		</div>
		<!-- Fin de los contenedores importantes para comprar productos -->
	</nav>


	<section class="ContenedorDetallesProducto">
		

	</section>



	

</body>
<script>
	$('.ListarProductos').click(function(){
          
           $('.BarraCarrito').toggleClass("show");
		});
</script>
</html>
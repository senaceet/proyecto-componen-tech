<!DOCTYPE html>
<html lang="es">
<?php 
session_start();


require_once '../modelo/Producto.php';
require_once '../modelo/categoria.php';
$objProducto = new Producto();
$objCat = new Categoria();
$con_productos = $objProducto->getProductos();
if (isset($_GET['c'])) {
	$con_productos = $objProducto->getProductosCat($_GET['c']);
	$con_cat = $objCat->getCategoria($_GET['c']);
	$actualCat = $con_cat->fetch_array();
}
$con_cats = $objCat->getCategorias();

 ?>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<script src="https://code.jquery.com/jquery-3.4.1.js"></script>
	<script src="https://kit.fontawesome.com/a076d05399.js"></script>
	<link rel="stylesheet" href="css/styles.css">
	<title>ComponenTech</title>
</head>
<body>
	<header>
		<div class="logo"><img src="../icons/logo.png" alt="l"></div>
		<label class="busqueda">
			<input type="text" id="prodSearch" placeholder="Buscar productos">
			<img src="../icons/lupa.svg">
		</label>
			
		</div>
		<nav class="navegador">
			<ul>
			<?php if (isset($_SESSION['user'])): ?>
				<li><a href="cuenta.php"><?php echo $_SESSION['user']['correo']; ?></a></li>
				<?php if ($_SESSION['user']['CARGO_idCargo']==1): ?>
					<li><a href="administracion.php">Administracion</a></li>
				<?php endif ?>
				<li><a href="../controlador/salir.php"><i class="fas fa-sign-out-alt"></i></a></li>
				<li><a href="#" class="ListarProductos" ><img src="../icons/carrito.svg" alt=""></a></li>
			<?php else: ?>
				<li><a href="../index.php?r=1">Iniciar sesion</a></li>
				<li><a href="../index.php?r=1">Crear cuenta</a></li>
			<?php endif ?>
				
			</ul>
		</nav>
	</header>
	<div class="contenedor">
		<section class="sec1">
			<div class="categorias">
				<h1>Categorías</h1>
				<ul>
				<?php 
					while ($cat = $con_cats->fetch_array()) { $catId=$cat['idCategoria'] ?>
						<li><a href="principal.php?c=<?php echo $catId ?>"><?php echo $cat['categoria']; ?></a></li>
				<?php }	 ?>
					
				</ul>
			</div>
			<div class="slider">
				<iframe src="slider.html" frameborder="0"></iframe>
			</div>
		</section>
		<hr><br>
		
		<section class="recientes">
			<?php if (isset($_GET['c'])) {
				echo "<h1>".$actualCat['categoria']."</h1>";
			} else {
				echo "<h1>Productos recientes</h1>";
			} ?>
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
					
							
							<p><?php echo "$".number_format($producto['precio'],0,",",".");?></p>
							<a href="producto.php?p=<?php echo $producto['idProducto'] ?>">Ver producto</a>
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
</html>
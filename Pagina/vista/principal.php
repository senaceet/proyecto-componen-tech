<!DOCTYPE html>
<html lang="es">
<?php 
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
	<link rel="stylesheet" href="css/styles.css">
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
				<li><img src="../icons/carrito.svg" alt=""></li>
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
		<br><hr><br>
		
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
							<img src="../img/<?php echo $producto['idProducto'] ?>.jpg">
						</figure>
						<div class="contenido-card">
							<h3><?php echo $producto['productoNombre']; ?></h3>
					
							<p><?php echo $producto['detalles']; ?></p>
							<p><?php echo $producto['precio'];?></p>
							<a href="#">COMPRAR</a>
						</div>
					</div>
			<?php } ?>	
			</div>			
		</section>
		
	</div>
</body>
</html>
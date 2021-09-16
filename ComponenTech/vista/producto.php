<!DOCTYPE html>
<html lang="es">
<?php 
session_start();


require_once '../modelo/Producto.php';
$objProducto = new Producto();
$limit = 20;
$page = 1;
if(isset($_GET["page"]) && $_GET["page"]!=""){ $page=$_GET["page"]; }

if($page>1){ 
    $start=($page-1)*$limit;
}

$prodCount = $objProducto->getProdCantidad();
$npages = $prodCount/$limit;

$offset = ($page - 1 ) * $limit;
$con_productos = $objProducto->getProductos($limit,$offset,1,0);

 ?>
<head>
	<meta charset="UTF-8">
	<meta name="Description" content="aqui una descripción">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="css/styles.css">
	<link rel="stylesheet" href="css/Admin.css">
	<link rel="stylesheet" href="css/tar.css">
  
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons">
	<script src="js/jquery.js"></script>
	<script src="https://kit.fontawesome.com/0b32f2b0be.js" crossorigin="anonymous"></script>

	<title>ComponenTech</title>
</head>
<body>


	<header>
		<div class="logo"><a href="principal.php"><img src="../img/logo.png" alt="logo"></a></div>
		<label class="busqueda">
			<input type="text" id="prodSearch" placeholder="Buscar productos">
			<i class="fas fa-search"></i>
		</label>
			
		</div>
		<nav class="navegador">
			<ul>
			<?php if (isset($_SESSION['user'])): ?>
				<li><a href="cuenta.php"><?php echo $_SESSION['user']->correo; ?></a></li>
				<li><a href="principal.php">Inicio</a></li>
				
				<?php if ($_SESSION['user']->CARGO_idCargo==3): ?>
					<li><a href="compras.php">Mis compras</a> </li>
					<li><a href="../controlador/salir.php"><i class="fas fa-sign-out-alt"></i></a></li>
					<li><a href="#" class="ListarProductos" ><i class="fa fa-shopping-cart"></i></a></li>
				<?php endif ?>
			<?php else: ?>

				<li><a href="../index.php">Inicio</a></li>
				<li><a href="#" class="ListarProductos" ><i class="fa fa-shopping-cart"></i></a></li>
			<?php endif ?>
				
			</ul>
		</nav>
	</header>


	<!---CONTENEDOR DE PRODUCTOS (-DETALLES)--->
	<div class="contenedor">
		<?php if (isset($_GET['p'])): 
			$producto = $objProducto->getProducto($_GET['p']);
			if ($producto->num_rows == 0) {
				header('location:principal.php');
			}
			$productoActual = $producto->fetch_array();
		?>
		<section class="sec1 detalles">
			<div class="detImg">
				<img alt="<?php echo $productoActual['productoNombre']; ?>" src="<?php echo $productoActual['prodImg']; ?>">
			</div>

			<div class="detallesProducto">
				<article>
					<h1><?php echo $productoActual['productoNombre']; ?></h1>
					<div class="textoDetalles">
						<p><?php echo $productoActual['detalles']; ?></p>
					</div>
					<div class="precioDetalles">
							<p>Precio: <?php echo "$".number_format($productoActual['precio'],0,",",".")?></p>
					</div>

					<div class="botonesDetalles">
						<a href="principal.php"><input type="button" class="rojo" value="ATRAS"></a>
					<?php if(isset($_SESSION['user'])):
						if ($_SESSION['user']->CARGO_idCargo==3 ): ?>
						
							<form action="producto.php?p=<?php echo $_GET['p'] ?>" method="post">
								<input type="hidden" name="prodId" value="<?php echo $productoActual['idProducto'] ?>">
								<input class="verde" type="submit" name="addCarrito" value="AÑADIR AL CARRITO">
							</form>

					<?php endif;
					 else: ?>

						<form action="producto.php?p=<?php echo $_GET['p'] ?>" method="post">
								<input type="hidden" name="prodId" value="<?php echo $productoActual['idProducto'] ?>">
								<input class="verde" type="submit" name="addCarrito" value="AÑADIR AL CARRITO">
							</form>
					<?php endif ?>
						
						<?php if (isset($_POST['addCarrito'])) {
							$_SESSION['carrito'][$_POST['prodId']]['img'] = $productoActual['prodImg'];
							$_SESSION['carrito'][$_POST['prodId']]['nombre'] = $productoActual['productoNombre'];
							$_SESSION['carrito'][$_POST['prodId']]['detalles'] = $productoActual['detalles'];
							$_SESSION['carrito'][$_POST['prodId']]['cantidad'] = 1;
							$_SESSION['carrito'][$_POST['prodId']]['precio'] = $productoActual['precio'];
						} ?>

					</div>
				</article>
				
			</div>
		</section>

		<!-- Busqueda de productos -->

		<?php elseif (isset($_GET['search'])): 
			$busqRes = $objProducto->getProductosSearch($_GET['search']);
			if ($busqRes->num_rows == 0) {
				echo "<h1>No se encontraron resultados de '".$_GET['search']."'</h1>";
			} else { ?>
				<h1>Resultados de "<?php echo $_GET['search']; ?>"</h1>
			<?php }

		?>
		


		<section>
			
			<div class="container-card">
			<?php 
				while ($producto = $busqRes->fetch_array()) { ?>
					<div class="card">
						<figure onclick="zoomIn(this)">
							<img alt="<?php echo $producto['productoNombre']; ?>" src="<?php echo $producto['prodImg'] ?>">
						</figure>
						<div class="contenido-card">
							<h3><?php echo $producto['categoria']; ?></h3>
							<h2><?php echo $producto['productoNombre']; ?></h2>
							<p>SKU: <?php echo $producto['idProducto']; ?></p>
							<h3>Precio</h3>
							<h2><?php echo "$".number_format($producto['precio'],0,",",".");?></h2>
						</div>
						<div class="button">
							<a href="producto.php?p=<?php echo $producto['idProducto'] ?>">VER DETALLES</a>
						</div>
					</div>
			<?php } ?>	
			</div>	
		</section>
		<hr><br>
		<?php endif ?>
		<section class="recientes">
			<h1>Productos que te podrían interesar</h1>
			<br>
			<div class="container-card">
			<?php 
				while ($producto = $con_productos->fetch_array()) { ?>
					
					<div class="card">
						<figure onclick="zoomIn(this)">
							<img alt="<?php echo $producto['productoNombre']; ?>" src="<?php echo $producto['prodImg'] ?>">
						</figure>
						<div class="contenido-card">
							<h3><?php echo $producto['categoria']; ?></h3>
							<h2><?php echo $producto['productoNombre']; ?></h2>
							<p>SKU: <?php echo $producto['idProducto']; ?></p>
							<h3>Precio</h3>
							<h2><?php echo "$".number_format($producto['precio'],0,",",".");?></h2>
						</div>
						<div class="button">
							<a href="producto.php?p=<?php echo $producto['idProducto'] ?>">VER DETALLES</a>
						</div>
					</div>
					
			<?php } ?>	
			</div>
			<div class="paginas">
		        <ul>
		            <?php if ($page>1): ?>
		                <li><a href="<?php echo $_SERVER['PHP_SELF'].'?p='.$_GET['p'].'&page='.($page-1); ?>">&laquo;</a></li>
		            <?php endif ?>

		            
		            <?php for ($i=1;$i<$npages+1;$i+=1): ?>
		                 <li><a href="<?php echo $_SERVER['PHP_SELF'].'?p='.$_GET['p'].'&page='.$i; ?>"><?php echo $i; ?></a></li>
		            <?php endfor ?>

		            <?php if ($page<$npages): ?>
		                <li><a href="<?php echo $_SERVER['PHP_SELF'].'?p='.$_GET['p'].'&page='.($page+1); ?>">&raquo;</a></li>
		            <?php endif ?>

		        </ul>
		    </div>			
		</section>
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
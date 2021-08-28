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
$con_productos = $objProducto->getProductos($limit,$offset,9,0);

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
				<li><a href="../controlador/salir.php"><i class="fas fa-sign-out-alt"></i></a></li>
				
			<?php else: ?>

				<li><a href="../index.php?r=1">Iniciar sesión / Crear cuenta</a></li>
				
			<?php endif ?>
			<li><a href="#" class="ListarProductos" ><i class="fas fa-shopping-cart"></i></a></li>
				
			</ul>
		</nav>
	</header>


	<!---CONTENEDOR DE PRODUCTOS (-ETALLES)--->
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
						<form action="producto.php?p=<?php echo $_GET['p'] ?>" method="post">
							<input type="hidden" name="prodId" value="<?php echo $productoActual['idProducto'] ?>">
							<input class="verde" type="submit" name="addCarrito" value="AÑADIR AL CARRITO">
						</form>
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
						<figure>
							<img alt="<?php echo $producto['productoNombre']; ?>"src="<?php echo $producto['prodImg'] ?>">
						</figure>
						<div class="contenido-card">
							<h2><?php echo $producto['productoNombre']; ?></h2>
					
							
							<p><?php echo "$".number_format($producto['precio'],0,",",".");?></p>
							<a class="verde" href="producto.php?p=<?php echo $producto['idProducto'] ?>">Ver producto</a>
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
					<div class="producto item">
						<div class="contenedor-imagen">
							<a href="#" class="link"></a>
							<img src="<?php echo $producto['prodImg'] ?>">
							<img src="https://dummyimage.com/600x400/dbdbdb/474747&text=imagen+2" class="img-hover">
						</div>				
						<div class="datos">
							<div class="starrr"></div>
							<small><a href="?c=<?php echo $producto['idCategoria'] ?>"><?php echo $producto['categoria'] ?></a></small>
							<h3><a href="producto.php?p=<?php echo $producto['idProducto'] ?>"><?php echo $producto['productoNombre']; ?></a></h3>
							<small>SKU: <?php echo $producto['idProducto'] ?></small>
						</div>
						<div class="precios">
							<div class="internet">
								<small>Internet</small>
								<span>$731.000</span>
							</div>
							<div>
								<small>Normal</small>
								<span><?php echo "$".number_format($producto['precio'],0,",",".");?></span>
							</div>
						</div>
						<form  action="?" method="post">
							<input type="hidden" name="prodId" value="<?php echo $producto['idProducto'] ?>">
						
							<button class="btn-carrito" type="submit" name="addCarrito"><i class="fas fa-shopping-basket"></i> AÑADIR AL CARRITO</button>
						</form>
						
					</div>
					
					<script src='https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.js'></script>
					<script src='https://rawcdn.githack.com/UnTipografico/Carrusel-eCommerse/3b4b54cdfd58b5c6bfa29a4239e584a268e5403b/js/starrr.js'></script>
					<script  src="js/script.js"></script>
					
					
					<!-- <div class="card">
						<figure onclick="zoomIn(this)">
							<img alt="<?php echo $producto['productoNombre']; ?>" src="<?php echo $producto['prodImg'] ?>">
						</figure>
						<div class="contenido-card">
							<h2><?php echo $producto['productoNombre']; ?></h2>
					
							
							<p><?php echo "$".number_format($producto['precio'],0,",",".");?></p>
							<a class="verde" href="producto.php?p=<?php echo $producto['idProducto'] ?>">Ver producto</a>
						</div>
					</div> -->
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
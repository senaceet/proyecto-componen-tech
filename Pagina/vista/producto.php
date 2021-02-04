<!DOCTYPE html>
<html lang="es">
<?php 
session_start();


require_once '../modelo/Producto.php';
$objProducto = new Producto();
$limitpage = 20;
$page = 1;
if(isset($_GET["page"]) && $_GET["page"]!=""){ $page=$_GET["page"]; }
$startpage = 0;
$endpage = $limitpage;
if($page>1){ 
    $startpage=($page-1)*$limitpage;
}

$prodCount = $objProducto->getProdCantidad();
$npages = $prodCount/$limitpage;

$con_productos = $objProducto->getProductos($startpage,$endpage);
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
		<div class="logo"><a href="principal.php"><img src="../img/logo.png" alt="l"></a></div>
		<label class="busqueda">
			<input type="text" id="prodSearch" placeholder="Buscar productos">
			<i class="fas fa-search"></i>
		</label>
			
		</div>
		<nav class="navegador">
			<ul>
			<?php if (isset($_SESSION['user'])): ?>
				<li><a href="cuenta.php"><?php echo $_SESSION['user']['correo']; ?></a></li>
				<li><a href="principal.php">Inicio</a></li>
				<li><a href="../controlador/salir.php"><i class="fas fa-sign-out-alt"></i></a></li>
				
			<?php else: ?>

				<li><a href="../index.php?r=1">Iniciar sesion</a></li>
				<li><a href="../index.php?r=1">Crear cuenta</a></li>
				
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
				<img src="<?php echo $productoActual['prodImg']; ?>">
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
							<img src="<?php echo $producto['prodImg'] ?>">
						</figure>
						<div class="contenido-card">
							<h3><?php echo $producto['productoNombre']; ?></h3>
					
							
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
					<div class="card">
						<figure>
							<img src="<?php echo $producto['prodImg'] ?>">
						</figure>
						<div class="contenido-card">
							<h3><?php echo $producto['productoNombre']; ?></h3>
					
							
							<p><?php echo "$".number_format($producto['precio'],0,",",".");?></p>
							<a class="verde" href="producto.php?p=<?php echo $producto['idProducto'] ?>">Ver producto</a>
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
</html>
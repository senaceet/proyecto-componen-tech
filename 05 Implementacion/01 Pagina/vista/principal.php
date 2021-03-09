<!DOCTYPE html>
<html lang="es">
<?php 
session_start();


require_once '../modelo/Producto.php';
require_once '../modelo/categoria.php';
$objProducto = new Producto();
$objCat = new Categoria();

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
if (isset($_GET['c'])) {
	$con_productos = $objProducto->getProductosCat($_GET['c'],$startpage,$endpage);
	$con_cat = $objCat->getCategoria($_GET['c']);
	$actualCat = $con_cat->fetch_array();
}
$con_cats = $objCat->getCategorias();

 ?>
<head>  
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<script src="https://code.jquery.com/jquery-3.4.1.js"></script>
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
				<li class="CuentaCorreo"><a href="cuenta.php"><?php echo $_SESSION['user']['correo']; ?></a></li>
				<?php if ($_SESSION['user']['CARGO_idCargo']==1): ?>
					<li><a href="administracion.php">Administración</a> </li>
				<?php endif ?>
				<li><a href="../controlador/salir.php"><i class="fas fa-sign-out-alt"></i></a></li>
			<?php else: ?>
				
				<li><a href="../index.php?r=1">Iniciar sesión / Crear cuenta</a></li>
			<?php endif ?>
			<li><a href="#" class="ListarProductos" ><i class="fa fa-shopping-cart"></i></a></li>	
			</ul>

		</nav>
	</header>
	 

	<div class="contenedor">
		<?php 
		    if (isset($_GET['m'])) {
		        switch ($_GET['m']) {
		            case 1:
		                echo "<div class='getMensaje correcto'>El carrito está vacio</div>";
		                break;
		        }
		    }
     	?>
		<section class="sec1">
			<input type="checkbox" id="hideCat">
			<label for="hideCat" class="hideCatDiv"></label>
			<div class="categorias">
				<label for="hideCat" class="hideCat"><i class="fa fa-chevron-right"></i></label>
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


		
		
		<section id="recientes" class="recientes">
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
						<figure onclick="zoomIn(this)">
							<img alt="<?php echo $producto['productoNombre']; ?>" src="<?php echo $producto['prodImg'] ?>">
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
		                <li><a href="<?php echo $_SERVER['PHP_SELF'].'?page='.($page-1); ?>">&laquo;</a></li>
		            <?php endif ?>

		            
		            <?php for ($i=1;$i<$npages+1;$i+=1): ?>
		                 <li><a href="<?php echo $_SERVER['PHP_SELF'].'?page='.$i; ?>"><?php echo $i; ?></a></li>
		            <?php endfor ?>

		            <?php if ($page<$npages): ?>
		                <li><a href="<?php echo $_SERVER['PHP_SELF'].'?page='.($page+1); ?>">&raquo;</a></li>
		            <?php endif ?>

		        </ul>
		    </div>

		</section>
		
	</div>
	<nav class="BarraCarrito">
		<?php include 'minicarrito.php'; ?>
	</nav>
	<div class="AlertaFactura">
		 <div class="ContadorAlerta">
		 	<h1 id="ContadorA">59</h1>
		 </div>
		 <div class="MensajeAlertaF">
		 	<h1>¿Desea cancelar su compra?</h1>
		 </div>

		 <div class="BotonesAlertaF">
		 	<button class="BotonAlertaSI">SÍ</button>
		 	<button class="BotonAlertaNO">NO</button>
		 </div>
	   </div>


	



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

<!-- Script de la ventana emergente luego de finalizar una compra -->
<script type="text/javascript">
	
	var counter = 59;
	setInterval( function(){
		counter--;
		if( counter>=0){
			id = document.getElementById("ContadorA");
			id.innerHTML = counter;
		}
		if( counter==0){
			$('.AlertaFactura').toggleClass("desaparecer");
		}
	},1000);


	$('.BotonAlertaSI').click(function(){
		$('.AlertaFactura').toggleClass("desaparecer");
	});

	$('.BotonAlertaNO').click(function(){
		$('.AlertaFactura').toggleClass("desaparecer");
	});
</script>

<!-- Fin script ventana emergente -->

<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script src="js/main.js" ></script>
</html>
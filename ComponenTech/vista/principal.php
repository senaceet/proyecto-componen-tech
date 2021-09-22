<!DOCTYPE html>
<html lang="es">
<?php 
session_start();


require_once '../modelo/Producto.php';
require_once '../modelo/categoria.php';
$objProducto = new Producto();
$objCat = new Categoria();

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

if (isset($_GET['c'])) {
	$con_productos = $objProducto->getProductos($limit,$offset,9, $_GET['c']);
	$con_cat = $objCat->getCategoria($_GET['c']);
	$actualCat = $con_cat->fetch_array();
}
$con_cats = $objCat->getCategorias();

 ?>
<head>  
	<meta charset="UTF-8">
    <meta name="Description" content="Alguna descripción de esto">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<script src="js/jquery.js"></script>
	<link rel="shortcut icon" href="../img/logo.png" type="image/x-icon">
	<script src="https://kit.fontawesome.com/0b32f2b0be.js" crossorigin="anonymous"></script>
	<link rel="stylesheet" href="css/styles.css">
	<link rel="stylesheet" href="css/login.css">
	<link rel="stylesheet" href="css/tar.css">

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
				<li class="CuentaCorreo"><a href="cuenta.php"><?php echo $_SESSION['user']->correo; ?></a></li>
				<?php if ($_SESSION['user']->CARGO_idCargo==1): ?>
					<li><a href="dashboard.php">Administración</a> </li>
					<li><a href="../controlador/salir.php"><i class="fas fa-sign-out-alt"></i></a></li>
				<?php endif ?>
				
				<?php if ($_SESSION['user']->CARGO_idCargo==3): ?>
					<li><a href="compras.php">Mis compras</a> </li>
					<li><a href="../controlador/salir.php"><i class="fas fa-sign-out-alt"></i></a></li>
					<li><a href="#" class="ListarProductos" ><i class="fa fa-shopping-cart"></i></a></li>
				<?php endif ?>
				
			<?php else: ?>
				
				<li onclick="showLogin()">Iniciar sesión</li>
				<li onclick="showReg()">Crear cuenta</li>
				<li><a href="#" class="ListarProductos" ><i class="fa fa-shopping-cart"></i></a></li>
			<?php endif ?>
				
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
				<iframe title="slider" src="slider.html" frameborder="0"></iframe>
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
					<!-- targeta de antes -->
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
	<?php include 'footer.php' ?>

	<input style="display:none" type="checkbox" id="form">
	<div class="floating-form">
		
		<form class="flip-in-hor-bottom" onsubmit="login(event)" action="">
			<h1>Iniciar sesión</h1>
			<input placeholder="Correo electrónico" type="email" name="correo" required maxlength="30">
			<input placeholder="Contraseña" type="password" name="clave" required maxlength="30">
			<a href="#">¿Olvidaste tu contraseña?</a>
			<button>Iniciar sesión</button>
		</form>

		<form class="flip-in-hor-bottom" onsubmit="reg(event)" id="reg" action="">
			<h1>Registrarse</h1>
			<div class="inputs">
				<select name="idTipo" required>
					<option value="" selected disabled>Tipo de documento</option>
					<option value="1">Cédula</option>
					<option value="2">Tarjeta de identidad</option>
					<option value="3">Cedula de extrangería</option>
					<option value="4">Pasaporte</option>
				</select>

				<input placeholder="N° documento" type="text" name="documento"  required maxlength="15">
				<input placeholder="Nombres" type="text"  name="nombres" required maxlength="25">
				<input placeholder="Apellidos" type="text"  name="apellidos" required maxlength="25">
				<input placeholder="Edad" type="number"  name="edad" required min="12" max="90">
				<input placeholder="Fecha de nacimiento" type="date"  name="fechaNto" required>
				<input placeholder="N° celular" type="text"  name="celular" required maxlength="15">
				<input placeholder="Dirección" type="text"  name="direccion" required maxlength="30">
				<input placeholder="Correo electrónico" type="email"  name="correo" required maxlength="30" style="grid-column: 1 / 3;">
				<input placeholder="Contraseña" type="password"  name="password" required maxlength="30">
				<input placeholder="Confirmar contraseña" type="password"  name="password2" required maxlength="30">
			</div>
			<button>Registrarse</button>
		</form>

		<label for="form" class="close-form"></label>
	</div>
	<style>
		

	</style>
</body>
<script>
	const flForm = document.querySelector('.floating-form')
	function showLogin(){
		document.querySelector('#form').click()
		flForm.children[0].style.display = 'flex';
		flForm.children[1].style.display = 'none';
	}

	function showReg(){
		document.querySelector('#form').click()
		flForm.children[1].style.display = 'flex';
		flForm.children[0].style.display = 'none';	
	}



	async function login(e){
		e.preventDefault()
		const data = new FormData(e.target)
		const res = await fetch('../json/usuario.php?action=login',{
			method:'post',
			body:data
		})
		res.json()
		.then(res=>{
			if(res.error){
				swal("Error", res.msj, "error");
			} else{
				location.reload()
			}
		})
	}
 
	async function reg(e){
		e.preventDefault()
		const data = new FormData(e.target)
		const res = await fetch('../json/usuario.php?action=reg',{
			method:'post',
			body:data
		})
		res.json()
		.then(res=>{
			// console.log(res)
			if(res.error){
				swal("Error", res.error, "error");
			} else{
				swal("Registro completado", "El usuario se registró correctamente", "success")
				.then(e=>{
					location.reload()
				})
				
			}
		})
	}


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
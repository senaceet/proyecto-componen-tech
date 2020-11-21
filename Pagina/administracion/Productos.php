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
 <!-- Mensaje -->
 
<!-- Sección de Categorías: Gestión producto -->
<form class="sec1 sec1sombra class=""" enctype="multipart/form-data" action="../controlador/insProducto.php" method="post">
	<input type="hidden" name="prodCat" value="<?php echo $_GET['c'] ?>">
	<div class="categorias cat2">
		<h1>Categorías</h1>
		<ul>
		<?php 
			while ($cat = $con_cats->fetch_array()) { $catId=$cat['idCategoria']; 
			if (isset($_GET['c'])) { 
				if ($catId == $_GET['c']) { ?>
					<li><a class="actual" href="administracion.php?sec=productos&c=<?php echo $catId ?>"><?php echo $cat['categoria']; ?></a></li>
				<?php } else { ?>
					<li><a href="administracion.php?sec=productos&c=<?php echo $catId ?>"><?php echo $cat['categoria']; ?></a></li>				
			<?php } } else { ?>
					<li><a href="administracion.php?sec=productos&c=<?php echo $catId ?>"><?php echo $cat['categoria']; ?></a></li>	

		<?php } } ?>
		</ul>
	</div>

	<!-- Inicio Sección Imagen(Añadir imagen): Gestión Producto -->
	<div class="SeccionImagen">
		<div class="BotonSubir"> 📷
 			<input class="SubirArchivo" type="file" name="prodImg" accept="image/*" id="inpFile"> 
		</div>
		<img id="prevImg">
	</div>

	<!-- Incicio Sección Formulario(Creación de nuevos productos): Gestión Producto -->
	<div class="SeccionFormulario">
		<div class="CajaFormulario">
			<input type="text" name="prodName" placeholder="Nombre del Producto">
			<input type="text" name="prodPrec" placeholder="Precio">
			<textarea class="Caja3" name="prodDesc" placeholder="Descripción" rows="5"></textarea>
			<button type="submit" class="submitButton">Subir producto</button>
		</div>
	</div>
</form>



<!-- Sección de busqueda de productos -->
<div class="busqueda busqueda2">
	<input type="text" name="" placeholder="Buscar Producto">
	<img src="../icons/lupa.svg">
</div>
<br>
<section class="ContenedorCartas">
	<section class="recientes">
		<div class="container-card">
		<?php 
		while ($producto = $con_productos->fetch_array()) { ?>
			<div class="card">
				<figure>
					<img src="../img/<?php echo $producto['idProducto'] ?>.jpg">
				</figure>
				<div class="contenido-card">
					<h3><?php echo $producto['productoNombre']; ?></h3>
					<a class="azul" href="#">EDITAR</a>
					<a class="rojo" href="#">ELIMINAR</a>
				</div>
			</div>
		<?php } ?>	
		</div>			
	</section>
</section>

	




<!-- Fin sección de busqueda de productos -->








<script>
   	const $inpFile = document.querySelector("#inpFile"),
	$prevImg = document.querySelector("#prevImg");

	$inpFile.addEventListener("change", () => {
	 	const archivos = $inpFile.files;
	  	if (!archivos || !archivos.length) {
	    	$prevImg.src = "";
	    	return;
	  	}
	  	const primerArchivo = archivos[0];
	  	const objectURL = URL.createObjectURL(primerArchivo);
	  	$prevImg.src = objectURL;
	});
</script>
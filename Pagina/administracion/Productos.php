<?php 
require_once '../modelo/categoria.php';
$objCat = new Categoria();
if (isset($_GET['c'])) {
	$con_cat = $objCat->getCategoria($_GET['c']);
	$actualCat = $con_cat->fetch_array();
}
$con_cats = $objCat->getCategorias();
 ?>
<!-- Sección de Categorías: Gestión producto -->
<form class="sec1" enctype="multipart/form-data" action="../controlador/insProducto.php" method="post">
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
</form>


<!-- Sección de busqueda de productos -->
<section>

	<div class="BusquedaProductos">
		<input type="text" name="" placeholder="Buscar Producto">
		<img src="icons/lupa.svg">
	</div>
</section>


<section class="ContenedorCartas">

	<section class="recientes">
   
				<div class="carta">
					<div class="contenidoCarta">
						<img src="./img/1012.jpg">
						<h3>Tarjeta De Video Asrock Radeon RTX 5600 XT Challenger 6GB OC</h3>
						<a class="ActualizarCarta" href="#">Editar</a>
						<a class="EliminarCarta" href="#">Borrar</a>
					</div>
				</div>

				<div class="carta">
					<div class="contenidoCarta">
						<img src="./img/1033.jpg">
						<h3>Fuente De Poder Corsair Hx 1000w 80 Plus Platinum</h3>
						<a class="ActualizarCarta" href="#">Editar</a>
						<a class="EliminarCarta" href="#">Borrar</a>
					</div>
				</div>

				<div class="carta">
					<div class="contenidoCarta">
						<img src="./img/1009.jpg">
						<h3>Memoria Ram Adata Xpg Spectrix D50 16gb 3600 Mhz</h3>
						<a class="ActualizarCarta" href="#">Editar</a>
						<a class="EliminarCarta" href="#">Borrar</a>
					</div>
				</div>

				<div class="carta">
					
						
					
					<div class="contenidoCarta">
						<img src="./img/1022.jpg">
						<h3>Monitor Samsung 24 F24t350fhl Ips 75hz</h3>
						<a class="ActualizarCarta" href="#">Editar</a>
						<a class="EliminarCarta" href="#">Borrar</a>
					</div>
				</div>
				<div class="carta">
					
					<div class="contenidoCarta">
						<img src="./img/1034.jpg">
						<h3>Teclado Mecanico Corsair K65 Rgb Rapidfire Tkl</h3>
						<a class="ActualizarCarta" href="#">Editar</a>
						<a class="EliminarCarta" href="#">Borrar</a>
					</div>
				</div>
				<div class="carta">
					
						
					
					<div class="contenidoCarta">
						<img src="./img/1017.jpg">
						<h3>Chasis Corsair Carbide Spec Omega, Blanco Rgb, Vidrio Templa</h3>
						<a class="ActualizarCarta" href="#">Editar</a>
						<a class="EliminarCarta" href="#">Borrar</a>
					</div>
				</div>
				<div class="carta">
					
					<div class="contenidoCarta">
						<img src="./img/1035.jpg">
						<h3>Carcasa Corsair Carbide Spec-05 Acero-plástico</h3>
						<a class="ActualizarCarta" href="#">Editar</a>
						<a class="EliminarCarta" href="#">Borrar</a>
					</div>
				</div>
				<div class="carta">
					
					<div class="contenidoCarta">
						<img src="./img/1036.jpg">
						<h3>Chasis Corsair Spec-delta Rgb Vt + Fuente 650w 80 White</h3>
						<a class="ActualizarCarta" href="#">Editar</a>
						<a class="EliminarCarta" href="#">Borrar</a>
					</div>
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
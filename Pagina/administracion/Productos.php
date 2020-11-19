<?php 
require_once 'modelo/categoria.php';
$objCat = new Categoria();
if (isset($_GET['c'])) {
	$con_productos = $objProducto->getProductosCat($_GET['c']);
	$con_cat = $objCat->getCategoria($_GET['c']);
	$actualCat = $con_cat->fetch_array();
}
$con_cats = $objCat->getCategorias();
 ?>
<!-- Sección de Categorías: Gestión producto -->
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
			<!-- Fin Sección Categorías: Gestión Producto -->



	<!-- Inicio Sección Imagen(Añadir imagen): Gestión Producto -->
	<div class="SeccionImagen">
		<div class="BotonSubir"> 📷
 			<input class="SubirArchivo" type="file" name="file1" accept="image/*" id="inpFile"> 
		</div>
		<img id="prevImg">
	</div>
	<!-- Fin Sección Imagen(Añadir imagen): Gestión Producto -->



<!-- Incicio Sección Formulario(Creación de nuevos productos): Gestión Producto -->



<div class="SeccionFormulario">
	<div class="CajaFormulario">
<div>
  <label>
    <input id="" class="Caja1" type="text" name="username" placeholder="Nombre del Producto">
    
  </label>
</div>
<div>
  <label>
    <input id="" class="Caja2" type="text" name="username" placeholder="Precio">
    
  </label>
</div>

	<div>
  <label>
    <textarea class="Caja3" placeholder="Descripción" rows="5"></textarea>
   
  </label>
</div>

	<div>
		<label>
			<button class="BotonProducto">Subir producto</button>
		</label>
	</div>


	</div>	
</section>
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
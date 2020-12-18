<?php 

require_once '../modelo/Producto.php';
require_once '../modelo/categoria.php';
require_once '../modelo/proveedor.php';

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

$objProveedor = new Proveedor();
$proveedores = $objProveedor->getProveedoresActivos();

if (isset($_GET['m'])) {
    switch ($_GET['m']) {
        case 1:
            echo "<div class='getMensaje correcto'>Producto insertado correctamente</div>";
            break;
        
        case 2:
            echo "<div class='getMensaje incorrecto'>¡Error al insertar producto!</div>";
            break;

        case 3:
            echo "<div class='getMensaje correcto'>Producto eliminado</div>";
            break;

        case 4:
            echo "<div class='getMensaje incorrecto'>¡Error al eliminar producto!</div>";
            break;

        default:  
        	echo "<div class='getMensaje incorrecto'>".$_GET['m']."</div>";
    }
}

?>
 <!-- Mensaje -->
 
<!-- Sección de Categorías: Gestión producto -->
<form class="sec1 sec1sombra"  enctype="multipart/form-data" action="../controlador/insProducto.php" method="post">
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
 			<input required class="SubirArchivo" type="file" name="prodImg" accept="image/*" id="inpFile"> 
		</div>
		<img id="prevImg">
	</div>

	<!-- Incicio Sección Formulario(Creación de nuevos productos): Gestión Producto -->
	<div class="SeccionFormulario">
		<div class="CajaFormulario">
			<input type="text" name="prodName" placeholder="Nombre del Producto" required>
			<input type="text" name="prodPrec" placeholder="Precio" required>
			<select name="proveedor" required>
				<option value="" selected disabled>-- Seleccione proveedor --</option>
			<?php while ($prov = $proveedores->fetch_array()) { ?>
				<option value="<?php echo $prov['idProveedor'] ?>"><?php echo $prov['nEmpresa'] ?></option>
			<?php } ?>		
			</select>
			<textarea required class="Caja3" name="prodDesc" placeholder="Descripción" rows="5"></textarea>
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
					<img draggable="false" src="<?php echo $producto['prodImg'] ?>">
				</figure>
				<div class="contenido-card">
					<h3><?php echo $producto['productoNombre']; ?></h3>
					<input class="azul" type="button" value="EDITAR">
					<form action="../controlador/eliminarProducto.php" method="post">
						<input type="hidden" name="prod" value="<?php echo $producto['idProducto']  ?>">
						<input class="rojo" type="button" value="Eliminar" onclick="if (confirm('¿Esta seguro de eliminar este producto?')){this.parentElement.submit()}">
					</form>
				</div>
			</div>
		<?php } ?>	
		</div>
		<div class="paginas">
		        <ul>
		            <?php if ($page>1): ?>
		                <li><a href="<?php echo $_SERVER['PHP_SELF'].'?sec=productos&page='.($page-1); ?>">&laquo;</a></li>
		            <?php endif ?>

		            
		            <?php for ($i=1;$i<$npages+1;$i+=1): ?>
		                 <li><a href="<?php echo $_SERVER['PHP_SELF'].'?sec=productos&page='.$i; ?>"><?php echo $i; ?></a></li>
		            <?php endfor ?>

		            <?php if ($page<$npages): ?>
		                <li><a href="<?php echo $_SERVER['PHP_SELF'].'?sec=productos&page='.($page+1); ?>">&raquo;</a></li>
		            <?php endif ?>

		        </ul>
		    </div>			
	</section>
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
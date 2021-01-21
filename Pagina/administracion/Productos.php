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
$ruta = $_SERVER['PHP_SELF']."?sec=productos";
$con_productos = $objProducto->getProductosInventario($startpage,$endpage);
if (isset($_GET['c'])) {
	$ruta = $_SERVER['PHP_SELF']."?sec=productos&c=".$_GET['c'];
	$con_productos = $objProducto->getProductosInventarioCat($_GET['c'],$startpage,$endpage);
	$con_cat = $objCat->getCategoria($_GET['c']);
	$actualCat = $con_cat->fetch_array();
}
$con_cats = $objCat->getCategorias();

if (isset($_GET['search'])) {
	$con_productos = $objProducto->getProductosSearchInventario($_GET['search']);
}

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
		
		case 5:
            echo "<div class='getMensaje correcto'>Producto actualizado</div>";
            break;
		case 6:
            echo "<div class='getMensaje incorrecto'>¡Error al actualizar producto!</div>";
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
			<?php if(isset($_GET['c'])): ?>
				<button id="insProd" type="button" class="submitButton">Subir producto</button>
			<?php else: ?>
				<button type="button" onclick="swal('Seleccione una categoría','','info')" class="submitButton">Subir producto</button>
			<?php endif; ?>
		</div>
	</div>
</form>



<!-- Sección de busqueda de productos -->
<div class="busqueda busqueda2">
	<input type="text" id="busq2" placeholder="Buscar Producto">
	<img src="../icons/lupa.svg">
</div>
<br>
<section class="ContenedorCartas">
	<section class="recientes">
		<div class="container-card">
			
		<?php 
		if ($con_productos->num_rows == 0) {
			echo "<h1 style='padding: 16px'>No se encontraron productos</h1>";
		}

		while ($producto = $con_productos->fetch_array()) { ?>
			<div class="card">
				<figure>
				<?php if($producto['ESTADO_idEstado'] == 1): ?>
					<div class="estado enventa">En venta</div>
				<?php else: ?>
					<div class="estado agotado">Agotado</div>
				<?php endif; ?>
					
					<img draggable="false" src="<?php echo $producto['prodImg'] ?>">
				</figure>
				<div class="contenido-card">
					<h3><?php echo $producto['productoNombre']; ?></h3>
					<form action="<?php echo $ruta ?>" method="post">
						<input type="hidden" name="prod" value="<?php echo $producto['idProducto']  ?>">
						<input class="azul" type="submit" value="EDITAR">
					</form>
					
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




<?php if(isset($_POST['prod'])):
	$upd = $objProducto->getProductoInventario($_POST['prod']);
	$upd = $upd->fetch_array(); 
	$cats=$objCat->getCategorias();
	$estado = $objProducto->getEstado($upd['ESTADO_idEstado']);
	$estados = $objProducto->getEstados();
	$proveedores = $objProveedor->getProveedoresActivos();
	$upd_cat = $objProducto->getCategoriaText($upd['CATEGORIA_idCategoria']);
	$updprov = $objProveedor->getProveedor($upd['PROVEEDOR_idProveedor']);
	?>
	<style>.secciones{position: static}</style>
<div class="updProd">
	<div class="cerrarUpd" onclick="this.parentElement.style.display='none'"></div>
	<form action="../controlador/actualizarProd.php" enctype="multipart/form-data" method="post" class="CajaFormulario">
		<input type="hidden" name="id" value="<?php echo $upd['idProducto'] ?>">
		<input name="oldImg" type="hidden" value="<?php echo $upd['prodImg'] ?>">
		<input name="newImg" accept="image/*" type="file" id="upd_img" style="display:none">
		<div class="upd_img">
			<img id="img2" src="<?php echo $upd['prodImg'] ?>" alt="imagen del producto">
			<label for="upd_img"><i class="edit fa fa-pencil"></i></label> 
		</div>
		<p>Nombre</p>
		<input name="nombre" type="text" value="<?php echo $upd['productoNombre'] ?>">
		<p>precio</p>
		<input name="precio" type="text" value="<?php echo $upd['precio'] ?>">
		<p>Descripción</p>
		<textarea name="descripcion"  cols="30" rows="10"><?php echo str_replace("<br>☛","=",$upd['detalles']) ?></textarea>
		<p>Categoria</p>
		<select name="categoria" >
			<option value="<?php echo $upd_cat['idCategoria'] ?>"><?php echo $upd_cat['categoria'] ?></option>
		<?php while($cat = $cats->fetch_array()):  ?>
			<option value="<?php echo $cat['idCategoria'] ?>"><?php echo $cat['categoria'] ?></option>
		<?php endwhile; ?>
		</select>
		<p>Proveedor</p>
		<select name="proveedor" required>
			<option value="<?php echo $updprov['idProveedor'] ?>"><?php echo $updprov['nEmpresa'] ?></option>
			<?php while ($prov = $proveedores->fetch_array()) { ?>
			<option value="<?php echo $prov['idProveedor'] ?>"><?php echo $prov['nEmpresa'] ?></option>
			<?php } ?>		
		</select>
		<p>Estado</p>
		<select name="estado" >
			<option value="<?php echo $estado['idEstado'] ?>"><?php echo $estado['estado'] ?></option>
		<?php while($e = $estados->fetch_array()): ?>
			<option value="<?php echo $e['idEstado'] ?>"><?php echo $e['estado'] ?></option>
		<?php endwhile; ?>
		</select>
		<button type="button" id="actualizar" class="submitButton">Actualizar</button>
			
	</form>
	<script>
		const file = document.querySelector('#upd_img');
		const img2 = document.querySelector('#img2');
		file.addEventListener("change",e=>{
			if (!file.files || !file.files.length) {
				swal('No cargó la imagen','','error');
				img2.src="";
	  		} else {
				  img2.src=URL.createObjectURL(file.files[0]);
			  }
		});

		const actBoton = document.querySelector('#actualizar');

		actBoton.addEventListener('click',e=>{
			verifInput(actBoton.form);
		});

		actBoton.form.addEventListener("keydown",e=>{
			if(e.key=="Enter"){
				verifInput(actBoton.form);
			}
		});
		
		

	</script>
</div>
<?php endif; ?>


<script>
   	const $inpFile = document.querySelector("#inpFile");
	const $prevImg = document.querySelector("#prevImg");

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

	const insBoton = document.querySelector('#insProd');

	if (insBoton != null) {
		insBoton.addEventListener('click',e=>{
			const img = insBoton.form.querySelector('input[type=file]');
			if(img.value == ""){
				swal("Debe seleccionar una imagen","","info");
			} else{
				verifInput(insBoton.form);
			}
			
		});
	}
	
	const busq2 = document.querySelector('#busq2');
	busq2.addEventListener('keydown',e=>{
		if (e.key=='Enter') {
			location.href='administracion.php?sec=productos&search='+busq2.value;
		}
	});
</script>
<?php 
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

$prodCount = $objProducto->getProdinventarioCantidad();
$npages = $prodCount/$limitpage;

$con_productos = $objProducto->getProductosInventario($startpage,$endpage);
if (isset($_GET['c'])) {
	$con_productos = $objProducto->getProductosInventarioCat($_GET['c'],$startpage,$endpage);
	$con_cat = $objCat->getCategoria($_GET['c']);
	$actualCat = $con_cat->fetch_array();
}
$con_cats = $objCat->getCategorias();

?>
<?php 
if (isset($_GET['m'])) {
	switch ($_GET['m']) {
		case 1:
		echo "<div class='getMensaje correcto'>Producto actualizado</div>";
		break;
		case 2:
		echo "<div class='getMensaje incorrecto'>Error al actualizar producto</div>";
		break;
		case 3:
		echo "<div class='getMensaje incorrecto'>El número de entradas debe ser mayor al de salidas</div>";
		break;
	}
}
?>
<div class="ContenedorInventario">
	<div class="categorias2">

		<ul>
			<?php 
				while ($cat = $con_cats->fetch_array()) { $catId=$cat['idCategoria'] ?>
					<li><a href="?sec=inventario&c=<?php echo $catId ?>"><?php echo $cat['categoria']; ?></a></li>
			<?php } ?>

		</ul>

	</div>


	<div class="ContenedorScrollProductos">
		<?php while ($p = $con_productos->fetch_array()) : ?>
			<div class="ContenedorCartaInventario">
				<form class="actualizarInventario" method="post" action="../controlador/actualizarInventario.php">
					<p>Ingrese el número de entradas</p>
					<?php if (isset($_GET['c'])): ?>
						<input type="hidden" name="c" value="<?php echo $_GET['c'] ?>">
					<?php endif ?>
					<input type="hidden" value="<?php echo $p['idProducto'] ?>" name="prod">
					<input type="hidden" value="<?php echo $p['Salidas']?>" name="salidas">
					<input type="number" min="1" value="<?php echo $p['entradas']?>" name="entradas">
					<input type="submit" value="Actualizar" class="submitButton inventarioSubmit">
					<input type="button" value="Cancelar" onclick="actualizarForm(this.form)"  class="submitButton">
				</form>
				<div class="ImagenCartaInventario">
					<img src="<?php echo $p['prodImg'] ?>">
				</div>

				<div class="NombreCartaInventario">
					<h1 class="TituloCartaInventario"><?php echo $p['productoNombre'] ?></h1>
				</div>
				<table class="texto">
					<tr>
						<td>Entradas</td>
						<td><?php echo $p['entradas']?></td>
					</tr>
					<tr>
						<td>Salidas</td>
						<td><?php echo $p['Salidas']?></td>
					</tr>
					<tr>
						<td>Saldo</td>
						<td><?php echo $p['Saldo']?></td>
					</tr>
				</table>
				<div class="ContenedorBotonesCartaInventario">
					<button id="BotonInventario" class="BotonActualizarCarta" onclick="actualizarForm(this.parentElement.parentElement.querySelector('form'))">Actualizar</button>
				</div>
			</div>
		<?php endwhile ?>

		<script>
			function actualizarForm(form){
				console.log(form);
				let estar = false;
				if (form.style.transform == "translateY(0px)") {
					estar = true;
				}
				if (estar) {
					form.style.transform = "translateY(-100%)";
					
				} else {
					form.style.transform = "translateY(0px)";
				}
				
			}
		</script>

		<div class="paginas">
			<ul>
				<?php if ($page>1): ?>
					<li><a href="<?php echo $_SERVER['PHP_SELF'].'?sec=inventario&page='.($page-1); ?>">&laquo;</a></li>
				<?php endif ?>


				<?php for ($i=1;$i<$npages+1;$i+=1): ?>
					<li><a href="<?php echo $_SERVER['PHP_SELF'].'?sec=inventario&page='.$i; ?>"><?php echo $i; ?></a></li>
				<?php endfor ?>

				<?php if ($page<$npages): ?>
					<li><a href="<?php echo $_SERVER['PHP_SELF'].'?sec=inventario&page='.($page+1); ?>">&raquo;</a></li>
				<?php endif ?>

			</ul>
		</div>

	</div>
</div>
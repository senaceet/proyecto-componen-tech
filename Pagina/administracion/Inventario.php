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
<div class="ContenedorInventario">
						<div class="categorias2">
							
							<ul>
							<?php 
								while ($cat = $con_cats->fetch_array()) { $catId=$cat['idCategoria'] ?>
									<li><a href="?sec=inventario&c=<?php echo $catId ?>"><?php echo $cat['categoria']; ?></a></li>
							<?php }	 ?>
								
							</ul>
						</div>
						

						<div class="ContenedorScrollProductos">
						<?php while ($p = $con_productos->fetch_array()) : ?>
							<div class="ContenedorCartaInventario">
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
										<td>saldo</td>
										<td><?php echo $p['Saldo']?></td>
									</tr>
								</table>
								<div class="ContenedorBotonesCartaInventario">
									<button id="BotonInventario" class="BotonActualizarCarta">Actualizar</button>
									<button id="BotonInventario" class="BotonAgotarCarta" >Agotado</button>
								</div>
							</div>
						<?php endwhile ?>
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



	

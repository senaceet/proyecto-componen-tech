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
 			<div class="TituloInventario">
 				<h1>Inventario</h1>
 			</div>
		 	<div class="ContenedorInventario">
						<div class="categorias2">
							
							<ul>
							<?php 
								while ($cat = $con_cats->fetch_array()) { $catId=$cat['idCategoria'] ?>
									<li><a href="principal.php?c=<?php echo $catId ?>"><?php echo $cat['categoria']; ?></a></li>
							<?php }	 ?>
								
							</ul>
						</div>

						<div class="ContenedorScrollProductos">

							<div class="ContenedorCartaInventario">
								   <div class="ImagenCartaInventario">
											 <img src="../img/productos/10/1005.jpg">
								   </div>
								   <div class="NombreCartaInventario">
										    <h1 class="TituloCartaInventario">Nombre del Componente</h1>
								   </div>
								   <div class="PrecioCartaInventario">
									       <h2>Precio</h2>
									       <input class="InputCartaInventarioPrecio" type="text" name="" value="$310.000">
								   </div>
								   <div class="TotalCartaInventario">
								           <h2>Total:</h2>
								           <h2 class="CantidadTituloCarta">17</h2>
								   </div>

								<div class="ContenedorBotonesCartaInventario">
											<button id="BotonInventario" class="BotonActualizarCarta">Actualizar</button>
											<button id="BotonInventario" class="BotonAgotarCarta" >Agotado</button>
									
								</div>
							</div>

							<div class="ContenedorCartaInventario">
								   <div class="ImagenCartaInventario">
											 <img src="../img/productos/10/1005.jpg">
								   </div>
								   <div class="NombreCartaInventario">
										    <h1 class="TituloCartaInventario">Nombre del Componente</h1>
								   </div>
								   <div class="PrecioCartaInventario">
									       <h2>Precio</h2>
									       <input class="InputCartaInventarioPrecio" type="text" name="" value="$310.000">
								   </div>
								   <div class="TotalCartaInventario">
								           <h2>Total:</h2>
								           <h2 class="CantidadTituloCarta">17</h2>
								   </div>

								<div class="ContenedorBotonesCartaInventario">
											<button id="BotonInventario" class="BotonActualizarCarta">Actualizar</button>
											<button id="BotonInventario" class="BotonAgotarCarta" >Agotado</button>
									
								</div>
							</div>

							<div class="ContenedorCartaInventario">
								   <div class="ImagenCartaInventario">
											 <img src="../img/productos/10/1005.jpg">
								   </div>
								   <div class="NombreCartaInventario">
										    <h1 class="TituloCartaInventario">Nombre del Componente</h1>
								   </div>
								   <div class="PrecioCartaInventario">
									       <h2>Precio</h2>
									       <input class="InputCartaInventarioPrecio" type="text" name="" value="$310.000">
								   </div>
								   <div class="TotalCartaInventario">
								           <h2>Total:</h2>
								           <h2 class="CantidadTituloCarta">17</h2>
								   </div>

								<div class="ContenedorBotonesCartaInventario">
											<button id="BotonInventario" class="BotonActualizarCarta">Actualizar</button>
											<button id="BotonInventario" class="BotonAgotarCarta" >Agotado</button>
									
								</div>
							</div>

							<div class="ContenedorCartaInventario">
								   <div class="ImagenCartaInventario">
											 <img src="../img/productos/10/1005.jpg">
								   </div>
								   <div class="NombreCartaInventario">
										    <h1 class="TituloCartaInventario">Nombre del Componente</h1>
								   </div>
								   <div class="PrecioCartaInventario">
									       <h2>Precio</h2>
									       <input class="InputCartaInventarioPrecio" type="text" name="" value="$310.000">
								   </div>
								   <div class="TotalCartaInventario">
								           <h2>Total:</h2>
								           <h2 class="CantidadTituloCarta">17</h2>
								   </div>

								<div class="ContenedorBotonesCartaInventario">
											<button id="BotonInventario" class="BotonActualizarCarta">Actualizar</button>
											<button id="BotonInventario" class="BotonAgotarCarta" >Agotado</button>
									
								</div>
							</div>

							<div class="ContenedorCartaInventario">
								   <div class="ImagenCartaInventario">
											 <img src="../img/productos/10/1005.jpg">
								   </div>
								   <div class="NombreCartaInventario">
										    <h1 class="TituloCartaInventario">Nombre del Componente</h1>
								   </div>
								   <div class="PrecioCartaInventario">
									       <h2>Precio</h2>
									       <input class="InputCartaInventarioPrecio" type="text" name="" value="$310.000">
								   </div>
								   <div class="TotalCartaInventario">
								           <h2>Total:</h2>
								           <h2 class="CantidadTituloCarta">17</h2>
								   </div>

								<div class="ContenedorBotonesCartaInventario">
											<button id="BotonInventario" class="BotonActualizarCarta">Actualizar</button>
											<button id="BotonInventario" class="BotonAgotarCarta" >Agotado</button>
									
								</div>
							</div>

							<div class="ContenedorCartaInventario">
								   <div class="ImagenCartaInventario">
											 <img src="../img/productos/10/1005.jpg">
								   </div>
								   <div class="NombreCartaInventario">
										    <h1 class="TituloCartaInventario">Nombre del Componente</h1>
								   </div>
								   <div class="PrecioCartaInventario">
									       <h2>Precio</h2>
									       <input class="InputCartaInventarioPrecio" type="text" name="" value="$310.000">
								   </div>
								   <div class="TotalCartaInventario">
								           <h2>Total:</h2>
								           <h2 class="CantidadTituloCarta">17</h2>
								   </div>

								<div class="ContenedorBotonesCartaInventario">
											<button id="BotonInventario" class="BotonActualizarCarta">Actualizar</button>
											<button id="BotonInventario" class="BotonAgotarCarta" >Agotado</button>
									
								</div>
							</div>


							<div class="ContenedorCartaInventario">
								   <div class="ImagenCartaInventario">
											 <img src="../img/productos/10/1005.jpg">
								   </div>
								   <div class="NombreCartaInventario">
										    <h1 class="TituloCartaInventario">Nombre del Componente</h1>
								   </div>
								   <div class="PrecioCartaInventario">
									       <h2>Precio</h2>
									       <input class="InputCartaInventarioPrecio" type="text" name="" value="$310.000">
								   </div>
								   <div class="TotalCartaInventario">
								           <h2>Total:</h2>
								           <h2 class="CantidadTituloCarta">17</h2>
								   </div>

								<div class="ContenedorBotonesCartaInventario">
											<button id="BotonInventario" class="BotonActualizarCarta">Actualizar</button>
											<button id="BotonInventario" class="BotonAgotarCarta" >Agotado</button>
									
								</div>
							</div>


							<div class="ContenedorCartaInventario">
								   <div class="ImagenCartaInventario">
											 <img src="../img/productos/10/1005.jpg">
								   </div>
								   <div class="NombreCartaInventario">
										    <h1 class="TituloCartaInventario">Nombre del Componente</h1>
								   </div>
								   <div class="PrecioCartaInventario">
									       <h2>Precio</h2>
									       <input class="InputCartaInventarioPrecio" type="text" name="" value="$310.000">
								   </div>
								   <div class="TotalCartaInventario">
								           <h2>Total:</h2>
								           <h2 class="CantidadTituloCarta">17</h2>
								   </div>

								<div class="ContenedorBotonesCartaInventario">
											<button id="BotonInventario" class="BotonActualizarCarta">Actualizar</button>
											<button id="BotonInventario" class="BotonAgotarCarta" >Agotado</button>
									
								</div>
							</div>

							<div class="ContenedorCartaInventario">
								   <div class="ImagenCartaInventario">
											 <img src="../img/productos/10/1005.jpg">
								   </div>
								   <div class="NombreCartaInventario">
										    <h1 class="TituloCartaInventario">Nombre del Componente</h1>
								   </div>
								   <div class="PrecioCartaInventario">
									       <h2>Precio</h2>
									       <input class="InputCartaInventarioPrecio" type="text" name="" value="$310.000">
								   </div>
								   <div class="TotalCartaInventario">
								           <h2>Total:</h2>
								           <h2 class="CantidadTituloCarta">17</h2>
								   </div>

								<div class="ContenedorBotonesCartaInventario">
											<button id="BotonInventario" class="BotonActualizarCarta">Actualizar</button>
											<button id="BotonInventario" class="BotonAgotarCarta" >Agotado</button>
									
								</div>
							</div>

							<div class="ContenedorCartaInventario">
								   <div class="ImagenCartaInventario">
											 <img src="../img/productos/10/1005.jpg">
								   </div>
								   <div class="NombreCartaInventario">
										    <h1 class="TituloCartaInventario">Nombre del Componente</h1>
								   </div>
								   <div class="PrecioCartaInventario">
									       <h2>Precio</h2>
									       <input class="InputCartaInventarioPrecio" type="text" name="" value="$310.000">
								   </div>
								   <div class="TotalCartaInventario">
								           <h2>Total:</h2>
								           <h2 class="CantidadTituloCarta">17</h2>
								   </div>

								<div class="ContenedorBotonesCartaInventario">
											<button id="BotonInventario" class="BotonActualizarCarta">Actualizar</button>
											<button id="BotonInventario" class="BotonAgotarCarta" >Agotado</button>
									
								</div>
							</div>

							<div class="ContenedorCartaInventario">
								   <div class="ImagenCartaInventario">
											 <img src="../img/productos/10/1005.jpg">
								   </div>
								   <div class="NombreCartaInventario">
										    <h1 class="TituloCartaInventario">Nombre del Componente</h1>
								   </div>
								   <div class="PrecioCartaInventario">
									       <h2>Precio</h2>
									       <input class="InputCartaInventarioPrecio" type="text" name="" value="$310.000">
								   </div>
								   <div class="TotalCartaInventario">
								           <h2>Total:</h2>
								           <h2 class="CantidadTituloCarta">17</h2>
								   </div>

								<div class="ContenedorBotonesCartaInventario">
											<button id="BotonInventario" class="BotonActualizarCarta">Actualizar</button>
											<button id="BotonInventario" class="BotonAgotarCarta" >Agotado</button>
									
								</div>
							</div>

							<div class="ContenedorCartaInventario">
								   <div class="ImagenCartaInventario">
											 <img src="../img/productos/10/1005.jpg">
								   </div>
								   <div class="NombreCartaInventario">
										    <h1 class="TituloCartaInventario">Nombre del Componente</h1>
								   </div>
								   <div class="PrecioCartaInventario">
									       <h2>Precio</h2>
									       <input class="InputCartaInventarioPrecio" type="text" name="" value="$310.000">
								   </div>
								   <div class="TotalCartaInventario">
								           <h2>Total:</h2>
								           <h2 class="CantidadTituloCarta">17</h2>
								   </div>

								<div class="ContenedorBotonesCartaInventario">
											<button id="BotonInventario" class="BotonActualizarCarta">Actualizar</button>
											<button id="BotonInventario" class="BotonAgotarCarta" >Agotado</button>
									
								</div>
							</div>


							<div class="ContenedorCartaInventario">
								   <div class="ImagenCartaInventario">
											 <img src="../img/productos/10/1005.jpg">
								   </div>
								   <div class="NombreCartaInventario">
										    <h1 class="TituloCartaInventario">Nombre del Componente</h1>
								   </div>
								   <div class="PrecioCartaInventario">
									       <h2>Precio</h2>
									       <input class="InputCartaInventarioPrecio" type="text" name="" value="$310.000">
								   </div>
								   <div class="TotalCartaInventario">
								           <h2>Total:</h2>
								           <h2 class="CantidadTituloCarta">17</h2>
								   </div>

								<div class="ContenedorBotonesCartaInventario">
											<button id="BotonInventario" class="BotonActualizarCarta">Actualizar</button>
											<button id="BotonInventario" class="BotonAgotarCarta" >Agotado</button>
									
								</div>
							</div>


							<div class="ContenedorCartaInventario">
								   <div class="ImagenCartaInventario">
											 <img src="../img/productos/10/1005.jpg">
								   </div>
								   <div class="NombreCartaInventario">
										    <h1 class="TituloCartaInventario">Nombre del Componente</h1>
								   </div>
								   <div class="PrecioCartaInventario">
									       <h2>Precio</h2>
									       <input class="InputCartaInventarioPrecio" type="text" name="" value="$310.000">
								   </div>
								   <div class="TotalCartaInventario">
								           <h2>Total:</h2>
								           <h2 class="CantidadTituloCarta">17</h2>
								   </div>

								<div class="ContenedorBotonesCartaInventario">
											<button id="BotonInventario" class="BotonActualizarCarta">Actualizar</button>
											<button id="BotonInventario" class="BotonAgotarCarta" >Agotado</button>
									
								</div>
							</div>

							<div class="ContenedorCartaInventario">
								   <div class="ImagenCartaInventario">
											 <img src="../img/productos/10/1005.jpg">
								   </div>
								   <div class="NombreCartaInventario">
										    <h1 class="TituloCartaInventario">Nombre del Componente</h1>
								   </div>
								   <div class="PrecioCartaInventario">
									       <h2>Precio</h2>
									       <input class="InputCartaInventarioPrecio" type="text" name="" value="$310.000">
								   </div>
								   <div class="TotalCartaInventario">
								           <h2>Total:</h2>
								           <h2 class="CantidadTituloCarta">17</h2>
								   </div>

								<div class="ContenedorBotonesCartaInventario">
											<button id="BotonInventario" class="BotonActualizarCarta">Actualizar</button>
											<button id="BotonInventario" class="BotonAgotarCarta" >Agotado</button>
									
								</div>
							</div>

							<div class="ContenedorCartaInventario">
								   <div class="ImagenCartaInventario">
											 <img src="../img/productos/10/1005.jpg">
								   </div>
								   <div class="NombreCartaInventario">
										    <h1 class="TituloCartaInventario">Nombre del Componente</h1>
								   </div>
								   <div class="PrecioCartaInventario">
									       <h2>Precio</h2>
									       <input class="InputCartaInventarioPrecio" type="text" name="" value="$310.000">
								   </div>
								   <div class="TotalCartaInventario">
								           <h2>Total:</h2>
								           <h2 class="CantidadTituloCarta">17</h2>
								   </div>

								<div class="ContenedorBotonesCartaInventario">
											<button id="BotonInventario" class="BotonActualizarCarta">Actualizar</button>
											<button id="BotonInventario" class="BotonAgotarCarta" >Agotado</button>
									
								</div>
							</div>


							<div class="ContenedorCartaInventario">
								   <div class="ImagenCartaInventario">
											 <img src="../img/productos/10/1005.jpg">
								   </div>
								   <div class="NombreCartaInventario">
										    <h1 class="TituloCartaInventario">Nombre del Componente</h1>
								   </div>
								   <div class="PrecioCartaInventario">
									       <h2>Precio</h2>
									       <input class="InputCartaInventarioPrecio" type="text" name="" value="$310.000">
								   </div>
								   <div class="TotalCartaInventario">
								           <h2>Total:</h2>
								           <h2 class="CantidadTituloCarta">17</h2>
								   </div>

								<div class="ContenedorBotonesCartaInventario">
											<button id="BotonInventario" class="BotonActualizarCarta">Actualizar</button>
											<button id="BotonInventario" class="BotonAgotarCarta" >Agotado</button>
									
								</div>
							</div>


							<div class="ContenedorCartaInventario">
								   <div class="ImagenCartaInventario">
											 <img src="../img/productos/10/1005.jpg">
								   </div>
								   <div class="NombreCartaInventario">
										    <h1 class="TituloCartaInventario">Nombre del Componente</h1>
								   </div>
								   <div class="PrecioCartaInventario">
									       <h2>Precio</h2>
									       <input class="InputCartaInventarioPrecio" type="text" name="" value="$310.000">
								   </div>
								   <div class="TotalCartaInventario">
								           <h2>Total:</h2>
								           <h2 class="CantidadTituloCarta">17</h2>
								   </div>

								<div class="ContenedorBotonesCartaInventario">
											<button id="BotonInventario" class="BotonActualizarCarta">Actualizar</button>
											<button id="BotonInventario" class="BotonAgotarCarta" >Agotado</button>
									
								</div>
							</div>


							<div class="ContenedorCartaInventario">
								   <div class="ImagenCartaInventario">
											 <img src="../img/productos/10/1005.jpg">
								   </div>
								   <div class="NombreCartaInventario">
										    <h1 class="TituloCartaInventario">Nombre del Componente</h1>
								   </div>
								   <div class="PrecioCartaInventario">
									       <h2>Precio</h2>
									       <input class="InputCartaInventarioPrecio" type="text" name="" value="$310.000">
								   </div>
								   <div class="TotalCartaInventario">
								           <h2>Total:</h2>
								           <h2 class="CantidadTituloCarta">17</h2>
								   </div>

								<div class="ContenedorBotonesCartaInventario">
											<button id="BotonInventario" class="BotonActualizarCarta">Actualizar</button>
											<button id="BotonInventario" class="BotonAgotarCarta" >Agotado</button>
									
								</div>
							</div>

							<div class="ContenedorCartaInventario">
								   <div class="ImagenCartaInventario">
											 <img src="../img/productos/10/1005.jpg">
								   </div>
								   <div class="NombreCartaInventario">
										    <h1 class="TituloCartaInventario">Nombre del Componente</h1>
								   </div>
								   <div class="PrecioCartaInventario">
									       <h2>Precio</h2>
									       <input class="InputCartaInventarioPrecio" type="text" name="" value="$310.000">
								   </div>
								   <div class="TotalCartaInventario">
								           <h2>Total:</h2>
								           <h2 class="CantidadTituloCarta">17</h2>
								   </div>

								<div class="ContenedorBotonesCartaInventario">
											<button id="BotonInventario" class="BotonActualizarCarta">Actualizar</button>
											<button id="BotonInventario" class="BotonAgotarCarta" >Agotado</button>
									
								</div>
							</div>



						</div>

			</div>



	

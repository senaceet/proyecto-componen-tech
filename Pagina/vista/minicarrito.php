
<div class="TituloCarrito">
	<h1>TUS PRODUCTOS</h1>
</div>
<div class="ContenedorProductosCarrito">
<?php 
if (isset($_POST['Vaciar'])) {
	unset($_SESSION['carrito']);
}
if (isset($_POST['sacarProd'])) {
	unset($_SESSION['carrito'][$_POST['prodCarrito']]);
}

$total = 0;
if (!isset($_SESSION['carrito'])) {
	echo "<center>Tu carrito está vacio</center>";
}else{
	if (count($_SESSION['carrito'])==0) {
		echo "<center>Tu carrito está vacio</center>";
	}
 
foreach ($_SESSION['carrito'] as $key => $value) { ?>
	<div class="ProductosCarrito">
		<div class="ImagenProductoCarrito">
			<img src="<?php echo $value['img'] ?>">  
		</div>
		<div class="TextoProductoCarrito">
			<p><?php echo $value['nombre'] ?></p>
		</div>
		<div class="PrecioProductoCarrito">
			<p><?php echo "$".number_format($value['precio'],0,",","."); ?></p>
		</div>
		<form method="post" class="SacarProductoCarrito">
			<input type="hidden" name="prodCarrito" value="<?php echo $key ?>">
			<button type="submit" name="sacarProd">✖</button>
		</form>
	</div>
<?php $total += $value['precio']; } ?>
	<form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
		<input class="Vaciar" type="submit" value="Vaciar carrito" name="Vaciar">
	</form>

<?php }  

?>	
</div>	

<div class="TituloCarrito2">
	<h1>TOTAL:</h1>
	<h2><?php echo "$".number_format($total,0,",","."); ?></h2>
</div>
<div class="BarraBotonComprarProductosCarrito">
	<?php if (!isset($_SESSION['user'])): ?>
		<button><a class="LinkBotonCarrito" onclick="swal('Inicie sesión para comprar','','info')">Comprar</a></button>
	<?php else: ?>
		<button><a class="LinkBotonCarrito" href="MPago.php">Comprar</a></button>
	<?php endif ?>
</div>



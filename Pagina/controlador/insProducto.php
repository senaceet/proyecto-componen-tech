<?php

	require_once '../modelo/Producto.php';
	$prodName = $_POST['prodName'];
	$proveedor = $_POST['proveedor'];

	$ruta = "../img/productos/".$proveedor."/";
	$new_file = $ruta.$prodName.substr($_FILES['prodImg']['name'], -4);

	 if (!file_exists($ruta)) {
	 	mkdir($ruta,0777,true);
	 }
	 $producto = new Producto();
	 $resFoto = $producto->subirFoto($_FILES['prodImg'],$new_file);
	 if ($resFoto == "ya se guardo la imagen" || $resFoto == "El archivo ya existe") {
	 	$producto->crearProducto($_POST['prodName'],str_replace("=","<br>☛",$_POST['prodDesc']),$_POST['prodPrec'],$_POST['prodCat'],$proveedor,1,$new_file);
	 	if($producto->insertar()){
	 		echo "productoinsertado";
	 	} else {
	 		echo "error al insertar";
	 	}
	 }
	
	
	

 ?>
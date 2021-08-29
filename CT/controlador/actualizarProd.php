<?php 

    require_once '../modelo/Producto.php';
    $objProd = new Producto();

    $id = $_POST['id'];
    $foto = $_POST['oldImg'];
    $hayFoto = true;
    $nombre = $_POST['nombre'];
    $precio = $_POST['precio'];
    $desc = $_POST['descripcion'];
    $cat = $_POST['categoria'];
    $proveedor = $_POST['proveedor'];
    $estado = $_POST['estado'];
    

    if (isset($_POST['newImg'])) {
        $ruta = "../img/productos/".$proveedor."/";
        
        $new_file = $ruta.$prodName.substr($foto['name'], -4);
        $foto = $new_file;
        if (!file_exists($ruta)) {
            mkdir($ruta,0777,true);
        }
        if (file_exist($_POST['oldImg'])) {
            unlink($_POST['oldImg']);
        }
        $resFoto = $producto->subirFoto($foto,$new_file);
        if($resFoto != "ya se guardo la imagen" || !$resFoto != "El archivo ya existe"){
            $hayFoto = false;
        }
    } 

    if ($hayFoto) {
        $objProd->crearProducto($nombre,str_replace("=","<br>☛",$desc),$precio,$cat,$proveedor,$estado,$foto);
        $res = $objProd->actualizar($id);
        if($res){
	 		header('location:../vista/administracion.php?sec=productos&m=5');
	 	} else {
            header('location:../vista/administracion.php?sec=productos&m=6');
             
	 	}
    } else {
        header('location:../vista/administracion.php?sec=productos&m='.$resFoto);
    }


?>
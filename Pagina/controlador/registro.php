<?php
require "../modelo/Usuario.php";
extract ($_REQUEST);


$objUsuario = new Usuario();

$verif = $objUsuario->verifUsuario($_REQUEST['idTipo'],$_REQUEST['documento']);

$verifcorreo = $objUsuario->verifCorreo($_REQUEST['correo']);

if($verifcorreo->num_rows==1){
    header('location:../index.php?m=6'); 
} elseif ($verif->num_rows==1){
    header('location:../index.php?m=5'); 
 } elseif ($_REQUEST['password']==$_REQUEST['password2']){ 
    $objUsuario->crearUsuario($_REQUEST['documento'] , $_REQUEST['nombres'], $_REQUEST['apellidos'], $_REQUEST['fechaNto']
    ,$_REQUEST['edad'],$_REQUEST['celular'], $_REQUEST['direccion'], $_REQUEST['correo'], 3,$_REQUEST['idTipo'],9);

    if($objUsuario->Registrarse()){
        if($objUsuario->registrarClave($_REQUEST['correo'],$_REQUEST['password'])){
            header('location:../index.php?m=1');  
        } else {
            header('location:../index.php?m=2'); 
        }
    } else {
        header('location:../index.php?m=3'); 
    }

} else {
    header('location:../index.php?m=4'); 
}

?>
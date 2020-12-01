<?php
//Se reciben los datos del formulario
require "../modelo/Usuario.php";
extract ($_REQUEST);

//Forma utilizando la Clase Empleado 

$objUsuario = new Usuario();

$verif = $objUsuario->verifUsuario($_REQUEST['idTipo'],$_REQUEST['documento']);

$verifcorreo = $objUsuario->verifCorreo($_REQUEST['correo']);

$regreso = $_REQUEST['tabla'];

if($verifcorreo->num_rows==1){
    header('location:../vista/administracion.php?sec='.$regreso.'&m=7');  
} elseif ($verif->num_rows==1){
    header('location:../vista/administracion.php?sec='.$regreso.'&m=6');  
 } elseif ($_REQUEST['password']==$_REQUEST['password2']){ 
    $objUsuario->crearUsuario($_REQUEST['documento'] , $_REQUEST['nombres'], $_REQUEST['apellidos'], $_REQUEST['fechaNto']
    ,$_REQUEST['edad'],$_REQUEST['celular'], $_REQUEST['direccion'], $_REQUEST['correo'], $_REQUEST['idCargo'],$_REQUEST['idTipo'],$_REQUEST['idEstado']);

    if($objUsuario->Registrarse()){
        if($objUsuario->registrarClave($_REQUEST['correo'],$_REQUEST['password'])){
            header('location:../vista/administracion.php?sec='.$regreso.'&m=1');  
            
        }else {
            header('location:../vista/administracion.php?sec='.$regreso.'&m=2');  
        }
        
    } else {
        header('location:../vista/administracion.php?sec='.$regreso.'&m=2'); 
    }

} else {
    header('location:../vista/administracion.php?sec='.$regreso.'&m=5'); 
}

?>
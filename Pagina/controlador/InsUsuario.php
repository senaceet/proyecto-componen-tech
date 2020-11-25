<?php
//Se reciben los datos del formulario
require "../modelo/Usuario.php";
extract ($_REQUEST);

//Forma utilizando la Clase Empleado 

$objUsuario = new Usuario();

$verif = $objUsuario->verifUsuario($_REQUEST['idTipo'],$_REQUEST['documento']);

$verifcorreo = $objUsuario->verifCorreo($_REQUEST['correo']);

if($verifcorreo->num_rows==1){
    if ($_REQUEST['tabla']=='operador'){
        header('location:../vista/administracion.php?sec=Operadores&m=7');  
      } else {
        header('location:../vista/administracion.php?sec=usuarios&m=7');
    }
} elseif ($verif->num_rows==1){
    if ($_REQUEST['tabla']=='operador'){
        header('location:../vista/administracion.php?sec=Operadores&m=6');
  
      } else {
        header('location:../vista/administracion.php?sec=usuarios&m=6');
    }
 } elseif ($_REQUEST['password']==$_REQUEST['password2']){ 
    $objUsuario->crearUsuario($_REQUEST['documento'] , $_REQUEST['nombres'], $_REQUEST['apellidos'], $_REQUEST['fechaNto']
    ,$_REQUEST['edad'],$_REQUEST['celular'], $_REQUEST['direccion'], $_REQUEST['correo'], $_REQUEST['idCargo'],$_REQUEST['idTipo'],$_REQUEST['idEstado']);

    if($objUsuario->Registrarse()){
        if($objUsuario->registrarClave($_REQUEST['correo'],$_REQUEST['password'])){
            if ($_REQUEST['tabla']=='operador'){
                header('location:../vista/administracion.php?sec=Operadores&m=1');
            } else {
                header('location:../vista/administracion.php?sec=usuarios&m=1');
            }
            
        }else {
            if ($_REQUEST['tabla']=='operador'){
                header('location: ../vista/administracion.php?sec=Operadores&m=2');
            } else {
                header('location: ../vista/administracion.php?sec=usuarios&m=2');
            }
        }
        
    } else {
        if ($_REQUEST['tabla']=='operador'){
            header('location: ../vista/administracion.php?sec=Operadores&m=2');
        } else {
            header('location: ../vista/administracion.php?sec=usuarios&m=2');
        }
    }

} else {
    if ($_REQUEST['tabla']=='operador'){
        header('location: ../vista/administracion.php?sec=Operadores&m=5');
    } else {
        header('location: ../vista/administracion.php?sec=usuarios&m=5');
    }
}


// $resultado = $objEmpleado->Registrarse();

// if ($resultado)
// 	echo "marlon es gay ";
// else
// 	echo "kevin el chimba y monroy es gay";

?>
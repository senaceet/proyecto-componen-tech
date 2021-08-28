<?php
require_once '../modelo/Cliente.php';
switch ($_GET['action']) {
    case 'login':
        session_start();

        $usuario = new Cliente();

        $inicio = $usuario->iniciarSesion($_POST['correo'],$_POST['clave']);

        if(!$inicio->error){
            $_SESSION['user'] = $inicio->user;
        }
        
        echo json_encode($inicio);
        break;
    
    case 'reg':

        $usuario = new Usuario();

        $usuario->crearUsuario(
            $_POST['documento'],
            $_POST['nombres'], 
            $_POST['apellidos'], 
            $_POST['fechaNto'],
            $_POST['edad'],
            $_POST['celular'], 
            $_POST['direccion'], 
            $_POST['correo'], 
            3,
            $_POST['idTipo'],
            9,
            $_POST['password']
        );

        if ($_POST['password'] == $_POST['password2']){
            $res = $usuario->insertar();
            echo json_encode($res);
        } else echo '{"status":false,"error":"La constaseña es incorrecta"';
        break;

    case 'edit':

        break;
    
    default:
        echo "{}";
        break;
}
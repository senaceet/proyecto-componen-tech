<?php


require_once '../modelo/Cliente.php';

    require '../controlador/PHPMailer/Exception.php';
    require '../controlador/PHPMailer/PHPMailer.php';
    require '../controlador/PHPMailer/SMTP.php';
    

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
            correo_de_registro($_POST['correo'],$_POST['nombres']);
            echo json_encode($res);
        } else echo '{"status":false,"error":"La constaseña es incorrecta"}';
        break;

    case 'edit':

        break;
    
    default:
        echo "{}";
        break;
}

// lo del correo de registro
    

    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;

function correo_de_registro($correo, $nombre){
    
    $mail = new PHPMailer(true);

    $ruta = 'http://componentech.epizy.com/';
    $nombre_del_usuario = $nombre;
    $correo_del_usuario = $correo;

    try {
        //Server settings
        $mail->SMTPOptions = array(
            'ssl' => array(
            'verify_peer' => false,
            'verify_peer_name' => false,
            'allow_self_signed' => true
            )
        );

        $mail->SMTPDebug = 0;                      // Enable verbose debug output
        $mail->isSMTP();                                            // Send using SMTP
        $mail->Host       = 'smtp.gmail.com';                    // Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
        $mail->Username   = 'componentech9@gmail.com';                     // SMTP username
        $mail->Password   = 'componen12345';                               // SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
        $mail->Port       = 587;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

        //Recipients
        $mail->setFrom('componentech9@gmail.com', 'ComponenTech');
    
        $mail->addAddress($correo_del_usuario);    
    //HTML
        $mail->isHTML(true);   

    // CORREO HTML
        $mail->Subject = 'Registro usuario';
        $mail->Body    =  '

    <!DOCTYPE html>
    <html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
        <link rel="stylesheet" href="'.$ruta.'controlador/PHPMailer/style.css">
        <style>
    body{
        padding: 15px;
    }

    @import url("https://fonts.googleapis.com/css2?family=Work+Sans:wght@400&display=swap");
    .contenedor{
        font-family: "Work Sans", sans-serif;
        padding: 30px ;
        box-sizing: border-box;
        text-align: center;
        position: relative;
        width: 100%;
        margin: auto;
        color:#000;
        font-size: 17px;
        border: 1px solid #ccc;
        max-width: 800px;
        border-radius: 3px;
    }
    h1{
        color: #CE3F3F;
    }
    footer{
        display: flex;
        width: 100%;
        text-align: center;
        justify-content: center;
        align-items: center;

    }
    footer img{
        width: 50px;
        object-fit: contain;
    }
    a{
        text-decoration: none;
        color: #CE3F3F;
        border-bottom: 1px solid transparent;
    }
    a:hover{
        color:#ad2e2e;
        border-color: inherit;
        transition: .3s;
    }
    *::selection { 
        background:rgba(250,10,10,.7); color:#fff; 
    }
        </style>
        
    </head>
    <body>

        <div class="contenedor">
            <img draggable="false" src="'.$ruta.'img/logo.png" alt="ComponenTech logo">
            <h1>¡Bienvenido '.$nombre_del_usuario.'!</h1>
            <p>Te has registrado correctamente a la Plataforma de ComponenTech, ahora podrás ingresar cuando quieras y disfrutar de los privilegios de estar registrado.</p>
            <p><a href="http://componentech.epizy.com">http://componenTech.epizy.com</a></p>
            <footer>
                <img draggable="false" src="'.$ruta.'img/logo.png" alt="ComponenTech logo2">
                <p>ComponenTech</p>
            </footer>
        </div>
        
    </body>
    </html>


        ';

    $mail->send();

    } catch (Exception $e) {
        echo "Error de envío: {$mail->ErrorInfo}";
    }


}
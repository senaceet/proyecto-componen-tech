
<?php 
require 'Exception.php';
require 'PHPMailer.php';
require 'SMTP.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

$mail = new PHPMailer(true);

$ruta = 'http://componentech.epizy.com/';

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
   
    $mail->addAddress('yerenagmt@gmail.com');    
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
		<h1>¡Bienvenido '.$_REQUEST['nombres'].'!</h1>
		<p>Lorem, ipsum dolor sit amet consectetur adipisicing, elit. Eum ullam eos, sapiente omnis laboriosam, nihil iure, quos quae, nesciunt consectetur fugiat? Eveniet ducimus deleniti blanditiis sunt, odio aliquam voluptatem, dolorum. (Texto de ejemplo)</p>
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


 ?>

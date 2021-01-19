<?php 
    session_start();
    if (isset($_SESSION['user'])) {
        header('location:vista/principal.php');
    } elseif (!isset($_GET['r'])){
        header('location:vista/principal.php');
    }
 ?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">

    <!-- tipo de letra -->
    <link href="https://fonts.googleapis.com/css?family=Raleway|Ubuntu" rel="stylesheet">
    <title>ComponenTech</title>
    <link rel="stylesheet" href="vista/css/login.css">
</head>
<body>
    <?php 
    if (isset($_GET['m'])) {
        switch ($_GET['m']) {
            case 1:
                echo "Usuario registrado correctamente";
                break;
            case 2:
                echo "Error al guardar la contraseña";
                break;
            case 3:
                echo "Error al registrar usuario";
                break;
            case 4:
                echo "Error: las contraseñas deben ser iguales";
                break;
            case 5:
                echo "Error: el documento ya está registrado";
                break;
            case 6:
                echo "Error: el correo ya está registrado";
                break;
            case 7:
                echo "Error: Contraseña incorrecta";
                break;
            case 8:
                echo "Error: el usuario no existe";
                break;
        }
    }
     ?>

   <!-- Formularios -->
    <div class="contenedor-formularios">
        <!-- Links de los formularios -->
        <ul class="contenedor-tabs">
            <li class="tab tab-segunda active"><a href="#iniciar-sesion">Iniciar Sesión</a></li>
            <li class="tab tab-primera"><a href="#registrarse">Registrarse</a></li>
        </ul>
        <!-- Contenido de los Formularios -->
        <div class="contenido-tab">
            <!-- Iniciar Sesion -->
            <div id="iniciar-sesion">
                <h1>Iniciar Sesión</h1>
                <form action="controlador/iniciar-sesion.php" method="post">
                    <div class="contenedor-input">
                        <label>
                            Correo electrónico <span>*</span>
                        </label>
                        <input type="text" name="correo" required maxlength="30">
                    </div>

                    <div class="contenedor-input">
                        <label>
                            Contraseña <span>*</span>
                        </label>
                        <input type="password" name="clave" required maxlength="30">
                    </div>
                    <p class="forgot"><a href="#">Se te olvidó la contraseña?</a></p>
                    <input type="submit" class="button button-block" value="Iniciar Sesión">
                </form>
            </div>
            <!-- Registrarse -->
            <div id="registrarse">
                <h1>Registrarse</h1>
                <form action="controlador/registro.php" method="POST">
                    <div class="fila-arriba">
                        <div class="contenedor-input">
                            <select name="idTipo" required>
                                <option value="" selected disabled>Tipo de documento *</option>
                                <option value="1">Cédula</option>
                                <option value="2">Targeta de identidad</option>
                                <option value="3">Cedula de extrangería</option>
                                <option value="4">Pasaporte</option>
                            </select>
                        </div>
                        <div class="contenedor-input">

                            <label>
                                Numero de documento <span>*</span>
                            </label>
                            <input type="text" name="documento"  required maxlength="15">
                        </div>
                    </div>
                    <div class="fila-arriba">
                        <div class="contenedor-input">

                            <label>
                                Nombres <span>*</span>
                            </label>
                            <input type="text"  name="nombres" required maxlength="25">
                        </div>

                        <div class="contenedor-input">
                            <label>
                                Apellidos <span >*</span>
                            </label>
                            <input type="text"  name="apellidos" required maxlength="25">
                        </div>
                    </div>
                    <div class="fila-arriba">
                        <div class="contenedor-input">
                            <label>
                                Edad <span >*</span>
                            </label>
                            <input type="number"  name="edad" required min="12" max="90">
                        </div>
                        <div class="contenedor-input">
                                <label class="active">
                                    Fecha de nacimiento <span>*</span>
                                </label>
                            <input type="date"  name="fechaNto" required>
                        </div>
                    </div>
                    <div class="contenedor-input">
                        <label>
                            Celular <span>*</span>
                        </label>
                        <input type="text"  name="celular" required maxlength="15">
                    </div>
                    <div class="contenedor-input">
                        <label>
                            Dirección <span>*</span>
                        </label>
                        <input type="text"  name="direccion" required maxlength="30">
                    </div>
                    <div class="contenedor-input">
                        <label>
                            Correo <span>*</span>
                        </label>
                        <input type="email"  name="correo" required maxlength="30">
                    </div>
                <div class="fila-arriba">
                    <div class="contenedor-input">
                        <label>
                            Contraseña <span  >*</span>
                        </label>
                        <input type="password"  name="password" required maxlength="30">
                    </div>
                    <div class="contenedor-input">
                        <label>
                            Confirmar contraseña <span  >*</span>
                        </label>
                        <input type="password"  name="password2" required maxlength="30">
                    </div>
                </div>

                    <input type="submit" class="button button-block" value="Registrarse">
                </form>
            </div>
            </form>
        </div>
    </div>
   <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script>
   <script>
       $(document).ready(function(){
    
            $(".contenedor-formularios").find("input, textarea").on("keyup blur focus", function (e) {

                var $this = $(this),
                  label = $this.prev("label");
                if (e.type === "keyup") {
                    if ($this.val() === "") {
                        label.addClass("active highlight");
                    } else {
                        label.addClass("active highlight");
                    }
                } else if (e.type === "blur") {
                    if($this.val() === "") {
                        label.removeClass("active highlight"); 
                        } else {
                        label.removeClass("highlight");   
                        }   
                } else if (e.type === "focus") {
                    if($this.val() === "") {
                        label.addClass("active highlight"); 
                    } 
                    else if($this.val() !== "") {
                        label.addClass("highlight");
                    }
                } 

            });

            $(".tab a").on("click", function (e) {

                e.preventDefault();
                $(this).parent().addClass("active");
                $(this).parent().siblings().removeClass("active");

                target = $(this).attr("href");

                $(".contenido-tab > div").not(target).hide();

                $(target).fadeIn(500);

            });
            
        });
   </script>

</body>
</html>

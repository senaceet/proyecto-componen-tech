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
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="Description" content="aqui una descripción">

    <!-- tipo de letra --> 
    <link href="https://fonts.googleapis.com/css?family=Raleway|Ubuntu" rel="stylesheet">
    <title>ComponenTech</title>
    <script src="vista/js/jquery.js"></script>
    <link rel="stylesheet" href="vista/css/login.css">

</head>
<body>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <?php 
    if (isset($_GET['m'])) {
        $m2 = "";
        switch ($_GET['m']) {
            case 1:
            $m = "Usuario registrado correctamente";
            $t = "success";
            $m2 = "Hemos enviado un mensaje a tu correo confirmando tu registro en ComponenTech.";
            break;
            case 2:
            $m = "Error al guardar la contraseña";
            $t = "error";
            break;
            case 3:
            $m = "Error al registrar usuario";
            $t = "error";
            break;
            case 4:
            $m = "Error: las contraseñas deben ser iguales";
            $t = "error";
            break;
            case 5:
            $m = "Error: el documento ya está registrado";
            $t = "error";
            break;
            case 6:
            $m = "Error: el correo ya está registrado";
            $t = "error";
            break;
            case 7:
            $m = "Error: Contraseña incorrecta";
            $t = "error";
            break;
            case 8:
            $m = "Error: el usuario no existe";
            $t = "error";
            break;
        } ?>
        <script>swal('<?php echo $m ?>','<?php echo $m2 ?>','<?php echo $t ?>');</script>
    <?php } ?>

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
                        <input  type="email" name="correo" required maxlength="30">
                    </div>

                    <div class="contenedor-input">
                        <label>
                            Contraseña <span>*</span>
                        </label>
                        <input type="password" name="clave" required maxlength="30">
                    </div>
                    <p class="forgot"><a href="#">¿Olvidaste tu contraseña?</a></p>
                    <input id="iniciar_btn" type="button" class="button button-block" value="Iniciar Sesión">
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
                                <option value="2">Tarjeta de identidad</option>
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

                    <input type="button" id="registrar_btn" class="button button-block" value="Registrarse">
                </form>
            </div>
        </form>
    </div>
</div>

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
const iniciar_btn = document.querySelector('#iniciar_btn');

iniciar_btn.addEventListener('click',()=>{
    verifForm(iniciar_btn.form);
});

const registrar_btn = document.querySelector('#registrar_btn');

registrar_btn.addEventListener('click',()=>{
    verifForm(registrar_btn.form);
});

function verifForm(form){
    const emailRegex = /^[-\w.%+]{1,64}@(?:[A-Z0-9-]{1,63}\.){1,125}[A-Z]{2,63}$/i;

    inps = form.querySelectorAll('input[type=text],input[type=email],input[type=password],input[type=date],input[type=number], select');
    var vacios = 0;
    inps.forEach(e=>{

        if(e.value==''){
            e.style.borderColor="#d33";
            vacios++;
        } else {
            e.style.borderColor="#fff";
        }


        e.addEventListener('input',i=>{
            if (i.value!="") {
                 e.style.borderColor="#fff";
            }
        });
    });
    if (vacios>0) {
        swal('Quedan '+vacios+' campos vacios','','error');
    } else if(!emailRegex.test(form.querySelector('input[type=email]').value)){
        swal('El correo no es valido','','error');
    } else if(form==registrar_btn.form){
        const claves = form.querySelectorAll('input[type=password');
        if (claves[0].value!==claves[1].value) {
            swal('Las contraseñas deben ser identicas','','error');    
        } else {
            form.submit();
        }

    }else{
        form.submit();
    }
    

}
</script>
 
</body>
</html>

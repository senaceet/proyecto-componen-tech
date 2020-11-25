<?php 
if (isset($_GET['m'])) {
    switch ($_GET['m']) {
        case 1:
            echo "<div class='getMensaje correcto'>Operario insertado correctamente</div>";
            break;
        
        case 2:
            echo "<div class='getMensaje incorrecto'>¡Error al insertar operario!</div>";
            break;
        case 3:
            echo "<div class='getMensaje correcto'>Usuario actualizado</div>";
            break;
        case 4:
            echo "<div class='getMensaje incorrecto'>¡Error al actualizar usuario!</div>";
            break;
    }
}

 ?>

<div class="TablaBD">

    <div class="CabezaHerramientas">
   	    <div class="Herramientas">
           <h1>Tabla Usuarios</h1>
   	  		<ul>
                <ul>
                <li><button>Añadir ➕</button></li>
                <li><button>Buscar 🔎</button></li>
            </ul>  
   	  	</div>	
    </div>
    <!--✖-->
   	<table class="TableroDatos">
        <thead>
            <th>  </th>
            <th>Documento</th>
            <th>Nombres</th>
            <th>Apellidos</th>
            <th>F_Nacimiento</th>
            <th>Edad</th>
            <th>Celular</th>
            <th>Dirección</th>
            <th>Correo</th>
            <th></th>
        </thead>
        <?php
            require_once '../modelo/usuario.php';
            $objUsuario = new Usuario();
            $consulta = $objUsuario->getUsuarios();
            $num = 1;
            while ($usuario = $consulta->fetch_array()) { 
                switch ($usuario['TIPODOCUMENTO_idTipo']) {
                    case 1:
                        $documento = "CC_".$usuario['documento'];
                        break;
                    case 2:
                        $documento = "TI_".$usuario['documento'];
                        break;
                    case 3:
                        $documento = "CE_".$usuario['documento'];
                        break;
                    case 4:
                        $documento = "PA_".$usuario['documento'];
                        break;
                }

        ?>
        <tbody>
            <td><?php echo $num; ?></td>
            <td><?php echo $documento; ?></td>
            <td><?php echo $usuario['nombres']; ?></td>
            <td><?php echo $usuario['apellidos']; ?></td>
            <td><?php echo $usuario['fechaNto']; ?></td>
            <td><?php echo $usuario['edad']; ?></td>
            <td><?php echo $usuario['celular']; ?></td>
            <td><?php echo $usuario['direccion']; ?></td>
            <td><?php echo $usuario['correo']; ?></td>
            <td ><form action="../vista/administracion.php?sec=actForm" method="post">
                <input type="hidden" name="documento" value="<?php echo $usuario['documento'] ?>">
                <input type="submit" value="📝">
            </form></td>
        </tbody>
        <?php $num++; } ?>
        
   	</table>
   	<div class="PieHerramientas">
    </div>
</div>
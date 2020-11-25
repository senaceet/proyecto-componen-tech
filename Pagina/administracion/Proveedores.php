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
           <h1>Tabla Proveedores</h1>
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
            
            <th>id</th>
            <th>Empresa</th>
            <th>Nombre</th>
            <th>Apellido</th>
            <th>Celular</th>
            <th>Telefono</th>
            <th>Estado</th>
            <th></th>
            
            
        </thead>
        <?php
            require_once '../modelo/Proveedor.php';
            $objUsuario = new Proveedor();
            $consulta = $objUsuario->getProveedores();

            while ($usuario = $consulta->fetch_array()){

        ?>
        <tbody>
            
            <td><?php echo $usuario['idProveedor']; ?></td>
            <td><?php echo $usuario['nEmpresa']; ?></td>
            <td><?php echo $usuario['cNombre']; ?></td>
            <td><?php echo $usuario['cApellido']; ?></td>
            <td><?php echo $usuario['cCelular']; ?></td>
            <td><?php echo $usuario['eTelefono']; ?></td>
            <td><?php echo $usuario['estado']; ?></td>
            <td ><form action="../vista/administracion.php?sec=actForm" method="post">
                <input type="hidden" name="idProveedor" value="<?php echo $usuario['idProveedor'] ?>">
                <input type="submit" value="📝">
            </form></td>
        </tbody>
        <?php } ?>
        
   	</table>
   	<div class="PieHerramientas">
    </div>
</div>e
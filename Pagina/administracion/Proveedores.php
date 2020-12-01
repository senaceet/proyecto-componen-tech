<?php 
if (isset($_GET['m'])) {
    switch ($_GET['m']) {
        case 1:
            echo "<div class='getMensaje correcto'>Proveedor insertado correctamente</div>";
            break;
        
        case 2:
            echo "<div class='getMensaje incorrecto'>¡Error al insertar proveedor!</div>";
            break;
        case 3:
            echo "<div class='getMensaje correcto'>Proveedor actualizado</div>";
            break;
        case 4:
            echo "<div class='getMensaje incorrecto'>¡Error al actualizar proveedor!</div>";
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
                <li><button onclick="showForm(document.getElementById('actF_form'))">Añadir ➕</button></li>
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
            <td ><form action="" method="post">
                <input type="hidden" name="idProveedor" value="<?php echo $usuario['idProveedor'] ?>">
                <input type="submit" value="📝">
            </form></td>
        </tbody>
        <?php } ?>
        
   	</table>
   	<div class="PieHerramientas">
    </div>
</div>
<div class="actF_form" id="actF_form" >
    
    <form class="actForm" method="post" action="../controlador/insProveedor.php">
        <button class="cerrarForm" type="button"  onclick="hideForm(document.getElementById('actF_form'))">✖</button>
        <h1>Insertar proveedor</h1>
        <div>
            <p>Nombre de la empresa</p>
            <input name="nEmpresa" maxlength="10" type="text" value="" required>
        </div>
        <div>
            <p>Nombres del contacto</p>
            <input name="cNombre" maxlength="50" type="text" value="" required>
        </div>
        <div>
            <p>Apellidos del contacto</p>
            <input name="cApellido" type="text" maxlength="50" value="" required >
        </div>
        <div>
            <p>Celular del contacto</p>
            <input name="cCelular" type="text" value="" required>
        </div>
        <div>
            <p>Teléfono de la empresa</p>
            <input name="eTelefono" type="text" value="" required>
        </div>
        <input type="hidden" name="idEstado" value="4">
        <input type="submit" class="submitButton" value="Insertar">      
    </form>
    <script>
        function hideForm(e){
                e.style.display="none";            
        }
        function showForm(e){
                e.style.display="flex";            
        }
    </script>
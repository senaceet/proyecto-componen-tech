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
        case 5:
            echo "<div class='getMensaje correcto'>Proveedor eliminado</div>";
            break;
        case 6:
            echo "<div class='getMensaje incorrecto'>¡Error al eliminar proveedor!</div>";
            break;
    }
}

 ?>

<div class="TablaBD">
  
    <div class="CabezaHerramientas">
   	    <div class="Herramientas">
           <h1>Tabla Proveedores</h1>
   	  		<ul>
                <li class="search">
                    <label><input id="search" type="text" placeholder="Buscar"><img onclick="buscarTabla(this.parentElement.querySelector('#search').value)" src="../icons/lupa.svg" alt=""></label></li>
                <li><button onclick="showForm(document.getElementById('actF_form'))">Añadir ➕</button></li>
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
            <th></th>
        </thead>
        <?php
            require_once '../modelo/Proveedor.php';
            $objProv = new Proveedor();
            if (isset($_GET['search'])) {
                $consulta = $objProv->getProveedoresSearch($_GET['search']);
            } else {
                $consulta = $objProv->getProveedores();
            }
            while ($proveedor = $consulta->fetch_array()){

        ?>
        <tbody>
            
            <td><?php echo $proveedor['idProveedor']; ?></td>
            <td><?php echo $proveedor['nEmpresa']; ?></td>
            <td><?php echo $proveedor['cNombre']; ?></td>
            <td><?php echo $proveedor['cApellido']; ?></td>
            <td><?php echo $proveedor['cCelular']; ?></td>
            <td><?php echo $proveedor['eTelefono']; ?></td>
            <td><?php echo $proveedor['estado']; ?></td>
            <td ><form action="" method="post">
                <input type="hidden" name="idProveedor" value="<?php echo $proveedor['idProveedor'] ?>">
                <button type="submit" ><i class="fas fa-edit"></i></button>
            </form></td>
        </tbody>
        <?php } ?>
        
   	</table>

   	<div class="PieHerramientas">
    </div>
</div>


<?php if (isset($_POST['idProveedor'])): 
    $objProv2 = new Proveedor();
    $cons = $objProv2->getProveedor($_POST['idProveedor']);
    ?>
    <div class="actF_form" style="display:flex" id="actF_form" >
        <form class="actForm" method="post" action="../controlador/updProv.php">
            <input type="hidden" name="idProv" value="<?php echo $cons['idProveedor'] ?>">
            <button class="cerrarForm" type="button"  onclick="hideForm(document.getElementById('actF_form'))">✖</button>
            <h1>Actualizar proveedor</h1>
            <div>
                <p>Nombre de la empresa</p>
                <input name="nEmpresa" maxlength="50" type="text" value="<?php echo $cons['nEmpresa'] ?>" required>
            </div>
            <div>
                <p>Nombres del contacto</p>
                <input name="cNombre" maxlength="50" type="text" value="<?php echo $cons['cNombre'] ?>" required>
            </div>
            <div>
                <p>Apellidos del contacto</p>
                <input name="cApellido" type="text" maxlength="50" value="<?php echo $cons['cApellido'] ?>" required >
            </div>
            <div>
                <p>Celular del contacto</p>
                <input name="cCelular" type="text" value="<?php echo $cons['cCelular'] ?>" required>
            </div>
            <div>
                <p>Teléfono de la empresa</p>
                <input name="eTelefono" type="text" value="<?php echo $cons['eTelefono'] ?>" required>
            </div>
            <div>
                <p>Estado</p>
                <select name="estado"> 
                <?php if ($cons['ESTADO_idEstado'] == 4): ?>
                    <option value="4">Proveedor activo</option>
                    <option value="5">Proveedor inactivo</option>
                <?php else: ?>
                    <option value="5">Proveedor inactivo</option>
                    <option value="4">Proveedor activo</option>
                <?php endif; ?>
                    
                </select>
            </div>
                <input type="button" onclick="verifInput(this.form)" class="submitButton" value="Actualizar">
            </div>
        </form>
    </div>

<?php endif; ?>

<div class="actF_form" id="actF_form" >
    
    <form class="actForm" method="post" action="../controlador/insProveedor.php">
        <button class="cerrarForm" type="button"  onclick="hideForm(document.getElementById('actF_form'))">✖</button>
        <h1>Insertar proveedor</h1>
        <div>
            <p>Nombre de la empresa</p>
            <input name="nEmpresa" maxlength="50" type="text" value="" required>
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
        <input type="button" onclick="verifInput(this.form)" class="submitButton" value="Insertar">      
    </form>
    <script>
        var search = document.getElementById('search');
        search.addEventListener('keydown',(e)=>{
            if (e.key=='Enter') {
                buscarTabla(search.value);
            }
        })
        function hideForm(e){
                e.style.display="none";            
        }
        function showForm(e){
                e.style.display="flex";          
        }
        function buscarTabla(e){
            location.href = 'administracion.php?sec=proveedores&search='+e;
        }
    </script>
</div>
<?php 
if (isset($_GET['m'])) {
    switch ($_GET['m']) {
        case 1:
            echo "<div class='getMensaje correcto'>Cliente insertado correctamente</div>";
            break;
        
        case 2:
            echo "<div class='getMensaje incorrecto'>¡Error al insertar cliente!</div>";
            break;
        case 3:
            echo "<div class='getMensaje correcto'>Usuario actualizado</div>";
            break;
        case 4:
            echo "<div class='getMensaje incorrecto'>¡Error al actualizar usuario!</div>";
            break;
        case 5:
            echo "<div class='getMensaje incorrecto'>¡Error al validar la contraseña!</div>";
            break;
        case 6:
            echo "<div class='getMensaje incorrecto'>El usuario ya está registrado.</div>";
            break;
        case 7:
            echo "<div class='getMensaje incorrecto'>Este correo ya está en uso.</div>";
            break;      
    }
}
 ?>

<div class="TablaBD">

    <div class="CabezaHerramientas">
   	    <div class="Herramientas">
           <h1>Tabla clientes</h1>
   	  		<ul>
                <li class="search">
                    <label><input id="search" type="text" placeholder="Buscar"><img onclick="buscarTabla(this.parentElement.querySelector('#search').value)" src="../icons/lupa.svg" alt=""></label></li>
                <li><button onclick="showForm(document.getElementById('actF_form'))">Añadir <i class="fas fa-plus"></i></button></li>
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
            <th></th>
        </thead>
        <?php
            require_once '../modelo/Cliente.php';
            $objCliente = new Cliente();

            $limitpage = 8;
            $page = 1;
            if(isset($_GET["page"]) && $_GET["page"]!=""){ $page=$_GET["page"]; }
            $startpage = 0;
            $endpage = $limitpage;
            if($page>1){ 
                $startpage=($page-1)*$limitpage;
            }
  
            $count = $objCliente->getClientesCantidad();
            $npages = $count/$limitpage;
            if (isset($_GET['search'])) {
                $consulta = $objCliente->getClientesBusqueda($_GET['search'],$startpage,$endpage);
            } else {
                $consulta = $objCliente->getClientes($startpage,$endpage);
            }
            if ($consulta->num_rows == 0) {
                echo "<tr><td colspan='100%'><center>Sin resultados</center></td></tr>";
            } 
            $num = $startpage+1;
            while ($cliente = $consulta->fetch_array()) { 
                switch ($cliente['TIPODOCUMENTO_idTipo']) {
                    case 1:
                        $documento = "CC_".$cliente['documento'];
                        break;
                    case 2:
                        $documento = "TI_".$cliente['documento'];
                        break;
                    case 3:
                        $documento = "CE_".$cliente['documento'];
                        break;
                    case 4:
                        $documento = "PA_".$cliente['documento'];
                        break;
                }

        ?>

        <tbody>
            <td><?php echo $num; ?></td>
            <td><?php echo $documento; ?></td>
            <td><?php echo $cliente['nombres']; ?></td>
            <td><?php echo $cliente['apellidos']; ?></td>
            <td><?php echo $cliente['fechaNto']; ?></td>
            <td><?php echo $cliente['edad']; ?></td>
            <td><?php echo $cliente['celular']; ?></td>
            <td><?php echo $cliente['direccion']; ?></td>
            <td><?php echo $cliente['correo']; ?></td>
            <td ><form action="../vista/administracion.php?sec=actForm&tabla=cliente" method="post">
                <input type="hidden" name="documento" value="<?php echo $cliente['documento'] ?>">
                <button type="submit" ><i class="fas fa-edit"></i></button>
            </form></td>
            <td><button><i class="far fa-trash-alt"></i></button></td>
        </tbody>
        <?php $num++; } ?>
        
   	</table>
    <?php if ($count>$limitpage): ?>
   	<div class="paginas">
        <ul>
            <?php if ($page>1): ?>
                <li><a href="<?php echo $_SERVER['PHP_SELF'].'?page='.($page-1); ?>">&laquo;</a></li>
            <?php endif ?>

            
            <?php for ($i=1;$i<$npages+1;$i+=1): ?>
                 <li><a href="<?php echo $_SERVER['PHP_SELF'].'?page='.$i; ?>"><?php echo $i; ?></a></li>
            <?php endfor ?>

            <?php if ($page<$npages): ?>
                <li><a href="<?php echo $_SERVER['PHP_SELF'].'?page='.($page+1); ?>">&raquo;</a></li>
            <?php endif ?>

        </ul>
    </div>
    <?php endif ?>


    

    
</div>
<div class="actF_form" id="actF_form" >
    
    <form class="actForm" method="post" action="../controlador/InsUsuario.php">
    <button class="cerrarForm" type="button"  onclick="hideForm(document.getElementById('actF_form'))">✖</button>
        <h1>Insertar cliente</h1>
        
        <div>
            <p>Numero de documento</p>
            <input name="documento" maxlength="10" type="text" value="" required>
        </div>
        <div>
            <p>Nombres</p>
            <input name="nombres" maxlength="50" type="text" value="" required>
        </div>
        <div>
            <p>Apellidos</p>
            <input name="apellidos" type="text" maxlength="50" value="" required>
        </div>
        <div>
            <p>Fecha de nacimiento</p>
            <input name="fechaNto" type="date" value="" required>
        </div>
        <div>
            <p>Edad</p>
            <input name="edad" type="text" value="" required>
        </div>
        <div>
            <p>Numero celular</p>
            <input name="celular" type="text" value="" required>
        </div>
        <div>
            <p>Direccion de residencia</p>
            <input name="direccion" type="text" value="" required>  
        </div>
        <div>
            <p>Correo electrónico</p>
            <input name="correo" type="text" value="" required>
        </div>
        <div>
            <p>Contraseña</p>
            <input name="password" type="text" value="" required>
        </div>
        <div>
            <p>Confirmar contraseña</p>
            <input name="password2" type="text" value="" required>
        </div>
        <input type="hidden" name="idCargo" value="3">
        <input type="hidden" name="idEstado" value="9">
        <input type="hidden" name="tabla" value="clientes">
        <input type="submit" class="submitButton" value="Registrar">      
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
            location.href = 'administracion.php?sec=clientes&search='+e;
        }
    </script>
</div>
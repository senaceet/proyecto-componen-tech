<?php 
if (isset($_GET['m'])) {
    switch ($_GET['m']) {
        case 1:
            echo "<div class='getMensaje correcto'>Operador insertado correctamente</div>";
            break;
        
        case 2:
            echo "<div class='getMensaje incorrecto'>¡Error al insertar operador!</div>";
            break;
        case 3:
            echo "<div class='getMensaje correcto'>operador actualizado</div>";
            break;
        case 4:
            echo "<div class='getMensaje incorrecto'>¡Error al actualizar operador!</div>";
            break;
        case 5:
            echo "<div class='getMensaje incorrecto'>¡Error al validar la contraseña!</div>";
            break;
        case 6:
            echo "<div class='getMensaje incorrecto'>El operador ya está registrado.</div>";
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
           <h1>Tabla Operadores</h1>
   	  		<ul>
                <li class="search">
                    <label><input id="search" type="text" placeholder="Buscar"><i class="fas fa-search" onclick="buscarTabla(this.parentElement.querySelector('#search').value)"></i></label></li>
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
            require_once '../modelo/Operador.php';
            $objOperador = new Operador();
            $limitpage = 8;
            $page = 1;
            if(isset($_GET["page"]) && $_GET["page"]!=""){ $page=$_GET["page"]; }
            $startpage = 0;
            $endpage = $limitpage;
            if($page>1){ 
                $startpage=($page-1)*$limitpage;
            }
  
            $count = $objOperador->getOperadoresCantidad();
            $npages = $count/$limitpage;
            if (isset($_GET['search'])) {
                $consulta = $objOperador->getOperadoresBusqueda($_GET['search']);
            } else {
                $consulta = $objOperador->getOperadores($startpage,$endpage);
            }
            if ($consulta->num_rows == 0) {
                echo "<tr><td colspan='100%'><center>Sin resultados</center></td></tr>";
            } 
            $num = $startpage+1;

            while ($operador = $consulta->fetch_array()) { 
                switch ($operador['TIPODOCUMENTO_idTipo']) {
                    case 1:
                        $documento = "CC_".$operador['documento'];
                        break;
                    case 2:
                        $documento = "TI_".$operador['documento'];
                        break;
                    case 3:
                        $documento = "CE_".$operador['documento'];
                        break;
                    case 4:
                        $documento = "PA_".$operador['documento'];
                        break;
                }

        ?>
        <tbody>
            <td><?php echo $num; ?></td>
            <td><?php echo $documento; ?></td>
            <td><?php echo $operador['nombres']; ?></td>
            <td><?php echo $operador['apellidos']; ?></td>
            <td><?php echo $operador['fechaNto']; ?></td>
            <td><?php echo $operador['edad']; ?></td>
            <td><?php echo $operador['celular']; ?></td>
            <td><?php echo $operador['direccion']; ?></td>
            <td><?php echo $operador['correo']; ?></td>
            <td ><form action="../vista/administracion.php?sec=actForm&tabla=operador" method="post">
                <input type="hidden" name="documento" value="<?php echo $operador['documento'] ?>">
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
                <li><a href="<?php echo $_SERVER['PHP_SELF'].'?sec=operadores'.'&page='.($page-1); ?>">&laquo;</a></li>
            <?php endif ?>

            
            <?php for ($i=1;$i<$npages+1;$i+=1): ?>
                 <li><a href="<?php echo $_SERVER['PHP_SELF'].'?sec=operadores'.'&page='.$i; ?>"><?php echo $i; ?></a></li>
            <?php endfor ?>

            <?php if ($page<$npages): ?>
                <li><a href="<?php echo $_SERVER['PHP_SELF'].'?sec=operadores'.'&page='.($page+1); ?>">&raquo;</a></li>
            <?php endif ?>

        </ul>
    </div>
    <?php endif ?>
</div>

<div class="actF_form" id="actF_form" >
    
    <form class="actForm" method="post" action="../controlador/insUsuario.php">
    <button class="cerrarForm" type="button"  onclick="hideForm(document.getElementById('actF_form'))">✖</button>
        <h1>Insertar operador</h1>

        <div>
            <p>Numero de documento</p>
            <select name="idTipo" required>
                <option value="" disabled selected>-- Seleccione tipo de documento</option>
                <option value="1">Cédula</option>
                <option value="2">Targeta de identidad</option>
                <option value="3">Cédula de extranjeria</option>
                <option value="4">Pasaporte</option>
            </select>
        </div>
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
        <input type="hidden" name="idCargo" value="2">
        <input type="hidden" name="idEstado" value="9">
        <input type="hidden" name="tabla" value="operadores">
        <input type="button" onclick="verifInput(this.form)" class="submitButton" value="Registrar">      
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
            location.href = 'administracion.php?sec=Operadores&search='+e;
        }
    </script>
</div>

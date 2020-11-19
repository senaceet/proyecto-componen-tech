
<div class="TablaBD">
    <div class="CabezaHerramientas">
   	  	
   	    <div class="Herramientas">
   	  		<ul>
   	  		    <li>
   	  		    	<button>
   	  		    		<i class="material-icons">Añadir ➕</i>
   	  		    	</button>
   	  		    </li>
   	  		    <li>
   	  				<button>
   	  	    			<i class="material-icons">Editar 📝</i>
   	  	    		</button>
   		    	</li>
   	  		    <li>
   	  				<li>
   	  	    		<button>
   	  	    			<i class="material-icons">Eliminar ✖</i>
   			    	</button>
  		    	</li>
   	  		    <li>
   	  		    	<button>
   	  		    		<i class="material-icons">Buscar 🔎</i>
   	  		    	</button>
   	  		    </li>
   	  		</ul>    
   	  	</div>	
    </div>
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
        </thead>
        <?php
            require_once 'modelo/usuario.php';
            $objUsuario = new Usuario();
            $consulta = $objUsuario->getUsuarios();
            $num = 1;
            while ($usuario = $consulta->fetch_array()) { ?>
        <tbody>
            <td><?php echo $num; ?></td>
            <td><?php echo $usuario['documento']; ?></td>
            <td><?php echo $usuario['nombres']; ?></td>
            <td><?php echo $usuario['apellidos']; ?></td>
            <td><?php echo $usuario['fechaNto']; ?></td>
            <td><?php echo $usuario['edad']; ?></td>
            <td><?php echo $usuario['celular']; ?></td>
            <td><?php echo $usuario['direccion']; ?></td>
            <td><?php echo $usuario['correo']; ?></td>
        </tbody>
        <?php $num++; } ?>
        
   	</table>
   	<div class="PieHerramientas">
    </div>
</div>
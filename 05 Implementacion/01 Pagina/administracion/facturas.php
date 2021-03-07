<div class="TablaBD">
	<div class="CabezaHerramientas">
   	    <div class="Herramientas">
   	    	<h1>Facturas</h1>
   	    	<ul>
                <li class="search">
                    <label><input id="search" type="text" placeholder="Buscar"><i class="fas fa-search" onclick="buscarTabla(this.parentElement.querySelector('#search').value)"></i></label>
                </li>
            </ul> 
   	    </div>
   	 </div>

   	 <table class="TableroDatos">
        <thead>
            <th>  </th>
            <th>ID</th>
            <th>Fecha</th>
            <th>Subtotal</th>
            <th>Total</th>
            <th>Tipo de pago</th>
            <th>Usuario</th>
            <th>Estado</th>
            <th></th>
        </thead>
        <?php
            require_once '../modelo/Factura.php';
            $objFactura = new Factura();

            $limitpage = 8;
            $page = 1;
            if(isset($_GET["page"]) && $_GET["page"]!=""){ $page=$_GET["page"]; }
            $startpage = 0;
            $endpage = $limitpage;
            if($page>1){ 
                $startpage=($page-1)*$limitpage;
            }
  
            $count = $objFactura->getFacturasCantidad();
            $npages = $count/$limitpage;
            if (isset($_GET['search'])) {
                $consulta = $objFactura->getFacturasBusqueda($_GET['search']);
            } else {
                $consulta = $objFactura->getFacturas($startpage,$endpage);
            }
            if ($consulta->num_rows == 0) {
                echo "<tr><td colspan='100%'><center>Sin resultados</center></td></tr>";
            } 
            $num = $startpage+1;
            while ($factura = $consulta->fetch_array()) { 
                switch ($factura['TIPODOCUMENTO_idTipo']) {
                    case 1:
                        $documento = "CC_".$factura['documento'];
                        break;
                    case 2:
                        $documento = "TI_".$factura['documento'];
                        break;
                    case 3:
                        $documento = "CE_".$factura['documento'];
                        break;
                    case 4:
                        $documento = "PA_".$factura['documento'];
                        break;
                }

        ?>

        <tbody>
            <td><?php echo $num; ?></td>
            <td><?php echo $factura['idFactura']; ?></td>
            <td><?php echo $factura['fecha']; ?></td>
            <td><?php echo "$".number_format($factura['subtotal'],0,",",".")?> </td>
            <td><?php echo "$".number_format($factura['total'],0,",",".")?></td>
            <td><?php echo $factura['tipo']; ?></td>
            <td><a href="../vista/administracion.php?sec=clientes&search=<?php echo$factura['documento'] ?>"><?php echo $documento; ?></a></td>
            <td><?php echo $factura['estado']; ?></td>
            <td>
            	<form action="../vista/administracion.php?sec=facturas" method="post">
                	<input type="hidden" name="idFac" value="<?php echo $factura['idFactura'] ?>">
                	<button type="submit">
                        <i class="fas fa-info-circle"></i>
                    </button>
            	</form>
        	</td>
            
        </tbody>
        <?php $num++; } ?>
        
   	</table>
	
	<?php if ($count>$limitpage): ?>
   	<div class="paginas" >	
        <ul>
            <?php if ($page>1): ?>
                <li><a href="<?php echo $_SERVER['PHP_SELF'].'?sec=facturas&page='.($page-1); ?>">&laquo;</a></li>
            <?php endif ?>

            
            <?php for ($i=1;$i<$npages+1;$i+=1): ?>
                 <li><a href="<?php echo $_SERVER['PHP_SELF'].'?sec=facturas&page='.$i; ?>"><?php echo $i; ?></a></li>
            <?php endfor ?>

            <?php if ($page<$npages): ?>
                <li><a href="<?php echo $_SERVER['PHP_SELF'].'?sec=facturas&page='.($page+1); ?>">&raquo;</a></li>
            <?php endif ?>

        </ul>
    </div>
    <?php endif ?>

</div>

<?php if (isset($_POST['idFac'])): 
	$id=$_POST['idFac']; 
	require_once '../modelo/Detalles.php';
	$objDetalles = new Detalles();
	$conDetalles = $objDetalles->getDetallesFactura($id); 

	$actualFac = $objFactura->getFactura($id);
	$usuarioFacId = $actualFac->fetch_array()['USUARIO_documento'];


	require_once '../modelo/Usuario.php';
	$objUsuario = new Usuario();
	$usuarioFac = $objUsuario->getUsuario($usuarioFacId,1);
	$usuarioFac = $usuarioFac->fetch_array();
?>

<div class="actF_form" id="divDetalles" style="display: flex; position: fixed;">
	<div class="close" style="position: absolute; width: 100%;height: 100%;" onclick="document.querySelector('#divDetalles').style.display='none'"></div>
	<div style="width: 90%" class="actForm">
		<h1>Detalles de la factura #<?php echo $id; ?></h1>
		<table style="margin-bottom: 20px">
			<thead>
				<th>Nombre</th>
				<th>Documento</th>
				<th>Dirección</th>
				<th>Correo</th>
			</thead>
			<tbody>
				<td><?php echo $usuarioFac['nombres']; ?></td>
				<td><?php echo $usuarioFac['documento']; ?></td>
				<td><?php echo $usuarioFac['direccion']; ?></td>
				<td><?php echo $usuarioFac['correo']; ?></td>
			</tbody>
		</table>
		<table class="tablaDetalles">
			<thead>
				<th>Producto</th>
				<th>Precio unitario</th>
				<th>Cantidad</th>
				<th>Total</th>
			</thead>
		<?php while($detalle = $conDetalles->fetch_array()): ?>
			<tbody>
				<td><?php echo $detalle['productoNombre'];  ?></td>
				<td><?php echo "$".number_format($detalle['precio'],0,",",".")?></td>
				<td><?php echo $detalle['cantidad'];  ?></td>
				<td><?php echo "$".number_format($detalle['totalCantidad'],0,",",".")?></td>
				
			</tbody>			
		<?php endwhile ?>
		</table>
	</div>
	
</div>
	
<?php endif ?>
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
            location.href = 'administracion.php?sec=facturas&search='+e;
        }
</script>


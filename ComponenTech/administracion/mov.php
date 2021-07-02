<table class="TableroDatos" >
    
<thead>
    <th>  </th>
    <th>Fecha</th>
    <th>Cantidad</th>
    <th>Tipo</th>
    <th>Producto</th>
    <th>Factura</th>
</thead>
<?php
require_once '../modelo/Movimiento.php';
$objMov = new Movimiento();



$limitpage = 15;
$page = 1;
if(isset($_POST["page"]) && $_POST["page"]!=""){ $page=$_POST["page"]; }
$startpage = 0;
$endpage = $limitpage;
if($page>1){ 
    $startpage=($page-1)*$limitpage;
}

$count = $objMov->getMovCantidad();

$npages = $count/$limitpage;

$reg= $startpage+1;

$consultamov = $objMov->getMovimientos($startpage,$endpage);
if(isset($_POST['desde'])){
   $consultamov = $objMov->getMovFecha($_POST['desde'],$_POST['hasta'],$startpage,$endpage);
}

while ($mov = $consultamov->fetch_array()) { 
?>

<tbody>
    <td><?php echo $reg; ?></td>
    <td><?php echo str_replace("-"," / ",$mov['fecha']); ?></td>
    <td><?php echo $mov['cantidad']; ?></td>
    <td><?php echo $mov['tipo']; ?></td>
    <td><?php echo $mov['producto']; ?></td>
    <td title="alb"><?php if ($mov['factura'] == null) {
        echo "Ninguna";
    } else {
        echo $mov['factura']; 
    }?></td>
</tbody>
<?php $reg++; } ?>
</table>
<?php if ($count>$limitpage):  ?>
    <div class="paginas">
        <ul>
            <?php if ($page>1): ?>
                <li><a href="../vista/administracion.php?sec=movimientos&page=<?php echo ($page-1); ?>">&laquo;</a></li>
            <?php endif ?>

            
            <?php for ($i=1;$i<$npages+1;$i+=1): ?>
                 <li><a href="../vista/administracion.php?sec=movimientos&page=<?php echo $i; ?>"><?php echo $i; ?></a></li>
            <?php endfor ?>

            <?php if ($page<$npages): ?>
                <li><a href="../vista/administracion.php?sec=movimientos&page=<?php echo ($page+1); ?>">&raquo;</a></li>
            <?php endif ?>

        </ul>
    </div>
    <?php endif ?>
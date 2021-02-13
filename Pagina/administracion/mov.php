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
$num = 1;
$consultamov = $objMov->getMovimientos();
if(isset($_POST['desde'])){
   $consultamov = $objMov->getMovFecha($_POST['desde'],$_POST['hasta']);
}

while ($mov = $consultamov->fetch_array()) { 
?>

<tbody>
    <td><?php echo $num; ?></td>
    <td><?php echo str_replace("-"," / ",$mov['fecha']); ?></td>
    <td><?php echo $mov['cantidad']; ?></td>
    <td><?php echo $mov['tipo']; ?></td>
    <td><?php echo $mov['producto']; ?></td>
    <td><?php echo $mov['factura']; ?></td>
</tbody>
<?php $num++; } ?>
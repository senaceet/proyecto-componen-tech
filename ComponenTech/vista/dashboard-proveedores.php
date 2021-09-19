<!DOCTYPE html>
<html lang="en">
<?php 

session_start();
if (!$_SESSION['user']) {
	header('location:principal.php');
}
if ($_SESSION['user']->CARGO_idCargo==3) {
	header('location:principal.php');
}

?>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="shortcut icon" href="../img/logo.png" type="image/x-icon">
    <link rel="stylesheet" href="admin/styles.css">
    <link rel="stylesheet" href="admin/form.css">
    <script src="https://kit.fontawesome.com/0b32f2b0be.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administración</title>
</head>
<body class="dashboard">
    <input type="checkbox" id="toggleMenu">
    <label for="toggleMenu" class="close-menu"></label>
    <div class="menu">
        
        <a href="principal.php" class="menu-head">
            <div class="logo"><img src="../img/logo.png" alt="ComponenTech"></div>
            <h1>ComponenTech</h1>
        </a>
        <div class="items">
            <a href="dashboard.php" class="item">
                <img src="icons/dashboard.svg" alt="#">
                <p>Dashboard</p>
            </a>

            <?php if($_SESSION['user']->CARGO_idCargo == 1): ?>  
                <a href="dashboard-clientes.php" class="item">
                    <img src="icons/users.svg" alt="#">
                    <p>Clientes</p>
                </a>
            <?php endif ?>  

            <a href="dashboard-productos.php" class="item">
                <img src="icons/store.svg" alt="#">
                <p>Productos</p>
            </a>
            <a href="dashboard-inventario.php" class="item">
                <img src="icons/inventory.svg" alt="#">
                <p>Inventario</p>
            </a>
            <a href="dashboard-proveedores.php" class="item actual">
                <img src="icons/business.svg" alt="#">
                <p>Proveedores</p>
            </a>

            <?php if($_SESSION['user']->CARGO_idCargo == 1): ?> 
                <a href="dashboard-operadores.php" class="item">
                    <img src="icons/admin.svg" alt="#">
                    <p>Operadores</p>
                </a>
            <?php endif ?>  

            <a href="dashboard-movimientos.php" class="item">
                <img src="icons/move.svg" alt="#">
                <p>Movimientos</p>
            </a>
            <a href="dashboard-facturas.php" class="item">
                <img src="icons/factura.svg" alt="#">
                <p>Facturas</p>
            </a>
        </div>
    </div> 
    <div class="contenido">
        <header>
            
            <div class="section">
                <label for="toggleMenu"><img src="icons/menu.svg" alt="#"></label>
                
                <h1>Proveedores</h1>
            </div>
            <div class="search-box">
                <img src="icons/search.svg" alt="#">
                <input id="proveedoresSearch" on size="26" type="text" placeholder="Buscar">
            </div>
            <div class="user">
                <p><?php echo $_SESSION['user']->nombres ?></p>
                <p><?php echo $_SESSION['user']->cargo ?></p>
            </div>
        </header>
        
        <div class="contenedor">
            <div class="tabla-datos">
                <h1>
                    <div class="rows">
                        Filas: <select onchange="getProveedoresLimit(this.value,0)">
                            <option value="5">5</option>
                            <option selected value="10">10</option>
                            <option value="20">20</option>
                        </select>
                    </div>
                    <select onchange="getProveedoresEstado(this.value,0)">
                        <option selected value="0">Todos</option>
                        <option value="4">Proveedores activo</option>
                        <option value="5">Proveedores inactivos</option>
                    </select>
                    <button 
                        onclick="document.querySelector('#insertForm').style.display='flex'">
                        Agregar +
                    </button>
                </h1>
                <table>
                    <thead>
                        <tr>
                            <td></td>
                            <td>Empresa</td>
                            <td>Teléfono</td>
                            <td>Contacto</td>
                            <td>Celular</td>
                            <td>Estado</td>
                            <td>Acciones</td>
                        </tr>
                    </thead>
                    <tbody id="proveedores"></tbody>
                </table>
                <div class="table-nav">
                    <div class="cantidad">
                        <span id="desde">0</span> - <span id="hasta">0</span> de <span id="cantidad">0</span>
                    </div>
                    <div class="nav-buttons">
                        <img onclick="first()" id="tableFirst" src="icons/table-first.svg" alt="first">
                        <img onclick="back()" id="tableBack" src="icons/table-back.svg" alt="back">
                        <img onclick="next()" id="tableNext" src="icons/table-next.svg" alt="next">
                        <img onclick="last()" id="tableLast" src="icons/table-last.svg" alt="last">
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div id="insertForm" class="floating">
        <div onclick="this.parentElement.style.display='none'" class="close-floating"></div>
        <form onsubmit="addProveedor(event)" class="form">
            <h1>Agregar proveedor</h1>
            <div class="inputs">
                <div  class="input">
                    <p>Empresa</p>
                    <input required maxlength="10" name="nEmpresa" type="text">
                </div>
                <div class="input">
                    <p>Telefono empresa</p>
                    <input required maxlength="30" name="eTelefono" type="text">
                </div>
                <div class="input">
                    <p>Nombre del contacto</p>
                    <input required maxlength="30" name="cNombre" type="text">
                </div>
                <div class="input">
                    <p>Apellido del contacto</p>
                    <input required maxlength="30" name="cApellido" type="text">
                </div> 
                <div class="input">
                    <p>Celular del contacto</p>
                    <input required name="cCelular" type="text">
                </div>
            </div>
            <button type="submit">Agregar</button>
        </form>
    </div>

    <div id="editForm" class="floating">
        <div onclick="this.parentElement.style.display='none'" class="close-floating"></div>
        <form onsubmit="modUser(event)" class="form">
            <h1>Modificar proveedor</h1>
            <input type="hidden" name="idProveedor">
            <div class="inputs">
                <div  class="input">
                    <p>Empresa</p>
                    <input required maxlength="10" name="nEmpresa" type="text">
                </div>
                <div class="input">
                    <p>Telefono empresa</p>
                    <input required maxlength="30" name="eTelefono" type="text">
                </div>
                <div class="input">
                    <p>Nombre del contacto</p>
                    <input required maxlength="30" name="cNombre" type="text">
                </div>
                <div class="input">
                    <p>Apellido del contacto</p>
                    <input required maxlength="30" name="cApellido" type="text">
                </div> 
                <div class="input">
                    <p>Celular del contacto</p>
                    <input required name="cCelular" type="text">
                </div>
            </div>
            <button type="submit">Modificar</button>
        </form>
    </div>



    <!-- <div  class="reporteFlotante">
        <div>
            <h1>Reporte de Compras</h1>
            <table>
                <thead>
                    <tr class="tableHead">
                        <td>Producto</td>
                        <td>Cantidad</td>
                        <td>Fecha</td>
                        <td>Precio</td>
                    </tr> 
                </thead>
            
                <tbody id="reporte">

                </tbody>
            </table>
            
            <p align="right" class="pReportePrecio" >Total: <span id="reporteTotal"></span> </p>
        </div>
    </div> -->

     
    


</body><script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script src="admin/proveedores.js"></script>
</html>
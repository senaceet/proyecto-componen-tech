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
            <a href="dashboard-clientes.php" class="item">
                <img src="icons/users.svg" alt="#">
                <p>Clientes</p>
            </a>
            <a href="#" class="item actual">
                <img src="icons/store.svg" alt="#">
                <p>Productos</p>
            </a>
            <a href="#productos" class="item">
                <img src="icons/inventory.svg" alt="#">
                <p>Inventario</p>
            </a>
            <a href="#productos" class="item">
                <img src="icons/business.svg" alt="#">
                <p>Proveedores</p>
            </a>
            <a href="#productos" class="item">
                <img src="icons/admin.svg" alt="#">
                <p>Operadores</p>
            </a>
            <a href="#productos" class="item">
                <img src="icons/move.svg" alt="#">
                <p>Movimientos</p>
            </a>
        </div>
    </div> 
    <div class="contenido">
        <header>
            
            <div class="section">
                <label for="toggleMenu"><img src="icons/menu.svg" alt="#"></label>
                
                <h1>Productos</h1>
            </div>
            <div class="search-box">
                <img src="icons/search.svg" alt="#">
                <input id="productoSearch" size="26" type="text" placeholder="Buscar">
            </div>
            <div class="user">
                <p><?php echo $_SESSION['user']->nombres ?></p>
                <p>*Administrador</p>
            </div>
        </header>
        
        <div class="contenedor">
            <div class="tabla-datos">
                <h1>
                    <div class="rows">
                        Filas: <select onchange="getProductoLimit(this.value,0)">
                            <option value="5">5</option>
                            <option selected value="10">10</option>
                            <option value="20">20</option>
                        </select>
                    </div>
                    <select onchange="getProductoEstado(this.value,0)">
                        <option value="0">Todos</option>
                        <option value="1">Producto en venta</option>
                        <option value="2">Producto agotado</option>
                    </select>
                    <select id="categorias" onchange="getProductoCategoria(this.value,0)">
                        <option value="0" >Todas</option>
                    </select>
                    <button 
                        onclick="document.querySelector('#insertForm').style.display='flex'">
                        Agregar +
                    </button>
                </h1>
                <div id="productos">
                </div>

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

    <div class="floating" id="insertForm">
        <div onclick="this.parentElement.style.display='none'" class="close-floating"></div>
        <form onsubmit="addProducto(event)" enctype="multipart/form-data" class="form">
            <h1>Crear producto</h1>
            <div class="producto-form">
                <input name="foto" onchange="setImg(event)" accept="image/png, image/jpeg, image/gif" style="display:none" type="file" id="foto">
                <label style="cursor:pointer" for="foto">
                    <div class="img">
                        <img src="icons/placeholder.jpg" alt="">
                    </div>
                </label>
                <div>
                    <input name="producto"  type="text" placeholder="Producto">
                    <select name="categoria" id="categoriasForm">
                        <option value="" selected disabled>-- Categoria --</option>
                    </select>
                    <input name="precio" type="text" placeholder="Precio">
                    <select name="proveedor" id="proveedoresForm">
                        <option value="" selected disabled>-- Proveedor --</option>
                    </select>
                    <textarea placeholder="Descripción" rows="5" name="detalles" ></textarea>
                </div>
            </div>
            <button type="submit">Agregar</button>
        </form>
    </div>

</body>
<script src="admin/productos.js"></script>
</html>
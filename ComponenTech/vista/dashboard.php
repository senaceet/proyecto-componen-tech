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
            <a href="#" class="item actual">
                <img src="icons/dashboard.svg" alt="#">
                <p>Dashboard</p>
            </a>
            <a href="dashboard-clientes.php" class="item">
                <img src="icons/users.svg" alt="#">
                <p>Clientes</p>
            </a>
            <a href="dashboard-productos.php" class="item">
                <img src="icons/store.svg" alt="#">
                <p>Productos</p>
            </a>
            <a href="#productos" class="item">
                <img src="icons/inventory.svg" alt="#">
                <p>Inventario</p>
            </a>
        </div>
    </div> 
    <div class="contenido">
        <header>
            
            <div class="section">
                <label for="toggleMenu"><img src="icons/menu.svg" alt="#"></label>
                
                <h1>Dashboard</h1>
            </div>
            <div class="search-box">
                <img src="icons/search.svg" alt="#">
                <input size="26" type="text" placeholder="Buscar">
            </div>
            <div class="user">
                <p><?php echo $_SESSION['user']->nombres ?></p>
                <p><?php echo $_SESSION['user']->cargo ?></p>
            </div>
        </header>
        <div class="cards">
            <div class="card">
                <h2><span id="numClientes">0</span><img src="icons/users.svg" alt="#"></h2>
                <p>Clientes</p>
            </div>
            <div class="card">
                <h2><span id="numProductos">0</span><img src="icons/sell.svg" alt="#"></h2>
                <p>Productos</p>
            </div>
            <div class="card">
                <h2><span id="numVentas">0</span><img src="icons/store.svg" alt="#"></h2>
                <p>Ventas</p>
            </div>
            <div class="card">
                <h2><span id="numProveedores">0</span><img src="icons/business.svg" alt="#"></h2>
                <p>Proveedores</p>
            </div>
        </div>
        <div class="contenedor resumen">
            <div class="clientes-resumen">
                <h1><span>Clientes recientes</span><a href="dashboard-clientes.php">Ver todos ►</a></h1>
                <table>
                    <thead>
                        <tr>
                            <td>Nombre</td>
                            <td>Correo</td>
                            <td>Edad</td>
                        </tr>
                    </thead>
                    <tbody id="clientes"></tbody>
                </table>
            </div>
            
            <div class="productos-resumen">
                <h1><span>Productos recientes</span><a href="dashboard-productos.php">Ver todos ►</a></h1>
                <div id="productos"></div>
            </div>
            
        </div>
    </div>
</body>
<script>
    const clientes = document.querySelector('#clientes')
    const productos = document.querySelector('#productos')
    async function getUsers(){
        clientes.innerHTML = '<div class="loading"><div class="spinner"></div></div>'
        let res = await fetch("../json/dashboard.php?lista=clientes")
        res.json()
        
        .then(res => {
            clientes.innerHTML = ''
            res.data.forEach(e => 
                clientes.innerHTML+=`<tr>
                    <td>${e.nombres} ${e.apellidos}</td>
                    <td>${e.correo}</td>
                    <td>${e.edad}</td>
                </tr>`
            )
        })
    }
    getUsers()

    async function getProductos(){
        productos.innerHTML = '<div class="loading"><div class="spinner"></div></div>'
        let res = await fetch("../json/dashboard.php?lista=productos")
        res.json()
        .then(res => {
            productos.innerHTML = ''
            let dollarUS = Intl.NumberFormat("es-CO", {
                style: "currency",
                currency: "COP",
                minimumFractionDigits:0
            });
            res.forEach(e => 
                productos.innerHTML+=`<div class="producto-resumen">
                    <div class="img">
                        <img src="${e.prodImg}" alt="#">
                    </div>
                    <div class="texto">
                        <h3>${e.productoNombre}</h3>
                        <p>${dollarUS.format(parseInt(e.precio))}</p>
                    </div>
                </div>`
            )
        })
    }
    getProductos()

    const numProductos = document.querySelector('#numProductos')
    const numVentas = document.querySelector('#numVentas')
    const numProveedores = document.querySelector('#numProveedores')
    const numClientes = document.querySelector('#numClientes')

    async function getResumen(){
        numClientes.innerHTML = '<div class="spinner"></div>'
        numVentas.innerHTML = '<div class="spinner"></div>'
        numProveedores.innerHTML = '<div class="spinner"></div>'
        numProductos.innerHTML = '<div class="spinner"></div>'
        let res = await fetch("../json/dashboard.php?lista=resumen")
        res.json()
        .then(res => {
            numClientes.innerHTML = res.clientes
            numVentas.innerHTML = res.ventas
            numProveedores.innerHTML = res.proveedores
            numProductos.innerHTML = res.productos
        })
    }
    getResumen()
</script>
</html>
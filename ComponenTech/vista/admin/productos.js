const productos = document.getElementById('productos');
const desde = document.querySelector('#desde')
const cantidad = document.querySelector('#cantidad')
const hasta = document.querySelector('#hasta')

const search = document.querySelector('#productoSearch')
const categorias = document.querySelector('#categorias')
const categoriasForm = document.querySelector('#categoriasForm')
const editForm = document.querySelector('#editForm');

var limit = 10, offset = 0, estado = 1, page = 1, categoria = 0

// etiqueta select de catagorias
async function getCategorias(){
    const res = await fetch(`../json/productos.php?action=categorias`)
    res.json()
    .then(res => res.forEach(e => {
        editForm.querySelector('select[name="categoria"]').innerHTML += `<option value="${e.idCategoria}">${e.categoria}</option>`
        categorias.innerHTML += `<option value="${e.idCategoria}">${e.categoria}</option>`
        categoriasForm.innerHTML += `<option value="${e.idCategoria}">${e.categoria}</option>`
    }))
    .catch(error=>console.log(error))
}
getCategorias();


// funcion fetch para productos
async function getProductos() {
    offset = (page - 1) * limit
    productos.innerHTML = '<div class="loading"><div class="spinner"></div></div>'
    const res = await fetch(`../json/productos.php?action=get&estado=${estado}&limit=${limit}&offset=${offset}&categoria=${categoria}`)
    res.json()
        .then(res => putProductos(res.productos, res.count, res.categorias))
}

// input de busqueda de productos 
search.addEventListener('keydown',e=>{
    
    if(e.keyCode === 13){
        e.target.disabled=true
        e.target.parentElement.style.backgroundColor='#efefef'
        let text = e.target.value
        searchProducto(text).then(()=>{
            e.target.disabled=false
            e.target.parentElement.style.backgroundColor='#fff'
        })
    }
})
async function searchProducto(text){
    
    const res = await fetch(`../json/productos.php?action=search&text=${text}&estado=${estado}&categoria=${categoria}`)
    res.json()
    .then(res => putProductos(res.data, 0))
}


// funcion para colocar todos los elementos en la pantalla
function putProductos(data, count) {

    productos.innerHTML = ""

    try {
        data.forEach(e => {
            let precio = new Intl.NumberFormat("es-CO").format(e.precio)

            cantidad.innerHTML = count
            desde.innerHTML = offset
            hasta.innerHTML = parseInt(offset) + parseInt(limit)

            productos.innerHTML += `
                    <div class="producto">
                        <div class="img">
                            <img src="${e.prodImg}" alt="">
                        </div>
                        <div class="texto">
                            <h2>${e.productoNombre}</h2>
                            <h4>${e.categoria}</h4>
                            <div class="texto-datos">
                                <div>
                                    <p>Precio</p>
                                    <p class="precio">$${precio}</p>
                                </div>
                                <div>
                                    <p>Proveedor</p>
                                    <p>${e.nEmpresa}</p>
                                </div>
                            </div>
                            <div class="descripcion">
                                <div>
                                    <h3>Descripción</h3>
                                    <p>${e.detalles}</p>
                                </div>
                                <div>
                                    <button data-id="${e.idProducto}" onclick="modProductoButton(this)" title="Modificar"><img src="icons/edit.svg" alt="Actualizar"></button>
                                    <button data-id="${e.idProducto}" onclick="delProducto(this)" title="Eliminar"><img src="icons/delete.svg" alt="Eliminar"></button>
                                </div>
                            </div>
                            
                        </div>
                    </div>
                `
        })
    } catch (error) {
        productos.innerHTML = "<br><center> sin resultados </center>"
        console.log(error)
    }
    

    if(data.length === 0)
        productos.innerHTML = "<br><center> sin resultados </center>"

    const tableFirst = document.querySelector('#tableFirst')
    const tableBack = document.querySelector('#tableBack')
    const tableNext = document.querySelector('#tableNext')
    const tableLast = document.querySelector('#tableLast')

    let lastPage = Math.ceil(count / limit)

    tableFirst.style.opacity = 1
    tableFirst.style.cursor = 'pointer'
    tableBack.style.opacity = 1
    tableBack.style.cursor = 'pointer'
    tableLast.style.opacity = 1
    tableLast.style.cursor = 'pointer'
    tableNext.style.opacity = 1
    tableNext.style.cursor = 'pointer'

    if (page == 1) {
        tableFirst.style.opacity = .5
        tableFirst.style.cursor = 'not-allowed'
        tableBack.style.opacity = .5
        tableBack.style.cursor = 'not-allowed'
        tableLast.style.opacity = 1
        tableNext.style.opacity = 1
    }
    if (page == lastPage) {
        tableFirst.style.opacity = 1
        tableBack.style.opacity = 1
        tableLast.style.opacity = .5
        tableLast.style.cursor = 'not-allowed'
        tableNext.style.opacity = .5
        tableNext.style.cursor = 'not-allowed'
    }
    if (lastPage == 1) {
        tableFirst.style.opacity = .5
        tableFirst.style.cursor = 'not-allowed'
        tableBack.style.opacity = .5
        tableBack.style.cursor = 'not-allowed'
        tableLast.style.opacity = .5
        tableLast.style.cursor = 'not-allowed'
        tableNext.style.opacity = .5
        tableNext.style.cursor = 'not-allowed'
    }
}

async function getProductoLimit(num) {
    limit = num
    search.value = ""
    getProductos()
}

async function getProductoCategoria(num) {
    categoria = num
    search.value = ""
    getProductos()
}

async function getProductoEstado(num) {
    page = 1
    estado = num
    search.value = ""
    getProductos()
}

function first() {
    if (page != 1) {
        page = 1
        getProductos()
    }
}
function back() {
    if (page > 1) {
        page--
        getProductos()
    }
}
function next() {
    if (page < Math.ceil(parseInt(cantidad.innerHTML) / limit)) {
        page++
        getProductos()
    }
}
function last() {
    if (page != Math.ceil(parseInt(cantidad.innerHTML) / limit)) {
        page = Math.ceil(parseInt(cantidad.innerHTML) / limit)
        getProductos()
    }
}


getProductos()


// vista previa de imagen del formulario crear producto
function setImg(e) {
    const archivos = e.target.files;
    const prevImg = e.target.parentElement.querySelector('img')
    // console.log(e.target.parentElement.querySelector('img'))
    if (!archivos || !archivos.length) {
        prevImg.src = "icons/placeholder.jpg";
        return;
    }
    const primerArchivo = archivos[0];
    const objectURL = URL.createObjectURL(primerArchivo);
    prevImg.src = objectURL;
}



// agregar producto
async function addProducto(e){
    e.preventDefault()
    const inputs = e.target.querySelectorAll('input,textarea,select')
    inputs.forEach(e=>{
        e.addEventListener('input',()=>{
            if(e.value.length > 0){
                e.style.backgroundColor="#ddd";
            }
        })
    })
    if(verifyInputs(inputs)){
        const form = new FormData(e.target)
        const res = await fetch('../json/productos.php?action=add',{
            method:"POST",
            body:form
        })
        res.json()
        .then(res=>{
            if(res.error){
                alert(res.error)
            }else{
                getProductos()
                document.querySelector('#insertForm').style.display="none"
            }
            console.log(res)
        })
        // aqui voy
    } else {
        alert('hay campos vacios')
    }

}  



async function modProductoButton(e){
    const id = e.dataset.id

    const res = await fetch(`../json/productos.php?action=get1&id=${id}`)
    res.json()
    .then(data=>{
        if(data.error){
            alert('Error con la base de datos')
        }else {
            console.log(data)
            showEditForm(data.data)

        }
    })
}

function showEditForm(data){
    const imgTag = editForm.querySelector('#prodImgTag')

    const idProducto = editForm.querySelector('input[name="idProducto"]')
    const producto = editForm.querySelector('input[name="producto"]')
    const categoria = editForm.querySelector('select[name="categoria"]')
    const precio = editForm.querySelector('input[name="precio"]')
    const proveedor = editForm.querySelector('select[name="proveedor"]')
    const descripcion = editForm.querySelector('textarea[name="detalles"]')

    const inpFoto = editForm.querySelector('input[name="foto"]')

    inpFoto.value = ''

    idProducto.value = data.idProducto
    producto.value = data.productoNombre
    categoria.value = data.idCategoria
    precio.value = data.precio
    proveedor.value = data.PROVEEDOR_idProveedor
    descripcion.value = data.detalles


    imgTag.src = data.prodImg

    editForm.style.display = 'flex'
}





async function modProducto(e){
    e.preventDefault()
    const inputs = e.target.querySelectorAll('input[type="text"],textarea,select')
    inputs.forEach(e=>{
        e.addEventListener('input',()=>{
            if(e.value.length > 0){
                e.style.backgroundColor="#ddd";
            }
        })
    })
    if(verifyInputs(inputs)){
        const form = new FormData(e.target)
        const res = await fetch('../json/productos.php?action=edit',{
            method:"POST",
            body:form
        })
        res.json()
        .then(res=>{
            if(res.error){
                alert(res.error)
            }else{
                getProductos()
                document.querySelector('#editForm').style.display="none"
            }
        })
    } else {
        alert('hay campos vacios')
    }

}






// cargar lista de proveedores para el formulario
const proveedores = document.querySelector('#proveedoresForm')
async function getProveedores(){
    const res = await fetch('../json/proveedores.php?action=get&estado=4')
    res.json()
    .then(res=>res.data.forEach(e=>{
        editForm.querySelector('select[name="proveedor"]').innerHTML+=`<option value="${e.idProveedor}">${e.nEmpresa}</option>`
        proveedores.innerHTML+=`<option value="${e.idProveedor}">${e.nEmpresa}</option>`
    }))
}
getProveedores()

// verificación de campos
function verifyInputs(inputs){
    let vacios = 0;
    // console.log(inputs)
    inputs.forEach(e=>{
        if(e.value==""){
            e.style.backgroundColor="#f77"
            vacios++
        } else {
            e.style.backgroundColor="#ddd"
        }
    })
    if(vacios===0){
        return true
    } return false
}
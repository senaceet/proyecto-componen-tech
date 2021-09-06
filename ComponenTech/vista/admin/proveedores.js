const proveedores = document.querySelector('#proveedores')
const desde = document.querySelector('#desde')
const cantidad = document.querySelector('#cantidad')
const hasta = document.querySelector('#hasta')

const search = document.querySelector('#proveedoresSearch')

var limit = 10, offset = 0, estado = 0, page = 1



async function getProveedoresLimit(num) {
    limit = num
    search.value=""
    getProveedor()
}

async function getProveedoresEstado(num) {
    page=1
    estado = num
    search.value=""
    getProveedor()
}

async function getProveedor() {
    offset = (page - 1) * limit
    proveedores.innerHTML = '<div class="loading"><div class="spinner"></div></div>'
    let url = `../json/proveedores.php?action=get&limit=${limit}&offset=${offset}&estado=${estado}`

    let res = await fetch(url)
    res.json()

        .then(res => {
            if(res.error){
                alert('Error en la base de datos')
                console.log(res)

            } else putProveedor(res.data, res.count)
        })
}
getProveedor()

function putProveedor(data, count) {
    proveedores.innerHTML = ''
    let num = offset + 1
    data.forEach(e => {
        console.log(e)
        proveedores.innerHTML += `<tr>
                <td>${num}</td>
                <td>${e.nEmpresa}</td>
                <td>${e.eTelefono}</td>
                <td>${e.cNombre} ${e.cApellido}</td>
                <td>${e.cCelular}</td>
                <td>${e.estado}</td>
                <td>
                    <button data-id="${e.idProveedor}" onclick="modUser(this)" title="Modificar"><img src="icons/edit.svg" alt="Actualizar"></button>
                    <button data-id="${e.idProveedor}" onclick="delUser(this)" title="Eliminar"><img src="icons/delete.svg" alt="Eliminar"></button>
                    <button data-id="${e.idProveedor}" onclick="hisUser(this)" title="Ver reporte"><img src="icons/window.svg" alt="Actualizar"></button>
                </td>
            </tr>`
        num++
    })
    cantidad.innerHTML = count
    desde.innerHTML = offset
    hasta.innerHTML = parseInt(offset) + parseInt(limit)

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

    if(page == 1){
        tableFirst.style.opacity = .5
        tableFirst.style.cursor = 'not-allowed'
        tableBack.style.opacity = .5
        tableBack.style.cursor = 'not-allowed'
        tableLast.style.opacity = 1
        tableNext.style.opacity = 1
    }
    if(page == lastPage){
        tableFirst.style.opacity = 1
        tableBack.style.opacity = 1
        tableLast.style.opacity = .5
        tableLast.style.cursor = 'not-allowed'
        tableNext.style.opacity = .5
        tableNext.style.cursor = 'not-allowed'
    }
    if(lastPage == 1){
        tableFirst.style.opacity = .5
        tableFirst.style.cursor = 'not-allowed'
        tableBack.style.opacity = .5
        tableBack.style.cursor = 'not-allowed'
        tableLast.style.opacity = .5
        tableLast.style.cursor = 'not-allowed'
        tableNext.style.opacity = .5
        tableNext.style.cursor = 'not-allowed'
    }
    
    if(data.length == 0){
        proveedores.innerHTML = `<tr>
            <td align="center" colspan="9">Sin resultados</td>
        </tr>`
    }
}

function first() {
    if(page!=1){
        page = 1
        getProveedor()
    }    
}
function back() {
    if(page>1){
        page--
        getProveedor()
    }
}
function next() {
    if(page < Math.ceil(parseInt(cantidad.innerHTML) / limit)){
        page++
        getProveedor()
    }
}
function last() {
    if(page!=Math.ceil(parseInt(cantidad.innerHTML) / limit)){
        page = Math.ceil(parseInt(cantidad.innerHTML) / limit)
        getProveedor()
    }
}


// -- funciones para usuarios -- //

// eliminar usuario
async function delUser(e) {
    if(confirm('¿Está seguro de borrar a este usuario?')){
        const id = e.dataset.id
        const data = new FormData()
        data.append('id',id)
        const res = await fetch('../json/clientes.php?action=delete',{
            method:'post',
            body:data
        })
        res.json()
        .then(res=> {

            if(res.status){
                getProveedor()
            } else {
                alert('Error al eliminar usuario')
            }
        })
    }
}


// modificar usuario
async function modUser(e) {
    console.log(e.dataset.id)
}

//Reporte de usuario
const contenedorReporte = document.querySelector('.reporteFlotante')

const divReporte = document.querySelector('#reporte')

const totalReporte  = document.querySelector('#reporteTotal')

async function hisUser(e){
    let id = e.dataset.id
    contenedorReporte.style.display="flex"

    const res = await fetch("../json/clientes.php?action=reporte&id="+id)

    res.json()
    .then(data => {
        // -----

        

        let lista =  data.data

        divReporte.innerHTML = ""

        var total = 0

        lista.forEach(e => {
            let precio = new Intl.NumberFormat("es-CO").format(parseInt(e.precio))

            total += parseInt(e.precio) 

            divReporte.innerHTML += `
                <tr>
                    <td>${e.productoNombre}</td>
                    <td class="cantidad">${e.cantidad}</td>
                    <td>${e.fecha}</td>
                    <td>$${precio}</td>
                </tr> 
            `
        })
        

        total =  new Intl.NumberFormat("es-CO").format(total)

        totalReporte.innerHTML = "$ "+total
       

        // ----
    })


    // http://localhost/ctech/json/clientes.php?action=reporte&id=1022322061

}



// agregar usuario
async function addUser(e) {
    e.preventDefault()
    const inputs = e.target.querySelectorAll('input')
    if(verifyInputs(inputs)){
        const form = new FormData(e.target)
        if(form.get('pass1') === form.get('pass2')){
            const res = await fetch('../json/clientes.php?action=add',{
                method:'post',
                body:form
            })
            res.json()
            .then(res => {
                if(res.status){
                    e.target.parentElement.style.display='none'
                    alert('registrado')
                } else {
                    alert(res.error)
                }

            })
        } else {
            alert('las contraseñas deben ser identicas')
        }        
    } else alert('Hay campos vacios')
    
    
    // console.log(e.dataset.id)
}


// funcion para verficar campos
function verifyInputs(inputs){
    let vacios = 0;
    inputs.forEach(e=>{
        if(e.value==""){
            e.style.backgroundColor="#00c"
            vacios++
        } else {
            e.style.backgroundColor="#ddd"
        }
    })
    if(vacios===0){
        return true
    } return false
}

// buscar

const getProveedoresSearch = async (text)=>{
    const res = await fetch(`../json/proveedores.php?action=search&text=${text}&estado=${estado}`)
    res.json()
    .then(res => putProveedor(res.data,0))

}

search.addEventListener('keydown',e=>{
    
    if(e.keyCode === 13){
        e.target.disabled=true
        e.target.parentElement.style.backgroundColor='#efefef'
        let text = e.target.value
        getProveedoresSearch(text).then(()=>{
            e.target.disabled=false
            e.target.parentElement.style.backgroundColor='#fff'
        })
    }
})
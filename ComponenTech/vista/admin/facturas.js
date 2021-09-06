const facturas = document.querySelector('#facturas')
const desde = document.querySelector('#desde')
const cantidad = document.querySelector('#cantidad')
const hasta = document.querySelector('#hasta')

const search = document.querySelector('#clientSearch')

var limit = 10, offset = 0, estado = 0, page = 1



async function getFacturasLimit(num) {
    limit = num
    search.value=""
    getFacturas()
}

async function getFacturasEstado(num) {
    page=1
    estado = num
    search.value=""
    getFacturas()
}

async function getFacturas() {
    offset = (page - 1) * limit
    facturas.innerHTML = '<div class="loading"><div class="spinner"></div></div>'
    let url = `../json/facturas.php?action=get&limit=${limit}&offset=${offset}&estado=${estado}`

    let res = await fetch(url)
    res.json()

        .then(res => {
            if(res.error){
                alert('Error en la base de datos')
                console.log(res)

            } else putFacturas(res.data, res.count)
        })
}
getFacturas()

function putFacturas(data, count) {
    facturas.innerHTML = ''
    let num = offset + 1
    data.forEach(e => {
        console.log(e)
        facturas.innerHTML += `<tr>
                <td>${num}</td>
                <td>${e.idFactura}</td>
                <td>${e.fecha}</td>
                <td>${e.subtotal}</td>
                <td>${e.total}</td>
                <td>${e.tipo}</td>
                <td>${e.USUARIO_documento}</td>
                <td>${e.estado}</td>
                
                <td>
                    <button data-id="${e.idInventario}" onclick="modUser(this)" title="Modificar"><img src="icons/edit.svg" alt="Actualizar"></button>
                    <button data-id="${e.idInventario}" onclick="delUser(this)" title="Eliminar"><img src="icons/delete.svg" alt="Eliminar"></button>
                    <button data-id="${e.idInventario}" onclick="hisUser(this)" title="Ver reporte"><img src="icons/window.svg" alt="Actualizar"></button>
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
        inventario.innerHTML = `<tr>
            <td align="center" colspan="9">Sin resultados</td>
        </tr>`
    }
}

function first() {
    if(page!=1){
        page = 1
        getFacturas()
    }    
}
function back() {
    if(page>1){
        page--
        getFacturas()
    }
}
function next() {
    if(page < Math.ceil(parseInt(cantidad.innerHTML) / limit)){
        page++
        getFacturas()
    }
}
function last() {
    if(page!=Math.ceil(parseInt(cantidad.innerHTML) / limit)){
        page = Math.ceil(parseInt(cantidad.innerHTML) / limit)
        getFacturas()
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
                getFacturas()
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
1022322061
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

const getFacturasSearch = async (text)=>{
    const res = await fetch(`../json/clientes.php?action=search&text=${text}&estado=${estado}`)
    res.json()
    .then(res => putFacturas(res.clientes,0))

}

search.addEventListener('keydown',e=>{
    
    if(e.keyCode === 13){
        e.target.disabled=true
        e.target.parentElement.style.backgroundColor='#efefef'
        let text = e.target.value
        getFacturasSearch(text).then(()=>{
            e.target.disabled=false
            e.target.parentElement.style.backgroundColor='#fff'
        })
    }
})
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
        // console.log(e)
        var botones = `
        <button data-id="${e.idProveedor}" onclick="modUserForm(this)" title="Modificar"><img src="icons/edit.svg" alt="Actualizar"></button>
        <button data-id="${e.idProveedor}" onclick="delProveedor(this)" title="Desactivar"><img src="icons/delete.svg" alt="Eliminar"></button>`

        if(e.idEstado == 5){
            botones =  `
            <button data-id="${e.idProveedor}" onclick="modUserForm(this)" title="Modificar"><img src="icons/edit.svg" alt="Actualizar"></button>
            <button data-id="${e.idProveedor}" onclick="activarProveedor(this)" title="Activar"><img src="icons/restore.svg" alt="Eliminar"></button>`
        }

        proveedores.innerHTML += `<tr>
                <td>${num}</td>
                <td>${e.nEmpresa}</td>
                <td>${e.eTelefono}</td>
                <td>${e.cNombre} ${e.cApellido}</td>
                <td>${e.cCelular}</td>
                <td>${e.estado}</td>
                <td>
                   ${botones}
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


// -- funciones para proveedores -- //

// desactivar proveedor
async function delProveedor(e) {
    if(confirm('¿Está seguro de desactivar a este proveedor?')){
        const id = e.dataset.id
        const data = new FormData()
        data.append('id',id)
        const res = await fetch('../json/proveedores.php?action=delete',{
            method:'post',
            body:data
        })
        res.json()
        .then(res=> {
            
            if(res.status){
                swal(res.message,"El proveedor se desactivó correctamente",'info')
                getProveedor()
            } else {
                swal(res.message,"Ocurrio un error al desactivar proveedor",'error')
                console.log(res.message)
            }
        })
    }
}

async function activarProveedor(e) {
    if(confirm('¿Está seguro de activar a este proveedor?')){
        const id = e.dataset.id
        const data = new FormData()
        data.append('id',id)
        const res = await fetch('../json/proveedores.php?action=restore',{
            method:'post',
            body:data
        })
        res.json()
        .then(res=> {
            if(res.status){
                swal(res.message,"El proveedor se activó correctamente",'success')
                getProveedor()
            } else {
                swal(res.message,"Ocurrio un error al activar proveedor",'error')
                console.log(res.message)
            }
        })
    }
}

// modificar proveedor

const editForm = document.querySelector('#editForm')
const showEditForm = (data)=>{
    const idProveedor = editForm.querySelector('input[name="idProveedor"]')
    const nEmpresa = editForm.querySelector('input[name="nEmpresa"]')
    const eTelefono = editForm.querySelector('input[name="eTelefono"]')
    const cNombre = editForm.querySelector('input[name="cNombre"]')
    const cApellido = editForm.querySelector('input[name="cApellido"]')
    const cCelular = editForm.querySelector('input[name="cCelular"')
    // console.log(data)  
    
    idProveedor.value = data.idProveedor
    nEmpresa.value = data.nEmpresa
    cNombre.value = data.cNombre
    cApellido.value = data.cApellido
    cCelular.value = data.cCelular
    eTelefono.value = data.eTelefono

    editForm.style.display='flex'
}

async function modUserForm(e) {
    const id = e.dataset.id
    // obtener datos
    const res = await fetch(`../json/proveedores.php?action=get1&id=${id}`)
    res.json()
    .then(data=>{
        if(!data.status){
            alert('Error con la base de datos')
        }else {
            console.log(data)
            showEditForm(data.data)

        }
    })
}

async function modUser(e) {
    e.preventDefault()
    const form = new FormData(e.target)
   
    const res = await fetch(`../json/proveedores.php?action=edit`,{
        method:"POST",
        body:form
    })
    res.json()
    .then(data=>{
        // console.log(data)
        if(data.status){
            e.target.parentElement.style.display = 'none'
            getProveedor()
        } else {
            alert("error al modificar")
        }
        
    })
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



// agregar proveedor
async function addProveedor(e) {
    e.preventDefault()
    const inputs = e.target.querySelectorAll('input')
    if(verifyInputs(inputs)){
        const form = new FormData(e.target)
        
        const res = await fetch('../json/proveedores.php?action=add',{
            method:'post',
            body:form
        })
        res.json()
        .then(res => {
            // console.log(res)
            if(res.status){
                e.target.parentElement.style.display='none'
                alert('Proveedor registrado')
            } else {
                alert(res.error)
            }

        })
               
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
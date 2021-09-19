const operadores = document.querySelector('#operadores')
const desde = document.querySelector('#desde')
const cantidad = document.querySelector('#cantidad')
const hasta = document.querySelector('#hasta')

const search = document.querySelector('#clientSearch')

var limit = 10, offset = 0, estado = 0, page = 1



async function getOperadoresLimit(num) {
    limit = num
    search.value=""
    getOperadores()
}

async function getOperadoresEstado(num) {
    page=1
    estado = num
    search.value=""
    getOperadores()
}

async function getOperadores() {
    offset = (page - 1) * limit
    operadores.innerHTML = '<div class="loading"><div class="spinner"></div></div>'
    let url = `../json/operadores.php?action=get&limit=${limit}&offset=${offset}&estado=${estado}`

    let res = await fetch(url)
    res.json()

        .then(res => {
            if(res.error){
                alert('Error en la base de datos')
                console.log(res)

            } else putOperadores(res.data, res.count)
        })
}
getOperadores()

function putOperadores(data, count) {
    operadores.innerHTML = ''
    let num = offset + 1
    data.forEach(e => {
        
        var botones = `
        <button data-id="${e.documento}" onclick="modUserForm(this)" title="Modificar"><img src="icons/edit.svg" alt="Actualizar"></button>
        <button data-id="${e.documento}" onclick="delUser(this)" title="Desactivar"><img src="icons/delete.svg" alt="Eliminar"></button>
        `

        if(e.idEstado == 10){
            botones =  `
            <button data-id="${e.documento}" onclick="modUserForm(this)" title="Modificar"><img src="icons/edit.svg" alt="Actualizar"></button>
            <button data-id="${e.documento}" onclick="activarUser(this)" title="Activar"><img src="icons/restore.svg" alt="Eliminar"></button>
            `
        }

        console.log(e.idEstado)
        operadores.innerHTML += `<tr>
                <td>${num}</td>
                <td>${e.nombres} ${e.apellidos}</td>
                <td>${e.correo}</td>
                <td>${e.edad}</td>
                <td>${e.celular}</td>
                <td>${e.direccion}</td>
                <td>${e.documento}</td>
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
        operadores.innerHTML = `<tr>
            <td align="center" colspan="9">Sin resultados</td>
        </tr>`
    }
}

function first() {
    if(page!=1){
        page = 1
        getOperadores()
    }    
}
function back() {
    if(page>1){
        page--
        getOperadores()
    }
}
function next() {
    if(page < Math.ceil(parseInt(cantidad.innerHTML) / limit)){
        page++
        getOperadores()
    }
}
function last() {
    if(page!=Math.ceil(parseInt(cantidad.innerHTML) / limit)){
        page = Math.ceil(parseInt(cantidad.innerHTML) / limit)
        getOperadores()
    }
}


// -- funciones para usuarios -- //

// eliminar operador
async function delUser(e) {
    if(confirm('¿Está seguro de desactivar a este operador?')){
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
                swal('Operador desactivado','El operador se desactivó correctamente','info')
                getOperadores()
            } else {
                alert('Error al desactivar operador')
            }
        })
    }
}

// activar usuario
async function activarUser(e) {
    if(confirm('¿Está seguro de activar a este operador?')){
        const id = e.dataset.id
        const data = new FormData()
        data.append('id',id)
        const res = await fetch('../json/clientes.php?action=restore',{
            method:'post',
            body:data
        })
        res.json()
        .then(res=> {
            if(res.status){
                swal('Operador activado','El operador se activó correctamente','success')
                getOperadores()
            } else {
                alert('Error al activar operador')
            }
        })
    }
}


// modificar usuario
const editForm = document.querySelector('#editForm')
const showEditForm = (data)=>{
    const documento = editForm.querySelector('input[name="documento"]')
    const nombres = editForm.querySelector('input[name="nombres"]')
    const apellidos = editForm.querySelector('input[name="apellidos"]')
    const fnacimiento = editForm.querySelector('input[name="fnacimiento"]')
    const edad = editForm.querySelector('input[name="edad"')
    const celular = editForm.querySelector('input[name="celular"')
    const direccion = editForm.querySelector('input[name="direccion"]')
    const correo = editForm.querySelector('input[name="correo"]')

    console.log(data)  
    
    documento.value = data.documento
    nombres.value = data.nombres
    apellidos.value = data.apellidos
    fnacimiento.value = data.fechaNto
    edad.value = data.edad
    celular.value = data.celular
    direccion.value = data.direccion
    correo.value = data.correo

    editForm.style.display='flex'
}

// boton de modificar usuario
async function modUserForm(e) {
    const id = e.dataset.id
    // obtener datos
    const res = await fetch(`../json/operadores.php?action=get1&id=${id}`)
    res.json()
    .then(data=>{
        if(data.error){
            alert('Error con la base de datos')
        }else {
            // console.log(data)
            showEditForm(data.data)

        }
    })
}

// modificar usuario

async function modUser(e) {
    e.preventDefault()
    const form = new FormData(e.target)
   
    const res = await fetch(`../json/clientes.php?action=edit`,{
        method:"POST",
        body:form
    })
    res.json()
    .then(data=>{
        if(data.status){
            e.target.parentElement.style.display = 'none'
            getOperadores()
        } else {
            alert("error al modificar")
        }
        
    })
}



// agregar usuario
async function addUser(e) {
    e.preventDefault()
    const inputs = e.target.querySelectorAll('input')
    if(verifyInputs(inputs)){
        const form = new FormData(e.target)
        if(form.get('pass1') === form.get('pass2')){
            const res = await fetch('../json/operadores.php?action=add',{
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

const getOperadorSearch = async (text)=>{
    const res = await fetch(`../json/operadores.php?action=search&text=${text}&estado=${estado}`)
    res.json()
    .then(res => putOperadores(res.data,0))

}

search.addEventListener('keydown',e=>{
    
    if(e.keyCode === 13){
        e.target.disabled=true
        e.target.parentElement.style.backgroundColor='#efefef'
        let text = e.target.value
        getOperadorSearch(text).then(()=>{
            e.target.disabled=false
            e.target.parentElement.style.backgroundColor='#fff'
        })
    }
})
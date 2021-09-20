const movimientos = document.querySelector('#movimientos')
const desde = document.querySelector('#desde')
const cantidad = document.querySelector('#cantidad')
const hasta = document.querySelector('#hasta')

const search = document.querySelector('#clientSearch')

var limit = 10, offset = 0, estado = 0, page = 1, filterdesde = 0,filterhasta=0



async function getMovimientosLimit(num) {
    limit = num
    search.value=""
    getMovimientos()
}

async function getMovimientosEstado(num) {
    page=1
    estado = num
    search.value=""
    getMovimientos()
}

async function getMovimientosDesde(e) {
    page=1
    filterdesde = e.value
    search.value=""
    getMovimientos()
}
async function getMovimientosHasta(e) {
    page=1
    filterhasta = e.value
    search.value=""
    getMovimientos()
}





async function getMovimientos() {
    offset = (page - 1) * limit
    movimientos.innerHTML = '<div class="loading"><div class="spinner"></div></div>'
    let url = `../json/movimientos.php?action=get&limit=${limit}&offset=${offset}&estado=${estado}&desde=${filterdesde}&hasta=${filterhasta}`
console.log(url)
    let res = await fetch(url)
    res.json()

        .then(res => {
            // console.log(res)
            if(res.error){
                alert('Error en la base de datos')
                console.log(res)

            } else putMovimientos(res.data, res.count)
        })
}
getMovimientos()

function putMovimientos(data, count) {
    movimientos.innerHTML = ''
    let num = offset + 1
    data.forEach(e => {
        // console.log(e)
        movimientos.innerHTML += `<tr>
                <td>${num}</td>
                <td>${e.productoNombre}</td>
                <td>${e.tipoMovimiento}</td>
                <td>${e.cantidad}</td>
                <td>${e.fecha}</td>
                <td>${e.FACTURA_idFactura}</td>
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
        movimientos.innerHTML = `<tr>
            <td align="center" colspan="9">Sin resultados</td>
        </tr>`
    }
}

function first() {
    if(page!=1){
        page = 1
        getMovimientos()
    }    
}
function back() {
    if(page>1){
        page--
        getMovimientos()
    }
}
function next() {
    if(page < Math.ceil(parseInt(cantidad.innerHTML) / limit)){
        page++
        getMovimientos()
    }
}
function last() {
    if(page!=Math.ceil(parseInt(cantidad.innerHTML) / limit)){
        page = Math.ceil(parseInt(cantidad.innerHTML) / limit)
        getMovimientos()
    }
}






// buscar

const getMovimientosSearch = async (text)=>{
    const res = await fetch(`../json/movimientos.php?action=search&text=${text}`)
    res.json()
    .then(res => putMovimientos(res.data,0))

}

search.addEventListener('keydown',e=>{
    
    if(e.keyCode === 13){
        e.target.disabled=true
        e.target.parentElement.style.backgroundColor='#efefef'
        let text = e.target.value
        getMovimientosSearch(text).then(()=>{
            e.target.disabled=false
            e.target.parentElement.style.backgroundColor='#fff'
        })
    }
})
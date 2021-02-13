function verifInput(form){
	const inputs = form.querySelectorAll("input[type=text],input[type=date],input[type=password], select, textarea");
	var vacios = 0;
	var pass = false;

	if (form.querySelectorAll("input[type=password]").length > 1) {
		pass = true;
		var claves = form.querySelectorAll("input[type=password]");

	}

	inputs.forEach(e => {

		if (form.name == 'normalForm') {

			if(e.value == ""){
				vacios++;
				e.style.backgroundColor="#e77";
			}
			e.addEventListener('input',() =>{
				e.style.backgroundColor="#dfdfdf";
			});

		} else {

			if(e.value == ""){
				vacios++;
				e.style.borderColor="#e55";
			}
			e.addEventListener('input',() =>{
				e.style.borderColor="#bababa";
			});
		}
			

	});
	if (vacios>0) {
		swal("faltan "+vacios+" campos",'','info');
	} else if (pass) {
		if(claves[0].value === claves[1].value){
			form.submit();
		}else{
			swal("Las contraseñas deben ser identicas",'','error');
		}

	} else {
		form.submit();
	}

}
var mensaje = document.querySelector('.getMensaje');
if(mensaje!=null){
	mensaje.addEventListener('click',()=>{
		mensaje.style.display='none';
	});
}


function zoomIn(foto){
	var ruta = foto.querySelector('img').src;
	

	if (document.querySelector('#imgZoom') == null) {
		const nfoto = document.createElement('img');
		const imgZoom = document.createElement('div');
		const texto = document.createElement('p');
		texto.innerHTML="Click para cerrar imagen";

		imgZoom.setAttribute('id','imgZoom');
		nfoto.src = foto.querySelector('img').src;
		imgZoom.appendChild(nfoto);
		imgZoom.appendChild(texto);
		document.body.appendChild(imgZoom);
	} else {
		imgZoom.style.display='flex';
		imgZoom.querySelector('img').src=ruta;
	}
	imgZoom.addEventListener('click',()=>{
		imgZoom.style.display='none';
	});
	

}


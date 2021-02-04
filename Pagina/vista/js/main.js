function verifInput(form){
	const inputs = form.querySelectorAll("input[type=text],input[type=date], select, textarea");
	var vacios = 0;
	inputs.forEach(e => {
		if(e.value == ""){
			vacios++;
			e.style.borderColor="#e55";
		}
		e.addEventListener('input',() =>{
			e.style.borderColor="#bababa";
		});
	});
	if (vacios>0) {
		swal("faltan "+vacios+" campos",'','info');
	} else{
		form.submit();
	}

}
var mensaje = document.querySelector('.getMensaje');
if(mensaje!=null){
	mensaje.addEventListener('click',()=>{
		mensaje.style.display='none';
	});
}



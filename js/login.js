function ponerError(id){
	if(document.getElementById(id).classList.contains('correcto')){
		document.getElementById(id).classList.remove('correcto');
	}
	if(!document.getElementById(id).classList.contains('error')){
	   document.getElementById(id).classList.add('error');
   }
}
function ponerCorrecto(id){
	if(document.getElementById(id).classList.contains('error')){
	   document.getElementById(id).classList.remove('error');
   }
   if(!document.getElementById(id).classList.contains('correcto')){
	   document.getElementById(id).classList.add('correcto');
   }
}

document.getElementById('usuario').addEventListener('input', function () { //Usuario
	var usuario  = document.getElementById('usuario').value;
	var escrituraCorrecta = true;
	var largoCorrecto = true;
	var i = 0;

	if (usuario.length < 5) {
		largoCorrecto = false;
    }

	while(i<usuario.length) { //reviso escritura
    	ascii = usuario.charCodeAt(i);
    	if (!((ascii>96 && ascii<123) || (ascii>47 && ascii<58))) {
			escrituraCorrecta = false;
		}
		i++ ;
	};

	if (escrituraCorrecta && largoCorrecto) {
		ponerCorrecto("usuario");
	}
	else{
		ponerError("usuario");
	}
	checkearBoton()
});

document.getElementById('contrasenia').addEventListener('input', function () { //Contrasenia
	var contrasenia  = document.getElementById('contrasenia').value;
	var escrituraCorrecta = true;
	var largoCorrecto = true;
	var i = 0;

	if (contrasenia.length < 5) {
		largoCorrecto = false;
    }

	while(i<contrasenia.length) { //reviso escritura
    	ascii = contrasenia.charCodeAt(i);
    	if (!((ascii>96 && ascii<123) || (ascii>47 && ascii<58))) { 
			escrituraCorrecta = false;
		}
		i++ ;
	};

	if (escrituraCorrecta && largoCorrecto) {
		ponerCorrecto("contrasenia");
	}
	else{
		ponerError("contrasenia");
	}
	checkearBoton()
});

function checkearBoton(){
	var usuarioTieneError = document.getElementById("usuario").classList.contains('error');
	var contraseniaTieneError = document.getElementById("contrasenia").classList.contains('error');
	if(usuarioTieneError || contraseniaTieneError){
		if(!document.getElementById("boton").hasAttribute("disable")){
			document.getElementById('boton').setAttribute('disabled', '');
		}
	}
	else{
		document.getElementById('boton').removeAttribute('disabled');
	}
}

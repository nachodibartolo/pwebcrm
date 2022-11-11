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

function checkearBoton(){

	//checkeo si alguna de los inputs tiene la clase 'error'
	var usuarioTieneError = document.getElementById("usuario").classList.contains('error');
	var contraseniaTieneError = document.getElementById("contrasenia").classList.contains('error');
	var emailTieneError = document.getElementById("email").classList.contains('error');
	var fechaTieneError = document.getElementById("cumple").classList.contains('error');

	if(usuarioTieneError || contraseniaTieneError || emailTieneError || fechaTieneError){ 
		if(!document.getElementById("boton").hasAttribute("disable")){
			document.getElementById('boton').setAttribute('disabled', '');
		}
	}
	else{ 
		document.getElementById('boton').removeAttribute('disabled');
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

	while(i<usuario.length) { 
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

	checkearBoton();

});

document.getElementById('contrasenia').addEventListener('input', function () { //Contrasenia

	var contrasenia  = document.getElementById('contrasenia').value;
	var escrituraCorrecta = true;
	var largoCorrecto = true;
	var i = 0;

	if (contrasenia.length < 5) { 
		largoCorrecto = false;
    }

	while(i<contrasenia.length) { 
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

	checkearBoton();
});

document.getElementById('email').addEventListener('input', function () { //Email

	var email  = document.getElementById('email').value;
    var tieneArroba = email.includes("@");
    var tieneCom = email.includes(".com");

    if(tieneArroba && tieneCom){ //reviso que contenga un @ y un ".com" unicamente
		ponerCorrecto("email");
    }
    else {
		ponerError("email");
    }

	checkearBoton();
});

document.getElementById('cumple').addEventListener('input', function () { //Fecha de nacimiento

	var fechaActual = Date.now() / 31536000000 // cantidad de anios que pasaron desde 1970 hasta ahora
	var cumple  = document.getElementById('cumple').value; //obtiene la fecha en forma de string "aaaa-mm-dd"
	cumple = cumple.split("-"); //transforma la fecha a array ["aaaa","mm","dd"]
	for(i=0;i<cumple.length;i++){
		cumple[i] = parseInt(cumple[i]); //transforma los valores del array a int [aaaa,mm,dd]
	}
	cumple[0] -= 1970; // cantidad de anios que pasaron desde 1970 hasta el anio de la fecha de cumple
	var fechaCumple = cumple[0] + cumple[1]/12 + cumple[2]/365; //pasa el array cumple a cantidad anios

	if(fechaActual-fechaCumple<18){ //calcula la edad y comprueba que sea mayor de 18
		ponerError("cumple");
	}
	else{
		ponerCorrecto("cumple");
	}

	checkearBoton();
});

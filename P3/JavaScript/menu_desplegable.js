function abrirMenu() {
	document.getElementById("contenedor_menu").style.width = "30%";
}

function cerrarMenu() {
	document.getElementById("contenedor_menu").style.width = "0";
}


var boton_abrir = document.getElementById("boton_abrir");
boton_abrir.addEventListener('click', abrirMenu);

var boton_cerrar = document.getElementById("boton_cerrar");
boton_cerrar.addEventListener('click', cerrarMenu);


function validarFormulario() {
	var enviar_comentario = true;

	var nombre = document.getElementById("nombre").value;
	if(nombre == "") {
		alert("El campo del nombre debe estar rellenado");
		enviar_comentario = false
	}

	var correo = document.getElementById("correo").value;
	var expr_correo = /^([\da-z_\.-]+)@([\da-z\.-]+)\.([a-z\.]{2,6})$/;
	if (!expr_correo.exec(correo) && enviar_comentario){
		alert("Correo no válido");
		enviar_comentario = false;
	}

	var texto = document.getElementById("contenido").value;
	if(texto == "" && enviar_comentario) {
		alert("Debe escribir un comentario")
		enviar_comentario = false;
	}

	if(enviar_comentario) {
		document.getElementById("persona").innerHTML = nombre;
		var fecha_actual = new Date();
		document.getElementById("fecha").innerHTML = fecha_actual.toLocaleDateString();
		document.getElementById("texto").innerHTML = texto;
	}
}

var boton_submit = document.getElementById("boton_submit");
boton_submit.addEventListener('click', validarFormulario);

function censurar() {
	const palabras_prohibidas = ["puta", "joder", "mierda", "puto", "caca"];
	var original = document.getElementById("contenido").value;
	var censurada = "";
	var cambiada = false;

	for (let i=0; i < palabras_prohibidas.length && !cambiada; i++) {
		censurada = document.getElementById("contenido").value.replace(palabras_prohibidas[i], "******");
		if(original != censurada)
			cambiada = true;
			document.getElementById("contenido").value = censurada;
	}
}

var textarea = document.getElementById("contenido");
textarea.addEventListener("keyup", censurar);

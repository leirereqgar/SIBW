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

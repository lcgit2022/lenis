"use strict"
function validar(){
	var ci = document.formu.ci.value;
	var nombre = document.formu.nombre.value;
	var ap = document.formu.ap.value;
	var am = document.formu.am.value;
	

	if (ci=="") {
		alert("Por favor ingrese el numero de ci");
		document.formu.ci.focus();
		return;
	}
	if (!v1.test(nombre)) {
		alert("Los nombres son incorrectos o el campo esta vacio");
		document.formu.nombre.focus();
		return;
	}
	if ((ap=="")&&(am=="")) {
		alert("Por favor introduzca un Apellido");
		document.formu.ap.focus();
	}
	document.formu.submit();
}
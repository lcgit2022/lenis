"use strict"
function validar(){
	var nombre=document.formu.nombre.value;
	var codigo=document.formu.codigo.value;
	
	if (!v1.test(nombre)) {
		alert("Ingrese el nombre del repuesto");
		document.formu.nombre.focus();
		return;
	}
	 if (codigo==""){
    alert("Por favor ingrese el codigo");
    document.formu.codigo.focus();
    return;
  }
	document.formu.submit();
}
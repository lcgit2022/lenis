"use strict"
function validar(){
	var promociones = document.formu.promociones.value;
	var descuentos = document.formu.descuentos.value;
	
	if (!v1.test(promociones)) {
		alert("Ingrese el nombre de la promocion");
		document.formu.promociones.focus();
		return;
	}
	if (descuentos==""){
    alert("Por favor ingrese el descuento");
    document.formu.descuentos.focus();
    return;
  }
	document.formu.submit();
}
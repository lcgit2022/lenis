"use strict"
function validar(){
	var forma_de_pago = document.formu.forma_de_pago.value;
	var forma_de_entrega= document.formu.forma_de_entrega.value;

        if (!v1.test(forma_de_pago)) {
		alert("La forma de pago esta vacio");
		document.formu.forma_de_pago.focus();
		return;
	    }
		if (!v1.test(forma_de_entrega)) {
		alert("La forma de entrega esta vacio");
		document.formu.forma_de_entrega.focus();
		return;
	}
	document.formu.submit();
}
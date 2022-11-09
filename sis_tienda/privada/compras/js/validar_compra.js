"use strict"
function validar(){
	var id_cliente=document.formu.id_cliente.value;
	var detalle_compra=document.formu.detalle_compra.value;
	var cantidad=document.formu.cantidad.value;
	var monto_compras=document.formu.monto_compras.value;
	var fecha_compras=document.formu.fecha_compras.value;

	if (id_cliente=="") {
		alert("Por favor seleccione un cliente");
		document.formu.id_cliente.focus();
		return;
	}
	if (detalle_compra=="") {
		alert("Por favor ingrese el nombre del producto");
		document.formu.detalle_compra.focus();
		return;
	}

    if (cantidad=="") {
		alert("Por favor ingrese la cantidad");
		document.formu.cantidad.focus();
		return;
	}

	if (monto_compras=="") {
		alert("Por favor ingrese el monto de la compra");
		document.formu.monto_compras.focus();
		return;
	}

    if (fecha_compras==""){
        alert("La fecha esta vacia");
        document.formu.fecha_compras.focus();
        return;
    }
	document.formu.submit();
}
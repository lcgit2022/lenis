"use strict"
function validar(){
	var id_empleado=document.formu.id_empleado.value;
	var detalle_ventas=document.formu.detalle_ventas.value;
	var cantidad=document.formu.cantidad.value;
	var monto_ventas=document.formu.monto_ventas.value;
	var fecha_ventas=document.formu.fecha_ventas.value;

	if (id_empleado=="") {
		alert("Por favor seleccione un empleado");
		document.formu.id_empleado.focus();
		return;
	}
	if (detalle_ventas=="") {
		alert("Por favor ingrese el nombre del producto");
		document.formu.detalle_ventas.focus();
		return;
	}

    if (cantidad=="") {
		alert("Por favor ingrese la cantidad");
		document.formu.cantidad.focus();
		return;
	}

	if (monto_ventas=="") {
		alert("Por favor ingrese el monto de la venta");
		document.formu.monto_ventas.focus();
		return;
	}

    if (fecha_ventas==""){
        alert("La fecha esta vacia");
        document.formu.fecha_ventas.focus();
        return;
    }
	document.formu.submit();
}
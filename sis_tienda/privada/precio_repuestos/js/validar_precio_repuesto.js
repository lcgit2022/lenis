"use strict"
function validar(){
  var id_repuesto=document.formu.id_repuesto.value;
  var precio=document.formu.precio.value;
  var fecha_de_asignacion=document.formu.fecha_de_asignacion.value;
  

  if (id_repuesto=="") {
    alert("Por favor seleccione el repuesto");
    document.formu.id_repuesto.focus();
    return;
  }
  if (precio=="") {
    alert("Por favor ingrese el precio del repuesto");
    document.formu.precio.focus();
    return;
  }
   if (fecha_de_asignacion==""){
        alert("La fecha de asignacion esta vacia");
        document.formu.fecha_de_asignacion.focus();
        return;
    }
  document.formu.submit();
}
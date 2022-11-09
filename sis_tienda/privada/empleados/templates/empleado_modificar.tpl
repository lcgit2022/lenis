<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="../{$direc_css}"type="text/css">
    <script type="text/javascript" src="../js/expresiones_regulares.js"></script>
    <script type="text/javascript" src="js/validar_empleado.js"></script>
</head>
<body>
    <div class="formu_ingreso_datos">
        <form action="empleado_modificar1.php" method="post" name="formu">
            <h2>MODIFICAR  EMPLEADO</h2>
            {foreach item=r from=$empleado}
            <input type="text" name="ci" size="15" placeholder="Carnet de Identidad" value="{$r.ci}" >(*)
            <p>
            <input type="text" name="nombre" size="15" placeholder="Nombres" onkeyup="this.value=this.value.toUpperCase()" value="{$r.nombre}">(*)
            </p>
            <p>
            <input type="text" name="ap" size="15" placeholder="Apellido Paterno" onkeyup="this.value=this.value.toUpperCase()" value="{$r.ap}">(*)
            </p>
            <p>
            <input type="text" name="am" size="15" placeholder="Apellido Materno" onkeyup="this.value=this.value.toUpperCase()" value="{$r.am}">(*)
            </p>
            <p>
            <input type="text" name="direccion" size="15" placeholder="Direccion" onkeyup="this.value=this.value.toUpperCase()" value="{$r.direccion}">
            </p>
            <p>
            <input type="text" name="telefono" size="15" placeholder="Telefono" value="{$r.telefono}">
            </p>
            <p>
                <input type="hidden" name="accion" value="">
                <input type="hidden" name="id_empleado" value="{$r.id_empleado}">
                <input type="button" value="Aceptar" onclick="validar();" class="boton2">
                <input type="button" value="Cancelar" onclick="javascript:location.href='empleados.php';" class="boton2">
            </p>
            {/foreach}
            <p><b>(*)Campos Obligatorios</b></p>
        </form>
    </div>
</body>
</html>

<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="../{$direc_css}"type="text/css">
    <script type="text/javascript" src="../js/expresiones_regulares.js"></script>
    <script type="text/javascript" src="js/validar_repuesto.js"></script>
</head>
<body>
    <div class="formu_ingreso_datos">
        <form action="repuesto_modificar1.php" method="post" name="formu">
            <h2>MODIFICAR  REPUESTO</h2>
            {foreach item=r from=$repuesto}
            <p>
            <input type="text" name="nombre" size="15" placeholder="Nombre" onkeyup="this.value=this.value.toUpperCase()" value="{$r.nombre}">(*)
            </p>
            <p>
            <input type="text" name="codigo" size="15" placeholder="Codigo" onkeyup="this.value=this.value.toUpperCase()" value="{$r.codigo}">(*)
            </p>
            <p>
                <input type="hidden" name="accion" value="">
                <input type="hidden" name="id_repuesto" value="{$r.id_repuesto}">
                <input type="button" value="Aceptar" onclick="validar();" class="boton2">
                <input type="button" value="Cancelar" onclick="javascript:location.href='repuestos.php';" class="boton2">
            </p>
            {/foreach}
            <p><b>(*)Campos Obligatorios</b></p>
        </form>
    </div>
</body>
</html>

<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="../{$direc_css}"type="text/css">
    <script type="text/javascript" src="../js/expresiones_regulares.js"></script>
    <script type="text/javascript" src="js/validar_novedad.js"></script>
</head>
<body>
    <div class="formu_ingreso_datos">
        <form action="novedad_modificar1.php" method="post" name="formu">
            <h2>MODIFICAR  NOVEDAD</h2>
            {foreach item=r from=$novedad}
            <input type="text" name="promociones" size="15" placeholder="Promociones" onkeyup="this.value=this.value.toUpperCase()" value="{$r.promociones}" >(*)
            <p>
            <input type="text" name="descuentos" size="15" placeholder="Descuento" onkeyup="this.value=this.value.toUpperCase()" value="{$r.descuentos}">(*)
            </p>
            <p>
                <input type="hidden" name="accion" value="">
                <input type="hidden" name="id_novedad" value="{$r.id_novedad}">
                <input type="button" value="Aceptar" onclick="validar();" class="boton2">
                <input type="button" value="Cancelar" onclick="javascript:location.href='novedades.php';" class="boton2">
            </p>
            {/foreach}
            <p><b>(*)Campos Obligatorios</b></p>
        </form>
    </div>
</body>
</html>

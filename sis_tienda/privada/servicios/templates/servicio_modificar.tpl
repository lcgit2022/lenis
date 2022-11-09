<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="../{$direc_css}"type="text/css">
    <script type="text/javascript" src="../js/expresiones_regulares.js"></script>
    <script type="text/javascript" src="js/validar_servicio.js"></script>
</head>
<body>
    <div class="formu_ingreso_datos">
        <form action="servicio_modificar1.php" method="post" name="formu">
            <h2>MODIFICAR  SERVICIO</h2>
            {foreach item=r from=$servicio}
            <input type="text" name="forma_de_pago" size="30" placeholder="Forma de pago" onkeyup="this.value=this.value.toUpperCase()" value="{$r.forma_de_pago}" >(*)
            <p>
            <input type="text" name="forma_de_entrega" size="30" placeholder="forma de entrega" onkeyup="this.value=this.value.toUpperCase()" value="{$r.forma_de_entrega}">(*)
            </p>
            <p>
                <input type="hidden" name="accion" value="">
                <input type="hidden" name="id_servicio" value="{$r.id_servicio}">
                <input type="button" value="Aceptar" onclick="validar();" class="boton2">
                <input type="button" value="Cancelar" onclick="javascript:location.href='servicios.php';" class="boton2">
            </p>
            {/foreach}
            <p><b>(*)Campos Obligatorios</b></p>
        </form>
    </div>
</body>
</html>

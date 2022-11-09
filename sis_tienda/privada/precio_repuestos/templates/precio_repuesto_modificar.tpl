<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="../{$direc_css}"type="text/css">
    <script type="text/javascript" src="../js/expresiones_regulares.js"></script>
    <script type="text/javascript" src="js/validar_precio_repuesto.js"></script>
    <link rel="stylesheet" type="text/css" href="../calendario/tcal.css">
    <script type="text/javascript" src="../calendario/tcal.js"></script>
</head>
<body>
    <div class="formu_ingreso_datos">
        <form action="precio_repuesto_modificar1.php" method="post" name="formu">
            <h2>MODIFICAR PRECIO REPUESTO</h2>
            <b>Repuesto (*)</b>
            <select name="id_repuesto">
            {foreach item=r from=$repuesto}
            <option value="{$r.id_repuesto}">{$r.nombre} - {$r.codigo}</option>    
            {/foreach}
            {foreach item=r from=$repuestos}
            <option value="{$r.id_repuesto}">{$r.nombre} - {$r.codigo}</option>
            {/foreach}
            </select>
            {foreach item=r from=$precio_repuesto}
            <p>
            <p>
            <input type="text" name="precio" size="20" placeholder="Precio" value="{$r.precio}">(*)
            </p>
            <p>
            <input type="date" name="fecha_de_asignacion" size="15" class="tcal" value="{$r.fecha_de_asignacion}">(*)
            </p>
            <p>
            <p>
                <input type="hidden" name="accion" value="">
                <input type="hidden" name="id_precio_repuesto" value="{$r.id_precio_repuesto}">
                <input type="button" value="Aceptar" onclick="validar();" class="boton2">
                <input type="button" value="Cancelar" onclick="javascript:location.href='precio_repuestos.php';" class="boton2">
            </p>
            {/foreach}
            <p><b>(*)Campos Obligatorios</b></p>
        </form>
    </div>
</body>
</html>



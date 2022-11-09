<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="../{$direc_css}"type="text/css">
    <script type="text/javascript" src="../js/expresiones_regulares.js"></script>
    <script type="text/javascript" src="js/validar_repuesto.js"></script>
</head>
<body>
    <div class="formu_ingreso_datos">
        <form action="repuesto_nuevo1.php" method="post" name="formu">
            <h2>REGISTRAR REPUESTO</h2>
            <input type="text" name="nombre" size="25" placeholder="Nombre Repuesto" onkeyup="this.value=this.value.toUpperCase()">(*)
            <p>
            <input type="text" name="codigo" size="25" placeholder="Codigo Repuesto" onkeyup="this.value=this.value.toUpperCase()">(*)
            </p>
            <p>
                <input type="hidden" name="accion" value="">
                <input type="button" value="Aceptar" onclick="validar();" class="boton2">
                <input type="button" value="Cancelar" onclick="javascript:location.href='repuestos.php';" class="boton2">
            </p>
            <p><b>(*)Campos Obligatorios</b></p>
        </form>
    </div>
</body>
</html>
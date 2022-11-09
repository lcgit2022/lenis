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
		<form action="precio_repuesto_nuevo1.php" method="post" name="formu">
			<h2>REGISTRAR PRECIO REPUESTO</h2>
			<b>Repuestos (*)</b>
			<select name="id_repuesto">
			<option value="">--- seleccione ---</option>
			{foreach item=r from=$repuestos}
			<option value="{$r.id_repuesto}">{$r.nombre}---{$r.codigo}</option>
			{/foreach}
			</select>
			<p>
			<input type="text" name="precio" size="10" placeholder="Precio Repuesto">(*)
			</p>
			<p>
			<input type="date" name="fecha_de_asignacion" size="15" class="tcal">(*)
			</p>
			<p>
				<input type="hidden" name="accion" value="">
				<input type="button" value="Aceptar" onclick="validar();" class="boton2">
				<input type="button" value="Cancelar" onclick="javascript:location.href='precio_repuestos.php';" class="boton2">
			</p>
			<p><b>(*)Campos Obligatorios</b></p>
		</form>
	</div>
</body>
</html>

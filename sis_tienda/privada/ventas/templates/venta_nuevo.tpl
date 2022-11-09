<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="../{$direc_css}"type="text/css">
	<script type="text/javascript" src="../js/expresiones_regulares.js"></script>
	<script type="text/javascript" src="js/validar_venta.js"></script>
	<link rel="stylesheet" type="text/css" href="../calendario/tcal.css">
	<script type="text/javascript" src="../calendario/tcal.js"></script>
</head>
<body>
	<div class="formu_ingreso_datos">
		<form action="venta_nuevo1.php" method="post" name="formu">
			<h2>REGISTRAR VENTAS</h2>
			<b>Empleados (*)</b>
			<select name="id_empleado">
			<option value="">--- seleccione ---</option>
			{foreach item=r from=$empleados}
			<option value="{$r.id_empleado}">{$r.ap}-{$r.am}-{$r.nombre}</option>
			{/foreach}
			</select>
			<p>
			<input type="text" name="detalle_ventas" size="30" placeholder="Nombre de Pieza" onkeyup="this.value=this.value.toUpperCase()" >(*)
			</p>
			<p>
			<input type="text" name="cantidad" size="20" placeholder="Cantidad">(*)
			</p>
			<p>
			<input type="text" name="monto_ventas" size="20" placeholder="Precio">(*)
			</p>
			<p>
			<input type="date" name="fecha_ventas" size="15" class="tcal">(*)
			</p>
			<p>
				<input type="hidden" name="accion" value="">
				<input type="button" value="Aceptar" onclick="validar();" class="boton2">
				<input type="button" value="Cancelar" onclick="javascript:location.href='ventas.php';" class="boton2">
			</p>
			<p><b>(*)Campos Obligatorios</b></p>
		</form>
	</div>
</body>
</html>
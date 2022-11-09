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
		<form action="venta_modificar1.php" method="post" name="formu">
			<h2>MODIFICAR VENTA</h2>
			<b>Empleado (*)</b>
			<select name="id_empleado">
			{foreach item=r from=$empleado}
			<option value="{$r.id_empleado}">{$r.ap} - {$r.am} - {$r.nombre}</option>	
			{/foreach}
			{foreach item=r from=$empleados}
			<option value="{$r.id_empleado}">{$r.ap} - {$r.am} - {$r.nombre}</option>
			{/foreach}
			</select>
			{foreach item=r from=$venta}
			<p>
			<input type="text" name="detalle_ventas" size="30" placeholder="Nombre de Pieza" onkeyup="this.value=this.value.toUpperCase()" value="{$r.detalle_ventas}">(*)
			</p>
			<p>
			<input type="text" name="cantidad" size="20" placeholder="Cantidad" value="{$r.cantidad}">(*)
			</p>
			<p>
			<input type="text" name="monto_ventas" size="20" placeholder="Precio" value="{$r.monto_ventas}">(*)
			</p>
			<p>
			<input type="date" name="fecha_ventas" size="15" class="tcal" value="{$r.fecha_ventas}">(*)
			</p>
			<p>
				<input type="hidden" name="accion" value="">
				<input type="hidden" name="id_venta" value="{$r.id_venta}">
				<input type="button" value="Aceptar" onclick="validar();" class="boton2">
				<input type="button" value="Cancelar" onclick="javascript:location.href='ventas.php';" class="boton2">
			</p>
			{/foreach}
			<p><b>(*)Campos Obligatorios</b></p>
		</form>
	</div>
</body>
</html>	
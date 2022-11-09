<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="../{$direc_css}"type="text/css">
	<script type="text/javascript" src="../js/expresiones_regulares.js"></script>
	<script type="text/javascript" src="js/validar_compra.js"></script>
	<link rel="stylesheet" type="text/css" href="../calendario/tcal.css">
	<script type="text/javascript" src="../calendario/tcal.js"></script>
</head>
<body>
	<div class="formu_ingreso_datos">
		<form action="compra_modificar1.php" method="post" name="formu">
			<h2>MODIFICAR COMPRA</h2>
			<b>Cliente (*)</b>
			<select name="id_cliente">
			{foreach item=r from=$cliente}
			<option value="{$r.id_cliente}">{$r.ap} - {$r.am} - {$r.nombre}</option>	
			{/foreach}
			{foreach item=r from=$clientes}
			<option value="{$r.id_cliente}">{$r.ap} - {$r.am} - {$r.nombre}</option>
			{/foreach}
			</select>
			{foreach item=r from=$compra}
			<p>
			<input type="text" name="detalle_compra" size="30" placeholder="Nombre de Pieza" onkeyup="this.value=this.value.toUpperCase()" value="{$r.detalle_compra}">(*)
			</p>
			<p>
			<input type="text" name="cantidad" size="20" placeholder="Cantidad" value="{$r.cantidad}">(*)
			</p>
			<p>
			<input type="text" name="monto_compras" size="20" placeholder="Precio" value="{$r.monto_compras}">(*)
			</p>
			<p>
			<input type="date" name="fecha_compras" size="15" class="tcal" value="{$r.fecha_compras}">(*)
			</p>
			<p>
				<input type="hidden" name="accion" value="">
				<input type="hidden" name="id_compra" value="{$r.id_compra}">
				<input type="button" value="Aceptar" onclick="validar();" class="boton2">
				<input type="button" value="Cancelar" onclick="javascript:location.href='compras.php';" class="boton2">
			</p>
			{/foreach}
			<p><b>(*)Campos Obligatorios</b></p>
		</form>
	</div>
</body>
</html>	
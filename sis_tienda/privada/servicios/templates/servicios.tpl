<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="../{$direc_css}">
	<meta http-equiv="Content-type" content="text/html; charset=utf-8">

</head>
<body>
	<table width="100%" border="0">
		<tr>
			<td width="33%">
				<table border="0">
					<tr>
					</tr>
				</table>
			</td>
			<td align="center" width="33%">
				<h1>SERVICIOS</h1>
			</td>
			<td align="rigth" width="33%">
			<th><img src="../../imagenes/nuevo.jpg" >	
				<form name="formNuevo" method="post" action="servicio_nuevo.php">
					<a href="javascript:document.formNuevo.submit();">
						Nuevo>>>
					</a>
				</th>
				</form>
			</td>
		</tr>	
	</table>

	<center>
		<table class="listado">
			<tr>
				<th>NRO</th><th>FORMA DE PAGO</th><th>FORMA DE ENTREGA</th>
				<th><img src="../../imagenes/modificar.jpg"></th><th><img src="../../imagenes/eliminar.png"></th>
			</tr>
			{assign var="b" value="1"}
			{foreach item=r from=$servicios}
			<tr>
				<td align="center">{$b}</td>
				<td>{$r.forma_de_pago}</td>
				<td>{$r.forma_de_entrega}</td>
				<td align="center">
					<form name="formModif{$r.id_servicio}" method="post" action="servicio_modificar.php">
						<input type="hidden" name="id_servicio" value="{$r.id_servicio}">
						<a href="javascript:document.formModif{$r.id_servicio}.submit();" title="Modificar Servicio">
							Modificar>>
						</a>
					</form>
				</td>
				<td align="center">
					<form name="fomElimi{$r.id_servicio}" method="post" action="servicio_eliminar.php">
						<input type="hidden" name="id_servicio" value="{$r.id_servicio}">
						<a href="javascript:document.fomElimi{$r.id_servicio}.submit();" title="Eliminar Servicio" onclick='javascript:return(confirm("Desea Realmente Eliminar al Servicio...{$r.id_servicio}?"));'>
							Eliminar>>
						</a>
					</form>
				</td>
				{assign var="b" value="`$b+1`"}
				{/foreach}
			</tr>
		</table>
		
	</center>
</body>
</html>
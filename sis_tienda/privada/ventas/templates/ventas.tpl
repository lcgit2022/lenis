<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="../{$direc_css}">
	<meta http-equiv="Content-type" content="text/html; charset=utf-8">
</head>
<body>
	<div  class="titulo_listado">
		<h1>
		  VENTAS
		</h1>
	</div>
	<div class="titulo_nuevo">
		<th><img src="../../imagenes/nuevo.jpg" ></th>
		<form name="formNuevo" method="post" action="venta_nuevo.php">
			<a href="javascript:document.formNuevo.submit();">
				Nuevo>>>
			</a>
		</form>
	</div>
	<center>
		<table class="listado">
			<tr>
				<th>NRO</th><th>VENTA</th><th>CANTIDAD DEL PRODUCTO</th></TH><th>FECHA VENTA</th><th>MONTO</th><th>EMPLEADO</th>
				<th><img src="../../imagenes/modificar.jpg"></th><th><img src="../../imagenes/eliminar.png"></th>
			</tr>
			{assign var="b" value="0"}
			{assign var="total" value="`$pagina-1`"}
			{assign var="a" value="`$numreg*$total`"}
			{assign var="b" value="`$b+1+$a`"}
			{foreach item=r from=$ventas}
			<tr>
				<td align="center">{$b}</td>
				<td>{$r.detalle_ventas}</td>
				<td>{$r.cantidad}</td>
				<td>{$r.fecha_ventas}</td>
				<td>{$r.monto_ventas}</td>
				<td>{$r.am}  {$r.ap}  {$r.nombre}</td>
				<td align="center">
				<form name="formModif{$r.id_venta}" method="post" action="venta_modificar.php">
				<input type="hidden" name="id_venta" value="{$r.id_venta}">
				<input type="hidden" name="id_empleado" value="{$r.id_empleado}">
				<a href="javascript:document.formModif{$r.id_venta}.submit();" title="Modificar venta Sistema">
					Modificar>>
				</a>
			</form>
		</td>
		<td align="center">
			<form name="formElimi{$r.id_venta}" method="post" action="venta_eliminar.php">
				<input type="hidden" name="id_venta" value="{$r.id_venta}">
				<a href="javascript:document.formElimi{$r.id_venta}.submit();" title="Eliminar Venta Sistema" onclick="javascript:return(confirm('Desea realmente Eliminar Venta...?')); location.href='ventas_eliminar.php'">
					Eliminar>>
				</a>
			</form>
		</td>
		{assign var="b" value="`$b+1`"}
		{/foreach}
			</tr>
		</table>
		<!--PAGINACION----------------------------->
		<table>
			<tr align="center">
				<td>
					{if !empty($urlback)}
					<a onclick="location.href='{$urlback}'" style="font-family: Verdana;font-size: 9px;cursor:pointer;"; >&laquo;Anterior</a>
					{/if}
					 {if !empty($paginas)}
					  {foreach from=$paginas item=pag}
					   {if $pag.npag == $pagina}
					   	{if $pagina neq '1'}|{/if} <b style="color:#FB992F;font-size: 12PX;">{$pag.npag}</b>
					   	{else}
					| <a onclick="location.href='{$pag.pagV}'" style="cursor: pointer;"> {$pag.npag}</a>
					{/if}
					{/foreach}
					{/if}
					{if $numpaginas gt $numbotones and !empty($urlnext) and $pagina lt $numpaginas}
					| <a onclick="location.href='{$urlnext}'" style="font-family: Verdana;font-size: 9px;cursor:pointer;">Siguiente&raquo;</a>
					{/if}	
				</td>
			</tr>
		</table>
	</center>
</body>
</html>
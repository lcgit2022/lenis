<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="../{$direc_css}">
	<meta http-equiv="Content-type" content="text/html; charset=utf-8">
</head>
<body>
	<div  class="titulo_listado">
         <h1>
			CLIENTES
		</h1>
	</div>
	<div class="titulo_nuevo">
		<th><img src="../../imagenes/nuevo.jpg" ></th>
		<form name="formNuevo" method="post" action="cliente_nuevo.php">
			<a href="javascript:document.formNuevo.submit();">
				Nuevo>>>
			</a>
		</form>
	</div>
	<center>
		<table class="listado">
			<tr>
				<th>NRO</th><th>NOMBRE</th><th>AP</th><th>AM</th><th>CI</th><th>TELEFONO</th><th>DIRECCION</th>
				<th><img src="../../imagenes/modificar.jpg"></th><th><img src="../../imagenes/eliminar.png"></th>
			</tr>
			{assign var="b" value="0"}
			{assign var="total" value="`$pagina-1`"}
			{assign var="a" value="`$numreg*$total`"}
			{assign var="b" value="`$b+1+$a`"}
			{foreach item=r from=$clientes}
			<tr>
				<td align="center">{$b}</td>
				<td>{$r.nombre}</td>
				<td>{$r.ap}</td>
				<td align="center">{$r.am}</td>
				<td align="center">{$r.ci}</td>
				<td align="center">{$r.telefono}</td>
				<td align="center">{$r.direccion}</td>
				<td align="center">
			<form name="formModif{$r.id_cliente}" method="post" action="cliente_modificar.php">
				<input type="hidden" name="id_cliente" value="{$r.id_cliente}">
				<a href="javascript:document.formModif{$r.id_cliente}.submit();" title="Modificar Cliente Sistema">
					Modificar>>
				</a>
			</form>
		</td>
		<td align="center">
			<form name="formElimi{$r.id_cliente}" method="post" action="cliente_eliminar.php">
				<input type="hidden" name="id_cliente" value="{$r.id_cliente}">
				<a href="javascript:document.formElimi{$r.id_cliente}.submit();" title="Eliminar Clientes Sistema" onclick="javascript:return(confirm('Desea realmente Eliminar al Cliente {$r.nombre} {$r.ap} {$r.am}')); location.href='cliente_eliminar.php'">
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
					<a onclick="location.href='{$urlback}'" style="font-family: Verdana;font-size: 9px;cursor:pointer"; >&laquo;Anterior</a>
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
					| <a onclick="location.href='{$urlnext}'" style="font-family: Verdana;font-size: 9px;cursor:pointer">Siguiente&raquo;</a>
					{/if}	
				</td>
			</tr>
		</table>
	</center>
</body>
</html>
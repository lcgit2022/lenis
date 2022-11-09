<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="../{$direc_css}">
	<meta http-equiv="Content-type" content="text/html; charset=utf-8">
</head>
<body>
	<div  class="titulo_listado">
		<h1>
		  NOVEDADES
		</h1>
	</div>
	<div class="titulo_nuevo">
		<th><img src="../../imagenes/nuevo.jpg" ></th>
		<form name="formNuevo" method="post" action="novedad_nuevo.php">
			<a href="javascript:document.formNuevo.submit();">
				Nuevo>>>
			</a>
		</form>
	</div>
	<center>
		<table class="listado">
			<tr>
				<th>NRO</th><th>PROMOCIONES</th><th>DESCUENTOS</th>
				<th><img src="../../imagenes/modificar.jpg"></th><th><img src="../../imagenes/eliminar.png"></th>
			</tr>
			{assign var="b" value="0"}
			{assign var="total" value="`$pagina-1`"}
			{assign var="a" value="`$numreg*$total`"}
			{assign var="b" value="`$b+1+$a`"}
			{foreach item=r from=$novedades}
			<tr>
				<td align="center">{$b}</td>
				<td>{$r.promociones}</td>
				<td>{$r.descuentos}</td>
				<td align="center">
			<form name="formModif{$r.id_novedad}" method="post" action="novedad_modificar.php">
				<input type="hidden" name="id_novedad" value="{$r.id_novedad}">
				<a href="javascript:document.formModif{$r.id_novedad}.submit();" title="Modificar Novedad Sistema">
					Modificar>>
				</a>
			</form>
		</td>
		<td align="center">
			<form name="formElimi{$r.id_novedad}" method="post" action="novedad_eliminar.php">
				<input type="hidden" name="id_novedad" value="{$r.id_novedad}">
				<a href="javascript:document.formElimi{$r.id_novedad}.submit();" title="Eliminar Novedad Sistema" onclick="javascript:return(confirm('Desea realmente Eliminar Novedad...?')); location.href='novedad_eliminar.php'">
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
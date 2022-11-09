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
				<h1>USUARIOS</h1>
			</td>
			<td align="rigth" width="33%">	
				<th><img src="../../imagenes/nuevo.jpg" >
				<form name="formNuevo" method="post" action="usuario_nuevo.php">
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
				<th>NRO</th><th>USUARIO</th><th>PERSONA</th>
				<th><img src="../../imagenes/modificar.jpg"></th><th><img src="../../imagenes/eliminar.png"></th>
			</tr>
			{assign var="b" value="1"}
			{foreach item=r from=$usuarios}
			<tr>
				<td align="center">{$b}</td>
				<td>{$r.usuario1}</td>
				<td>{$r.ap} {$r.am} {$r.nombres}</td>
				<td align="center">
					<form name="formModif{$r.id_usuario}" method="post" action="usuario_modificar.php">
						<input type="hidden" name="id_usuario" value="{$r.id_usuario}">
						<input type="hidden" name="id_persona" value="{$r.id_persona}">
						<a href="javascript:document.formModif{$r.id_usuario}.submit();" title="Modificar Usuarios">
							Modificar>>
						</a>
					</form>
				</td>
				<td align="center">
					<form name="formElimi{$r.id_usuario}" method="post" action="usuario_eliminar.php">
						<input type="hidden" name="id_usuario" value="{$r.id_usuario}">
						<a href="javascript:document.formElimi{$r.id_usuario}.submit();" title="Eliminar Usuario" onclick='javascript:return(confirm("Desea Realmente Eliminar al Usuario:::{$r.usuario1}?"));'>
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
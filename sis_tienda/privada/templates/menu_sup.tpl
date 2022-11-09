<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet"  href="{$direc_css}" type="text/css">
</head>
<body>
	<div class="cabecera">
		<img src="../../sis_tienda/imagenes/{$logo_sistema}" width="10%">
		<div class="titulo">
         TIENDA "{$nombre}"
		</div>
		<div class="usuario">
			Usuario: <b>{$sesion.usuario}</b>
			Rol: <b>{$sesion.rol}</b>
		</div>
	</div>
</body>
</html>
<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="../{$direc_css}"type="text/css">
	<script type="text/javascript" src="../js/expresiones_regulares.js"></script>
	<script type="text/javascript" src="js/validar_usuario.js"></script>
</head>
<body>
	<div class="formu_ingreso_datos">
		<form action="usuario_nuevo1.php" method="post" name="formu">
			<h2>REGISTRAR USUARIO</h2>
			<b>Persona (*)</b>
			<select name="id_persona">
			<option value="">--- seleccione ---</option>
			{foreach item=r from=$personas}
			<option value="{$r.id_persona}">{$r.ap}-{$r.am}-{$r.nombres}</option>
			{/foreach}
			</select>
			<p>
			<input type="text" name="usuario1" size="15" placeholder="Usuario" >(*)
			</p>
			<p>
			<input type="password" name="clave" size="15" placeholder="Clave">(*)
			</p>
			<p>
				<input type="hidden" name="accion" value="">
				<input type="button" value="Aceptar" onclick="validar();" class="boton2">
				<input type="button" value="Cancelar" onclick="javascript:location.href='usuarios.php';" class="boton2">
			</p>
			<p><b>(*)Campos Obligatorios</b></p>
		</form>
	</div>
</body>
</html>
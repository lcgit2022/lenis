<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="../{$direc_css}">
	<script type="text/javascript">
		function refrescar(){
			var p = window.parent;
			p.location.href='../';
		}
	</script>
	
</head>
<body ONLOAD="self.setTimeout('refrescar()', 500);">
	<center>
		<h1>{$mensage}</h1>
		<h3 style="color:red;">{$nom_completo}</h3>
		<br>
		<h1>{$mensage1}</h1>
	</center>
</body>
</html>
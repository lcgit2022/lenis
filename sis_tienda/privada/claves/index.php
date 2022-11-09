<?php
session_start();
require_once("../../smarty/libs/Smarty.class.php");
require_once("../../conexion.php");

//$db->debug = true
if ((isset($_POST["accion"])) and ($_POST["accion"]=="Ingresar")){
	$nick = $_POST["nick"];
	$password = $_POST["password"];
	
	$sql1 = $db->Prepare("SELECT u.clave
						  FROM usuarios u
						  WHERE u.usuario1= ?
						  AND u.estado <> '0'	
						");
	$rs1 = $db->GetAll($sql1, array($nick));
	if ($rs1)
		$clave_bd = $rs1[0]["clave"];
	else
		$clave_bd = 0;

	//PARTA SACAR LOS DATO DE LA PERSONA CONECTADA
	$sql2 = $db->Prepare(/*"SELECT p.*
						FROM personas p, usuarios u
						WHERE u.usuario1= ?
						AND u.id_persona = p.id_persona
						AND p.estado <> '0'
						AND	u.estado <> '0'
						"*/
						"SELECT p.*
						FROM personas p
						INNER JOIN usuarios u ON u.id_persona = p.id_persona
						WHERE u.usuario1= ?
						AND p.estado <> '0'
						AND	u.estado <> '0'");
	$rs2 = $db->GetAll($sql2, array($nick));
	if ($rs2){
		$nombres = $rs2[0]["nombres"];
		$ap = $rs2[0]["ap"];
		$am = $rs2[0]["am"];
		$nom_completo = $nombres." ".$ap. " ".$am;
	}else{
		$nom_completo = '';
	}
	if (password_verify($password, $clave_bd)) {
		$sql = $db->Prepare("SELECT u.*, ur.id_rol, r.rol

							FROM usuarios u
							INNER JOIN usuarios_roles ur ON u.id_usuario = ur.id_usuario
							INNER JOIN roles r ON ur.id_rol = r.id_rol
							WHERE u.usuario1 = ?
							AND u.estado <> '0'
							AND ur.estado <> '0'
							AND r.estado <> '0'
							");
		
		$rs = $db->GetAll($sql, array($nick));

		if ($rs) {
			foreach ($rs as $k => $linea) {
				$_SESSION["sesion_id_usuario"] = $linea["id_usuario"];
				$_SESSION["sesion_usuario"] = $linea["usuario1"];
				$_SESSION["sesion_id_rol"] = $linea["id_rol"];
				$_SESSION["sesion_rol"] = $linea["rol"];
				$_SESSION["sesion_id_usuario"];
			}
			$mensage = "DATOS CORRECTOS...!!!";
			$mensage1 = "BIENVENIDOS AL SISTEMA.....!!!";
		
		} else {
			$mensage = "DATOS INCORRECTOS1...!!!";
			$mensage1 = "POR FAVOR INTENTE NUEVAMENTE...!!!";
		
		}
			
		} else {
			$mensage = "DATOS INCORRECTOS2...!!!";
			$mensage1 = "POR FAVOR INTENTE NUEVAMENTE...!!!";
			
	}		

		} else {
			$mensage = "CERRANDO LA SESION...!!!";
			$mensage1 = "SE ESTA SALIENDO DEL SISTEMA...!!!";
			$nom_completo='';

	
			session_destroy();
}
$smarty = new Smarty;

$smarty-> assign("mensage", $mensage);
$smarty-> assign("mensage1", $mensage1);
$smarty-> assign("nom_completo", $nom_completo);
$smarty-> assign("direc_css", $direc_css);
$smarty-> display("index.tpl");
?>
<?php
session_start();
require_once("../../smarty/libs/Smarty.class.php");
require_once("../../conexion.php");

$smarty = new Smarty;

$sql = $db->Prepare("SELECT *
					  FROM personas p, usuarios u
					  WHERE p.id_persona =u.id_persona
					  AND p.estado <> '0' 
					  AND u.estado <> '0'
					  ORDER BY (u.id_persona) DESC 
					");
$rs=$db->GetAll($sql);
$sql1 = $db->Prepare("SELECT *
					FROM tienda
					WHERE id_tienda= 1
					AND estado = '1' 
					"
				);
	$rs1=$db->GetAll($sql1);
	$nombre= $rs1[0]["nombre"];
	$logo_sistema = $rs1[0]["logo_sistema"];

	$fecha = date("Y-m-d H:i:s");

$smarty->assign("personas_usuarios", $rs);
$smarty->assign("logo_sistema", $logo_sistema);
$smarty->assign("fecha", $fecha);
$smarty->assign("direc_css", $direc_css);
$smarty->display("personas_usuarios1.tpl");
?>
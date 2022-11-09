<?php
session_start();
require_once("../../smarty/libs/Smarty.class.php");
require_once("../../conexion.php");

$fecha1 = $_REQUEST["fecha1"];
$fecha2 = $_REQUEST["fecha2"];

$smarty = new Smarty;


$sql = $db->Prepare("SELECT *
					  FROM personas 
					  WHERE fec_insercion BETWEEN ? AND ?
					  AND estado <> '0'  
					");
$rs=$db->GetAll($sql,array($fecha1, $fecha2));

$sql1 = $db->Prepare("SELECT *
					FROM tienda
					WHERE id_tienda= 1
					AND estado = '1' 
					"
				);
	$rs1=$db->GetAll($sql1);
	$nombre= $rs1[0]["nombre"];
	$logo_sistema = $rs1[0]["logo_sistema"];



$smarty->assign("personas_fechas1", $rs);
$smarty->assign("logo_sistema", $logo_sistema);
$smarty->assign("fecha1", $fecha1);
$smarty->assign("fecha2", $fecha2);


$smarty->assign("direc_css", $direc_css);
$smarty->display("personas_fechas1.tpl");
?>
<?php
session_start();
require_once("../../smarty/libs/Smarty.class.php");
require_once("../../conexion.php");
require_once("../libreria_menu.php");

$id_venta=$_REQUEST["id_venta"];
$id_empleado=$_REQUEST["id_empleado"];

$smarty = new Smarty;

$sql = $db->Prepare("SELECT *
					  FROM ventas
					  WHERE id_venta= ?
					");
$rs=$db->GetAll($sql, array($id_venta));


$sql2 = $db->Prepare("SELECT *
					  FROM empleados
					  WHERE id_empleado = ?
					  AND estado <> '0'
					");
$rs2=$db->GetAll($sql2, array($id_empleado));


$sql3 = $db->Prepare("SELECT *
					  FROM empleados
					  WHERE id_empleado <> ?
					  AND estado<> '0'
					");
$rs3=$db->GetAll($sql3, array($id_empleado));

$smarty->assign("venta", $rs);
$smarty->assign("empleado", $rs2);
$smarty->assign("empleados", $rs3);
$smarty->assign("direc_css", $direc_css);
$smarty->display("venta_modificar.tpl");
?>
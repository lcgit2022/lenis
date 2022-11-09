<?php
session_start();
require_once("../../smarty/libs/Smarty.class.php");
require_once("../../conexion.php");
require_once("../libreria_menu.php");

$id_repuesto=$_REQUEST["id_repuesto"];
$id_precio_repuesto=$_REQUEST["id_precio_repuesto"];

$smarty = new Smarty;

$sql = $db->Prepare("SELECT *
					  FROM precio_repuestos
					  WHERE id_precio_repuesto= ?
					");
$rs=$db->GetAll($sql, array($id_precio_repuesto));


$sql2 = $db->Prepare("SELECT *
					  FROM repuestos
					  WHERE id_repuesto = ?
					  AND estado <> '0'
					");
$rs2=$db->GetAll($sql2, array($id_repuesto));


$sql3 = $db->Prepare("SELECT *
					  FROM repuestos
					  WHERE id_repuesto<> ?
					  AND estado<> '0'
					");
$rs3=$db->GetAll($sql3, array($id_repuesto));

$smarty->assign("precio_repuesto", $rs);
$smarty->assign("repuesto", $rs2);
$smarty->assign("repuestos", $rs3);
$smarty->assign("direc_css", $direc_css);
$smarty->display("precio_repuesto_modificar.tpl");
?>
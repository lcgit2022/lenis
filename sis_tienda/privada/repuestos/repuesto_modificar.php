<?php
session_start();
require_once("../../smarty/libs/Smarty.class.php");
require_once("../../conexion.php");
require_once("../libreria_menu.php");

$id_repuesto=$_REQUEST["id_repuesto"];


$smarty = new Smarty;

$sql = $db->Prepare("SELECT *
					  FROM repuestos
					  WHERE id_repuesto= ?
					");
$rs=$db->GetAll($sql, array($id_repuesto));
$smarty->assign("repuesto" ,$rs);


$smarty->assign("direc_css", $direc_css);
$smarty->display("repuesto_modificar.tpl");
?>
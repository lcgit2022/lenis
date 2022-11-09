<?php
session_start();
require_once("../../smarty/libs//Smarty.class.php");
require_once("../../conexion.php");
require_once("../libreria_menu.php");

$smarty = new Smarty;

$sql = $db->Prepare("SELECT*
					FROM repuestos re
					WHERE re.estado <> '0'
					ORDER BY re.id_repuesto DESC
					");
$rs = $db->GetAll($sql);

$smarty->assign("repuestos", $rs);

$smarty->assign("direc_css", $direc_css);
$smarty->display("precio_repuesto_nuevo.tpl");
?>
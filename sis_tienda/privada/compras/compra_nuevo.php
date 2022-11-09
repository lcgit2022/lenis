<?php
session_start();
require_once("../../smarty/libs//Smarty.class.php");
require_once("../../conexion.php");
require_once("../libreria_menu.php");

$smarty = new Smarty;

$sql = $db->Prepare("SELECT*
					FROM clientes c
					WHERE c.estado <> '0'
					ORDER BY c.id_cliente DESC
					");
$rs = $db->GetAll($sql);

$smarty->assign("clientes", $rs);

$smarty->assign("direc_css", $direc_css);
$smarty->display("compra_nuevo.tpl");
?>
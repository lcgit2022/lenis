<?php
session_start();

require_once("../../smarty/libs/Smarty.class.php");
require_once("../../conexion.php");
require_once("../libreria_menu.php");

$smarty = new Smarty;

//$db->debug=true;

$sql=$db->Prepare("SELECT *
					FROM servicios
					WHERE estado <>'0'
					AND  id_servicio > 0
					ORDER BY id_servicio DESC
					");
$rs = $db->GetAll($sql);

$smarty->assign("servicios", $rs);
$smarty->assign("direc_css", $direc_css);
$smarty->display("servicios.tpl");
?>
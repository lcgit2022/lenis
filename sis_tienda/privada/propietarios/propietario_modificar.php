<?php
session_start();
require_once("../../smarty/libs/Smarty.class.php");
require_once("../../conexion.php");
require_once("../libreria_menu.php");

$id_propietario=$_REQUEST["id_propietario"];


$smarty = new Smarty;

$sql = $db->Prepare("SELECT *
					  FROM propietarios
					  WHERE id_propietario= ?
					");
$rs=$db->GetAll($sql, array($id_propietario));
$smarty->assign("propietario" ,$rs);


$smarty->assign("direc_css", $direc_css);
$smarty->display("propietario_modificar.tpl");
?>
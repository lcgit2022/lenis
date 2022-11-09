<?php
session_start();
require_once("../../smarty/libs/Smarty.class.php");
require_once("../../conexion.php");
require_once("../libreria_menu.php");

$id_novedad=$_REQUEST["id_novedad"];


$smarty = new Smarty;

$sql = $db->Prepare("SELECT *
					  FROM novedades
					  WHERE id_novedad = ?
					");
$rs=$db->GetAll($sql, array($id_novedad));
$smarty->assign("novedad" ,$rs);


$smarty->assign("direc_css", $direc_css);
$smarty->display("novedad_modificar.tpl");
?>
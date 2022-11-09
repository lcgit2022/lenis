<?php
session_start();
require_once("../../smarty/libs/Smarty.class.php");
require_once("../../conexion.php");
require_once("../libreria_menu.php");

$id_empleado=$_REQUEST["id_empleado"];


$smarty = new Smarty;

$sql = $db->Prepare("SELECT *
					  FROM empleados
					  WHERE id_empleado = ?
					");
$rs=$db->GetAll($sql, array($id_empleado));
$smarty->assign("empleado" ,$rs);


$smarty->assign("direc_css", $direc_css);
$smarty->display("empleado_modificar.tpl");
?>
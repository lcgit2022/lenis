<?php
session_start();

require_once("../../smarty/libs/Smarty.class.php");
require_once("../../conexion.php");


$id_repuesto=$_REQUEST["id_repuesto"];


$smarty = new Smarty;

$sql = $db->Prepare("SELECT *
					  FROM tienda
					  WHERE id_repuesto = ?
					  AND estado <> '0'
					");
$rs=$db->GetAll($sql, array($id_repuesto));

if (!$rs) {
	$reg=array();
	$reg["estado"]='0';
    $reg["usuario"]=$_SESSION["sesion_id_usuario"];
    $rs1 = $db->AutoExecute("repuestos", $reg, "UPDATE", "id_repuesto='".$id_repuesto."'");
    header("Location:repuestos.php");
	exit();
}else{

$smarty->assign("mensaje", "ERROR: Los datos no se eliminaron!!!!!!!!!!");
$smarty->assign("direc_css", $direc_css);
$smarty->display("repuesto_eliminar.tpl");	
}
?>
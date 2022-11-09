<?php
session_start();

require_once("../../smarty/libs/Smarty.class.php");
require_once("../../conexion.php");


$id_precio_repuesto=$_REQUEST["id_precio_repuesto"];


$smarty = new Smarty;

$sql = $db->Prepare("SELECT *
					  FROM repuestos
					  WHERE id_precio_repuesto = ?
					  AND estado <> '0'
					");
$rs=$db->GetAll($sql, array($id_precio_repuesto));

if (!$rs) {
	$reg=array();
	$reg["estado"]='0';
    $reg["usuario"]=$_SESSION["sesion_id_usuario"];
    $rs1 = $db->AutoExecute("precio_repuestos", $reg, "UPDATE", "id_precio_repuesto='".$id_precio_repuesto."'");
    header("Location:precio_repuestos.php");
	exit();
}else{

$smarty->assign("mensaje", "ERROR: Los datos no se eliminaron!!!!!!!!!!");
$smarty->assign("direc_css", $direc_css);
$smarty->display("precio_repuesto_eliminar.tpl");	
}
?>
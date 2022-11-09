<?php
session_start();

require_once("../../smarty/libs/Smarty.class.php");
require_once("../../conexion.php");

$id_venta = $_REQUEST["id_venta"];

//$db->debug=true;

$smarty= new Smarty;

$sql = $db->Prepare("SELECT*
					FROM empleados
					WHERE id_venta = ?
				    AND estado <> '0'
					");
$rs=$db->GetAll($sql, array($id_venta));

if  (!$rs) {
	$reg=array();
	$reg["estado"]='0';
    $reg["usuario"]=$_SESSION["sesion_id_usuario"];
    $rs1 = $db->AutoExecute("ventas", $reg, "UPDATE", "id_venta='".$id_venta."'");
   header("Location:ventas.php");
	exit();
}else{
$smarty->assign("mensaje", "ERROR: Los datos no se eliminaron!!!!!!!!!!");
$smarty->assign("direc_css", $direc_css);
$smarty->display("venta_eliminar.tpl");	
}
?>
<?php
session_start();

require_once("../../smarty/libs/Smarty.class.php");
require_once("../../conexion.php");

$id_servicio= $_REQUEST["id_servicio"];

//$db->debug=true;

$smarty= new Smarty;

$sql = $db->Prepare("SELECT*
					FROM tienda
					WHERE id_servicio = ?
				    AND estado <> '0'
					");
$rs=$db->GetAll($sql, array($id_servicio));

if  (!$rs) {
	$reg=array();
	$reg["estado"]='0';
    $reg["usuario"]=$_SESSION["sesion_id_usuario"];
    $rs1 = $db->AutoExecute("servicios", $reg, "UPDATE", "id_servicio='".$id_servicio."'");
   header("Location:servicios.php");
	exit();
}else{
$smarty->assign("mensaje", "ERROR: Los datos no se eliminaron!!!!!!!!!!");
$smarty->assign("direc_css", $direc_css);
$smarty->display("servicio_eliminar.tpl");	
}
?>
<?php
session_start();

require_once("../../smarty/libs/Smarty.class.php");
require_once("../../conexion.php");


$id_propietario=$_REQUEST["id_propietario"];


$smarty = new Smarty;

$sql = $db->Prepare("SELECT *
					  FROM tienda
					  WHERE id_propietario = ?
					  AND estado <> '0'
					");
$rs=$db->GetAll($sql, array($id_propietario));

if (!$rs) {
	$reg=array();
	$reg["estado"]='0';
    $reg["usuario"]=$_SESSION["sesion_id_usuario"];
    $rs1 = $db->AutoExecute("propietarios", $reg, "UPDATE", "id_propietario='".$id_propietario."'");
    header("Location:propietarios.php");
	exit();
}else{

$smarty->assign("mensaje", "ERROR: Los datos no se eliminaron!!!!!!!!!!");
$smarty->assign("direc_css", $direc_css);
$smarty->display("propietario_eliminar.tpl");	
}
?>
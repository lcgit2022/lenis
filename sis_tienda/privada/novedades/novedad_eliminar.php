<?php
session_start();

require_once("../../smarty/libs/Smarty.class.php");
require_once("../../conexion.php");

$id_novedad = $_REQUEST["id_novedad"];

//$db->debug=true;

$smarty= new Smarty;

$sql = $db->Prepare("SELECT*
					FROM tienda
					WHERE id_novedad = ?
				    AND estado <> '0'
					");
$rs=$db->GetAll($sql, array($id_novedad));

if  (!$rs) {
	$reg=array();
	$reg["estado"]='0';
    $reg["usuario"]=$_SESSION["sesion_id_usuario"];
    $rs1 = $db->AutoExecute("novedades", $reg, "UPDATE", "id_novedad='".$id_novedad."'");
   header("Location:novedades.php");
	exit();
}else{
$smarty->assign("mensaje", "ERROR: Los datos no se eliminaron!!!!!!!!!!");
$smarty->assign("direc_css", $direc_css);
$smarty->display("novedad_eliminar.tpl");	
}
?>
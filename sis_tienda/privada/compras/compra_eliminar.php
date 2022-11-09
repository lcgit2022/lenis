<?php
session_start();

require_once("../../smarty/libs/Smarty.class.php");
require_once("../../conexion.php");

$id_compra = $_REQUEST["id_compra"];

//$db->debug=true;

$smarty= new Smarty;

$sql = $db->Prepare("SELECT*
					FROM clientes
					WHERE id_compra = ?
				    AND estado <> '0'
					");
$rs=$db->GetAll($sql, array($id_compra));

if  (!$rs) {
	$reg=array();
	$reg["estado"]='0';
    $reg["usuario"]=$_SESSION["sesion_id_usuario"];
    $rs1 = $db->AutoExecute("compras", $reg, "UPDATE", "id_compra='".$id_compra."'");
   header("Location:compras.php");
	exit();
}else{
$smarty->assign("mensaje", "ERROR: Los datos no se eliminaron!!!!!!!!!!");
$smarty->assign("direc_css", $direc_css);
$smarty->display("compra_eliminar.tpl");	
}
?>
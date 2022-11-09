<?php
session_start();

require_once("../../smarty/libs/Smarty.class.php");
require_once("../../conexion.php");


$id_cliente=$_REQUEST["id_cliente"];


$smarty = new Smarty;

$sql = $db->Prepare("SELECT *
					  FROM compras
					  WHERE id_cliente = ?
					  AND estado <> '0'
					");
$rs=$db->GetAll($sql, array($id_cliente));

if (!$rs) {
	$reg=array();
	$reg["estado"]='0';
    $reg["usuario"]=$_SESSION["sesion_id_usuario"];
    $rs1 = $db->AutoExecute("clientes", $reg, "UPDATE", "id_cliente='".$id_cliente."'");
    header("Location:clientes.php");
	exit();
}else{

$smarty->assign("mensaje", "ERROR: Los datos no se eliminaron!!!!!!!!!!");
$smarty->assign("direc_css", $direc_css);
$smarty->display("cliente_eliminar.tpl");	
}
?>
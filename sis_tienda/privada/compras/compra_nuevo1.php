<?php
session_start();

require_once("../../smarty/libs/Smarty.class.php");
require_once("../../conexion.php");

//var_dump($_POST);
$id_cliente=$_POST["id_cliente"];
$detalle_compra=$_POST["detalle_compra"];
$cantidad=$_POST["cantidad"];
$monto_compras=$_POST["monto_compras"];
$fecha_compras=$_POST["fecha_compras"];

$db->debug=true;

$smarty = new Smarty;

$reg = array();
$reg["id_cliente"] = $id_cliente;
$reg["detalle_compra"] = $detalle_compra;
$reg["cantidad"] = $cantidad;
$reg["monto_compras"] = $monto_compras;
$reg["fecha_compras"] = $fecha_compras;
$reg["fec_insercion"] = date("Y-m-d H:i:s");
$reg["estado"] = '1';
$reg["usuario"] = $_SESSION["sesion_id_usuario"];
$rs1 = $db->AutoExecute("compras", $reg, "INSERT");
if($rs1){
	header("Location: compras.php");
	exit();
}else{
	$smarty->assign("mensaje", "ERROR: Los datos no se insertaron!!!!!!!!!!");
	$smarty->assign("direc_css", $direc_css);
	$smarty->display("compra_nuevo1.tpl");
}
?>
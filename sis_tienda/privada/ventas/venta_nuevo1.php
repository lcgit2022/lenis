<?php
session_start();

require_once("../../smarty/libs/Smarty.class.php");
require_once("../../conexion.php");

$id_empleado = $_POST["id_empleado"];
$detalle_ventas  = $_POST["detalle_ventas"];
$cantidad=$_POST["cantidad"];
$monto_ventas= $_POST["monto_ventas"];
$fecha_ventas= $_POST["fecha_ventas"];

//$db->debug=true;

$smarty = new Smarty;

$reg = array();
$reg["id_empleado"] = $id_empleado;
$reg["detalle_ventas"] = $detalle_ventas;
$reg["cantidad"] = $cantidad;
$reg["monto_ventas"] = $monto_ventas;
$reg["fecha_ventas"] = $fecha_ventas;
$reg["fec_insercion"] = date("Y-m-d H:i:s");
$reg["estado"] = '1';
$reg["usuario"] = $_SESSION["sesion_id_usuario"];
$rs1 = $db->AutoExecute("ventas", $reg, "INSERT");
if($rs1){
	header("Location: ventas.php");
	exit();
}else{
	$smarty->assign("mensaje", "ERROR: Los datos no se insertaron!!!!!!!!!!");
	$smarty->assign("direc_css", $direc_css);
	$smarty->display("venta_nuevo1.tpl");
}
?>
<?php
session_start();

require_once("../../smarty/libs/Smarty.class.php");
require_once("../../conexion.php");

$id_repuesto = $_REQUEST["id_repuesto"];
$id_precio_repuesto = $_REQUEST["id_precio_repuesto"];
$precio=$_POST["precio"];
$fecha_de_asignacion=$_POST["fecha_de_asignacion"];


//$db->debug=true;

$smarty = new Smarty;

$reg = array();
$reg["id_repuesto"] = $id_repuesto;
$reg["precio"] = $precio;
$reg["fecha_de_asignacion"] = $fecha_de_asignacion;
$reg["fec_insercion"] = date("Y-m-d H:i:s");
$reg["estado"] = '1';
$reg["usuario"] = $_SESSION["sesion_id_usuario"];
$rs1 = $db->AutoExecute("precio_repuestos", $reg, "UPDATE", "id_precio_repuesto='".$id_precio_repuesto."'");

if($rs1){
	header("Location: precio_repuestos.php");
	exit();
}else{
	$smarty->assign("mensaje", "ERROR: Los datos no se modificaron!!!!!!!!!!");
	$smarty->assign("direc_css", $direc_css);
	$smarty->assign("id_precio_repuesto", $id_precio_repuesto);
	$smarty->display("precio_repuesto_modificar1.tpl");
}
?>
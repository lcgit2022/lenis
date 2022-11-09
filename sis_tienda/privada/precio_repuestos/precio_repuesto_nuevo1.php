<?php
session_start();

require_once("../../smarty/libs/Smarty.class.php");
require_once("../../conexion.php");

$id_repuesto= $_POST["id_repuesto"];
$precio= $_POST["precio"];
$fecha_de_asignacion=$_POST["fecha_de_asignacion"];


//$db->debug=true;

$smarty = new Smarty;

$reg = array();
$reg["id_repuesto"] =$id_repuesto;
$reg["precio"] = $precio;
$reg["fecha_de_asignacion"] = $fecha_de_asignacion;
$reg["fec_insercion"] = date("Y-m-d H:i:s");
$reg["estado"] = '1';
$reg["usuario"] = $_SESSION["sesion_id_usuario"];
$rs1 = $db->AutoExecute("precio_repuestos", $reg, "INSERT");
if($rs1){
	header("Location: precio_repuestos.php");
	exit();
}else{
	$smarty->assign("mensaje", "ERROR: Los datos no se insertaron!!!!!!!!!!");
	$smarty->assign("direc_css", $direc_css);
	$smarty->display("precio_repuesto_nuevo1.tpl");
}
?>
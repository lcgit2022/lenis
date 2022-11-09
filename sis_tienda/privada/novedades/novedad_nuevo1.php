<?php
session_start();

require_once("../../smarty/libs/Smarty.class.php");
require_once("../../conexion.php");
  

$promociones = $_POST["promociones"];
$descuentos = $_POST["descuentos"];

//$db->debug=true;

$smarty = new Smarty;

$reg = array();
$reg["id_tienda"] =1;
$reg["promociones"] = $promociones;
$reg["descuentos"] = $descuentos;
$reg["fec_insercion"] = date("Y-m-d H:i:s");
$reg["estado"] = '1';
$reg["usuario"] = $_SESSION["sesion_id_usuario"];
$rs1 = $db->AutoExecute("novedades", $reg, "INSERT");
if($rs1){
	header("Location: novedades.php");
	exit();
}else{
	$smarty->assign("mensaje", "ERROR: Los datos no se insertaron!!!!!!!!!!");
	$smarty->assign("direc_css", $direc_css);
	$smarty->display("novedad_nuevo1.tpl");
}
?>

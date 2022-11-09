<?php
session_start();

require_once("../../smarty/libs/Smarty.class.php");
require_once("../../conexion.php");

$nombre = $_POST["nombre"];
$codigo = $_POST["codigo"];

//$db->debug=true;

$smarty = new Smarty;

$reg = array();
$reg["id_tienda"] =1;
$reg["nombre"] = $nombre;
$reg["codigo"] = $codigo;
$reg["fec_insercion"] = date("Y-m-d H:i:s");
$reg["estado"] = '1';
$reg["usuario"] = $_SESSION["sesion_id_usuario"];
$rs1 = $db->AutoExecute("repuestos", $reg, "INSERT");
if($rs1){
	header("Location: repuestos.php");
	exit();
}else{
	$smarty->assign("mensaje", "ERROR: Los datos no se insertaron!!!!!!!!!!");
	$smarty->assign("direc_css", $direc_css);
	$smarty->display("repuesto_nuevo1.tpl");
}
?>
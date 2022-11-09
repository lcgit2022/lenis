<?php
session_start();

require_once("../../smarty/libs/Smarty.class.php");
require_once("../../conexion.php");

$id_repuesto=$_REQUEST["id_repuesto"];
$nombre = $_POST["nombre"];
$codigo = $_POST["codigo"];

//$db->debug=true;

$smarty = new Smarty;

$reg = array();
$reg["nombre"] = $nombre;
$reg["codigo"] = $codigo;
$reg["fec_insercion"] = date("Y-m-d H:i:s");
$reg["estado"] = '1';
$reg["usuario"] = $_SESSION["sesion_id_usuario"];
$rs1 = $db->AutoExecute("repuestos", $reg, "UPDATE", "id_repuesto='".$id_repuesto."'");

if($rs1){
	header("Location: repuestos.php");
	exit();
}else{
	$smarty->assign("mensaje", "ERROR: Los datos no se modificaron!!!!!!!!!!");
	$smarty->assign("direc_css", $direc_css);
	$smarty->assign("id_repuesto", $id_repuesto);
	$smarty->display("repuesto_modoficar1.tpl");
}
?>
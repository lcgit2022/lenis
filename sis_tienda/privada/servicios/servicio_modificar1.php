<?php
session_start();

require_once("../../smarty/libs/Smarty.class.php");
require_once("../../conexion.php");

$id_servicio=$_REQUEST["id_servicio"];
$forma_de_pago= $_POST["forma_de_pago"];
$forma_de_entrega= $_POST["forma_de_entrega"];


//$db->debug=true;

$smarty = new Smarty;

$reg = array();
$reg["forma_de_pago"] = $forma_de_pago;
$reg["forma_de_entrega"] = $forma_de_entrega;
$reg["fec_insercion"] = date("Y-m-d H:i:s");
$reg["estado"] = '1';
$reg["usuario"] = $_SESSION["sesion_id_usuario"];
$rs1 = $db->AutoExecute("servicios", $reg, "UPDATE", "id_servicio='".$id_servicio."'");

if($rs1){
	header("Location: servicios.php");
	exit();
}else{
	$smarty->assign("mensaje", "ERROR: Los datos no se modificaron!!!!!!!!!!");
	$smarty->assign("direc_css", $direc_css);
	$smarty->assign("id_servicio", $id_servicio);
	$smarty->display("servicio_modificar1.tpl");
}
?>
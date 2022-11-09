<?php
session_start();

require_once("../../smarty/libs/Smarty.class.php");
require_once("../../conexion.php");
  

$forma_de_pago = $_POST["forma_de_pago"];
$forma_de_entrega = $_POST["forma_de_entrega"];

//$db->debug=true;

$smarty = new Smarty;

$reg = array();
$reg["id_tienda"] =1;
$reg["forma_de_pago"] = $forma_de_pago;
$reg["forma_de_entrega"] = $forma_de_entrega;
$reg["fec_insercion"] = date("Y-m-d H:i:s");
$reg["estado"] = '1';
$reg["usuario"] = $_SESSION["sesion_id_usuario"];
$rs1 = $db->AutoExecute("servicios", $reg, "INSERT");
if($rs1){
	header("Location: servicios.php");
	exit();
}else{
	$smarty->assign("mensaje", "ERROR: Los datos no se insertaron!!!!!!!!!!");
	$smarty->assign("direc_css", $direc_css);
	$smarty->display("servicio_nuevo1.tpl");
}
?>

<?php
session_start();

require_once("../../smarty/libs/Smarty.class.php");
require_once("../../conexion.php");

$ci = $_POST["ci"];
$nombre = $_POST["nombre"];
$ap = $_POST["ap"];
$am = $_POST["am"];
$telefono = $_POST["telefono"];
$direccion = $_POST["direccion"];

//$db->debug=true;

$smarty = new Smarty;

$reg = array();
$reg["id_tienda"] = 1;
$reg["ci"] = $ci;
$reg["nombre"] = $nombre;
$reg["ap"] = $ap;
$reg["am"] = $am;
$reg["telefono"] = $telefono;
$reg["direccion"] = $direccion;
$reg["fec_insercion"] = date("Y-m-d H:i:s");
$reg["estado"] = '1';
$reg["usuario"] = $_SESSION["sesion_id_usuario"];
$rs1 = $db->AutoExecute("clientes", $reg, "INSERT");
if($rs1){
	header("Location: clientes.php");
	exit();
}else{
	$smarty->assign("mensaje", "ERROR: Los datos no se insertaron!!!!!!!!!!");
	$smarty->assign("direc_css", $direc_css);
	$smarty->display("cliente_nuevo1.tpl");
}
?>
<?php
session_start();

require_once("../../smarty/libs/Smarty.class.php");
require_once("../../conexion.php");

$id_cliente=$_REQUEST["id_cliente"];
$ci = $_POST["ci"];
$nombre = $_POST["nombre"];
$ap = $_POST["ap"];
$am = $_POST["am"];
$telefono = $_POST["telefono"];
$direccion = $_POST["direccion"];

//$db->debug=true;

$smarty = new Smarty;

$reg = array();
$reg["ci"] = $ci;
$reg["nombre"] = $nombre;
$reg["ap"] = $ap;
$reg["am"] = $am;
$reg["telefono"] = $telefono;
$reg["direccion"] = $direccion;
$reg["fec_insercion"] = date("Y-m-d H:i:s");
$reg["estado"] = '1';
$reg["usuario"] = $_SESSION["sesion_id_usuario"];
$rs1 = $db->AutoExecute("clientes", $reg, "UPDATE", "id_cliente='".$id_cliente."'");

if($rs1){
	header("Location: clientes.php");
	exit();
}else{
	$smarty->assign("mensaje", "ERROR: Los datos no se modificaron!!!!!!!!!!");
	$smarty->assign("direc_css", $direc_css);
	$smarty->assign("id_cliente", $id_cliente);
	$smarty->display("cliente_modoficar1.tpl");
}
?>
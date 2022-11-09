<?php
session_start();

require_once("../../smarty/libs/Smarty.class.php");
require_once("../../conexion.php");

$id_persona=$_REQUEST["id_persona"];
$ci = $_POST["ci"];
$nombres = $_POST["nombres"];
$ap = $_POST["ap"];
$am = $_POST["am"];
$telef = $_POST["telef"];
$direccion = $_POST["direccion"];

//$db->debug=true;

$smarty = new Smarty;

$reg = array();
$reg["ci"] = $ci;
$reg["nombres"] = $nombres;
$reg["ap"] = $ap;
$reg["am"] = $am;
$reg["telef"] = $telef;
$reg["direccion"] = $direccion;
$reg["fec_insercion"] = date("Y-m-d H:i:s");
$reg["estado"] = '1';
$reg["usuario"] = $_SESSION["sesion_id_usuario"];
$rs1 = $db->AutoExecute("personas", $reg, "UPDATE", "id_persona='".$id_persona."'");

if($rs1){
	header("Location: personas.php");
	exit();
}else{
	$smarty->assign("mensaje", "ERROR: Los datos no se modificaron!!!!!!!!!!");
	$smarty->assign("direc_css", $direc_css);
	$smarty->assign("id_persona", $id_persona);
	$smarty->display("persona_modificar1.tpl");
}
?>
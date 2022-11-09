<?php
session_start();
require_once("../../smarty/libs/Smarty.class.php");
require_once("../../conexion.php");
require_once("../libreria_menu.php");

$id_cliente=$_REQUEST["id_cliente"];


$smarty = new Smarty;

$sql = $db->Prepare("SELECT *
					  FROM clientes
					  WHERE id_cliente = ?
					");
$rs=$db->GetAll($sql, array($id_cliente));
$smarty->assign("cliente" ,$rs);


$smarty->assign("direc_css", $direc_css);
$smarty->display("cliente_modificar.tpl");
?>
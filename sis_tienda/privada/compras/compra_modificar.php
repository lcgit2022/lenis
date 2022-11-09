<?php
session_start();
require_once("../../smarty/libs/Smarty.class.php");
require_once("../../conexion.php");
require_once("../libreria_menu.php");

$id_compra=$_REQUEST["id_compra"];
$id_cliente=$_REQUEST["id_cliente"];

$smarty = new Smarty;

$sql = $db->Prepare("SELECT *
					  FROM compras
					  WHERE id_compra= ?
					");
$rs=$db->GetAll($sql, array($id_compra));


$sql2 = $db->Prepare("SELECT *
					  FROM clientes
					  WHERE id_cliente = ?
					  AND estado <> '0'
					");
$rs2=$db->GetAll($sql2, array($id_cliente));


$sql3 = $db->Prepare("SELECT *
					  FROM clientes
					  WHERE id_cliente <> ?
					  AND estado<> '0'
					");
$rs3=$db->GetAll($sql3, array($id_cliente));

$smarty->assign("compra", $rs);
$smarty->assign("cliente", $rs2);
$smarty->assign("clientes", $rs3);
$smarty->assign("direc_css", $direc_css);
$smarty->display("compra_modificar.tpl");
?>
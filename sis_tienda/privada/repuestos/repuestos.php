<?php
session_start();/*inicio de sesion*/
require_once("../../smarty/libs/Smarty.class.php");
require_once("../../conexion.php");
require_once("../libreria_menu.php");
require_once("../paginacion.inc.php");

$smarty = new Smarty;

//$db->debug=true;

contarRegistros($db, "repuestos");

paginacion("repuestos.php?", $smarty);

$sql3 = $db->Prepare("SELECT *
					  FROM repuestos
					  WHERE estado <> '0'
					  AND id_repuesto >1
					  ORDER BY id_repuesto DESC
					  LIMIT ? OFFSET ?	
					");
$smarty->assign("repuestos", $db->GetAll($sql3, array($nElem, $regIni)));


$smarty->assign("direc_css", $direc_css);
$smarty->display("repuestos.tpl");
?>
<?php
session_start();/*inicio de sesion*/
require_once("../../smarty/libs/Smarty.class.php");
require_once("../../conexion.php");
require_once("../libreria_menu.php");
require_once("../paginacion.inc.php");

$smarty = new Smarty;

//$db->debug=true;

contarRegistros($db, "propietarios");

paginacion("propietarios.php?", $smarty);

$sql3 = $db->Prepare("SELECT *
					  FROM propietarios
					  WHERE estado <> '0'
					  AND id_propietario >1
					  ORDER BY id_propietario DESC
					  LIMIT ? OFFSET ?	
					");
$smarty->assign("propietarios", $db->GetAll($sql3, array($nElem, $regIni)));


$smarty->assign("direc_css", $direc_css);
$smarty->display("propietarios.tpl");
?>
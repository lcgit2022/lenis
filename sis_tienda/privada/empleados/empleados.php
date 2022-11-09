<?php
session_start();/*inicio de sesion*/
require_once("../../smarty/libs/Smarty.class.php");
require_once("../../conexion.php");
require_once("../libreria_menu.php");
require_once("../paginacion.inc.php");

$smarty = new Smarty;

//$db->debug=true;

contarRegistros($db, "empleados");

paginacion("empleados.php?", $smarty);

$sql3 = $db->Prepare("SELECT *
					  FROM empleados
					  WHERE estado <> '0'
					  AND id_empleado >1
					  ORDER BY id_empleado DESC
					  LIMIT ? OFFSET ?	
					");
$smarty->assign("empleados", $db->GetAll($sql3, array($nElem, $regIni)));


$smarty->assign("direc_css", $direc_css);
$smarty->display("empleados.tpl");
?>
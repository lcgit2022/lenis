<?php
session_start();/*inicio de sesion*/
require_once("../../smarty/libs/Smarty.class.php");
require_once("../../conexion.php");
require_once("../libreria_menu.php");
require_once("../paginacion.inc.php");

$smarty = new Smarty;

//$db->debug=true;

contarRegistros($db, "ventas");

paginacion("ventas.php?", $smarty);

$sql3 = $db->Prepare(/*"SELECT *
					  FROM ventas v ,empleados e
					  WHERE v.id_empleado=e.id_empleado
					  AND v.estado <> '0'
		    		  AND e.estado <> '0'

					  ORDER BY v.id_venta DESC
					  LIMIT ? OFFSET ?	
					"*/
					"SELECT *
					  FROM ventas v 
					  INNER JOIN empleados e ON  e.id_empleado=v.id_empleado
					  WHERE v.estado <> '0'
		    		  AND e.estado <> '0'

					  ORDER BY v.id_venta DESC
					  LIMIT ? OFFSET ?"
				);
$smarty->assign("ventas", $db->GetAll($sql3, array($nElem, $regIni)));


$smarty->assign("direc_css", $direc_css);
$smarty->display("ventas.tpl");
?>
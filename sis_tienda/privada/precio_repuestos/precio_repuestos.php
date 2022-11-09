<?php
session_start();/*inicio de sesion*/
require_once("../../smarty/libs/Smarty.class.php");
require_once("../../conexion.php");
require_once("../libreria_menu.php");
require_once("../paginacion.inc.php");

$smarty = new Smarty;

//$db->debug=true;

contarRegistros($db, "precio_repuestos");

paginacion("precio_repuestos.php?", $smarty);

$sql3 = $db->Prepare(/*"SELECT *
					  FROM precio_repuestos pr ,repuestos re
					  WHERE pr.id_repuesto=re.id_repuesto
					  AND pr.estado <> '0'
		    		  AND re.estado <> '0'

					  ORDER BY pr.id_precio_repuesto DESC
					  LIMIT ? OFFSET ?	
					"*/
                    
                      "SELECT *
					  FROM precio_repuestos pr
					  INNER JOIN repuestos re On pr.id_repuesto=re.id_repuesto
					  WHERE pr.estado <> '0'
		    		  AND re.estado <> '0'

					  ORDER BY pr.id_precio_repuesto DESC
					  LIMIT ? OFFSET ?"	

				);
$smarty->assign("precio_repuestos", $db->GetAll($sql3, array($nElem, $regIni)));


$smarty->assign("direc_css", $direc_css);
$smarty->display("precio_repuestos.tpl");
?>
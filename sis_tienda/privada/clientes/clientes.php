<?php
session_start();/*inicio de sesion*/
require_once("../../smarty/libs/Smarty.class.php");
require_once("../../conexion.php");
require_once("../libreria_menu.php");
require_once("../paginacion.inc.php");

$smarty = new Smarty;

//$db->debug=true;

contarRegistros($db, "clientes");

paginacion("clientes.php?", $smarty);

$sql3 = $db->Prepare(/*"SELECT *
					  FROM clientes
					  WHERE estado <> '0'
					  AND id_cliente >1
					  ORDER BY id_cliente DESC
					  LIMIT ? OFFSET ?	
					"*/
                   "SELECT cl.*
					FROM clientes cl
                    INNER JOIN tienda td ON td.id_tienda=cl.id_tienda
                    WHERE cl.estado <> '0'
                    AND td.estado <> '0'
			        ORDER BY cl.id_cliente DESC
				    LIMIT ? OFFSET ?"	
                
				);
$smarty->assign("clientes", $db->GetAll($sql3, array($nElem, $regIni)));


$smarty->assign("direc_css", $direc_css);
$smarty->display("clientes.tpl");
?>SS
<?php
session_start();/*inicio de sesion*/
require_once("../../smarty/libs/Smarty.class.php");
require_once("../../conexion.php");
require_once("../libreria_menu.php");
require_once("../paginacion.inc.php");

$smarty = new Smarty;

//$db->debug=true;

contarRegistros($db, "compras");

paginacion("compras.php?", $smarty);

$sql3 = $db->Prepare(/*"SELECT *
					  FROM compras co ,clientes cl
					  WHERE co.id_cliente=cl.id_cliente
					  AND co.estado <> '0'
		    		  AND cl.estado <> '0'

					  ORDER BY co.id_compra DESC
					  LIMIT ? OFFSET ?	
				 	"*/
                   "   SELECT *
					  FROM compras co 
					  INNER JOIN clientes cl ON  co.id_cliente=cl.id_cliente
					  WHERE co.estado <> '0'
		    		  AND cl.estado <> '0'
					  ORDER BY co.id_compra DESC
					  LIMIT ? OFFSET ?"

				);
$smarty->assign("compras", $db->GetAll($sql3, array($nElem, $regIni)));


$smarty->assign("direc_css", $direc_css);
$smarty->display("compras.tpl");
?>
<?php
require_once("adodb/adodb.inc.php");
$direc_css="../css/colores2.css";
$conServidor="localhost";
$conUsuario="root";
$conClave="";
$conBasededatos="bd_tienda";

$db=ADONewConnection("mysqli");
//$db-> debug =true;
$conex=$db->Connect($conServidor,$conUsuario,$conClave,$conBasededatos);
$db->Execute("SET NAMES 'utf8'");
?>
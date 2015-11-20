<?php
$conexion=mysql_connect("189.204.28.69","consulta","consulta2012") or die ("Error al conectarse al hosting");
$base=mysql_select_db("etclearning4_db",$conexion) or die ("Error al conectarse a la base de datos");
mysql_set_charset('utf8',$conexion);
?>
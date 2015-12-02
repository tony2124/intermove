<?php 
	@session_start();

	$servidor = "localhost";
	$usuarioMySQL = "root";
	$contrasenaMySQL = "";
	$baseDatos = "intermove";

	$conexion = mysql_connect($servidor, $usuarioMySQL, $contrasenaMySQL);
	mysql_select_db($baseDatos, $conexion);
	
	mysql_query("charset utf8");
?>
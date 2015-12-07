<?php
	include("../scripts/conexion.php");
	$id_usuario = $_GET['id'];
	$status = $_GET['status'];
	echo $id_usuario.$status;

	$query = "UPDATE empleado set estado_emp='".$status."' where iduser='".$id_usuario."'";
	mysql_query($query);
	mysql_close($conexion);


	header("Location: ../admin/busqueda_usuarios_admin.php");
?>
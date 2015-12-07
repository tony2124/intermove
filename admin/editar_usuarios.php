<?php
	include("../scripts/conexion.php");

	$id_adm = $_POST['id'];
	$nombre_adm = $_POST['nombre_adm'];
	$ap_pat_adm = $_POST['ap_pat_adm'];
	$ap_mat_adm = $_POST['ap_mat_adm'];
	$username_adm = $_POST['username_adm'];
	$fecha_nac_adm = $_POST['fecha_nac_adm'];
	$email_adm = $_POST['email_adm'];

	$query = mysql_query("UPDATE user inner join empleado on empleado.iduser=user.iduser
	 					  set  empleado.nombre_emp = '$nombre_adm',empleado.ap_paterno_emp = '$ap_pat_adm',
	     				  empleado.ap_materno_emp = '$ap_mat_adm', empleado.fecha_nac_emp = '$fecha_nac_adm',
	    				  user.username = '$username_adm', user.email = '$email_adm' where user.iduser = '$id_adm' ")or die(mysql_error());

	mysql_close($conexion);

	header("Location: ../admin/busqueda_usuarios_admin.php");

?>
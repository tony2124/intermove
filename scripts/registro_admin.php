<?php
	include("../scripts/conexion.php");

		//INTO EMPLEADO TABLE
		$nombre_admin = $_POST['usuario_admin'];
		$ap_pat_admin = $_POST['apellido_pat_admin'];
		$ap_mat_admin = $_POST['apellido_mat_admin'];
		// INTO USER TABLE
		$username_adm = $_POST['usuario_admin'];
		$password_adm = $_POST['pass_admin'];
		$password_adm = md5($password_adm);
		$email_adm = $_POST['correo_admin'];
		$rol_adm = $_POST['role_admin'];

		mysql_query("INSERT INTO empleado (idempleado,nombre_emp,ap_paterno_emp,ap_materno_emp,rfc_emp,sexo,fecha_nac_emp,iddireccion,iduser,estado_emp) values ('6','$nombre_admin','$ap_pat_admin','$ap_mat_admin','euej943','1','1996-01-08','1','1','1')",$conexion) or die ("ERROR");
		mysql_query("INSERT INTO user (iduser,username,password,email,create_time,idctipo_rol) values ('6','$username_adm','$password_adm','$email_adm',current_timestamp(),'$rol_adm')",$conexion) or die("ERROR AL SUBIR");
		
		header("Location: ../admin/registro_administrador.php");
		
		// ME FALTA VALIDAR ALGUNAS COSAS atte:Equihua
	mysql_close($conexion);
?>
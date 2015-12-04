<?php
	include("../scripts/conexion.php");

		//INTO EMPLEADO TABLE
		$nombre_admin = $_POST['usuario_admin'];
		$ap_pat_admin = $_POST['apellido_pat_admin'];
		$ap_mat_admin = $_POST['apellido_mat_admin'];
		$rfc_admin = $_POST['rfc_admin'];
		$fecha_nac_admin = $_POST['fecha_nac_admin'];
		// INTO USER TABLE
		$username_adm = $_POST['usuario_admin'];
		$password_adm = $_POST['pass_admin'];
		$password_adm = md5($password_adm);
		$email_adm = $_POST['correo_admin'];
		$rol_adm = $_POST['role_admin'];

		mysql_query("INSERT INTO empleado (idempleado,nombre_emp,ap_paterno_emp,ap_materno_emp,rfc_emp,sexo,fecha_nac_emp,iddireccion,iduser,estado_emp) values ('10','$nombre_admin','$ap_pat_admin','$ap_mat_admin','$rfc_admin','1','$fecha_nac_admin','1','1','1')",$conexion) or die ("ERROR");
		mysql_query("INSERT INTO user (iduser,username,password,email,create_time,idctipo_rol) values ('10','$username_adm','$password_adm','$email_adm',current_timestamp(),'$rol_adm')",$conexion) or die("ERROR AL SUBIR");
		echo '<script type="text/javascript"> alert("listo");</script>';
		mysql_close($conexion);
		header("Location: ../admin/registro_administrador.php");
		
		
		// ME FALTA VALIDAR ALGUNAS COSAS atte:Equihua
	
?>
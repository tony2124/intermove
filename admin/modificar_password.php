<?php 
	
	$id = $_POST['id'];
	$Pass_act_adm = $_POST['mod_password_act_adm'];
	$Pass_new_adm =  $_POST['mod_password_new_adm'];
	$Pass_new2_adm = $_POST['mod_password_new2_adm'];

	if(!empty($Pass_act_adm) && !empty($Pass_new_adm))
	{	
		if($Pass_new2_adm==$Pass_new_adm)
		{
			include("../scripts/conexion.php");
			// $Pass_new_adm = md5($Pass_new_adm);
			// $Pass_act_adm = md5($Pass_act_adm);
			$query = mysql_query("UPDATE user set password = '$Pass_new_adm' where password = '$Pass_act_adm' and iduser = '$id'") or die(mysql_error()); 
			mysql_close($conexion);
			echo "listo";
			// header("Location: ../admin/busqueda_usuarios_admin.php");
		}
		else{
			echo "No son iguales"; 
		}
	}
	else{
		echo "error";
		// header("Location: ../admin/busqueda_usuarios_admin.php");
	}

	
?>
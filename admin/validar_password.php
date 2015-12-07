<?php 
	include("../scripts/conexion.php");
	$contrasena_act = $_REQUEST['contrasena_act'];
    $id = $_REQUEST['id'];
	if(!empty($contrasena_act)) 
	{
    	
    	echo $contrasena_act;
    	$query = "SELECT * from user where iduser = '$id' and password = '$contrasena_act'";
    	$results = mysql_query($query);

   		if(mysql_num_rows(@$results) > 0)
        	{
        		echo '<div class="label label-danger">No es correcta</div>';
    		}
    	else
        	{echo '<div class="label label-info">Disponible</div>';}
	}

	mysql_close($conexion);

?>
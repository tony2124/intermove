<?php
	
	include("../scripts/conexion.php");
	if($_REQUEST) 
	{
    	$username = $_REQUEST['username'];
    	$query = "select * from user where username = '".$username."'";
    	$results = mysql_query( $query);

   		if(mysql_num_rows(@$results) > 0)
        	{
        		echo '<div class="label label-danger">No disponible</div>';
        		?><script type="text/javascript">boton.disabled = true; </script><?php
    		}
    	else
        	{echo '<div class="label label-info">Disponible</div>';}
	}

	mysql_close($conexion);

?>
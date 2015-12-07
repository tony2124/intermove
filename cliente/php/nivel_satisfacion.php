<?php
	session_start();
	require("../../scripts/conexion.php");
	$sqlFinal = "SELECT * FROM publicacion_demanda_servicio
	JOIN nivel_satisfaccion ON publicacion_demanda_servicio.idpublicacion_demanda_servicio=nivel_satisfaccion.idpublicacion_demanda_servicio
	WHERE publicacion_demanda_servicio.num_guia='".$_SESSION['numero_guia']."'";
	$queryFinal = mysql_query($sqlFinal);

	if(mysql_num_rows($queryFinal)==0){
		require("../../scripts/conexion.php");
	 $sql = "SELECT publicacion_demanda_servicio.idpublicacion_demanda_servicio FROM publicacion_demanda_servicio
	 		JOIN entrega_cierre ON publicacion_demanda_servicio.idpublicacion_demanda_servicio=entrega_cierre.idpublicacion_demanda_servicio
			WHERE publicacion_demanda_servicio.num_guia='".$_SESSION['numero_guia']."'";
	$query = mysql_query($sql);
	if(mysql_num_rows($query)>0){
		$array = mysql_fetch_array($query);
		$id = mysql_num_rows(mysql_query("SELECT * FROM nivel_satisfaccion"));
		$insert = "INSERT INTO nivel_satisfaccion(idnivel_satisfaccion,valor_satisfaccion,idpublicacion_demanda_servicio)
		value('".$id."','".$_POST['nivel_satisfacion']."','".$array['idpublicacion_demanda_servicio']."')";
		$queryInsert = mysql_query($insert);
		if($queryInsert){
			echo '<div class="alert alert-success" role="alert">
			  <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
			  <span class="sr-only">Error:</span>
			 	Gracias por calificar
			</div>';
		}else{
			echo '<div class="alert alert-danger" role="alert">
			  <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
			  <span class="sr-only">Error:</span>
			 	Hubo un arror inesperado al calificar
			</div>'.mysql_error();
		}

	}else{
		echo '<div class="alert alert-danger" role="alert">
			  <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
			  <span class="sr-only">Error:</span>
			 	No puedes calificar primero tienes que confirmar tu entrega
			</div>';
	}
	mysql_close();
	}else{
		echo '<div class="alert alert-danger" role="alert">
			  <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
			  <span class="sr-only">Error:</span>
			 	Ya np puedes volver a calificar :(
			</div>';
	}
?>
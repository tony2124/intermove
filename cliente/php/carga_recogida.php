<?php
	session_start();
	 require("../../scripts/conexion.php");
	 $sqlFinal = "SELECT * FROM publicacion_demanda_servicio
	 JOIN recoleccion_carga ON publicacion_demanda_servicio.idpublicacion_demanda_servicio=recoleccion_carga.idpublicacion_demanda_servicio
	 WHERE publicacion_demanda_servicio.num_guia='".$_SESSION['numero_guia']."'";

	 $queryFinal = mysql_query($sqlFinal);

	 if(mysql_num_rows($queryFinal)==0){
	 	 $sql = "SELECT idpublicacion_demanda_servicio FROM publicacion_demanda_servicio
			WHERE publicacion_demanda_servicio.num_guia='".$_SESSION['numero_guia']."'";
	$query = mysql_query($sql);
	$array = mysql_fetch_array($query);

	$contarSQL = "SELECT * FROM recoleccion_carga";
	$contarQUERY = mysql_query($contarSQL);
	$id = mysql_num_rows($contarQUERY);
	$insert = "INSERT INTO recoleccion_carga(idrecoleccion_carga,idpublicacion_demanda_servicio,fecha_recoleccion,descripcion_rec_carga)
	values('".$id."','".$array['idpublicacion_demanda_servicio']."','".$_POST['FechaRecoleccion']."','".$_POST['DescripcionEntrega']."')";

	$insercion = mysql_query($insert);

	if($insercion){
		echo '<center><div class="alert alert-success" role="alert">
			  <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
			  <span class="sr-only">Error:</span>
			 	Confirmacion Exitosa Gracias
			</div><center>';
	}else{
		echo '<center><div class="alert alert-danger" role="alert">
			  <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
			  <span class="sr-only">Error:</span>
			 FALLO
			</div><center>';
	}

	 }else{
	 	echo '<center><div class="alert alert-danger" role="alert">
			  <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
			  <span class="sr-only">Error:</span>
			 No puedes volver a cofirmar la recoleccion de la carga
			</div><center>';
	 }

?>
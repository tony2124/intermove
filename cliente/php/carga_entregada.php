<?php
	session_start();
	 require("../../scripts/conexion.php");
	 $sqlFinal = "SELECT * FROM publicacion_demanda_servicio
	 JOIN entrega_cierre ON publicacion_demanda_servicio.idpublicacion_demanda_servicio=entrega_cierre.idpublicacion_demanda_servicio
	 WHERE publicacion_demanda_servicio.num_guia='".$_SESSION['numero_guia']."'";
	 $queryFinal = mysql_query($sqlFinal);

	 if(mysql_num_rows($queryFinal)==0){
	 	 $sqlCheck = "SELECT * FROM publicacion_demanda_servicio
	 JOIN recoleccion_carga ON publicacion_demanda_servicio.idpublicacion_demanda_servicio=recoleccion_carga.idpublicacion_demanda_servicio
	 WHERE publicacion_demanda_servicio.num_guia='".$_SESSION['numero_guia']."'";
	 $queryChecked = mysql_query($sqlCheck);
	 if(mysql_num_rows($queryChecked)>0){
			 	$sql = "SELECT idpublicacion_demanda_servicio FROM publicacion_demanda_servicio
					WHERE publicacion_demanda_servicio.num_guia='".$_SESSION['numero_guia']."'";
			$query = mysql_query($sql);
			$array = mysql_fetch_array($query);

			$insert = "INSERT INTO entrega_cierre(idpublicacion_demanda_servicio,fecha_entrega,descripcion_ent_carga)
			values('".$array['idpublicacion_demanda_servicio']."','".$_POST['FechaRecoleccion']."','".$_POST['DescripcionEntrega']."')";

			$insercion = mysql_query($insert);

			if($insercion){
						echo '<center><div class="alert alert-success" role="alert">
					  <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
					  <span class="sr-only">Error:</span>
					 	Confirmacion Exitosa Gracias
					</div></center>';
			}else{
						echo '<center><div class="alert alert-danger" role="alert">
					  <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
					  <span class="sr-only">Error:</span>
					 FALLO
					</div></center>';
			}
	 }else{
	 	echo '<center><div class="alert alert-danger" role="alert">
					  <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
					  <span class="sr-only">Error:</span>
					 No puedes confirmar tu carga sin que antes se aiga recogido
					</div></center>';
	 }


	 }else{
	 	echo '<center><div class="alert alert-danger" role="alert">
					  <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
					  <span class="sr-only">Error:</span>
					Su compra a sido confirmada No puedes volver a corfirmar
					</div></center>';
	 }

?>
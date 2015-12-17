<div class="col-md-offset-2 col md-7 panel-heading panel panel-default panel-accent-gold" style="margin-top:100px; width:70%;">
	<h3 class="panel-title">Calificacion de la carga</h3><br>

	<?php
			require("../../scripts/conexion.php");
			$sql = "SELECT nivel_satisfaccion.valor_satisfaccion FROM publicacion_demanda_servicio
			JOIN nivel_satisfaccion ON publicacion_demanda_servicio.idpublicacion_demanda_servicio=nivel_satisfaccion.idpublicacion_demanda_servicio
			WHERE publicacion_demanda_servicio.num_guia='".$_SESSION['numero_guia']."'";
			$query = mysql_query($sql);
			if(mysql_num_rows($query)==0){
				echo '<center><div class="alert alert-danger"" role="alert">La carga no ha sido calificada</div></center>';
			}else{
				$array = mysql_fetch_array($query);
				$arregloLetras = array('PESIMO','MALO','REGULAR','BUENO','MUY BUENO','EXCELENTE');
				echo "<center><div class='alert alert-success' role='alert'>".$arregloLetras[$array['valor_satisfaccion']]."</div></center>";
			}

	?>
</div>
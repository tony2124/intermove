<?php
	require("../../scripts/conexion.php");
	$sql = "SELECT nivel_satisfaccion.valor_satisfaccion FROM publicacion_demanda_servicio
	JOIN nivel_satisfaccion ON publicacion_demanda_servicio.idpublicacion_demanda_servicio=nivel_satisfaccion.idpublicacion_demanda_servicio
	WHERE publicacion_demanda_servicio.num_guia='".$_SESSION['numero_guia']."'";
	$query = mysql_query($sql);

	if(mysql_num_rows($query)==0){
		echo '<center><div style="color:white" class="alert alert-primary panel-title"" role="alert">La carga no ha sido calificada</div></center>';
	}else{
		$array = mysql_fetch_array($query);
		$arregloLetras = array('PESIMO','MALO','REGULAR','BUENO','MUY BUENO','EXCELENTE');
		echo '<center><div style="color:white" class="alert alert-primary panel-title" role="alert">'.$arregloLetras[$array['valor_satisfaccion']].'</div></center>';
	}

?>
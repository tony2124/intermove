<div class="container" style="margin-top:100px;">
	<div class="row">
		<section class="col-lg-5 bg-primary" style="height:200x">
			<center><h3>Reporte de incidencia</h3></center>
			<?php
				$sql = "SELECT c_incidencia_ruta.nombre_incidencia,reporte_incidencia.fecha_incidencia FROM publicacion_demanda_servicio
				JOIN reporte_incidencia ON publicacion_demanda_servicio.idpublicacion_demanda_servicio=reporte_incidencia.idpublicacion_demanda_servicio
				JOIN c_incidencia_ruta ON reporte_incidencia.idc_incidencias_ruta=c_incidencia_ruta.idc_incidencias_ruta
				WHERE publicacion_demanda_servicio.num_guia='".$_SESSION['numero_guia']."'";
				$query = mysql_query($sql);
				$arreglo = mysql_fetch_array($query);
				?>
				<table class="table table-bordered">
					<tr>
						<td>Nombre Incidencia</td>
						<td>Fecha de incidencia</td>
					</tr>
					<tr>
						<td><?php echo $arreglo['nombre_incidencia']; ?></td>
						<td><?php echo $arreglo['fecha_incidencia']; ?></td>
					</tr>
				</table>
		</section>
	</div>
</div>
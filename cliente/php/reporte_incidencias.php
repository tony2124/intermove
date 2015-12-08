<div class="contenido-general">
			<div class="modal-header">
        		<h3 class="titulo-header">
        			<div class="col-md-1">
        				<i class="fa fa-exclamation-triangle fa-4x"></i>
        			</div>
        			<div class="col-md-3">
        				<h3>Reporte de incidencia</h3>
        			</div>
        		</h3>
      		</div>
</div>
<div class="container" style="margin-top:100px;">
	<div class="row">
		<section class="col-lg-offset-3 col-lg-6  panel-heading panel panel-default panel-accent-gold" style="height:200px">
			<h3 class="panel-title"><i class="fa fa-exclamation-triangle"></i> Reporte de incidencia</h3><br>
			<?php
				$sql = "SELECT c_tipo_incidencia.nombre_incidencia,reporte_incidencia.fecha_incidencia FROM publicacion_demanda_servicio
				JOIN reporte_incidencia ON publicacion_demanda_servicio.idpublicacion_demanda_servicio=reporte_incidencia.idpublicacion_demanda_servicio
				JOIN c_tipo_incidencia ON reporte_incidencia.clave_incidencia=c_tipo_incidencia.clave_incidencia
				WHERE publicacion_demanda_servicio.num_guia='".$_SESSION['numero_guia']."'";
				$query = mysql_query($sql);
				$arreglo = mysql_fetch_array($query);
				?>
				<table class="table table-condensed">
					<tr>
						<td class="centro">Nombre Incidencia</td>
						<td class="centro">Fecha de incidencia</td>
					</tr>
					<tr>
						<td class="centro"><?php echo $arreglo['nombre_incidencia']; ?></td>
						<td class="centro"><?php echo $arreglo['fecha_incidencia']; ?></td>
					</tr>
				</table>
		</section>
	</div>
</div>
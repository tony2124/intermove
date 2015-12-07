<div class="contenido-general">
			<div class="modal-header">
        		<h3 class="titulo-header">
        			<i class="fa fa-car fa-4x"></i> Mostra Carga
        		</h3>

      		</div>
</div>
<div class="container">
	<section class="col-md-offset-2 col-md-8 panel-heading panel panel-default panel-accent-gold" style="margin-top:100px;">
		<h3 class="panel-title"><i class="fa fa-cube"></i> Datos</h3><br>
		<table class="table table-condensed">
			<thead>
				<tr>
					<td class="centro">Nombre de usuario</td>
					<td class="centro">Fecha de estado del servicio</td>
					<td class="centro">Descripcion</td>
				</tr>
			</thead>
			<?php
				require("../../scripts/conexion.php");
				$sql = "SELECT user.username,bitacora_edo_servicio.fecha_edo_ser,bitacora_edo_servicio.descripcion_edo_ser
				FROM publicacion_demanda_servicio
				JOIN bitacora_edo_servicio ON publicacion_demanda_servicio.idpublicacion_demanda_servicio=bitacora_edo_servicio.idpublicacion_demanda_servicio
				JOIN user ON bitacora_edo_servicio.iduser=user.iduser
				WHERE publicacion_demanda_servicio.num_guia='".$_SESSION['numero_guia']."'";
				$query = mysql_query($sql);
				$array = mysql_fetch_array($query);
			?>
			<tbody>
				<tr>
					<td class="centro"><?php echo $array['username'];?></td>
					<td class="centro"><?php echo $array['fecha_edo_ser'];?></td>
					<td class="centro"><?php echo $array['descripcion_edo_ser'];?></td>
				</tr>
			</tbody>
		</table>
	</section>
</div>
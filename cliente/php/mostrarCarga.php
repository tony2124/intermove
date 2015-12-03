<div class="container" style="margin-top:100px;">
	<section class="col-lg-offset-3 col-lg-6 bg-primary" style="height:200px">
		<center><h3>Mostrar Carga</h3></center>
		<table class="table table-bordered">
			<tr>
				<td class="text-center">Precio</td>
				<td clasS="text-center">Tipo de Cotizacion</td>
			</tr>
			<?php
				$sql = "SELECT intencion_compra.precio_viaje,tipo_cotizacion.nombre_tipo_cot FROM publicacion_demanda_servicio
					JOIN confirmacion_compra ON publicacion_demanda_servicio.num_guia=confirmacion_compra.num_guia
					JOIN intencion_compra ON confirmacion_compra.idintencion_compra=intencion_compra.idcarga
					JOIN tipo_cotizacion ON intencion_compra.idtipo_cotizacion=tipo_cotizacion.idtipo_cotizacion
					WHERE publicacion_demanda_servicio.num_guia='".$_SESSION['numero_guia']."'";
				$query = mysql_query($sql);
				$array = mysql_fetch_array($query);
			?>
			<tr>
				<td class="text-center"><?php echo $array['precio_viaje']; ?></td>
				<td class="text-center"><?php echo $array['nombre_tipo_cot']; ?></td>
			</tr>
		</table>
	</section>
</div>
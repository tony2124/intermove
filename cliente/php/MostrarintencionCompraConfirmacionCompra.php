<div class="container" style="margin-top:100px;">
	<div class="row">
		<section class="col-md-offset-2 col-md-8 bg-primary" style="height:200px">
			<center><h3>Informacion confirmacion de compra</h3></center>
			<table class="table table-bordered">
				<tr>
					<td class="text-center">Fecha de Confirmacion</td>
					<td class="text-center">Numero de guia</td>
					<td class="text-center">Nip del servicio</td>
					<td class="text-center">id publicacion demanda servicio</td>
					<td class="text-center">id intencion de compra</td>
				</tr>
				<?php
					$sql = "SELECT * FROM confirmacion_compra WHERE num_guia='".$_SESSION['numero_guia']."'";
					$query = mysql_query($sql);
					$array = mysql_fetch_array($query);
				?>
				<tr>
					<td class="text-center"><?php echo $array['fecha_confirmacion']; ?></td>
					<td class="text-center"><?php echo $array['num_guia']; ?></td>
					<td class="text-center"><?php echo $array['nip_servicio']; ?></td>
					<td class="text-center"><?php echo $array['idpublicacion_demanda_servicio']; ?></td>
					<td class="text-center"><?php echo $array['idintencion_compra']; ?></td>
				</tr>
			</table>
		</section>
		<section class=" col-md-12 bg-primary" style="height:200px; margin-top:20px;">
			<center><h3>Informacion intencion compra</h3></center>
			<table class="table table-bordered">
				<tr>
					<td class="text-center">id cliente</td>
					<td class="text-center">Fecha compra</td>
					<td class="text-center">num int</td>
					<td class="text-center">Estado int compra</td>
					<td class="text-center">id estado int compra</td>
					<td class="text-center">cotizador idprecios</td>
					<td class="text-center">precio viaje</td>
					<td class="text-center">peso estimado</td>
					<td class="text-center">cordenadas de orgine</td>
					<td class="text-center">destino de cordenadas</td>
					<td class="text-center">idtipo de carga</td>
					<td class="text-center">idtipo cotizacion</td>
				</tr>
				<?php
					$sql = "SELECT * FROM intencion_compra
					JOIN confirmacion_compra ON confirmacion_compra.idintencion_compra=intencion_compra.idcarga
					WHERE confirmacion_compra.num_guia='".$_SESSION['numero_guia']."'";
					$query = mysql_query($sql);
					$array = mysql_fetch_array($query);
				?>
				<tr>
					<td class="text-center"><?php echo $array['id_cliente']; ?></td>
					<td class="text-center"><?php echo $array['fecha_in_compra']; ?></td>
					<td class="text-center"><?php echo $array['num_int']; ?></td>
					<td class="text-center"><?php echo $array['estado_in_compra']; ?></td>
					<td class="text-center"><?php echo $array['idestado_int_compra']; ?></td>
					<td class="text-center"><?php echo $array['cotizador_idprecios']; ?></td>
					<td class="text-center"><?php echo $array['precio_viaje']; ?></td>
					<td class="text-center"><?php echo $array['peso_estimado']; ?></td>
					<td class="text-center"><?php echo $array['origen_coord']; ?></td>
					<td class="text-center"><?php echo $array['destino_coord']; ?></td>
					<td class="text-center"><?php echo $array['idtipo_carga']; ?></td>
					<td class="text-center"><?php echo $array['idtipo_cotizacion']; ?></td>
				</tr>
			</table>
		</section>
	</div>
</div>
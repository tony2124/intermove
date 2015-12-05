<div class="contenido-general">
			<div class="modal-header">
        		<h3 class="titulo-header">
        			<img class="img-header" src="../../img/Administrator.png"> Confirmacion De Compra e Intencio de compra
        		</h3>
      		</div>
</div>
<div class="container" style="margin-top:10px;">
	<div class="row">
		<section class="col-md-offset-1 col-md-10 bg-primary" style="height:200px; border-radius:5px;">
			<center><h3>Informacion confirmacion de compra</h3></center>
			<table class="table table-condensed">
				<thead>
					<tr>
						<td class="centro">Fecha de Confirmacion</th>
						<td class="centro">Numero de guia</td>
						<td class="centro">Nip del servicio</td>
						<td class="centro">id publicacion demanda servicio</td>
						<td class="centro">id intencion de compra</td>
					</tr>
				</thead>

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
		<section class=" col-md-12 bg-primary" style="height:200px; margin-top:20px; border-radius:5px;">
			<center><h3>Informacion intencion compra</h3></center>
			<table class="table table-condensed">
				<tr>
					<td class="text-center">id cliente</td>
					<td class="text-center">Fecha compra</td>
					<td class="text-center">Fecha deseada de entrega</td>
					<td class="text-center">Fecha deseada de entraga</td>
					<td class="text-center">num int</td>
					<td class="text-center">importe cotizado cliente</td>
					<td class="text-center">peso estimado</td>
					<td class="text-center">origen de cordenadas</td>
					<td class="text-center">destino de cordenadas</td>
					<td class="text-center">estado int compra</td>
					<td class="text-center">idtipo de carga</td>
					<td class="text-center">tipo de cotizacion</td>
					<td class="text-center">fecha deseada carga</td>
					<td class="text-center">voluemen estaminado </td>
					<td class="text-center">distancia en km</td>
				</tr>
				<?php
					$sql = "SELECT * FROM intencion_compra
					JOIN confirmacion_compra ON confirmacion_compra.idintencion_compra=intencion_compra.idintencion_compra
					WHERE confirmacion_compra.num_guia='".$_SESSION['numero_guia']."'";
					$query = mysql_query($sql);
					$array = mysql_fetch_array($query);
				?>
				<tr>
					<td class="text-center"><?php echo $array['id_cliente']; ?></td>
					<td class="text-center"><?php echo $array['fecha_in_compra']; ?></td>
					<td class="text-center"><?php echo $array['num_int']; ?></td>
					<td class="text-center"><?php echo $array['fecha_deseada_entrega']; ?></td>
					<td class="text-center"><?php echo $array['num_int']; ?></td>
					<td class="text-center"><?php echo $array['importe_cotizado_cliente']; ?></td>
					<td class="text-center"><?php echo $array['peso_estimado']; ?></td>
					<td class="text-center"><?php echo $array['origen_coord']; ?></td>
					<td class="text-center"><?php echo $array['destino_coord']; ?></td>
					<td class="text-center"><?php echo $array['estado_int_compra']; ?></td>
					<td class="text-center"><?php echo $array['idtipo_carga']; ?></td>
					<td class="text-center"><?php echo $array['fecha_deseada_carga']; ?></td>
					<td class="text-center"><?php echo $array['volumen_estimado']; ?></td>
					<td class="text-center"><?php echo $array['distancia_km']; ?></td>
				</tr>
			</table>
		</section>
	</div>
</div>
<div class="contenido-general">
			<div class="modal-header">
        		<h3 class="titulo-header">
        			<div class="col-md-1">
        				<i class="fa fa-credit-card fa-4x"></i>
        			</div>
        			<div class="col-md-3">
        				<h3>Confirmacion De Compra</h3>
        			</div>
        		</h3>
      		</div>
</div>
<section class=" col-md-offset-1 col-md-10 panel-heading panel panel-default panel-accent-gold" style="height:200px; margin-top:100px; border-radius:5px;">
			<h3 class="panel-title"><i class="fa fa-credit-card"></i> Informacion intencion compra</h3><br>
			<table class="table table-condensed">
				<tr>
					<td class="text-center">id cliente</td>
					<td class="text-center">Fecha compra</td>
					<td class="text-center">Fecha deseada de entrega</td>
					<td class="text-center">num int</td>
					<td class="text-center">importe cotizado cliente</td>
					<td class="text-center">peso estimado</td>
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
					<td class="text-center"><?php echo $array['fecha_deseada_entrega']; ?></td>
					<td class="text-center"><?php echo $array['num_int']; ?></td>
					<td class="text-center"><?php echo $array['importe_cotizado_cliente']; ?></td>
					<td class="text-center"><?php echo $array['peso_estimado']; ?></td>
					<td class="text-center"><?php echo $array['estado_int_compra']; ?></td>
					<td class="text-center"><?php echo $array['idtipo_carga']; ?></td>
					<td class="text-center"><?php echo $array['tipo_cotizacion']; ?></td>
					<td class="text-center"><?php echo $array['fecha_deseada_carga']; ?></td>
					<td class="text-center"><?php echo $array['volumen_estimado']; ?></td>
					<td class="text-center"><?php echo $array['distancia_km']; ?></td>
				</tr>
			</table>
		</section>
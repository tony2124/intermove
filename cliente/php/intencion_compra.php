<div class="contenido-general">
			<div class="modal-header">
        		<h3 class="titulo-header">
        			<div class="col-md-1">
        				<i class="fa fa-credit-card fa-4x"></i>
        			</div>
        			<div class="col-md-3">
        				<h3>Intencio de compra</h3>
        			</div>
        		</h3>
      		</div>
</div>
<div class="container" style="margin-top:100px;">
	<div class="row">
		<section class="col-md-offset-1 col-md-10 panel-heading panel panel-default panel-accent-gold" style="height:200px; border-radius:5px;">
			<h3 class="panel-title"><i class="fa fa-credit-card"></i> Informacion confirmacion de compra</h3><br>
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
	</div>
</div>
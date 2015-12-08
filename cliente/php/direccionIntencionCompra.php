<?php
require("../../scripts/conexion.php");
$sql = "SELECT
	direccion.calle1,direccion.calle2,direccion.num_interior,direccion.num_exterior,direccion.referencias
FROM
	publicacion_demanda_servicio
JOIN confirmacion_compra ON publicacion_demanda_servicio.num_guia = confirmacion_compra.num_guia
JOIN intencion_compra ON confirmacion_compra.idintencion_compra = intencion_compra.idintencion_compra
JOIN intencion_compra_direccion ON intencion_compra.idintencion_compra = intencion_compra_direccion.intencion_compra_idintencion_compra
JOIN direccion ON intencion_compra_direccion.direccion_iddireccion = direccion.iddireccion
JOIN c_tipo_direccion ON direccion.idtipo_direccion=idctipo_direccion
WHERE publicacion_demanda_servicio.num_guia = '".$_SESSION['numero_guia']."' AND c_tipo_direccion.nombre_tip_dir='fiscal';";
$query = mysql_query($sql);

?>
<div class="container" style="margin-top:100px;">
	<div class="row">
		<div class="col-lg-offset-2 col-lg-7 panel-heading panel panel-default panel-accent-gold" style="height:300px; border-radius:5px;">
			<h3 class="panel-title"><i class="fa fa-cube"></i> Direccion de la intencion de compra</h3><br>
			<?php if(mysql_num_rows($query)>0){ $array = mysql_fetch_array($query);?>
			<table class="table table-condensed">
				<thead>
					<tr>
						<td>Calle 1</td>
						<td>Calle 2</td>
						<td>Numero interior</td>
						<td>Numero exterior</td>
						<td>referencias</td>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td><?php echo $array['calle1']; ?></td>
						<td><?php echo $array['calle2']; ?></td>
						<td><?php echo $array['num_interior']; ?></td>
						<td><?php echo $array['num_exterior']; ?></td>
						<td><?php echo $array['referencias']; ?></td>
					</tr>
				</tbody>

			</table>
			<?php }else{
					echo '<center><div class="alert alert-danger" role="alert">
					  <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
					  <span class="sr-only">Error:</span>
					 No tiene direccion fiscal :(
					</div></center>';
			}?>
		</div>
	</div>
</div>
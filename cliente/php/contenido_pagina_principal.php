<div class="contenido-general">
			<div class="modal-header">
        		<h3 class="titulo-header">
        			<div class="col-md-1">
        				<i class="fa fa-desktop fa-4x"></i>
        			</div>
        			<div class="col-md-2">
        				<h3>Pagina Principal</h3>
        			</div>
        		</h3>
      		</div>
</div>
<div class="container">
			<div class="row" style="margin-top:70px;">
				<div class="col-lg-5 panel-heading panel panel-default panel-accent-gold" style=" height:100px; border-radius:5px;">
						<h3 class="panel-title class="panel-title""><i class="fa fa-cube"></i> Estado Carga</h3>

					<?php
						$arreglo = array("","PENDIENTE","CANCELADA","CONCREATADA");
						$sql = "SELECT intencion_compra.estado_int_compra FROM confirmacion_compra
						JOIN publicacion_demanda_servicio ON confirmacion_compra.num_guia=publicacion_demanda_servicio.num_guia
						JOIN intencion_compra ON confirmacion_compra.idintencion_compra=intencion_compra.idintencion_compra
						 WHERE publicacion_demanda_servicio.num_guia='".$_SESSION['numero_guia']."'";
						$query = mysql_query($sql);
						$array = mysql_fetch_array($query);
						echo "<br><center><p>".$arreglo[$array['estado_int_compra']]."</p></center>";
					?>
				</div>
				<div class="col-lg-offset-2 col-lg-5 panel-heading panel panel-default panel-accent-gold" style="height:100px; border-radius:5px;">
					<h3 class="panel-title"><i class="fa fa-cube"></i> Estado de servicio</h3>
					<?php
						$sql = "SELECT idestado_servicio FROM publicacion_demanda_servicio	WHERE num_guia='".$_SESSION['numero_guia']."'";
						$queryEstadoServicio = mysql_query($sql);
						$arrayEstadoServicio = mysql_fetch_array($queryEstadoServicio);
						echo "<br><center>".$arreglo[$arrayEstadoServicio['idestado_servicio']]."</center>";
					?>
				</div>
			</div>
			<br><div class="row">
				<div class="col-lg-5 panel-heading panel panel-default panel-accent-gold" style="height:200px; border-radius:5px;">
					<h3 class="panel-title"><i class="fa fa-cube"></i> Datos transportista</h3><br>
					<table class="table table-condensed">
						<tr>
							<td class="centro">Nombre</td>
							<td class="centro">Apellido Paterno</td>
							<td class="centro">Apellido Materno</td>
						</tr>
						<?php
							$sql = "select transportista.nombre_tr,transportista.ap_paterno_tr,transportista.ap_materno_tr,transportista.idtransportista
								FROM publicacion_demanda_servicio
								JOIN servicio_transportista ON publicacion_demanda_servicio.idpublicacion_demanda_servicio=servicio_transportista.idpublicacion_demanda_servicio
								JOIN  transportista ON servicio_transportista.idtransportista=transportista.idtransportista
								WHERE publicacion_demanda_servicio.num_guia='".$_SESSION['numero_guia']."'";
							$query = mysql_query($sql);
							$array = mysql_fetch_array($query);
						 ?>
						 <tr>
							<td class="centro"><?php echo $array['nombre_tr'] ?></td>
							<td class="centro"><?php echo $array['ap_paterno_tr'] ?></td>
							<td class="centro"><?php echo $array['ap_materno_tr'] ?></td>
						 </tr>
					</table>
				</div>
				<div class="col-lg-offset-2 col-lg-5 panel-heading panel panel-default panel-accent-gold" style="height:200px; border-radius:5px;">
					<h3 class="panel-title"><i class="fa fa-cube"></i> Informacion del veiculo</h3><br>
					<table class="table table-condensed">
						<tr>
							<td class="text-center">Marca</td>
							<td class="text-center">Modelo</td>
							<td class="text-center">Tipo camion</td>
						</tr>
					<?php //echo $array['idtransportista'];
						$sql = "SELECT c_marca_v.marca,c_marca_v.modelo,c_tipo_transporte.descripcion from transportista
						JOIN vehiculo ON transportista.idtransportista=vehiculo.idtransportista
						JOIN c_marca_v ON vehiculo.idmarca_v=c_marca_v.idcmarca_v
						JOIN c_tipo_transporte ON vehiculo.idc_tipo_transporte=c_tipo_transporte.idc_tipo_transporte
						WHERE vehiculo.idtransportista='".$array['idtransportista']."'";
						$query = mysql_query($sql);
						$arregloTransporte = mysql_fetch_array($query);
					?>
						<tr>
							<td class="text-center"><?php echo $arregloTransporte['marca']; ?></td>
							<td class="text-center"><?php echo $arregloTransporte['modelo']; ?></td>
							<td class="text-center"><?php echo $arregloTransporte['descripcion']; ?></td>
						</tr>
					</table>
				</div>
			</div>
		</div>
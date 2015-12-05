<div class="contenido-general">
			<div class="modal-header">
        		<h3 class="titulo-header">
        			<img class="img-header" src="../../img/Administrator.png"> Pagina Principal
        		</h3>
      		</div>
</div>
<div class="container">
			<div class="row" style="margin-top:70px;">
				<div class="col-lg-5 bg-primary" style=" height:100px; border-radius:5px;">
					<center><h3>Estado Carga</h3></center>
					<?php
						$arreglo = array("","PENDIENTE","CANCELADA","CONCREATADA");
						$sql = "SELECT idintencion_compra FROM confirmacion_compra JOIN publicacion_demanda_servicio ON confirmacion_compra.num_guia=publicacion_demanda_servicio.num_guia WHERE publicacion_demanda_servicio.num_guia='".$_SESSION['numero_guia']."'";
						$query = mysql_query($sql);
						$array = mysql_fetch_array($query);
						$sql2 = "SELECT estado_int_compra FROM intencion_compra WHERE idintencion_compra='".$array['idintencion_compra']."'";
						$query2 = mysql_query($sql2);
						$array2 = mysql_fetch_array($query2);
						echo "<center>".$arreglo[$array2['estado_int_compra']]."</center>";
					?>
				</div>
				<div class="col-lg-offset-2 col-lg-5 bg-primary" style="height:100px; border-radius:5px;">
					<center><h3>Estado de servicio</h3></center>
					<?php
						$sql = "SELECT idestado_servicio FROM publicacion_demanda_servicio	WHERE num_guia='".$_SESSION['numero_guia']."'";
						$queryEstadoServicio = mysql_query($sql);
						$arrayEstadoServicio = mysql_fetch_array($queryEstadoServicio);
						echo "<center>".$arreglo[$arrayEstadoServicio['idestado_servicio']]."</center>";
					?>
				</div>
			</div>
			<br><div class="row">
				<div class="col-lg-5 bg-primary" style="height:200px; border-radius:5px;">
					<center><h3>Datos transportista</h3></center>
					<table class="table table-condensed">
						<tr>
							<td class="centro">Nombre</td>
							<td class="centro">Apellido Paterno</td>
							<td class="centro">Apellido Materno</td>
							<td class="centro">Correo</td>
						</tr>
						<?php
							$sql = "select transportista.nombre_tr,transportista.ap_paterno_tr,transportista.ap_materno_tr,transportista.idtransportista,transportista.email
								FROM publicacion_demanda_servicio
								JOIN servicio_transportista ON publicacion_demanda_servicio.idpublicacion_demanda_servicio=servicio_transportista.idpublicacion_demanda_servicio
								JOIN  transportista ON servicio_transportista.idtransportista=transportista.idtransportista
								WHERE publicacion_demanda_servicio.num_guia='".$_SESSION['numero_guia']."'";
									echo $_SESSION['numero_guia'];
							$query = mysql_query($sql);
							$array = mysql_fetch_array($query);
						 ?>
						 <tr>
							<td class="centro"><?php echo $array['nombre_tr'] ?></td>
							<td class="centro"><?php echo $array['ap_paterno_tr'] ?></td>
							<td class="centro"><?php echo $array['ap_materno_tr'] ?></td>
							<td class="centro"><?php echo $array['email'] ?></td>
						 </tr>
					</table>
				</div>
				<div class="col-lg-offset-2 col-lg-5 bg-primary" style="height:200px; border-radius:5px;">
					<center><h3>Informacion del veiculo</h3></center>
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
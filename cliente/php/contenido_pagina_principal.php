<div class="container">
			<div class="row" style="margin-top:70px;">
				<div class="col-lg-5 bg-primary" style=" height:100px">
					<center><h3>Estado Carga</h3></center>
					<?php
						$arreglo = array("","PENDIENTE","CANCELADA","CONCREATADA");
						$sql = "SELECT idintencion_compra FROM confirmacion_compra JOIN publicacion_demanda_servicio ON confirmacion_compra.num_guia=publicacion_demanda_servicio.num_guia WHERE publicacion_demanda_servicio.num_guia='".$_SESSION['numero_guia']."'";
						$query = mysql_query($sql);
						$array = mysql_fetch_array($query);
						$sql2 = "SELECT estado_in_compra FROM intencion_compra WHERE idcarga='".$array['idintencion_compra']."'";
						$query2 = mysql_query($sql2);
						$array2 = mysql_fetch_array($query2);
						echo "<center>".$arreglo[$array2['estado_in_compra']]."</center>";
					?>
				</div>
				<div class="col-lg-offset-2 col-lg-5 bg-primary" style="height:100px">
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
				<div class="col-lg-5 bg-primary" style="height:200px;">
					<center><h3>Datos transportista</h3></center>
					<table class="table table-bordered">
						<tr>
							<td>Nombre</td>
							<td>Apellido Paterno</td>
							<td>Apellido Materno</td>
						</tr>
						<?php
							$sql = "select transportista.nombre_tr,transportista.ap_paterno_tr,transportista.ap_materno_tr,transportista.idtransportista FROM
									publicacion_demanda_servicio JOIN confirmacion_compra ON
									publicacion_demanda_servicio.num_guia=confirmacion_compra.num_guia JOIN intencion_compra ON
									confirmacion_compra.idintencion_compra=intencion_compra.idcarga
									JOIN cliente ON intencion_compra.id_cliente=cliente.id_cliente
									JOIN telefono ON cliente.idtelefono = telefono.idtelefono
									JOIN transportista ON transportista.idtelefono = telefono.idtelefono
									WHERE publicacion_demanda_servicio.num_guia='".$_SESSION['numero_guia']."'";
									echo $_SESSION['numero_guia'];
							$query = mysql_query($sql);
							$array = mysql_fetch_array($query);
						 ?>
						 <tr>
							<td><?php echo $array['nombre_tr'] ?></td>
							<td><?php echo $array['ap_paterno_tr'] ?></td>
							<td><?php echo $array['ap_materno_tr'] ?></td>
						 </tr>
					</table>
				</div>
				<div class="col-lg-offset-2 col-lg-5 bg-primary" style="height:200px">
					<center><h3>Informacion del veiculo</h3></center>
					<table class="table table-bordered">
						<tr>
							<td>Marca</td>
							<td>Modelo</td>
							<td>Tipo camion</td>
						</tr>
					<?php //echo $array['idtransportista'];
						$sql = "SELECT marca_v.marca,marca_v.modelo,c_tipo_transporte.descripcion from vehiculo
						JOIN marca_v ON vehiculo.idmarca_v=marca_v.idmarca_v
						JOIN c_tipo_transporte ON vehiculo.idc_tipo_transporte=c_tipo_transporte.idc_tipo_transporte
						WHERE vehiculo.idtransportista='".$array['idtransportista']."'";
						$query = mysql_query($sql);
						$arregloTransporte = mysql_fetch_array($query);
					?>
						<tr>
							<td><?php echo $arregloTransporte['marca']; ?></td>
							<td><?php echo $arregloTransporte['modelo']; ?></td>
							<td><?php echo $arregloTransporte['descripcion']; ?></td>
						</tr>
					</table>
				</div>
			</div>
		</div>
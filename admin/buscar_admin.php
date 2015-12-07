<?php
	include("../scripts/conexion.php");
 	$dato = $_POST['dato'];

 	$rol = $_POST['rol'];
 	$consulta_rol = "and user.idctipo_rol = $rol";

 	$estado = $_POST['estado'];
 	$consulta_estado = "and empleado.estado_emp = $estado";

 		if($estado==""){
 			$consulta_estado = "";
 		}

 		if($rol==""){
 			$consulta_rol= "";
 		}
// porque si es 0 no me lo muestra?
 	// echo $estado;

 	if((!empty($dato))||(!empty($estado))||(!empty($rol))){
 		echo '<h3><center>Usuarios encontrados</center></h3>';
		$usuarios = mysql_query("SELECT user.iduser, user.username, user.create_time, user.idctipo_rol,
								empleado.nombre_emp, empleado.ap_paterno_emp, empleado.ap_materno_emp, empleado.estado_emp 
							    from user inner join empleado on user.iduser=empleado.iduser where empleado.nombre_emp like '$dato%' $consulta_estado $consulta_rol
							    or empleado.ap_paterno_emp like '$dato%' $consulta_estado $consulta_rol
							    or empleado.ap_materno_emp like '$dato%' $consulta_estado $consulta_rol") or die(mysql_error());
		}
	else{
		echo '<h3><center>Usuarios registrados</center></h3>';
		$usuarios = mysql_query("SELECT user.iduser, user.username,user.create_time,user.idctipo_rol,empleado.nombre_emp,
								empleado.ap_paterno_emp,empleado.ap_materno_emp,empleado.estado_emp
							 	from user inner join empleado on user.iduser=empleado.iduser where empleado.estado_emp=1");
	}

	
	?>

	<table class="table table-hover">
    <?php
		if(mysql_num_rows($usuarios)>0){
		?>
	
	<table class="table table-hover">
					<tr>
						<th class="active">ID</th>
						<th class="active">Usuario</th>
						<th class="active">Nombre</th>
						<th class="active">Apellido paterno</th>
						<th class="active">Apellido materno</th>
						<th class="active">Fecha registro</th>
						<th class="active">Rol</th>
						<th class="active">Estado</th>
						<th class="active" colspan="3">Operaciones</th>
					</tr>
					<?php
						
						
						while ($row = mysql_fetch_array($usuarios)){
					?>
					<tr>
						<?php $i = $row['iduser'];?>
						
						<td><?php echo "$row[iduser]<br>";?></td>
						<td><?php echo "$row[username]<br>";?></td>
						<td><?php echo "$row[nombre_emp]<br>";?></td>
						<td><?php echo "$row[ap_paterno_emp]<br>";?></td>
						<td><?php echo "$row[ap_materno_emp]<br>";?></td>
						<td><?php echo "$row[create_time]<br>";?></td>
						<?php
							 $roles = mysql_query("SELECT * from c_tipo_rol where idctipo_rol = '".$row['idctipo_rol']."' "); 
							 while($roles_ = mysql_fetch_array($roles)){
						 ?>
						<td><?php echo "$roles_[descripcion_rol]<br>";?></td> <?php } ?>
						<td>
							<?php if($row['estado_emp']==1){ ?>
								   <div class="label label-success">Activo</div>
							<?php } else { ?>
									<div class="label label-danger">Inactivo</div>
							<?php }?>
						</td>
						
						
						<?php if($row['estado_emp']==1){?> 
						<!-- Modal -->
						<td>
							<div style"width:30px; cursor:pointer;">
								<a href="#Edicion" data-toggle="modal" title="Editar" data-target="<?php echo '#myModal'.$i; ?>">
									<span class="glyphicon glyphicon glyphicon-pencil"></span>
								</a>
							</div>
							
						</td>
						<td>
							<div style="width:30px; cursor:pointer;">
								<a href="../admin/cambiar_estado_usuario.php?id=<?php echo $row['iduser']?>&status=2">
									<span  class="glyphicon glyphicon-remove" title="Desactivar"></span>
								</a>
							</div> 
						</td>
						<?php 
						}else{ 
						?> 		
						<!-- Modal -->
						<td>
							<div style"width:30px; cursor:pointer;">
								<a href="#Edicion" data-toggle="modal" title="Editar" data-target="<?php echo '#myModal'.$i; ?>">
									<span class="glyphicon glyphicon glyphicon-pencil"></span>
								</a>
							</div>
							
						</td>
						<td>
							<div style="width:30px; cursor:pointer;">
								<a href="../admin/cambiar_estado_usuario.php?id=<?php echo $row['iduser']?>&status=1">
									<span  class="glyphicon glyphicon-ok" title="Activar" ></span>
								</a>
							</div> 
						</td>
						<?php } ?> 
						
					</tr>
						
					<?php
			          	}//while
			          ?>
				
<?php
	}//fetch array
	else
	{
?>
	
	<tr><td colspan="8"><div class="alert alert-danger" role="alert"><span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span> No se encontraron resultados</div></td></tr>

<?php 
}//else
?>
</table>

<!-- Modal -->			<?php 
							$edit_us = mysql_query("SELECT * from user inner join empleado where user.iduser=empleado.iduser");
							$i=1;
							while($edit = mysql_fetch_array($edit_us)){
						?>
						<div class="modal fade" id="<?php echo 'myModal'.$i; ?>" data-keyboard="false" data-backdrop="static">
							<div class="modal-dialog">
								<div class="modal-content">
										<div class="modal-header">
											<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
											<h3><img src="../img/Modify.png" alt="100">Editar usuario</h3>
										</div>

									
									<form method="post" role="form" action="../admin/editar_usuarios.php">
										<div class="modal-body">
											<!-- table -->
													
													<div class="form-group">
														<input type="hidden" value="<?php echo $i;?>" name="id" required>
													</div>
													<div class="form-group">
														<label for="" class="col-lg-4">Nombre:</label>
														<div class="col-lg-8">
															<input type="text" class="form-control" value="<?php echo $edit['nombre_emp'];?>" name="nombre_adm" required>
														</div>
													</div>
													<br><br>
													<div class="form-group">
														<label for="" class="col-lg-4">Apellido paterno:</label>
														<div class="col-lg-8">
															<input type="text" class="form-control" value="<?php echo $edit['ap_paterno_emp'];?>" name="ap_pat_adm" required>
														</div>
													</div>
													<br><br>
													<div class="form-group">
														<label for="" class="col-lg-4">Apellido materno:</label>
														<div class="col-lg-8">
															<input type="text" class="form-control" value="<?php echo $edit['ap_materno_emp'];?>" name="ap_mat_adm" required>
														</div>
													</div>
													<br><br>
													<div class="form-group">
														<label for="" class="col-lg-4">Usuario:</label>
														<div class="col-lg-8">
															<input type="text" class="form-control" value="<?php echo $edit['username'];?>" name="username_adm" required>
														</div>
													</div>
													<br><br>
													<div class="form-group">
														<label for="" class="col-lg-4">Fecha de nacimiento:</label>
														<div class="col-lg-8">
															<input type="date-time" class="form-control" value="<?php echo $edit['fecha_nac_emp'];?>" name="fecha_nac_adm" required>
														</div>
													</div>
													<!-- Telefono -->
													<br><br>
													<div class="form-group">
														<label for="" class="col-lg-4">Correo electrónico:</label>
														<div class="col-lg-8">
															<input type="email" class="form-control" value="<?php echo $edit['email'];?>" name="email_adm" required>
														</div>
													</div><br>
													<!-- Privilegios -->
											
										</div>

										<div class="modal-footer">
											<button type="button" class="btn btn-primary" data-dismiss="modal">Cerrar</button>
											<button type="submit" class="btn btn-default">Guardar cambios</button>
										</div>
									</form>
									
								</div>
							</div>
						</div><?php $i=$i+1;} ?>

		

<?php mysql_close($conexion); ?>

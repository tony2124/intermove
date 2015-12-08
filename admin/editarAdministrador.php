<form method="post" role="form" action="../admin/editar_usuarios.php" class="form-horizontal">
			<div class="modal-body">
			<!-- table -->
										
				<div class="form-group">
					<input type="hidden" value="<?php echo $i;?>" name="id" required>
				</div>

				<div class="form-group">
					<label for="" class="control-label col-lg-4">Nombre:</label>
					<div class="col-lg-8">
						<input type="text" class="form-control" value="<?php echo $edit['nombre_emp'];?>" name="nombre_adm" required>
					</div>
				</div>
									
				<div class="form-group">
					<label for="" class="control-label col-lg-4">Apellido paterno:</label>
					<div class="col-lg-8">
						<input type="text" class="form-control" value="<?php echo $edit['ap_paterno_emp'];?>" name="ap_pat_adm" required>
					</div>
				</div>
													
				<div class="form-group">
					<label for="" class="control-label col-lg-4">Apellido materno:</label>
					<div class="col-lg-8">
						<input type="text" class="form-control" value="<?php echo $edit['ap_materno_emp'];?>" name="ap_mat_adm" required>
					</div>
				</div>
													
				<div class="form-group">
					<label for="" class="control-label col-lg-4">Usuario:</label>
					<div class="col-lg-8">
						<input type="text" class="form-control" value="<?php echo $edit['username'];?>" name="username_adm" required>
					</div>
				</div>
													
				<div class="form-group">
					<label for="" class="control-label col-lg-4">Fecha de nacimiento:</label>
					<div class="col-lg-8">
						<input type="date-time" class="form-control" value="<?php echo $edit['fecha_nac_emp'];?>" name="fecha_nac_adm" required>
					</div>
				</div>
				
				<!-- Telefono -->
													
				<div class="form-group">
					<label for="" class="control-label col-lg-4">Correo electrónico:</label>
					<div class="col-lg-8">
						<input type="email" class="form-control" value="<?php echo $edit['email'];?>" name="email_adm" required>
					</div>
				</div>
													
				<!-- Privilegios -->
											
			</div>
			
			<!-- <div class="modal-footer"> <-->
				<hr>
			
				<center>
					<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
					<button type="submit" class="btn btn-primary" style="margin-left:20px;">Guardar cambios</button>
					<br><br>
				</center>
			<!-- </div> -->
</form>
<form  method="post" class="form-horizontal" role="form" action="../admin/modificar_password.php">
				<div class="form-group">
					<input type="hidden" value="<?php echo $i;?>" name="id" id="id" required>
				</div>

				<div class="form-group">
					<label for="mod_password_act_adm" class="control-label col-lg-4">Contraseña actual:</label>
					<div class="col-lg-8">
						<input class="form-control" type="password"  id="mod_password_act_adm" name="mod_password_act_adm" placeholder="Introduce contraseña actual" required>
					</div>
				</div>

				<div class="form-group">
					<label for="mod_password_new_adm" class="control-label col-lg-4">Contraseña nueva:</label>
					<div class="col-lg-8">
						<input class="form-control" type="password" id="mod_password_new_adm" name="mod_password_new_adm" placeholder="Introduce nueva contraseña" required>
					</div>
				</div>

				<div class="form-group">
					<label for="mod_password_new_adm" class="control-label col-lg-4">Repetir contraseña:</label>
					<div class="col-lg-8">
						<input class="form-control" type="password" id="mod_password_new2_adm" name="mod_password_new2_adm" placeholder="Repetir contraseña" required>
					</div>
				</div>				
			<hr>
			<center>
				<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
				<button type="button" id="btn-password" class="btn btn-primary" style="margin-left:20px;" >Guardar cambios</button>
			</center>
		</form>
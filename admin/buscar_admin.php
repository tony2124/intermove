<?php
	include("../scripts/conexion.php");
 	$dato = $_POST['dato'];
 	$rol = $_POST['rol']; $consulta_rol = "and user.idctipo_rol = $rol";
 	$estado = $_POST['estado'];	$consulta_estado = "and empleado.estado_emp = $estado";

 	if($estado==""){$consulta_estado = "";}
 	if($rol==""){$consulta_rol= "";}
// porque si es 0 no me lo muestra?

 	if((!empty($dato))||(!empty($estado))||(!empty($rol)))
 	{
 		echo '<h3><center>Usuarios encontrados</center></h3>';
		$usuarios = mysql_query("SELECT user.iduser, user.username, user.create_time, user.idctipo_rol,
								empleado.nombre_emp, empleado.ap_paterno_emp, empleado.ap_materno_emp, empleado.estado_emp 
							    from user inner join empleado on user.iduser=empleado.iduser where empleado.nombre_emp like '$dato%' $consulta_estado $consulta_rol
							    or empleado.ap_paterno_emp like '$dato%' $consulta_estado $consulta_rol
							    or empleado.ap_materno_emp like '$dato%' $consulta_estado $consulta_rol") or die(mysql_error());
	}
	else
	{
		echo '<h3><center>Usuarios registrados</center></h3>';
		$usuarios = mysql_query("SELECT user.iduser, user.username,user.create_time,user.idctipo_rol,empleado.nombre_emp,
								empleado.ap_paterno_emp,empleado.ap_materno_emp,empleado.estado_emp
							 	from user inner join empleado on user.iduser=empleado.iduser where empleado.estado_emp=1");
	}
?>

	
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
				<?php } ?>
			</td>
						
		<?php if($row['estado_emp']==1) { ?> 
			<!-- Modal Datos-->
			<td>
				<div style"width:30px; cursor:pointer;">
					<a href="#" data-toggle="modal" data-target="<?php echo '#myModal'.$i; ?>">
						<i class="fa fa-pencil-square-o" title="Editar"></i>
					</a>
				</div>
			</td>
			<!-- Modal Datos -->
			
			<!-- Modal Contraseña -->
			<td>
				<div style="width:10px; cursor:pointer;">
					<a href="#" data-toggle="modal" title="Cambiar contraseña" data-target="<?php echo '#myModalpassword'.$i;?>">
						<i class="fa fa-lock" title="Modificar contraseña"></i>
					</a>								
				</div>
			</td>
			<!-- Modal Contraseña -->
			
			<!-- Desactivar -->
			<td>
				<div style="width:10px; cursor:pointer;">
					<a href="../admin/cambiar_estado_usuario.php?id=<?php echo $row['iduser']?>&status=2">
						<i class="fa fa-times" title="Desactivar"></i>
					</a>
				</div> 
			</td>
			<!-- Desactivar -->
		<?php } else { ?> 		
			<!-- Modal Datos-->
			<td>
				<div style"width:30px; cursor:pointer;">
					<a href="#" data-toggle="modal" data-target="<?php echo '#myModal'.$i; ?>">
						<i class="fa fa-pencil-square-o" title="Editar"></i>
					</a>
				</div>
			</td>
			<!-- Modal Datos -->

			<!-- Modal Contraseña -->
			<td>
				<div style="width:10px; cursor:pointer;">
					<a href="#" data-toggle="modal" title="Cambiar contraseña" data-target="<?php echo '#myModalpassword'.$i;?>">
						<i class="fa fa-lock" title="Modificar contraseña"></i>
					</a>								
				</div>
			</td>
			<!-- Modal Contraseña -->
						
			<!-- Activar -->
			<td>
				<div style="width:10px; cursor:pointer;">
					<a href="../admin/cambiar_estado_usuario.php?id=<?php echo $row['iduser']?>&status=1">
						<i class="fa fa-check" title="Activar"></i>
					</a>
				</div> 
			</td>
			<!-- Activar -->
		<?php } ?> 			
		</tr>		
<?php 		}//while 
		}//fetch array 
		else 
		{ 
?>	
	
			<tr><td colspan="8"><div class="alert alert-danger" role="alert"><span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span> No se encontraron resultados</div></td></tr>

<?php }//else ?>
	</table>


<!-- Modal Datos-->			
<?php 
	$edit_us = mysql_query("SELECT * from user inner join empleado where user.iduser=empleado.iduser");
	$i=1;
	while($edit = mysql_fetch_array($edit_us)){
?>

<div class="modal fade" id="<?php echo 'myModal'.$i; ?>" data-keyboard="false" data-backdrop="static">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header" style="background-color:#04B4AE; color:white;">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h2 class="text-center"><img src="../img/Modify.png" alt="100">	Editar usuario</h2>
			</div>		
			<div class="modal-body">
			<!-- table -->
			<?php include("../admin/editarAdministrador.php");?>
			</div>	
		</div>
	</div>
</div>
<!-- Modal Datos -->

<!-- Modal Password -->
<div class="modal fade" role="dialog" id="<?php echo 'myModalpassword'.$i; ?>" data-keyboard="false" data-backdrop="static">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header" style="background-color:#04B4AE; color:white;">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h2 class="text-center"><img src="../img/Lock.png" width="50" alt="20">Modificar contraseña</h2>
			</div>

		
			<div class="modal-body">
				<!-- Table -->
				<?php include("../admin/modificarContrasena.php");?>
			</div>
		</div>
	</div>
</div>
<!-- Modal password -->



<?php 
	$i=$i+1; } 
	mysql_close($conexion); 
?>

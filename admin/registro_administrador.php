<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>REGISTRO</title>
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<link rel="stylesheet" href="../css/bootstrap/css/bootstrap.min.css">
	
	<!-- ELIMINAR ESTILOS PARA ENTREGAR -->
	<style>
		body{
			padding-top: 30px;
		}
	</style>
	<!--  -->

	<script type="text/javascript">
	//<![CDATA[
		function verificar(v)
		{
		  	var p1 = document.getElementById('pass_admin');
			if( p1.value != v)
			{
			 document.getElementById('mensaje').innerHTML = "<strong>No coinciden</strong>";
			 boton.disabled = true;
			}else{
			 document.getElementById('mensaje').innerHTML = "";
			 boton.disabled = false;
			}
		}
	//]]>
	</script>
	
</head>
<body>

	<!-- ELIMINAR LINEA SUPERIOR PARA ENTREGAR -->
	<head>
		<div class="navbar navbar-fixed-top navbar-inverse">
			<div class="container" style="color:#fff;" >
				<h2><center>REGISTRO</center></h2>
			</div>
		</div>
	</head>
	<br><br>
	<!-- FIN DE LINEA -->


	<form action="../scripts/registro_admin.php" method="post" role="form" class="form-horizontal" >
		<div class="container" >

      		<div class="row">
      			<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
      				<center><img src="../img/administrator.png" width="130"></center>
      			</div>
      		</div>
      		<br>    			

			<div class="row" >
				<div class="form-group">
					<div class="col-xs-3 col-sm-3 col-md-3 col-lg-1 col-xs-offset-2 col-sm-offset-2 col-md-offset-2 col-lg-offset-2 ">
						<label for="" class="control-label">Nombre:</label>
					</div>
					<div class="col-xs-5 col-sm-5 col-md-5 col-lg-5  col-xs-offset-1 col-lg-offset-2">
						<input type="text" class="form-control" name="nombre_admin" autofocus required pattern="[a-zA-ZñÑáéíóíÁÉÍÓÚ]*" placeholder="Nombre">
					</div>
				</div>

				<div class="form-group">
					<div class="col-xs-3 col-sm-3 col-md-3 col-lg-2 col-xs-offset-2 col-sm-offset-2 col-md-offset-2 col-lg-offset-2">
						<label for="" class="control-label">Apellido Paterno:</label>
					</div>
					<div class="col-xs-5 col-sm-5 col-md-5 col-lg-5  col-xs-offset-1 col-lg-offset-1">
						<input type="text" class="form-control" name="apellido_pat_admin" required pattern="[a-zA-ZñÑáéíóíÁÉÍÓÚ]*" placeholder="Apellido paterno">
					</div>
				</div>

				<div class="form-group">
					<div class="col-xs-3 col-sm-3 col-md-3 col-lg-2 col-xs-offset-2 col-sm-offset-2 col-md-offset-2 col-lg-offset-2">
						<label for="" class="control-label">Apellido Materno:</label>
					</div>
					<div class="col-xs-5 col-sm-5 col-md-5 col-lg-5  col-xs-offset-1 col-lg-offset-1">
						<input type="text" class="form-control" name="apellido_mat_admin" required pattern="[a-zA-ZñÑáéíóíÁÉÍÓÚ]*" placeholder="Apellido materno">
					</div>
				</div>

				<div class="form-group">
					<div class="col-xs-3 col-sm-3 col-md-3 col-lg-1 col-xs-offset-2 col-sm-offset-2 col-md-offset-2 col-lg-offset-2">
						<label for="" class="control-label">Usuario:</label>
					</div>
					<div class="col-xs-5 col-sm-5 col-md-5 col-lg-5  col-xs-offset-1 col-lg-offset-2">
						<input type="text" class="form-control" name="usuario_admin"  id="usuario_admin" required placeholder="Usuario"><span class="label label-danger" id="mensaje_usuario"></span>
						<div id="Info"></div>
					</div>
				</div>

				<div class="form-group">
					<div class="col-xs-3 col-sm-3 col-md-3 col-lg-1 col-xs-offset-2 col-sm-offset-2 col-md-offset-2 col-lg-offset-2">
						<label for="" class="control-label">Contraseña:</label>
					</div>
					<div class="col-xs-5 col-sm-5 col-md-5 col-lg-5  col-xs-offset-1 col-lg-offset-2">
						<input type="password" class="form-control" name="pass_admin" id="pass_admin" required placeholder="Contraseña">
					</div>
				</div>

				<div class="form-group">
					<div class="col-xs-3 col-sm-3 col-md-3 col-lg-2 col-xs-offset-2 col-sm-offset-2 col-md-offset-2 col-lg-offset-2 ">
						<label for="" class="control-label">Repetir contraseña:</label>
					</div>
					<div class="col-xs-5 col-sm-5 col-md-5 col-lg-5 col-xs-offset-1 ">
						<input type="password" class="form-control" onkeyup="verificar(this.value);" name="pass_admin_2" id="pass_admin_2" required placeholder="Repetir contraseña"><span class="label label-danger" id="mensaje"><!-- mensaje de verificación --></span>
					</div>
				</div>

				<div class="form-group">
					<div class="col-xs-3 col-sm-3 col-md-3 col-lg-2 col-xs-offset-2 col-sm-offset-2 col-md-offset-2 col-lg-offset-2 ">
						<label for="" class="control-label">Correo Electrónico:</label>
					</div>
					<div class="col-xs-5 col-sm-5 col-md-5 col-lg-5  col-xs-offset-1">
						<input type="email" class="form-control" name="correo_admin" required placeholder="Correo electrónico">
					</div>
				</div>

				<div class="form-group">
					<div class="col-xs-3 col-sm-3 col-md-3 col-lg-2 col-xs-offset-2 col-sm-offset-2 col-md-offset-2 col-lg-offset-2 ">
						<label for="" class="control-label">Role:</label>
					</div>
					<div class="col-xs-5 col-sm-5 col-md-5 col-lg-5  col-xs-offset-1">
						<select name="role_admin" class="form-control select" required>
							<option value="" selected >ELEGIR ROL</option>
							<option value="1">Ventas</option>
							<option value="2">Asignación</option>
							<option value="3">Incidencias</option>
							<option value="4">Tranportista</option>
							<option value="5">Administrador de usuarios</option>
						</select>
					</div>
				</div>

				<div class="form-group">
					<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 ">
						<center><button class="btn btn-primary" type="submit" id="boton">Enviar <span class="glyphicon glyphicon-ok"></span></button></center>
					</div>
				</div>

				
			</div>

			

		</div>

		
	</form>


<script src="../api/jquery/jquery-1.11.3.min.js"></script>
<script src="../css/bootstrap/js/bootstrap.min.js"></script>	
</body>

	<script type="text/javascript">
		$(document).ready(function() {    
    		$('#usuario_admin').blur(function(){
        		//$('#Info').html('<img src="loader.gif" alt="" />').fadeOut(1000);

        		var username = $(this).val();        
        		var dataString = 'username='+username;

      		  $.ajax({
            	type: "POST",
            	url: "../scripts/validar_usuario.php",
            	data: dataString,
            	
            	success: function(data) {
                $('#Info').fadeIn(1000).html(data);
            }
        });
    	});              
	}); 
	</script>
</html>
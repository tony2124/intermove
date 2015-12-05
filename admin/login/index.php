<?php 
	@session_start();

	if(isset($_SESSION['id_admin'])){
		header('Location: ../cPanel/');
	}
?>

<!DOCTYPE html>
<html>
	<head>
		<title>Login Administrador</title>
		<meta charset="UTF-8">
		<!-- <meta name="viewport" content="width=device-width, initial-scale=1.0"> -->
		<link rel="shortcut icon" href="../../img/login.png" type='image/png'>

		<link rel="stylesheet" type="text/css" href="../../css/bootstrap/css/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="../../css/admin/css_admin.css">
	</head>

	<body class="body-logeo">
		<div class="pagina">
			<div class="contenedor-logeo" >
				<div class="login-form">
					<form class="form-horizontal" role="form" method="post" action="mod/login.php">
			      		<div class="modal-header">
			        		<h3 class="titulo-header">
			        			<img class="img-header" src="../../img/login.png"> &nbsp;Introduzca sus datos de acceso
			        		</h3>
			      		</div>
			      		<div>
					      	<div class="modal-body">
					      		<?php if(isset($_REQUEST['e'])){ ?>
							  		<div class="alert alert-danger alert-dismissible" role="alert">
										<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
										<strong>Error!</strong> Usuario y/o contraseña incorrecto(s).
									</div>
							  	<?php } ?>
					      		<div class="form-group">
							    	<label class="col-sm-3 control-label">Usuario: </label>
							    	<div class="col-sm-8">
							    		<div class="input-group">
											<span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
											<input type="text" class="form-control" name="inputUsuario" placeholder="Nombre de usuario..." autofocus required>
										</div>
							    	</div>
							  	</div>
							  	<br>
							  	<div class="form-group">
							    	<label class="col-sm-3 control-label">Contraseña: </label>
							    	<div class="col-sm-8">
							    		<div class="input-group">
											<span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
											<input type="password" class="form-control" name="inputContrasena" placeholder="Contraseña..." required>
										</div>
							    	</div>
							  	</div>

							  	<center><a href="#">Olvidé mi contraseña</a></center>
							  	
							  	<hr>
							  	<center>
					      			<!-- <button type="submit" class="btn btn-primary"><i  class="glyphicon glyphicon-ok"></i> Entrar</button> -->
					      			<button id="btnIniciar" class="btn btn-primary"><i  class="glyphicon glyphicon-ok"></i> Entrar</button>
					      		</center>
					      	</div>
					    </div>
			      	</form>
				</div>
			</div>
			<div class="img-camino">
				<img src="../../img/camino.png">
			</div>
		</div>

		<script type="text/javascript" src="../../api/jquery/jquery-1.11.3.min.js"></script>
		<script type="text/javascript" src="../../css/bootstrap/js/bootstrap.min.js"></script>
	</body>

	<script type="text/javascript">
		$('#btnIniciar').click(function(){
			$(location).attr('href', '../cPanel/');
		});
	</script>
</html>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Login</title>
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<!-- <link rel="stylesheet" href=""> -->
	<script type="text/javascript" src="/http://code.jquery.com/jquery-1.11.3.min.js"></script>
	<style>
		body{
			padding-top: 60px;
		}
		.uno{
			background-color: #8FBC8F;
			box-shadow: -2px 3px 15px 1px;
		}
	</style>

	
<script type="javascript">
		function ComprobarHora()
		{
			if(date('H')>=12){
				return true
			}
			else{
				return false;
			}
		  
		}
	</script>
</head>

<body>

	
	
	<!-- Menu -->
	<head>
			<nav class="navbar navbar-default navbar-fixed-top navbar-inverse">
				<div class="container-fluid">
					<div class="navbar-header">
						<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-1">
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						</button>

						<a href="#" class="navbar-brand">FORMULARIO</a>
					</div>

					<div class="collapse navbar-collapse" id="navbar-1">
							<ul class="nav navbar-nav">
								<li><a href="">Item#1</a></li>
								<li><a href="">Item#2</a></li>
							</ul>
					</div>
				</div>
			</nav>
		
	</head>
	<!-- FIN MENU -->

	<!-- CONTENEDOR DE LA INPUT -->
	<div class="container">
		<div class="row">

			<div class="col-xs-7 col-sm-6 col-md-6 col-xs-offset-3 col-md-offset-3 col-sm-offset-3 uno">
				<br>
				<form action="login.php" method="post" class="form-horizontal" role="form">
					<div class="form-group">
						<label for="user" class="col-xs-3 col-md-2 col-lg-3 control-label">Usuario</label>
						<div class="col-xs-9 col-lg-8 col-md-10">
							<input required type="text" class="form-control" name="user" id="user" placeholder="Usuario" pattern="[a-zA-Z0-9ñÑ ]*">
						
						</div>
					</div>

					<div class="form-group">
						<label for="password" class="col-xs-3 col-md-2 col-lg-3 control-label">Contraseña</label>
						<div class="col-xs-9 col-lg-8 col-md-10">
							<input required type="password" name="password" class="form-control" id="password" placeholder="Contraseña">
						</div>
					</div>
					
					<div class="form-group">
						<div class="col-xs-3 col-sm-2 col-md-3 col-lg-4 col-xs-offset-4 col-sm-offset-4 col-md-offset-4 col-lg-offset-5">
							<button  type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-ok"></span> ENVIAR</button>
						</div>
					</div>
					
				
				</form>
			</div>
		</div>
	</div><br>
	<br>
	
	<!-- ABRIR EL MODAL -->
	<div class="container">
		<div class="row">
			<div class="col-xs-4 col-sm-3 col-md-4 col-lg-6 col-xs-offset-4 col-sm-offset-4 col-md-offset-5 col-lg-offset-5">
				<button type="button" class="btn btn-info btn-md" data-toggle="modal" data-target="#myModal">VER REGISTROS <span class="glyphicon glyphicon-ok"></span></button>
			</div>
		</div>
	</div>
	<br>

	<!-- Modal -->
		<div id="myModal" class="modal fade " role="dialog">
		  <div class="modal-dialog">

		    <!-- CONTENIDO DEL MODAL-->
		    <div class="modal-content">
		      <div class="modal-header">
		        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
		        <h4 class="modal-title">TABLA DE USUARIOS</h4>
		      </div>

		      <div class="modal-body">
		        <div class="table-responsive">
				<table class="table table-hover table-bordered">
					<tr class="active">
						<td><strong>ID</strong></td>
						<td><strong>USUARIO</strong></td>
						<td><strong>PASSWORD</strong></td>
					</tr>

					<?php 
					include("conexion.php");
					$con = mysql_connect($host,$user,$pw);
				    mysql_select_db($db,$con);
				    $cont=null;
				    
				    $query = "SELECT * FROM datos";
				    $resultado = mysql_query($query);

				    while($fila = mysql_fetch_array($resultado)){
					?>
					<tr>
						<td><?php echo "$fila[id]<br>";?></td>
						<td><?php echo "$fila[usuario]<br>";?></td>
						<td><?php echo "$fila[contrasena]<br>";?></td>

					</tr>
					<?php 
					$cont++;
		          	}

		          ?>
				</table>
				</div>
		      </div>

		      <div class="modal-footer">
		        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
		        <button type="button" class="btn btn-primary">Aceptar</button>
		      </div>

		    </div>

		  </div>
		</div>

	<br>


	<!-- CONTADOR DE REGISTROS -->
	<div class="container">
		<div class="row">
			<div class="col-lg-6 col-lg-offset-5">
				<font size=3><?php echo $cont;?> REGISTROS EN LA TABLA</font>
			</div>
		</div>
	</div>

<script src="js/jquery.js"></script>
<script src="js/bootstrap.min.js"></script>
</body>
</html>
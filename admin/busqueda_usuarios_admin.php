<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>BÚSQUEDA</title>
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<link rel="stylesheet" href="../css/bootstrap/css/bootstrap.min.css">

	<style>
		body{
			padding-top: 30px;
		}
	</style>

	

</head>
<body>

	<!-- ELIMINAR HEADER -->
	<head>
		<div class="navbar navbar-fixed-top navbar-inverse">
			<div class="container" style="color:#fff;" >
				<h2><center>BÚSQUEDA</center></h2>
			</div>
		</div>
	</head>
	<br><br>
	
	<!-- FIN DE HEADER -->

	<div class="container">
		<div class="row">
			<div class="form">
				<div class="form-group">
					<div class="col-lg-4">
						<input class="form-control" onkeyup="if(event.keyCode == 13) buscar();" type="text" id="buscar" name="buscar" placeholder="Buscar por Nombre/Apellido/Usuario">
					</div>
				</div>
				<div class="form-group">
					<div class="col-lg-3">
						<select class="form-control" name="filtro_estado" id="filtro_estado">
							<option value="" selected>Sin filtro</option>
							<option value="1">Activo</option>
							<option value="2">Inactivo</option>
						</select>
					</div>
				</div>
				<div class="form-group">
					<div class="col-lg-3">
						<select class="form-control" name="filtro_rol" id="filtro_rol">
							<option value="" selected>Sin filtro</option>
							<option value="1">Ventas</option>
							<option value="2">Asignación</option>
							<option value="3">Incidencias</option>
							<option value="4">Transportista</option>
							<option value="5">Administrador de usuario</option>
						</select>
					</div>
				</div>
				<div class="form-group">
					<div class="col-lg-2">
						<center><button type="submit" class="btn btn-primary" onclick="buscar()">Buscar</button></center>
					</div>
				</div>
			</div>
		</div>
		<br>

		<div class="row">
			<div class="table-responsive" id="mostrar-registros">
				
			</div>
		</div>

	</div>

<script src="../api/jquery/jquery-1.11.3.min.js"></script>
<script src="../css/bootstrap/js/bootstrap.min.js"></script>
</body>
<script type="text/javascript">
	function buscar(){

			var dato = $('#buscar').val();
			var url = '../admin/buscar_admin.php';
			var estado = $('#filtro_estado').val();
			var rol = $('#filtro_rol').val();

			$.ajax({
				type:'POST',
				url:url,
				data:{"dato":dato,"estado":estado, "rol":rol},
				success: function(datos){
					$('#mostrar-registros').html(datos);
				},
				beforeSend: function(datos){
					$('#mostrar-registros').html("<center><img src=\"../img/cargando.gif\"></center>");
				}
			});
	}
	buscar();
	</script>
</html>
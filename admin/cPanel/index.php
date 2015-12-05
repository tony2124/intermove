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
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="shortcut icon" href="../../img/login.png" type='image/png'>

		<link rel="stylesheet" type="text/css" href="../../css/bootstrap/css/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="../../css/admin/css_admin.css">
	</head>

	<body>
		<div class="pagina">
			<?php 
				include('mod/navBar.php');
			?>
			<div class="contenedor-admin">
				<h2><i class="glyphicon glyphicon-road"></i> &nbsp;Logística de Transportistas</h2>
				<br>
				<div class="row">
					<div class="col-md-3">
						<div class="thumbnail">
							<center><h4><i class="glyphicon glyphicon-usd"></i> &nbsp;Precios de Carga</h4></center>
							<hr>
							<table class="table">
								<thead>
									<tr>
										<th class="centro">Carga</th>
										<th class="derecha">$ P/KM</th>
										<th></th>
									</tr>
								</thead>
								<tbody>
									<?php for ($i = 1; $i <= 5; $i++) { ?>
										<tr>
											<td>Carga <?php echo $i; ?></td>
											<td class="derecha"><?php echo "$ ".number_format($i, 2, '.', ','); ?></td>
											<td class="derecha">
												<i class="glyphicon glyphicon-pencil icono-editar" onclick="metodo2()" data-toggle="tooltip" title="Editar precio"></i>
											</td>
										</tr>
									<?php } ?>
								</tbody>
							</table>

							<br><br>

							<center><h4><i class="glyphicon glyphicon-star"></i> &nbsp;Últimos servicios</h4></center>
							<hr>
							<table class="table">
								<thead>
									<tr>
										<th class="centro">ID</th>
										<th class="centro">Status</th>
										<th></th>
									</tr>
								</thead>
								<tbody>
									<?php for ($i = 1; $i <= 10; $i++) { ?>
										<tr>
											<td class="centro"><?php echo $i; ?></td>
											<td class="centro">Estado</td>
											<td class="derecha">
												<i class="glyphicon glyphicon-eye-open icono-ver" onclick="metodo(<?php echo $i; ?>)" data-toggle="tooltip" title="Ver detalles"></i>
											</td>
										</tr>
									<?php } ?>
								</tbody>
							</table>
						</div>
					</div>

				 	<div class="col-md-9">
						<div class="thumbnail">
							<center><h4><i class="glyphicon glyphicon-tasks"></i> &nbsp;Panel de Control</h4></center>
							<hr>
							<div class="panel panel-info">
								<div class="panel-heading">
									<h3 class="panel-title"><i class="glyphicon glyphicon-road"></i> &nbsp;Transportistas</h3>
								</div>
								<div class="panel-body">
									<div class="row">
										<div class="col-md-4">
											<a href="#" class="thumbnail">
												<center><img class="img-header" src="../../img/transportistas_pendientes.png" alt="Registros pendientes de transportistas"></center>
												<br>
												<p class="centro">Registros Pendientes</p>
											</a>
										</div>

										<div class="col-md-4">
											<a href="#" class="thumbnail">
												<center><img class="img-header" src="../../img/asignacion.png" alt="Asignación de servicios a transportistas"></center>
												<br>
												<p class="centro">Asignación de servicios</p>
											</a>
										</div>

										<div class="col-md-4">
											<a href="#" class="thumbnail">
												<center><img class="img-header" src="../../img/incidencia.png" alt="Incidencias registradas"></center>
												<br>
												<p class="centro">Incidencias</p>
											</a>
										</div>

										<div class="col-md-4">
											<a href="#" class="thumbnail">
												<center><img class="img-header" src="../../img/pagos.png" alt="Órdenes de pago"></center>
												<br>
												<p class="centro">Órdenes de Pago</p>
											</a>
										</div>
									</div>
								</div>
							</div>

							<div class="panel panel-success">
								<div class="panel-heading">
									<h3 class="panel-title"><i class="glyphicon glyphicon-star"></i> &nbsp;Servicios</h3>
								</div>
								<div class="panel-body">
									<div class="row">
										<div class="col-md-4">
											<a href="#" class="thumbnail">
												<center><img class="img-header" src="../../img/notificacion.png" alt="Notificaciones de recolección y entrega"></center>
												<br>
												<p class="centro">Notificaciones</p>
											</a>
										</div>

										<div class="col-md-4">
											<a href="#" class="thumbnail">
												<center><img class="img-header" src="../../img/servicios_pendientes.png" alt="Lista de servicios pendientes"></center>
												<br>
												<p class="centro">Servicios Pendientes</p>
											</a>
										</div>

										<div class="col-md-4">
											<a href="#" class="thumbnail">
												<center><img class="img-header" src="../../img/historial_servicios.png" alt="Historial de servicios"></center>
												<br>
												<p class="centro">Historial</p>
											</a>
										</div>
									</div>
								</div>
							</div>

							<div class="panel panel-warning">
								<div class="panel-heading">
									<h3 class="panel-title"><i class="glyphicon glyphicon-globe"></i> &nbsp;Geolocalización</h3>
								</div>
								<div class="panel-body">
									<div class="row">
										<div class="col-md-4">
											<a href="#" class="thumbnail">
												<center><img class="img-header" src="../../img/geolocalizacion.png" alt="Obtener ubicación de transportista"></center>
												<br>
												<p class="centro">Ubicar Transportista</p>
											</a>
										</div>
									</div>
								</div>
							</div>

							<div class="panel panel-info">
								<div class="panel-heading">
									<h3 class="panel-title"><i class="glyphicon glyphicon-stats"></i> &nbsp;Estadísticas</h3>
								</div>
								<div class="panel-body">
									<div class="row">
										<div class="col-md-4">
											<a href="#" class="thumbnail">
												<center><img class="img-header" src="../../img/estadisticas_pagos.png" alt="Mostrar estadísticas de estados de pago"></center>
												<br>
												<p class="centro">Estado de Pagos</p>
											</a>
										</div>

										<div class="col-md-4">
											<a href="#" class="thumbnail">
												<center><img class="img-header" src="../../img/estadisticas_servicios.png" alt="Mostrar estadísticas de estados de servicios"></center>
												<br>
												<p class="centro">Estado de Servicios</p>
											</a>
										</div>

										<div class="col-md-4">
											<a href="#" class="thumbnail">
												<center><img class="img-header" src="../../img/estadisticas_cargas.png" alt="Mostrar estadísticas de tipos de cargas"></center>
												<br>
												<p class="centro">Tipos de Cargas</p>
											</a>
										</div>

										<div class="col-md-4">
											<a href="#" class="thumbnail">
												<center><img class="img-header" src="../../img/estadisticas_transportistas.png" alt="Mostrar estadísticas de transportistas"></center>
												<br>
												<p class="centro">Transportistas</p>
											</a>
										</div>
									</div>
								</div>
							</div>

							<div class="panel panel-success">
								<div class="panel-heading">
									<h3 class="panel-title"><i class="glyphicon glyphicon-folder-open"></i> &nbsp;Reportes</h3>
								</div>
								<div class="panel-body">
									<div class="row">
										<div class="col-md-4">
											<a href="#" class="thumbnail">
												<center><img class="img-header" src="../../img/reporte_detalles_servicio.png" alt="Detalles de servicio"></center>
												<br>
												<p class="centro">Detalles de Servicio</p>
											</a>
										</div>

										<div class="col-md-4">
											<a href="#" class="thumbnail">
												<center><img class="img-header" src="../../img/reporte_estadisticas.png" alt="Estadística de servicios"></center>
												<br>
												<p class="centro">Estadísticas de Servicios</p>
											</a>
										</div>

										<div class="col-md-4">
											<a href="#" class="thumbnail">
												<center><img class="img-header" src="../../img/reporte_transportistas.png" alt="Lista de transportistas"></center>
												<br>
												<p class="centro">Lista de tranportistas</p>
											</a>
										</div>

										<div class="col-md-4">
											<a href="#" class="thumbnail">
												<center><img class="img-header" src="../../img/reporte_detalles_servicio.png" alt="Lista de servicios"></center>
												<br>
												<p class="centro">Lista de Servicios</p>
											</a>
										</div>

										<div class="col-md-4">
											<a href="#" class="thumbnail">
												<center><img class="img-header" src="../../img/reporte_usuarios.png" alt="Lista de usuarios"></center>
												<br>
												<p class="centro">Lista de Usuarios</p>
											</a>
										</div>

										<div class="col-md-4">
											<a href="#" class="thumbnail">
												<center><img class="img-header" src="../../img/reporte_clientes.png" alt="Lista de clientes"></center>
												<br>
												<p class="centro">Lista de Clientes</p>
											</a>
										</div>

										<div class="col-md-4">
											<a href="#" class="thumbnail">
												<center><img class="img-header" src="../../img/reporte_incidencias.png" alt="Lista de incidencias"></center>
												<br>
												<p class="centro">Lista de Incidencias</p>
											</a>
										</div>

										<div class="col-md-4">
											<a href="#" class="thumbnail">
												<center><img class="img-header" src="../../img/reporte_facturas.png" alt="Lista de facturas"></center>
												<br>
												<p class="centro">Lista de Facturas</p>
											</a>
										</div>
									</div>
								</div>
							</div>

							<div class="panel panel-warning">
								<div class="panel-heading">
									<h3 class="panel-title"><i class="glyphicon glyphicon-user"></i> &nbsp;Usuarios</h3>
								</div>
								<div class="panel-body">
									<div class="row">
										<div class="col-md-4">
											<a href="#" class="thumbnail">
												<center><img class="img-header" src="../../img/usuario.png" alt="Registrar nuevo usuario"></center>
												<br>
												<p class="centro">Registrar Usuario</p>
											</a>
										</div>

										<div class="col-md-4">
											<a href="#" class="thumbnail">
												<center><img class="img-header" src="../../img/lista_usuarios.png" alt="Ver lista de usuarios"></center>
												<br>
												<p class="centro">Lista de Usuarios</p>
											</a>
										</div>
									</div>
								</div>
							</div>

							<div class="panel panel-info">
								<div class="panel-heading">
									<h3 class="panel-title"><i class="glyphicon glyphicon-cog"></i> &nbsp;Configuración</h3>
								</div>
								<div class="panel-body">
									<div class="row">
										<div class="col-md-4">
											<a href="#" class="thumbnail">
												<center><img class="img-header" src="../../img/precio_carga.png" alt="Precio por carga"></center>
												<br>
												<p class="centro">Cambiar Precio por Carga</p>
											</a>
										</div>
									</div>
								</div>
							</div>

						</div>
					</div>
				</div>
			</div>
		</div>
	</body>

	<script type="text/javascript" src="../../api/jquery/jquery-1.11.3.min.js"></script>
	<script type="text/javascript" src="../../css/bootstrap/js/bootstrap.min.js"></script>

	<script type="text/javascript">
		$('.icono-editar').tooltip();
		$('.icono-ver').tooltip();

		function metodo(id){
			alert("Ver servicio " + id);
		}

		function metodo2(){
			alert("Editar precio");
		}
	</script>
</html>
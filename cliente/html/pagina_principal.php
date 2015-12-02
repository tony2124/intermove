<?php  session_start(); require("../../scripts/conexion.php");?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>INTER MOV</title>
	<link rel="stylesheet"  href="../../css/bootstrap/css/bootstrap.min.css">
</head>
<body>
	<?php if($_SESSION['cliente_por_numero_guia']=='iniciado'){  ?>
		<header>
			<nav class="navbar navbar-default navbar-fixed-top">
				<div class="container-fluid">
					<div class="navbar-header">
						<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-1">
							<span class="sr-only"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						</button>
						<a href="pagina_principal.php" class="navbar-brand">Inicio</a>
					</div>


					<div class="collapse navbar-collapse" id="navbar-1">
						<ul class="nav navbar-nav">
							<li><a href="">prueba</a></li>
						</ul>
						<ul class="nav navbar-nav navbar-right">
							<li class="dropdown">
								<a href="" class="dropdown-toggle" data-toggle="dropdown" role="button">
									Cerrar session <span class="caret"></span>
								</a>
								<ul class="dropdown-menu">
									<li><a href="../php/cerrar_session.php">Salir <span class="glyphicon glyphicon-ban-circle"></span></a></li>
								</ul>
							</li>
						</ul>
					</div>
				</div>
			</nav>
		</header>
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
							<td>Placas</td>
							<td>Tipo camion</td>
						</tr>
					<?php echo $array['idtransportista']; ?>
					</table>
				</div>
			</div>


		</div>
	<?php }else{ header("Location: pagina_inicio_numero_guia.php"); }?>
</body>
<script src="../../css/bootstrap/js/jquery.js"></script>
<script src="../../css/bootstrap/js/bootstrap.min.js"></script>
</html>
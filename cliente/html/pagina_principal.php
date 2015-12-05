<?php  session_start(); require("../../scripts/conexion.php");?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>INTER MOV</title>
	<link rel="stylesheet"  href="../../css/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" href="../../css/style.css">
	<script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?v3"></script>
</head>
<body class="body-logeo">
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
						<a href="pagina_principal.php?pagina=principal" class="navbar-brand">Inicio</a>
					</div>


					<div class="collapse navbar-collapse" id="navbar-1">
						<ul class="nav navbar-nav">
							<li class="dropdown">
								<a href="" class="dropdown-toggle" data-toggle="dropdown" role="button">
									Opciones <span class="caret"></span>
								</a>
								<ul class="dropdown-menu">
									<li><a href="pagina_principal.php?pagina=reporte_incidencias">Reporte de incidencias <span class="glyphicon glyphicon-circle-arrow-up"></span></a></li>
									<li><a href="pagina_principal.php?pagina=intencionCompraConfirmacionCompra">
										Intencion compra & confirmacion compra <span class="glyphicon glyphicon-circle-arrow-up"></span>
									</a></li>
									<li><a href="pagina_principal.php?pagina=mostrarCarga">Mostrar carga <span class="glyphicon glyphicon-circle-arrow-up"></span></a></li>
									<li><a href="pagina_principal.php?pagina=direccionIntencionCompra">
										Direccion de intencion compra <span class="glyphicon glyphicon-circle-arrow-up"></span>
									</a></li>
								</ul>
							</li>
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
		<?php
			if($_GET["pagina"]=='principal'){
		 		include("../php/contenido_pagina_principal.php");
		 	}
		 	if($_GET["pagina"]=='reporte_incidencias'){
		 		include("../php/reporte_incidencias.php");
		 	}
		 	if($_GET["pagina"]=='intencionCompraConfirmacionCompra'){
		 		include("../php/MostrarintencionCompraConfirmacionCompra.php");
		 	}
		 	if($_GET["pagina"]=='mostrarCarga'){
		 		include("../php/mostrarCarga.php");
		 	}
		 	if($_GET["pagina"]=='direccionIntencionCompra'){
		 		include("../php/direccionIntencionCompra.php");
		 	}
		 	if($_GET["pagina"]=='mostrar_mapa'){
		 		include("../php/mostrar_mapa.php");
		 	}
		 ?>
	<?php }else{ header("Location: pagina_inicio_numero_guia.php"); }?>
</body>
<script src="../../css/bootstrap/js/jquery.js"></script>
<script src="../../css/bootstrap/js/bootstrap.min.js"></script>
</html>
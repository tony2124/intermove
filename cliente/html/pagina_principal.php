<?php  session_start(); require("../../scripts/conexion.php"); $_SESSION['cliente_iniciado']='se_inicio';?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>INTER MOV</title>
	<link rel="stylesheet"  href="../../css/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="../../css/font-awesome/css/font-awesome.css">
	<link rel="stylesheet" href="../../css/style.css">
	<script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?v3"></script>
</head>
<body class="">
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
						<a href="pagina_principal.php?pagina=principal" class="navbar-brand">Cliente</a>
					</div>


					<div class="collapse navbar-collapse" id="navbar-1">
						<ul class="nav navbar-nav">
							<li class="dropdown">
								<a href="" class="dropdown-toggle" data-toggle="dropdown" role="button">
									Opciones <span class="caret"></span>
								</a>
								<ul class="dropdown-menu">
									<li><a href="pagina_principal.php?pagina=intencionCompra">
										Intencion compra <i class="fa fa-credit-card"></i>
									</a></li>
									<li><a href="pagina_principal.php?pagina=ConfirmacionCompra">
										 confirmacion compra <i class="fa fa-credit-card"></i>
									</a></li>
								</ul>
							</li>
							<li class="dropdown">
								<a href="" class="dropdown-toggle" data-toggle="dropdown" role="button">
									Mostrar Carga <span class="caret"></span>
								</a>
								<ul class="dropdown-menu">
									<li><a href="pagina_principal.php?pagina=mostrarCarga">Mostrar carga <i class="fa fa-truck"></i></a></li>
									<li><a href="pagina_principal.php?pagina=generar_factura">Facturar carga <i class="fa fa-truck"></i></a></li>
								</ul>
							</li>

							<li><a href="pagina_principal.php?pagina=bitacora">
										Bitacora <i class="fa fa-car"></i>
									</a></li>
							<li><a href="pagina_principal.php?pagina=reporte_incidencias">Reporte de incidencias <i class="fa fa-exclamation-triangle"></i></a></li>
							<li><a href="pagina_principal.php?pagina=direccionIntencionCompra">
										Direccion de intencion compra <span class="glyphicon glyphicon-circle-arrow-up"></span>
							</a></li>
						</ul>
						<ul class="nav navbar-nav navbar-right">
							<li class="dropdown">
								<a href="" class="dropdown-toggle" data-toggle="dropdown" role="button">
									Cerrar session <span class="glyphicon glyphicon-off"></span>
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
			if(!empty($_GET["pagina"])){
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
		 	if($_GET["pagina"]=='bitacora'){
		 		include("../php/bitacora.php");
		 	}
		 	if($_GET["pagina"]=='intencionCompra'){
		 		include("../php/intencion_compra.php");
		 	}
		 	if($_GET["pagina"]=='ConfirmacionCompra'){
		 		include("../php/confirmacion_compra.php");
		 	}
		 	if($_GET["pagina"]=='generar_factura'){
		 		header("Location: ../php/generar_factura.php");
		 	}
			}else{
				header("Location: pagina_principal.php?pagina=principal");
			}
		 ?>
	<?php }else{ header("Location: ../"); }?>
</body>
<script src="../../css/bootstrap/js/jquery.js"></script>
<script src="../../css/bootstrap/js/bootstrap.min.js"></script>
</html>
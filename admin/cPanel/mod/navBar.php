<?php 
	@session_start();
?>

<nav class="navbar navbar-inverse navbar-fixed-top">
	<div class="container-fluid">
		<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse-01" aria-expanded="false">
				<span class="sr-only">Toggle navigation</span>
		        <span class="icon-bar"></span>
		        <span class="icon-bar"></span>
		        <span class="icon-bar"></span>
				</button>
				<a href="../" class="navbar-brand">ADMINISTRADOR</a>
		</div>
  	
	  	<div class="collapse navbar-collapse" id="navbar-collapse-01">
	  		<ul class="nav navbar-nav">
				<li class="dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><span class="glyphicon glyphicon-road"></span> &nbsp;Transportistas <span class="caret"></span></a>
					<ul class="dropdown-menu" role="menu">
						<li><a href="#">Registros pendientes</a></li>
						<li><a href="#">Asignación de servicios</a></li>
						<li class="divider"></li>
						<li><a href="#">Incidencias</a></li>
						<li><a href="#">Orden de pago</a></li>
					</ul>
				</li>

				<li class="dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><span class="glyphicon glyphicon-star"></span> &nbsp;Servicios <span class="caret"></span></a>
					<ul class="dropdown-menu" role="menu">
						<li><a href="#">Notificaciones</a></li>
						<li class="divider"></li>
						<li><a href="#">Servicios pendientes</a></li>
						<li><a href="#">Historial</a></li>
					</ul>
				</li>

				<li><a href="#"><span class="glyphicon glyphicon-globe"></span> &nbsp;Geolocalización</a></li>

				<li class="dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><span class="glyphicon glyphicon-stats"></span> &nbsp;Estadísticas <span class="caret"></span></a>
					<ul class="dropdown-menu" role="menu">
						<li><a href="#">Estado de pagos</a></li>
						<li><a href="#">Estado de servicios</a></li>
						<li><a href="#">Tipos de cargas</a></li>
						<li><a href="#">Transportistas</a></li>
					</ul>
				</li>

				<li class="dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><span class="glyphicon glyphicon-folder-open"></span> &nbsp;Reportes <span class="caret"></span></a>
					<ul class="dropdown-menu" role="menu">
						<li><a href="#">Detalles de un servicio</a></li>
						<li><a href="#">Estadísticas de servicios</a></li>
						<li class="divider"></li>
						<li><a href="#">Lista de tranportistas</a></li>
						<li><a href="#">Lista de servicios</a></li>
						<li><a href="#">Lista de usuarios</a></li>
						<li><a href="#">Lista de clientes</a></li>
						<li><a href="#">Lista de incidencias</a></li>
						<li><a href="#">Lista de facturas</a></li>
					</ul>
				</li>

				<li class="dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><span class="glyphicon glyphicon-user"></span> &nbsp;Usuarios <span class="caret"></span></a>
					<ul class="dropdown-menu" role="menu">
						<li><a href="#">Registrar usuario</a></li>
						<li class="divider"></li>
						<li><a href="#">Lista de usuarios</a></li>
					</ul>
				</li>
	    	</ul>

	    	<ul class="nav navbar-nav navbar-right">
		        <li class="dropdown">
		          	<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><span class="fui-user"></span> &nbsp;NOMBRE DE USUARIO <span class="caret"></span></a>
	          		<ul class="dropdown-menu" role="menu">
	          			<li><a href="#"><span class="fui-gear"></span> &nbsp;Establecer precio de cargas</a></li>
	          			<li class="divider"></li>
	            		<li><a href="#"><span class="fui-new"></span> &nbsp;Cambiar contraseña</a></li>
	            		<li><a href="#"><span class="fui-gear"></span> &nbsp;Datos del usuario</a></li>
	            		<li class="divider"></li>
	            		<li><a href="../login/"><span class="fui-power"></span> &nbsp;Cerrar sesión</a></li>
	          		</ul>
		        </li>
		    </ul>
	  	</div>
	</div>
</nav>
<?php  session_start();?>
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
						<a href="#" class="navbar-brand">Maickol Rodriguez</a>
					</div>


					<div class="collapse navbar-collapse" id="navbar-1">
						<ul class="nav navbar-nav">
							<li><a href="">Item #1</a></li>
							<li class="active"><a href="">Item #2</a></li>
							<li class="dropdown">
								<a href="" class="dropdown-toggle" data-toggle="dropdown" role="button">
									Dropdown <span class="caret"></span>
								</a>
								<ul class="dropdown-menu">
									<li><a href="#">Item #1</a></li>
									<li><a href="#">Item #2</a></li>
									<li><a href="#" class="divider"></a></li>
									<li><a href="#">Item #4</a></li>
								</ul>
							</li>
							<li class="dropdown">
								<a href="" class="dropdown-toggle" data-toggle="dropdown" role="button">
									Dropdown 2 <span class="caret"></span>
								</a>
								<ul class="dropdown-menu">
									<li><a href="#">Item #1</a></li>
									<li><a href="#">Item #2</a></li>
									<li><a href="#" class="divider">Item #3</a></li>
									<li><a href="#">Item #4</a></li>
								</ul>
							</li>
						</ul>
						<form action="" class="navbar-form navbar-left" role="search">
							<div class="form-group">
								<input type="text" class="form-control" placeholder="Buscar">
							</div>
						</form>
						<ul class="nav navbar-nav navbar-right">
							<li><a href="">Item #1</a></li>
							<li class="active"><a href="">Item #2</a></li>
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
				<div class="col-lg-5" style="background:gray; height:300px">

				</div>
				<div class="col-lg-offset-2 col-lg-5" style="background:gray; height:300px">

				</div>
			</div>
			<br><div class="row">
				<div class="col-lg-offset-3 col-lg-5" style="background:gray; height:300px;">

				</div>
			</div>

		</div>
	<?php }else{ header("Location: pagina_inicio_numero_guia.php"); }?>
</body>
<script src="../../css/bootstrap/js/jquery.js"></script>
<script src="../../css/bootstrap/js/bootstrap.min.js"></script>
</html>
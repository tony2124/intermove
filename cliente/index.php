<?php
	session_start();
	$_SESSION['cliente_por_numero_guia']='';
	echo "<h3>".@$_SESSION['cliente_iniciado']."</h3>";

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Pagina inicio</title>
	<link rel="stylesheet"  href="../css/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet"  href="../css/style.css">
	<script src='https://www.google.com/recaptcha/api.js'></script>
</head>
<body class="body-logeo">
	<?php if(!@$_SESSION['cliente_iniciado']=='se_inicio'){ ?>
	<div class="container panel-heading panel panel-default panel-accent-gold" style="margin-top:100px; width:600px; background-color:#151515;">
		<div class="cuerpo" class="col-md-6">
			<center><img src="../img/Administrator.png" style="width:200px; height:200px;"></center>
		<form action="php/inicio_session_no_guia.php" class="form-horizontal" method="post">
			<br><div class="form-group">
				<label for="LabelNumeroGuia" class="col-lg-offset-1 col-lg-3 control-label">Numero de guia</label>
				<div class="col-sm-5">
					<input type="number" class="form-control col-lg-8" placeholder="Numero de guia" name="InputNumeroGuia" id="InputNumeroGuia" required="true">
				</div>
			</div>
			<div class="form-group">
				<center><div class="g-recaptcha" data-sitekey="6LdhKBITAAAAAJZxdW_xUYhUOu-Qh9DjnxAk3Jzi"></div></center>
			</div>
			<div class="form-group">
				<div class="col-lg-offset-5 col-lg-1">
					<button class="btn btn-default">enviar <span class="glyphicon glyphicon-ok"></span></button>
				</div>
			</div>
		</form>
	</div>
		</div>
		<?php
			}else{
				$_SESSION['cliente_por_numero_guia']='iniciado';
				header("Location: html/pagina_principal.php?pagina=principal");
			}

		?>
</body>
<script src="../css/bootstrap/js/jquery.js"></script>
<script src="../css/bootstrap/js/bootstrap.min.js"></script>
<script src="../css/bootstrap/js/jquery.numeric.js"></script>
<script type="text/javascript">
	$('#InputNumeroGuia').numeric();
</script>
</html>
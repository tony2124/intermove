<?php
	session_start();
	$_SESSION['cliente_por_numero_guia']='';

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Pagina inicio</title>
	<link rel="stylesheet"  href="../css/bootstrap/css/bootstrap.min.css">
	<script src='https://www.google.com/recaptcha/api.js'></script>
</head>
<body>
	<div class="container">
		<center><img src="../img/Administrator.png" style="width:200px; height:200px;"></center>
		<form action="php/inicio_session_no_guia.php" class="form-horizontal" method="post">
			<br><div class="form-group">
				<label for="LabelNumeroGuia" class="col-lg-2 control-label">Numero de guia</label>
				<div class="col-sm-8">
					<input type="number" class="form-control col-lg-8" placeholder="Numero de guia" name="InputNumeroGuia" id="InputNumeroGuia" required="true">
				</div>
			</div>
			<div class="form-group">
				<center><div class="g-recaptcha" data-sitekey="6LdhKBITAAAAAJZxdW_xUYhUOu-Qh9DjnxAk3Jzi"></div></center>
			</div>
			<div class="form-group">
				<div class="col-lg-offset-5 col-lg-1">
					<button class="btn btn-primary">enviar <span class="glyphicon glyphicon-ok"></span></button>
				</div>
			</div>
		</form>
	</div>
</body>
<script src="../css/bootstrap/css/jquery.js"></script>
<script src="../css/bootstrap/css/bootstrap.min.js"></script>
<script src="../css/bootstrap/js/jquery.numeric.js"></script>
<script type="text/javascript">
	$('#InputNumeroGuia').numeric();
</script>
</html>
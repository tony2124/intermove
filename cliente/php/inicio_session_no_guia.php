<?php
	session_start();
	require("../../scripts/conexion.php");
	if((isset($_POST['g-recaptcha-response'])&&$_POST['g-recaptcha-response'])&&$_POST['InputNumeroGuia']!=''){
		$secret = "6LdhKBITAAAAAGebB5BWrDgyllzfjTMBkkyxWszT";
		$ip = $_SERVER['REMOTE_ADDR'];
		$captcha = $_POST['g-recaptcha-response'];
		$result = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=$secret&response=$captcha&remoteip=$ip");
		$sql = "select * from publicacion_demanda_servicio where num_guia='".$_POST['InputNumeroGuia']."'";
		$sqlquery = mysql_query($sql);
		$contar = mysql_num_rows($sqlquery);
		$array =json_decode($result,TRUE);
		$_SESSION['numero_guia'] = '';
 		if($array['success'] && $contar>0){
 			$_SESSION['numero_guia'] = $_POST['InputNumeroGuia'];
			$_SESSION['cliente_por_numero_guia']='iniciado';
			header("Location: ../html/pagina_principal.php?pagina=principal");
		}else{
			$_SESSION['cliente_por_numero_guia']='no-iniciado';
			header("Location: ../");
		}

	}else{
			header("Location: ../");
	}
?>
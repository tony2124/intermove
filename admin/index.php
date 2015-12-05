<?php 
	@session_start();

	if(isset($_SESSION['id_admin']))
		header('Location: cPanel/');
	else
		header('Location: login/');
?>
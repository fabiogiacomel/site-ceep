<?php
	session_start();
	$_SESSION['logado']= "NÃO";
	$_SESSION['usuario']= "ERROR";
	header("location:../login");


?>
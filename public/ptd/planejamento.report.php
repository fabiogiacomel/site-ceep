<?php
    session_start();
    if(!isset($_SESSION['tipo']) or ($_SESSION['tipo'] < 2)){

        //echo "otipo é" . $_SESSION['tipo'];
        header('location: /home');
    }
  	include("planejamento.class.php");

  	$p = new Planejamento();


?>
	<!DOCTYPE html>
	<html lang="pt-br">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Planejamento</title>
  <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
  <script src="https://code.jquery.com/jquery-1.10.2.js"></script>
  <script src="https://code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
		<link href="css/bootstrap.min.css" rel="stylesheet">
		<!-- <script src="js/jquery.min.js"></script> -->
		<script src="js/bootstrap.min.js"></script>
		<script>
  $(function() {
    $( "#tabs" ).tabs();
  });
  </script>
	<style>
		.page-header{
			margin:20px 0 0 0;
		}
		input[type=checkbox]{
			width: 20px; height: 20px;
		}

		label{
			font-size: 18px;

		}

		#responsive{
			width: 70%;
			height: 310px;
			background-color: white;
			position: absolute;
			left: 50%;
			margin-left: -35%;
			top: 50%;
			margin-top: -150px;
			border-radius: 10px;

		}
	#logo { width: 244px; height: 210px; position: absolute; left: 50%; margin-left:-122px; top:50%; margin-top:-105px;
	box-shadow:#FFF 0 0 70px 30px; border-radius:0px; background-image:url(images/bg_admin.png);
	background-repeat:no-repeat; background-position:center center;}

	body{background-image:url(images/bg_admin.jpg); background-size: 100%;}





	</style>
	</head>
	<body>
		<div id="main" class="container-fluid">
			<h3 class="page-header">Planejamentos a partir de 20/07/2019</h3>
			<br>
		</div>


<!--  -->
<div id="tabs">
  <ul>
    <li><a href="#tabs-1">Entregaram</a></li>
    <li><a href="#tabs-2">Não entregaram</a></li>
  </ul>
<!-- Tabela Meus planos -->


 <div id="tabs-1">
	<table class="table table-striped table-hover ">
	<!-- <table>	 -->
	<tr>

	<?php

	$dados = $p->listarProfessores();



	$linha = null;
	$count = -1;
	echo "<tr><td><h3>Professores que entregaram a partir de 20/07/2019</h3></td></tr>";

	foreach($dados as $linha){
		$count++;
		if($linha['total']==0){continue;} //Não mostra os qie nao entregaram
		// if($count % 3==0){
		 	echo "</tr><tr>";

		// }


		echo "<td><a href='planejamento_professor.php?codigo=" . $linha['idusuario']. "'>";
		$str = strtoupper($linha['nome']);
		echo $str;
		echo " (".$linha['total'].")";
		echo "</a></td>";

	}

	echo "</table></div>";
  echo "<div id='tabs-2'>";
	echo "<table class='table table-striped table-hover'>";
	$dados = $p->listarProfessoresNaoEntregaram();



	$linha = null;
	$count = -1;
	 echo "<tr><td><h3>Professores que não entregaram</h3></td></tr>";
		foreach($dados as $linha){
		if($linha['total']>0){continue;} //Não mostra os que entregaram
		$count++;
		// if($count % 3==0){
		 	echo "</tr><tr>";

		// }


		echo "<td><a href='planejamento_professor.php?codigo=" . $linha['idusuario']. "'>";
		$str = strtoupper($linha['nome']);
		echo $str;
		//echo " (".$linha['total'].")";
		echo "</a></td>";

	}

	?>
	</table>
	<!-- Tabela Meus planos -->
	</body>
</html>

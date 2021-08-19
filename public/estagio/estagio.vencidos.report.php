<?php
	session_start();

	if(!isset($_SESSION['usuario'])){
	  //	header("location:../login");
	}

?>

<html>
	<head>
		<meta charset="utf-8"/>
		<title>Listagem de Estágios vencidos</title>
		<link href="css/bootstrap.min.css" rel="stylesheet">
		<script src="js/jquery.min.js"></script>
		<script src="js/bootstrap.min.js"></script>
		<style>
		
		</style>

		<script>
			function alterar(id){
				//location.href = "convenio.form.php?codigo="+id;
			}
		</script>
	</head>
	<body>
	<?php
		include("menu.php");
		include("estagio.class.php");
		include("../util.php");

		$es = new Estagio();
		?>
		<div id="main" class="container-fluid">
			<br>
			<br>
			<h3 class="page-header">Listagem de estágios vencidos</h3>

			<!-- Fim pesquisa por placa -->
  				<table class="table table-striped table-hover table-condensed">
				<tr>
					<th>CÓDIGO</th>
					<th>NOME ALUNO</th>
					<th>EMPRESA</th>
					<th>DATA INICIO</th>
					<th>DATA FIM</th>
					<th>CARGA HORARIA</th>
				</tr>
	<?php

	//if(isset($_GET['idempresa']) && $_GET['idempresa']>0){
	//	$dados = $c->find($_GET['idempresa']);
	//}else{
		$dados = $es->listarVencidos();  
	//}


	if($dados->rowCount()>0){

		foreach($dados as $linha){
		 echo "<tr style='cursor:pointer' onclick=\"location.href='estagio.form.php?codigo=".$linha['idestagio']."&ano=".$linha['ano']."'\"><td>";
			echo $linha ['idestagio']. "/".$linha ['ano'];
			echo "</td><td>";
			echo $linha ['nome_aluno'];
			echo "</td><td>";
			echo $linha ['nome_empresa'];
			echo "</td><td>";
			echo Util::inverteData($linha ['data_inicio']);
			echo "</td><td>";
			echo Util::inverteData($linha ['data_fim']);		
			echo "</td><td>";
			echo $linha ['carga_horaria'];
			
			echo "</td></tr></a>";
		}
	}
	?>
	</table>
	</body>
	</html>
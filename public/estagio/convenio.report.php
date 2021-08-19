<?php
	session_start();

	if(!isset($_SESSION['usuario'])){
	  //	header("location:../login");
	}

?>

<html>
	<head>
		<meta charset="utf-8"/>
		<title>Listagem de Empresas</title>
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
		include("convenio.class.php");
		include("../util.php");

		$c = new Convenio();
		?>
		<div id="main" class="container-fluid">
			<br>
			<br>
			<h3 class="page-header">Listagem de convênios vencendo (Próximos 30 dias)</h3>

			<!-- Fim pesquisa por placa -->
  		<table class="table table-striped table-hover table-condensed">
				<tr>
					<th>CÓDIGO</th>
					<th>ANO</th>
					<th>EMPRESA</th>
					<th>DIRETOR</th>
					<th>CPF</th>
					<th>VALIDADE</th>
				</tr>
	<?php
	$dados = $c->listar_convenios_vencendo();  

	$linha = null;
	$count =  0;
	foreach($dados as $linha){
		if ($count % 2 == 0){
			echo "<tr class='normal'  onclick='alterar(".$linha ['idconvenio'].")' style='cursor: hand;'>";	
		}else{
			echo "<tr class='diferente' onclick='alterar(".$linha ['idconvenio'].")' style='cursor: hand;'>";	
		}
		$count += 1;

		echo "<td>".$linha['idconvenio'];
		echo "</td><td>";
		echo $linha ['ano'];
		echo "</td><td>";
		echo $linha ['nome_empresa'];
		echo "</td><td>";
		echo $linha ['nome_diretor'];
		echo "</td><td>";
		echo $linha ['cpf_diretor'];
		echo "</td><td>";
		echo Util::inverteData($linha ['data_validade']);
		echo "</td><td>";
	}
	?>
	</table>
	</body>
	</html>
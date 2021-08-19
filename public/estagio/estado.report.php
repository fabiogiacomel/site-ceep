<html>
	<head>
		<meta charset="utf-8"/>
		<title>Listagem de Estados</title>
		<link href="css/bootstrap.min.css" rel="stylesheet">
		<script src="js/jquery.min.js"></script>
		<script src="js/bootstrap.min.js"></script>
	</head>
	<body>
	<?php
		include("estado.class.php");
		$e = new Estado();
		?>
		<div id="main" class="container-fluid">
			<br>
			<br>
			<h3 class="page-header">Listagem de Estados</h3>

  		<table class="table table-striped table-hover table-condensed">
				<tr>
					<th>UF</th>
					<th>DESCRICAO</th>
					<th>EXCLUIR</th>				
				</tr>
	<?php

		$dados = $e->listar();  


	foreach($dados as $linha){
		echo "<tr><td>";
		echo $linha['uf'];
		echo "</td><td>";
		echo $linha ['nome'];
		echo "</td><td>";
		echo "<a href='estado.report.php?codigo='".$linha ['uf']."'>Excluir</a>";
		echo "</td></tr>";
	}
	?>
	</table>
	</body>
	</html>
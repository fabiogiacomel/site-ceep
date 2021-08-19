<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Cadastro de estado</title>
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<script src="js/jquery.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="estilo.css">
</head>
<body>
	<form action="" method="post">	
		<h1>Cadastro de estado</h1><br />

		<label for="uf">UF:</label>
		<input type="text" name="uf" maxlength="2">

		<label for="nome">Nome:</label>
		<input type="text" name="nome" maxlength="50"><br />
    <br />
		<input type="submit" name='gravar' value="Salvar">
		<input type="submit" name='alterar' value="Alterar">
		<input type="submit" name='excluir' value="Excluir">
<?php
  require_once("estado.class.php");

	$e = new Estado();
	
	if($_SERVER['REQUEST_METHOD']=='POST'){
		$e->__set('uf',$_POST['uf']);
		$e->__set('nome',$_POST['nome']);
				

		if(isset($_POST['alterar'])){
			$resposta = $e->alterar();	
		}

		if(isset($_POST['excluir'])){
			$resposta = $e->excluir();
		}

		if(isset($_POST['gravar'])){
			$resposta = $e->gravar();
		}

		
		echo "<h2>". $resposta."</h2>";
	}
?>  
</form>
<br />
<table class="table table-striped table-hover table-condensed">
				<tr>
					<th>UF</th>
					<th>DESCRICAO</th>
				</tr>
	<?php

		$dados = $e->listar();  


	foreach($dados as $linha){
		echo "<tr><td>";
		echo $linha['uf'];
		echo "</td><td>";
		echo $linha ['nome'];
		echo "</td></tr>";
	}
	?>
	</table>
</body>
</html>
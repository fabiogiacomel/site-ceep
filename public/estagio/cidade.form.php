<?php
  include("estado.class.php");
  include("cidade.class.php");

	$e = new Estado();
	$c = new Cidade();

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Cadastro de cidade</title>
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<script src="js/jquery.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="estilo.css">
</head>
<body>
	<form action="" method="post">	
		<h1>Cadastro de cidade</h1>
		<br />

		<label for="idcidade">Código:</label>
		<input type="text" name="idcidade" >
		<br />
		<label for="nome">Nome:</label>
		<input type="text" name="nome" maxlength="50">
		<br />
		<label for="uf">Estado:</label>
		<select name="uf">

		<?php
			$estados = $e->listar();
			foreach($estados as $linha){
				echo "<option value='".$linha['uf']."'>".$linha['nome']."</option>";
			}


		?> 
		</select>
		<br /><br />

		<input type="submit" name='gravar' value="Salvar">
		<input type="submit" name='alterar' value="Alterar">
		<input type="submit" name='excluir' value="Excluir">

<?php
	if($_SERVER['REQUEST_METHOD']=='POST'){
		$c->__set('idcidade',$_POST['idcidade']);
		$c->__set('uf',$_POST['uf']);
		$c->__set('nome',$_POST['nome']);
					
		$resposta = "NULL"	;		
		if(isset($_POST['alterar'])){
			$resposta = $c->alterar();	
		}

		if(isset($_POST['excluir'])){
			 $resposta = $c->excluir();
		}

		if(isset($_POST['gravar'])){
			$resposta = $c->gravar();
		}

		echo "<h2>". $resposta."</h2>";
	}
?>  
</form>

<br />
<table class="table table-striped table-hover table-condensed">
				<tr>
					<th>CÓDIGO</th>
					<th>NOME</th>
					<th>CIDADE</th>
				</tr>
	<?php

	$dados = $c->listar();  

	foreach($dados as $linha){
		echo "<tr><td>";
		echo $linha['idcidade'];
		echo "</td><td>";
		echo $linha ['nome'];
		echo "</td><td>";
		echo $linha ['uf'];
		echo "</td></tr>";
	}
	?>
	</table>
</body>
</html>
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
				location.href = "empresa.form.php?codigo="+id;
			}
		</script>
	</head>
	<body>
	<?php
		include("menu.php");
		include("empresa.class.php");

		$e = new Empresa();
		?>
		<div id="main" class="container-fluid">
			<br>
			<br>
			<h3 class="page-header">Listagem de Empresas</h3>

			<!-- Pesquisa por nome -->
			<form method="get" action="">
				<div class="row">
					<div class="form-group col-md-2">
						<label for="">BUSCA POR NOME</label>
						<input type="text" class="form-control" name="search" value="<?php echo $e->__get('nome');?>" title="Informe o nome para buscar" autofocus>
					</div>
					<div class="form-group col-md-2">
						<label for="">&nbsp;</label>
						<input class="btn btn-primary form-control" type="submit" name="" value="Procurar">
					</div>
				</div>
				<hr>
			</form>
			<!-- Fim pesquisa por placa -->
  		<table class="table table-striped table-hover table-condensed">
				<tr>
					<th>CÓDIGO</th>
					<th>NOME</th>
					<th>CNPJ</th>
					<th>RUA</th>
					<th>BAIRRO</th>
					<th>CIDADE</th>
					<th>ESTADO</th>
					<th>CEP</th>
					<th>TELEFONE</th>
					<th>E-MAIL</th>
				</tr>
	<?php


	// pega a variavel GET que passamos no action do form
	$dados = $e->listar(@$_GET['search']);  

	$linha = null;
	$count =  0;
	foreach($dados as $linha){
		if ($count % 2 == 0){
			echo "<tr class='normal'  onclick='alterar(".$linha ['idempresa'].")' style='cursor: hand;'>";	
		}else{
			echo "<tr class='diferente' onclick='alterar(".$linha ['idempresa'].")' style='cursor: hand;'>";	
		}
		$count += 1;

		echo "<td>".$linha['idempresa'];
		echo "</td><td>";
		echo $linha ['nome'];
		echo "</td><td>";
		echo $linha ['cnpj'];
		echo "</td><td>";
		echo $linha ['rua'];
		echo "</td><td>";
		echo $linha ['bairro'];
		echo "</td><td>";
		echo $linha ['idcidade'];
		echo "</td><td>";
		echo $linha ['estado'];
		echo "</td><td>";
		echo $linha ['cep'];
		echo "</td><td>";
		echo $linha ['telefone'];
		echo "</td><td>";
		echo $linha ['email'];
		echo "</td><td>";
	}
	?>
	</table>
	</body>
	</html>
<?php
	session_start();

	if(!isset($_SESSION['usuario'])){
	  //	header("location:../login");
	}

?>

<html>
	<head>
		<meta charset="utf-8"/>
		<title>Listagem de Aluno por Empresa por Período</title>
		<link href="css/bootstrap.min.css" rel="stylesheet">
		<script src="js/jquery.min.js"></script>
		<script src="js/bootstrap.min.js"></script>
	<link href="css/chosen.css" rel="stylesheet">



		<script src="js/chosen.jquery.js"></script>



<script type="text/javascript">
  $(document).ready(function() {
   $('.chosen-select').chosen({
    //disable_search_threshold: 10,
    no_results_text: "Oops, nada encontrado!",
    width: "100%"
  });
	});

  </script>
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
		include("aluno.class.php");
		include("estagio.class.php");

		$empresa = new Empresa();
		$aluno   = new Aluno();
		$estagio = new Estagio();
		?>
		<div id="main" class="container-fluid">
			<br>
			<br>
			<h3 class="page-header">Listagem de Alunos por Empresa e Período</h3>

			<!-- Pesquisa por nome -->
			<form method="get" action="">
				<div class="row">
					<div class="form-group col-md-3">
						<label for="">NOME DA EMPRESA</label>
						<select class="form-control chosen-select" name="empresa">
							<option value="">Selecione a empresa</option>}
							
							<?php
							$dados = $empresa->listar();
							foreach ($dados as $linha) {
						 		echo "<option value='". $linha['idempresa']. "'>".$linha['nome']."</option>"; 
							}
							?>
							</select>
					</div> 
					<div class="form-group col-md-2">
						<label for="data_inicio">DATA DE INÍCIO:</label>
						<input type="date" class="form-control"  name="data_inicio" value="" >
					</div>
					<div class="form-group col-md-2">
						<label for="data_fim">DATA DE INÍCIO:</label>
						<input type="date" class="form-control"  name="data_fim" value="" >
					</div>

					<div class="form-group col-md-2">
						<label for="">&nbsp;</label>
						<input class="btn btn-primary form-control" type="submit" name="" value="Procurar">
					</div> 
				</div>
				<hr>
			</form>
			<!-- Fim pesquisa por placa -->
  		
	<?php
	function inverteData($data){
    	//if(count(explode("/",$data)) > 1){
      //  return implode("-",array_reverse(explode("/",$data)));
    	//}else
      if(count(explode("-",$data)) > 1){
        return implode("/",array_reverse(explode("-",$data)));
    	}
		}

	// pega a variavel GET que passamos no action do form
	$dados = $estagio->consultarEstagiosAll(@$_GET['empresa']);  

	$linha = null;
	if (count($dados)==0) exit;

	foreach($dados as $linha){
		echo "<h3>".strtoupper($linha ['nome']);
		echo " - CNPJ:";
		echo $linha ['cnpj'];
		// echo " - ";
		// echo strtoupper($linha ['rua']." ".$linha ['bairro']." ".$linha ['idcidade']."-".$linha ['estado']);
		echo " - Telefone:";
		echo $linha ['telefone'];
		echo "</h3>";
		$detalhe = $estagio->consultarEstagiosPorConvenioAll($linha['idconvenio'], @$_GET['data_inicio'],@$_GET['data_fim']);echo  
		'<table class="table table-striped table-hover table-condensed">
				<tr>
					<th>NOME ALUNO</th>
					<th>CURSO</th>
					<th>SETOR</th>
					<th>TELEFONE</th>
					<th>EMAIL</th>
					<th>INÍCIO</th>
					<th>FIM</th>
				</tr>';

		$linha2 = null;
		foreach($detalhe as $linha2){
			echo "<tr><td>".strtoupper($linha2['nome']);
			echo "</td><td>";
			echo strtoupper($linha2 ['curso']);
			echo "</td><td>";
			echo strtoupper($linha2 ['setor']);
			echo "</td><td>";
			echo strtoupper($linha2 ['telefone']);
			echo "</td><td>";
			echo strtoupper($linha2 ['email']);
			echo "</td><td>";
			echo inverteData($linha2 ['data_inicio']);
			echo "</td><td>";
			echo inverteData($linha2 ['data_fim']);
			echo "</td></tr>";
		}
		echo "</table>";
	}
	?>
	
	</body>
	</html>
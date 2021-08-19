<?php

	require_once("empresa.class.php");
	require_once("aluno.class.php");

	$e = new Empresa();
	$a = new Aluno();

?>

<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Gerar termo de compromisso</title>

		<link href="css/chosen.css" rel="stylesheet">
		<link href="css/bootstrap.min.css" rel="stylesheet">


		<script src="js/jquery.min.js"></script>
		<script src="js/bootstrap.min.js"></script>
		<script src="js/jquery.maskedinput.min.js"></script>
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

	</head>
	<div id="main" class="container-fluid">
		<h3 class="page-header">Gerar termo de compromisso</h3>
	
			<form action="termo_compromisso.php" method="post">
				<!-- 1° linha do formulário -->
				<div class="row">
					<div class="form-group col-md-4">
						<label for="idempresa">NÚMERO DO TERMO DE COMPROMISSO:</label>
						<input type="text" class="form-control"  name="numero_termo" value="" required>

					</div>	
					<div class="form-group col-md-5">
						<label for="idempresa">SELECIONE A EMPRESA:</label>
						<select class="form-control chosen-select" name="idempresa">
						<?php
							$dados = $e->listar();
							foreach($dados as $linha){
								echo "<option value='".$linha['idempresa']."'>".$linha['nome']."</option>";
							}


						?> 
						</select>
					</div>

					<div class="form-group col-md-1">
					<label for="">&nbsp;</label>
					<a href="empresa.form.php">
						<input class="btn btn-primary form-control" type="button" name="gravar" value="+"></a>
					</div>
					</div>
					<div class="row">
					<div class="form-group col-md-5">
						<label for="setor">SETOR:</label>
						<input type="text" class="form-control"  name="setor" value="" required>
					</div>
					<div class="form-group col-md-5">
						<label for="supoervisor">SUPERVISOR:</label>
						<input type="text" class="form-control"  name="supervisor" value="" required>
					</div>

					</div>
					<!-- curso? -->

					<div class="row">
						<div class="form-group col-md-5">
						<label for="idempresa">SELECIONE O ALUNO:</label>
						<select class="form-control chosen-select" name="idaluno">
						<?php
							$dados = $a->listar();
							foreach($dados as $linha){
								echo "<option value='".$linha['idaluno']."'>".$linha['nome']."</option>";
							}


						?> 
						</select>
					</div>
					<div class="form-group col-md-1">
					<label for="">&nbsp;</label>
					<a href="aluno.form.php">
						<input class="btn btn-primary form-control" type="button" name="gravar" value="+"></a>
					</div>
					</div>
		
				<div class="row">
					<div class="form-group col-md-5">
						<label for="setor">PROFESSOR SUPERVISOR:</label>
						<input type="text" class="form-control"  name="professor" value="" required>
					</div>
					<div class="form-group col-md-5">
						<label for="supervisor">RG PROFESSOR:</label>
						<input type="text" id="rg" class="form-control"  name="rg_professor" value="" required>
					</div>

					</div>
			
					<div class="row">

					<div class="form-group col-md-5">
					<label for="">SELECIONE O CURSO:</label>
					<select name="curso" class="form-control chosen-select">
						<option value="Administração">Administração</option>
						<option value="Cuidados de Idosos">Cuidados de Idosos</option>
						<option value="Edificação">Edificação</option>
						<option value="Eletromecânica">Eletromecânica</option>
						<option value="Eletrônica">Eletrônica</option>
						<option value="Enfermagem">Enfermagem</option>
						<option value="Especialização em Enfermagem do Trabalho">Especialização em Enfermagem do Trabalho</option>
						<option value="Informática">Informática</option>
						<option value="Meio Ambiente">Meio Ambiente</option>
						<option value="Segurança do Trabalho">Segurança do Trabalho</option>
					</select>
					</div>
					<div class="form-group col-md-4">
						<label for="idempresa">NÚMERO DA APÓLICE DO SEGURO:</label>
						<input type="text" class="form-control"  name="numero_apolice" value="" required>

					</div>	
					
				</div>
				<div class="row">
					<div class="form-group col-md-3">
						<label for="data_inicio">DATA DE INÍCIO:</label>
						<input type="date" class="form-control"  name="data_inicio" value="" required>
					</div>
					<div class="form-group col-md-3">
						<label for="data_FIM">DATA DE INÍCIO:</label>
						<input type="date" class="form-control"  name="data_fim" value="" required>
					</div>
					<div class="form-group col-md-4">
						<label for="carga_horaria">CARGA HORÁRIA:</label>
						<input type="number" class="form-control"  name="carga_horaria" value="" required>
					</div>

					</div>
	
				<!-- 3° linha do formulário -->
	
				<div class="row"><div class="form-group col-md-3">
						<label for="">&nbsp;</label>
						<input class="btn btn-primary form-control" type="submit" name="gravar" value="Gerar termo">
						</div>
					<div id="msg">
						
					</div>
				</div>
			</form>
		</div>
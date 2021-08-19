<?php
  

 if($_SERVER['REQUEST_METHOD']=='POST' && isset($_POST['curso'])){
  	include("planejamento.class.php");

  	$v = new Planejamento();
  	$v->__set('curso',$_POST['curso']);
  	$v->__set('semestre',$_POST['semestre']);
  	$v->__set('periodo',$_POST['periodo']);
  	$v->__set('disciplina',$_POST['disciplina']);
  	$v->__set('professor',$_POST['professor']);
  	$v->__set('ementa',$_POST['ementa']);
  	$v->gravar();
}

 if($_SERVER['REQUEST_METHOD']=='POST' && isset($_POST['conteudo_estruturante'])){
 	include("conteudo.class.php");

  	$c = new Conteudo();

  	$c->__set('conteudo_estruturante',$_POST['conteudo_estruturante']);
  	$c->__set('conteudo_basico',$_POST['conteudo_basico']);
  	$c->__set('objetivo',$_POST['objetivo']);
  	$c->__set('encaminhamento',$_POST['encaminhamento']);
  	$c->gravar();
}
?>
	<!DOCTYPE html>
	<html lang="pt-br">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Planejamento</title>

		<link href="css/bootstrap.min.css" rel="stylesheet">
		<script src="js/jquery.min.js"></script>
		<script src="js/bootstrap.min.js"></script>
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
			height: 350px;
			background-color: white;
			position: absolute;
			left: 50%;
			margin-left: -35%;
			top: 50%;
			margin-top: -150px;
			border-radius: 10px;

		}
		
	</style>
	</head>
	<body> 
		<div id="main" class="container-fluid">
			<h3 class="page-header">Planejamento Integrador</h3>
			<br>
					

				<!-- 2 linha do formulário -->
				<form action="" method="post">
				<div class="row">
					<input type="hidden" class="form-control"  name="idplanejamento">
					<div class="form-group col-md-4">
						

						<label for="data_entrada">CURSO</label>
						<select name="curso" class="form-control"> 
							<option value="estado">Selecione o Curso</option> 
							<option value="Administração">Administração</option> 
							<option value="Edificações">Edificações</option> 
							<option value="EletroMecânica">EletroMecânica</option> 
							<option value="Eletrônica">Eletrônica</option> 
							<option value="Enfermagem">Enfermagem</option> 
							<option value="Especialização em Enfermagem do Trabalho">Especialização em Enfermagem do Trabalho</option> 
							<option value="Informática">Informática</option> 
							<option value="Meio Ambiente">Meio Ambiente</option> 
							<option value="Segurança do Trabalho">Segurança do Trabalho</option> 
						</select>
					</div>
					<div class="form-group col-md-4">
						<label for="data_entrada">SEMESTRE</label><br>
						 <label class="checkbox-inline">
						  <input type="checkbox" id="inlineCheckbox1" name="semestre" value="1"> 1° SEM
						</label>
						<label class="checkbox-inline">
						  <input type="checkbox" id="inlineCheckbox2" name="semestre" value="2"> 2° SEM
						</label>
						<label class="checkbox-inline">
						  <input type="checkbox" id="inlineCheckbox3" name="semestre" value="3"> 3° SEM
						</label>
						<label class="checkbox-inline">
						  <input type="checkbox" id="inlineCheckbox3" name="semestre" value="4"> 4° SEM
						</label>
					</div>
							
						<div class="form-group col-md-4">
						<label for="data_entrada">PERIODO</label><br>
						 <label class="checkbox-inline">
						  <input type="checkbox" id="inlineCheckbox1" name="periodo" value="M"> MATUTINO
						</label>
						<label class="checkbox-inline">
						  <input type="checkbox" id="inlineCheckbox2" name="periodo" value="V"> VESPERTINO
						</label>
						<label class="checkbox-inline">
						  <input type="checkbox" id="inlineCheckbox3" name="periodo" value="N"> NOTURNO
						</label>
						
					</div>
					</div>
					
					
					<div class="row">
					<div class="form-group col-md-4">
						<label for="campo3">DISCIPLINA</label>
						<input type="text" class="form-control" id="campo3"name="disciplina" >
					</div>
					<div class="form-group col-md-4">
						<label for="campo3">PROFESSOR</label>
						<input type="text" class="form-control" id="campo3"name="professor" >
					</div> 
					</div>
					<div class="row">		
					<div class="form-group col-md-12">
						<label for="campo2">EMENTA</label>
						<!-- <input type="text" class="form-control" id="campo2"> -->
						<textarea class="form-control" name="ementa" rows="3"></textarea>
					</div>
					
				</div>

				<!-- 3 linha do formulário -->

				<div class="row">
					<div class="form-group col-md-12">
					<h2>1° BIMESTRE CONTEÚDOS</h2>
						
						
					

				</div>
			</form>
		</div>
						
<div class="form-group col-md-2">
						<label for="">&nbsp;</label>
						<!-- <input class="btn btn-primary form-control" type="submit" name="" value="Incluir conteúdos"> -->
						<button class="demo btn btn-primary btn-lg" data-toggle="modal" href="#responsive">Inserir Demo</button>
					</div>





<!-- Formulario de conteúdos -->
<div id="responsive" class="modal fade" tabindex="-1" data-width="760" style="display: none;">
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
    <h4 class="modal-title">Incluir conteúdo</h4>
  </div>
  <div class="modal-body">
<!-- 2 linha do formulário -->
		<form action="" method="post">
				<div class="row">
					<input type="hidden" class="form-control"  name="idconteudo">
					
					<div class="form-group col-md-6">
						<label for="campo3">CONTEÚDO ESTRUTURANTE </label>
						<textarea class="form-control" name="conteudo_estruturante" rows="2"></textarea>
					</div>
					<div class="form-group col-md-6">
						<label for="campo3">CONTEÚDO BÁISCO</label>
						<textarea class="form-control" name="conteudo_basico" rows="2"></textarea>
					</div> 
					</div>
					<div class="row">
					<div class="form-group col-md-6">
						<label for="campo3">OBJETIVO</label>
						<textarea class="form-control" name="objetivo" rows="2"></textarea>
					</div>
					<div class="form-group col-md-6">
						<label for="campo3">ENCAMINHAMENTO</label>
						<textarea class="form-control" name="encaminhamento" rows="2"></textarea>
					</div> 
					</div>
    </div> 
    <div class="modal-footer">
    	<button type="button" data-dismiss="modal" class="btn btn-default">Fechar</button>
    	<button type="submit" class="btn btn-primary">Salvar</button>
    </form>
  </div>
  </div>
 
</div>
<!-- Formulario de conteúdos -->



	</body>
	</html>
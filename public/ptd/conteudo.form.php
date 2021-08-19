<?php
  include("conteudo.class.php");

  $v = new Conteudo();

 if($_SERVER['REQUEST_METHOD']=='POST'){
  	$v->__set('conteudo_estruturante',$_POST['conteudo_estruturante']);
  	$v->__set('conteudo_basico',$_POST['conteudo_basico']);
  	$v->__set('objetivo',$_POST['objetivo']);
  	$v->__set('encaminhamento',$_POST['encaminhamento']);

  	$v->gravar();
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

		<!-- sometime later, probably inside your on load event callback -->

	<style>
		.page-header{
			margin:20px 0 0 0;
		}
		input[type=checkbox]{
			width: 20px; height: 20px; 
		}

		label{
			font-size: 125%;
		}
		
	</style>
	</head>
	<body> 
		<div id="main" class="container-fluid">
			<h3 class="page-header">Conteúdos</h3>
			<br>
					

				<!-- 2 linha do formulário -->
				<form action="" method="post">
				<div class="row">
					<input type="hidden" class="form-control"  name="idconteudo">
					
					
					
					
					
					<div class="form-group col-md-6">
						<label for="campo3">CONTEÚDO ESTRUTURANTE </label>
						<textarea class="form-control" name="conteudo_estruturante" rows="3"></textarea>
					</div>
					<div class="form-group col-md-6">
						<label for="campo3">CONTEÚDO BÁISCO</label>
						<textarea class="form-control" name="conteudo_basico" rows="3"></textarea>
					</div> 
					</div>
					<div class="row">
					<div class="form-group col-md-6">
						<label for="campo3">OBJETIVO</label>
						<textarea class="form-control" name="objetivo" rows="3"></textarea>
					</div>
					<div class="form-group col-md-6">
						<label for="campo3">ENCAMINHAMENTO</label>
						<textarea class="form-control" name="encaminhamento" rows="3"></textarea>
					</div> 
					</div>
					
					
				</div>

				<!-- 3 linha do formulário -->

				<div class="row">
					<div class="form-group col-md-12">
					
						
						
					<div class="form-group col-md-2">
						<label for="">&nbsp;</label>
						<input class="btn btn-primary form-control" type="submit" name="" value="SALVAR">
					</div>

				</div>


				

			

					

			</form>
		</div>

<!-- mensagem modal para avisos  -->
<div id="myModal" class="modal fade alert alert-success">
  <div class="modal-dialog">
    <div class="modal-content">
      <!-- dialog body -->
      <div class="modal-body">
      <div class="modal-header" id="msg"><strong>Registro incluído com sucesso!</strong>
        <button type="button" class="close" data-dismiss="modal">&times;</button></div>
        <!-- dialog buttons -->
      <div class="modal-footer"><button type="button" data-dismiss="modal" class="btn btn-primary">OK</button></div>
      </div>
      <!-- dialog buttons -->
      <!-- <div class="modal-footer"><button type="button" class="btn btn-primary">OK</button></div> -->
    </div>
  </div>
</div>
<!-- Fim do modal -->


	</body>
	</html>
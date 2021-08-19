<?php
  session_start();
	require_once("../util.php");
	require_once("empresa.class.php");
	require_once("convenio.class.php");

	$e = new Empresa();
	$c = new Convenio();

	$max = $c->getMaxId();


if($_SERVER['REQUEST_METHOD']=='GET' && isset($_GET['codigo'])){
		$c->__set('idconvenio',$_GET['codigo']);
		$c->__set('ano',$_GET['ano']);
		$c->carregar();  
	}

?>

<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Gerar termo de convênio</title>

		<link href="css/bootstrap.min.css" rel="stylesheet">
		<script src="js/jquery.min.js"></script>
		<script src="js/bootstrap.min.js"></script>
		<script src="js/jquery.maskedinput.min.js"></script>
	<script type="text/javascript">
  jQuery(function($){
    $("#cpf").mask("999.999.999-99",{placeholder:" "});
  });

  </script>

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
	</head>
<body>
<?php
	include("menu.php");
?>

	<div id="main" class="container-fluid">
		<br>
		<br>
		<h3 class="page-header">Gerar termo de convênio</h3>
	
			<form name="convenio" action="" method="post">
				<!-- 1° linha do formulário -->
				<div class="row">
				<div class="form-group col-md-4">
						<label for="idempresa">NÚMERO DO TERMO DE CONVÊNIO:</label>
						<input type="text" class="form-control"  name="numero_termo" value="<?php 
							if(isset($_GET['codigo'])){
								echo $c->__get('idconvenio')."/".	$c->__get('ano');
							}else{
								echo ++$max."/".Date("Y"); 
							}

						?>" required>

					</div>	
					<div class="form-group col-md-6">
						<label for="idempresa">SELECIONE A EMPRESA:</label>
						<select class="form-control chosen-select" name="idempresa">
						<?php
							$dados = $e->listar();
							foreach($dados as $linha){

								echo "<option ";
								if(isset($_GET['codigo']) && $c->__get('idempresa')==$linha['idempresa']){
									echo "selected ";
								}	

								echo "value='".$linha['idempresa']."'>".$linha['nome']."</option>";
							}


						?> 
						</select>
					</div>

					


						<div class="form-group col-md-2">
						<label for="">&nbsp;</label>
						<input class="btn btn-primary form-control" formmethod="get" formnovalidate formaction="" type="submit" name="consultar" value="Consultar">
					</div>


					</div>

					<!-- curso? -->

					<div class="row">
						<div class="form-group col-md-4">
						<label for="">DATA VALIDADE</label>
						<input type="date" class="form-control"  name="data_validade" value="<?php

							if(isset($_GET['codigo'])){
								echo $c->__get('data_validade');
							}else{

							$today     = new DateTime();
							$next_year = $today->modify('+5 year');

							print $next_year->format('Y-m-d');

						}
						?>" required>
					</div>
					<div class="form-group col-md-5">
						<label for="">NOME DO DIRETOR(A)</label>
						<input type="text" class="form-control"  name="nome_diretor" value="MÔNICA VIRGINIA MISSAU" required>
					</div>


					
						
						<div class="form-group col-md-3">
						<label for="">CPF DIRETOR</label>
						<input type="text" id="cpf" class="form-control" name="cpf_diretor" value="355.235.659-20" required>
					</div>
					
				</div>
	<div class="row">
				<div class="form-group col-md-3">
						<label for="">&nbsp;</label>
						<a href='convenio.form.php'><input class='btn btn-primary form-control' type='button' value='Novo'></a>
					</div>
					<div class="form-group col-md-3">
						<label for="">&nbsp;</label>
						<input class="btn btn-primary form-control" type="submit" name="gravar" value="Gravar">
						</div>
							<div class="form-group col-md-3">
						<label for="">&nbsp;</label>
						<input class="btn btn-primary form-control" type="submit" name="alterar" value="Alterar">
						</div>
							<div class="form-group col-md-3">
						<label for="">&nbsp;</label>
						<input class="btn btn-primary form-control" formnovalidate="formnovalidate" type="submit" name="excluir" value="Excluir">
					</div>
				</div>

			
			
	
				<!-- 3° linha do formulário -->
	
				<div class="row">
					<div id="msg">
						
					</div>
				</div>
		<?php
		if($_SERVER['REQUEST_METHOD']=='POST'){
			$codigo_ano = explode("/", $_POST['numero_termo']);
			if(count($codigo_ano)==2){
				$c->__set('idconvenio',$codigo_ano[0]);
				$c->__set('ano',$codigo_ano[1]);
			}
			$c->__set('idempresa',$_POST['idempresa']);
			$c->__set('data_validade',$_POST['data_validade']);
			$c->__set('nome_diretor',$_POST['nome_diretor']);
			$c->__set('cpf_diretor',$_POST['cpf_diretor']);

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
	
			
		</div>

		<table class="table table-striped table-hover table-condensed">
				<tr>
					<th>CÓDIGO</th>
					<th>NOME</th>
					<th>DIRETOR</th>
					<th>CPF</th>
					<th>VALIDADE</th>
					<th>IMPRIMIR</th>
				</tr>
	<?php

	if(isset($_GET['idempresa']) && $_GET['idempresa']>0){
		$dados = $c->find($_GET['idempresa']);
	}else{
		$dados = $c->listar();  
	}


	if($dados->rowCount()>0){

		foreach($dados as $linha){
		 echo "<tr style='cursor:pointer' onclick=\"location.href='convenio.form.php?codigo=".$linha['idconvenio']."&ano=".$linha['ano']."'\"><td>";
			echo $linha ['idconvenio']. "/".$linha ['ano'];
			echo "</td><td>";
			echo $linha ['nome_empresa'];
			echo "</td><td>";
			echo $linha ['nome_diretor'];
			echo "</td><td>";
			echo $linha ['cpf_diretor'];
			echo "</td><td>";
			echo Util::inverteData($linha ['data_validade']);		
			echo "</td><td>";
			echo "<a href='convenio.termo.php?codigo=".$linha['idconvenio']."&ano=".$linha['ano']."'><input class='btn btn-primary form-control' type='button' value='Imprimir'></a>";
			echo "</td></tr></a>";
		}
	}
	?>
	</table></form>
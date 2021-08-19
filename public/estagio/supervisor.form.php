<?php
	session_start();

	if(!isset($_SESSION['usuario'])){
		header("location:../login");
	}

	include("supervisor.class.php");

	$a = new Supervisor();
	

	if($_SERVER['REQUEST_METHOD']=='GET' && isset($_GET['codigo'])){
		$a->__set('id',$_GET['codigo']);
		$a->carregar();  
	}
?>
<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Cadastro de Supervisor</title>

		<script src="js/jquery.min.js"></script>
		<script src="js/bootstrap.min.js"></script>
		<script src="js/jquery.maskedinput.min.js"></script>


<script type="text/javascript">
  jQuery(function($){
    $("#cpf").mask("999.999.999-99",{placeholder:" "});
    $("#telefone").mask("(99) 9999-9999",{placeholder:" "});
  });

  </script>

  		<link href="css/chosen.css" rel="stylesheet">
		<link href="css/bootstrap.min.css" rel="stylesheet">



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
		<style>
		/*	b{
				display: block; text-align: center; font-size: 1.5em;
				font-weight: bold; color: green; border-radius: 10px; border: 2px green dotted;
			}
			span{
				display: block; text-align: center;font-size: 1.5em;
				font-weight: bold; color: red; border-radius: 10px; border: 2px red dotted;
			}*/
			tr{
				cursor:pointer;
			}
		</style>
		<!-- script para mostrar mensagem de erro ou sucesso!! -->
		<script>
	    function mostrar_mensagem(msg){
	    	document.getElementById('msg').innerHTML=msg;
	    	setTimeout(ocultar_mensagem, 4000);
	    }
	    function ocultar_mensagem(){
	    	document.getElementById('msg').innerHTML="";
	    }
		</script>
	</head>
<body>
<?php
	include("menu.php");
?>
	<div id="main" class="container-fluid">
					<br>
			<br><h3 class="page-header">Cadastro de Supervisor</h3>
	
			<form action="" method="post">
				<!-- 1° linha do formulário -->
				<div class="row">	
					<div class="form-group col-md-0">
						<!-- <label for="">CÓDIGO</label> -->
						<input type="hidden" class="form-control"  name="id" value="<?php echo $a->__get('id');?>" readonly>
					</div>	
					<div class="form-group col-md-6">
						<label for="">NOME</label>
						<input type="text" class="form-control"  name="nome" value="<?php echo $a->__get('nome');?>" required>
					</div>
				<div class="form-group col-md-4">
						<label for="">RG</label>
						<input type="text" class="form-control" name="rg" value="<?php echo $a->__get('rg');?>">
					</div>
					<!-- <div class="form-group col-md-3 ">
					<label for="">SELECIONE O CURSO:</label>
					<select name="curso" class="form-control chosen-select">
						<option <?php if ($a->__get('curso')=="Administração") echo "selected"; ?> value="Administração"  >Administração</option>
						<option <?php if ($a->__get('curso')=="Cuidados de Idosos") echo "selected"; ?> value="Cuidados de Idosos">Cuidados de Idosos</option>
						<option <?php if ($a->__get('curso')=="Edificação") echo "selected"; ?> value="Edificação">Edificação</option>
						<option <?php if ($a->__get('curso')=="Eletromecânica") echo "selected"; ?> value="Eletromecânica">Eletromecânica</option>
						<option <?php if ($a->__get('curso')=="Eletrônica") echo "selected"; ?> value="Eletrônica">Eletrônica</option>
						<option <?php if ($a->__get('curso')=="Enfermagem") echo "selected"; ?> value="Enfermagem">Enfermagem</option>
						<option <?php if ($a->__get('curso')=="Especialização em Enfermagem do Trabalho") echo "selected"; ?> value="Especialização em Enfermagem do Trabalho">Especialização em Enfermagem do Trabalho</option>
						<option <?php if ($a->__get('curso')=="Informática") echo "selected"; ?> value="Informática">Informática</option>
						<option <?php if ($a->__get('curso')=="Meio Ambiente") echo "selected"; ?> value="Meio Ambiente">Meio Ambiente</option>
						<option <?php if ($a->__get('curso')=="Segurança do Trabalho") echo "selected"; ?> value="Segurança do Trabalho">Segurança do Trabalho</option>

					</select> 
					</div>-->
					<div class="form-group col-md-2">
						<label for="">&nbsp;</label>
						<input class="btn btn-primary form-control" formmethod="get" formnovalidate type="submit" name="consultar" value="Consultar">
					</div>
					</div>
					<div class="row">
					
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
			$a->__set('id',$_POST['id']);
			$a->__set('nome',$_POST['nome']);
			$a->__set('rg',$_POST['rg']);
			//$a->__set('curso',$_POST['curso']);

			$resposta = "NULL"	;		
			if(isset($_POST['alterar'])){
				$resposta = $a->alterar();	
			}

			if(isset($_POST['excluir'])){
				$resposta = $a->excluir();
			}

			if(isset($_POST['gravar'])){
				$resposta = $a->gravar();
			}

			echo "<h2>". $resposta."</h2>";
			
		}
	?>
			</form>
		</div>


<table class="table table-striped table-hover table-condensed">
				<tr>
					<th>NOME</th>
					<th>RG</th>
					<!-- <th>CURSO</th> -->
				</tr>
	<?php

	if(isset($_GET['nome']) && strlen($_GET['nome'])>0){
		$dados = $a->find($_GET['nome']);
	}else{
		$dados = $a->listar();  
	}


	if($dados->rowCount()>0){

		foreach($dados as $linha){
		echo "<tr onclick=\"location.href='supervisor.form.php?codigo=".$linha['id']."'\"><td>";
			// echo $linha['idsupervisor'];
			// echo "</td><td>";
			echo $linha ['nome_upper'];
			echo "</td><td>";
			echo $linha ['rg'];			
			// echo "</td><td>";
			// echo $linha ['curso'];
			echo "</td></tr></a>";
		}
	}
	?>
	</table>


	
	
</html>
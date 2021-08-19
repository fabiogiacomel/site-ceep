<?php
	session_start();

	if(!isset($_SESSION['usuario'])){
	//	header("location:../login");
	}

	include("vaga.class.php");
	include("empresa.class.php");

	$v = new Vaga();
	$e = new Empresa();
	
	if($_SERVER['REQUEST_METHOD']=='GET' && isset($_GET['codigo'])){
		$v->__set('idvaga',$_GET['codigo']);
		$dados = $v->consultar();  


		$linha = null;
		foreach($dados as $linha){
			$v->__set('idvaga',$linha['idvaga']);
			$v->__set('curso',$linha['curso']);
			$v->__set('empresa',$linha['empresa']);
			$v->__set('setor',$linha['setor']);
			$v->__set('bolsa_auxilio',$linha['bolsa_auxilio']);
			$v->__set('tipo_vaga',$linha['tipo_vaga']);
		}   
	}
?>
<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Cadastro de vaga de estágio</title>

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
		<style>
		/*	b{
				display: block; text-align: center; font-size: 1.5em;
				font-weight: bold; color: green; border-radius: 10px; border: 2px green dotted;
			}
			span{
				display: block; text-align: center;font-size: 1.5em;
				font-weight: bold; color: red; border-radius: 10px; border: 2px red dotted;*/
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

		function inverteData($data){
    	if(count(explode("/",$data)) > 1){
        return implode("-",array_reverse(explode("/",$data)));
    	}elseif(count(explode("-",$data)) > 1){
        return implode("/",array_reverse(explode("-",$data)));
    	}
		}

	?>
	<div id="main" class="container-fluid">
			<br>
			<br>
		<h3 class="page-header">Cadastro de vaga de estágio</h3>
	
			<form action="" method="post">
			<!-- <div class="row">		<div class="form-group col-md-2">
					<label for="">&nbsp;</label>
					<a href="admin.php">
						<input class="btn btn-primary form-control" type="button" name="voltar" value="Voltar"></a>
					</div>
					</div> -->
				<!-- 1° linha do formulário -->
				<div class="row">
					<div class="form-group col-md-0">
						<!-- <label for="">CÓDIGO DA VAGA</label> -->
						<input type="hidden" class="form-control"  name="idvaga" value="<?php echo $v->__get('idvaga');?>" readonly>
					</div>
	
					<div class="form-group col-md-4">
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
						<label for="uf">EMPRESA</label>
						<select class="form-control chosen-select" name="empresa">

						<?php
							$empresas = $e->listar();
							foreach($empresas as $linha){
								echo "<option value='".$linha['idempresa']."'>".$linha['nome']."</option>";
							}


						?> 
						</select>
					</div>					
				</div>
	

				<!-- 1° linha do formulário -->
				<div class="row">
					<div class="form-group col-md-3">
						<label for="">SETOR</label>
						<input type="text" class="form-control"  name="setor" value="<?php echo $v->__get('setor');?>" >
					</div>
					<div class="form-group col-md-3">
						<label for="">BOLSA AUXILIO</label>
						<input type="text" class="form-control"  name="bolsa_auxilio" value="<?php echo $v->__get('bolsa_auxilio');?>" >
					</div>
					<div class="form-group col-md-3">
						<label for="">TIPO VAGA</label>
						<select class="form-control chosen-select"  name="tipo_vaga">
							<option value="Estagio" 
							<?php if($v->__get('tipo_vaga')=="Estagio" ) echo " selected";?>
							>Estagio</option>
							<option value="Efetivo"
							<?php if($v->__get('tipo_vaga')=="Efetivo" ) echo " selected";?>
							>Efetivo</option>
						</select>
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
			$v->__set('idvaga',$_POST['idvaga']);
			$v->__set('empresa',$_POST['empresa']);
			$v->__set('curso',$_POST['curso']);
			$v->__set('setor',$_POST['setor']);
			$v->__set('tipo_vaga',$_POST['tipo_vaga']);
			$v->__set('bolsa_auxilio',$_POST['bolsa_auxilio']);
		
			$resposta = "NULL"	;		
			if(isset($_POST['alterar'])){
				$resposta = $v->alterar();	
			}

			if(isset($_POST['excluir'])){
				$resposta = $v->excluir();
			}

			if(isset($_POST['gravar'])){
				$resposta = $v->gravar();
			}

			echo "<h2>". $resposta."</h2>";
			
		}
	?>
			</form>
		</div>


<table class="table table-striped table-hover table-condensed">
				<tr>
					<!-- <th>CÓDIGO</th> -->
					<th>DATA</th>
					<th>CURSO</th>
					<th>EMPRESA</th>
					<th>SETOR</th>
					<th>BOLSA AUXÍLIO</th>
					<th>TIPO DE VAGA</th>
				</tr>
	<?php

	$dados = $v->listar();  

	if($dados->rowCount()>0){

		foreach($dados as $linha){
			echo "<tr onclick=\"location.href='vagas.form.php?codigo=".$linha['idvaga']."'\"><td>";
			echo inverteData($linha['data']);
			echo "</td><td>";
			echo $linha ['curso'];
			echo "</td><td>";
			echo $linha ['empresa'];
			echo "</td><td>";
			echo $linha ['setor'];			
			echo "</td><td>";
			echo $linha ['bolsa_auxilio'];	
			echo "</td><td>";
			echo $linha ['tipo_vaga'];				
			echo "</td></tr>";
		}
	}
	?>
	</table>
</html>
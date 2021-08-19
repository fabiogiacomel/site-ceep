<?php
session_start();

if(!isset($_SESSION['usuario'])){
	//	header("location:../login");
}

include("empresa.class.php");
include("estado.class.php");
include("cidade.class.php");

$estado = new Estado();
$c = new Cidade();
$e = new Empresa();

if($_SERVER['REQUEST_METHOD']=='GET' && isset($_GET['codigo'])){
	$e->__set('idempresa',$_GET['codigo']);
	$e->carregar();  
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Cadastro de empresa</title>

	<link href="css/bootstrap.min.css" rel="stylesheet">
	<script src="js/jquery.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/jquery.maskedinput.min.js"></script>
	<link href="css/chosen.css" rel="stylesheet">



	<script src="js/chosen.jquery.js"></script>



	<script>
		
		// $( "#cnpj_registro" ).change(function() {
  // 			var e = document.getElementById("cnpj_registro");
		// 	var itemSelecionado = e.options[e.selectedIndex].value;
		// 	alert('oi'+itemSelecionado);
		// 	if (itemSelecionado==1){
		// 		$("#cnpj").mask("(99) 9999-9999",{placeholder:" "});
		// 	}else{
		// 		$("#cnpj").mask("99.999.999/9999-99",{placeholder:" "});
		// 	}
		// });

		$(document).ready(function() {
			$('.chosen-select').chosen({
    //disable_search_threshold: 10,
    no_results_text: "Oops, nada encontrado!",
    width: "100%"
});
		});

	</script>

	<script type="text/javascript">
		jQuery(function($){
			$('#cnpj_registro').on('change', function() {
  				if (this.value==1){
				$("#cnpj").unmask();
			}else{
				$("#cnpj").mask("99.999.999/9999-99",{placeholder:" "});
			}
			});
			$("#cpf").mask("999.999.999-99",{placeholder:" "});
			$("#cep").mask("99.999-999",{placeholder:" "});
			$("#cnpj").mask("99.999.999/9999-99",{placeholder:" "});
			$("#telefone").mask("(99) 9999-9999",{placeholder:" "});
		});

	</script>
	<style>
			/*b{
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
			input[type="radio"]{display: inline-block;width: 25%; background-color: red;}
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
	<?php
	include("menu.php");
	?>
	<div id="main" class="container-fluid">
		<br>
		<br>
		<h3 class="page-header">Cadastro de empresa</h3>

		<form action="" method="post">

			<!-- 1° linha do formulário -->
			<div class="row">
				<div class="form-group col-md-0">
					<!-- <label for="">CÓDIGO DA EMPRESA</label> -->
					<input type="hidden" class="form-control"  name="idempresa" value="<?php echo $e->__get('idempresa');?>" readonly>
				</div>
				<div class="form-group col-md-3">
					<label for="uf">Tipo de documento:</label>
					<select id="cnpj_registro" class="form-control chosen-select" name="cnpj_registro">
						<option value='0' selected>CNPJ</option>;
						<option value='1' >Registro de classe</option>;
					</select>
				</div>
				<div class="form-group col-md-3">
					<label for="">CNPJ</label>
					<input type="text" id="cnpj" class="form-control" name="cnpj" value="<?php echo $e->__get('cnpj');?>">
				</div> 
				<div class="form-group col-md-6">
					<label for="">NOME</label>
					<input type="text" class="form-control"  name="nome" value="<?php echo $e->__get('nome');?>" required>
				</div>

				<div class="form-group col-md-3">
					<label for="">&nbsp;</label>
					<input class="btn btn-primary form-control" formmethod="get" formnovalidate type="submit" name="consultar" value="Consultar">
				</div>


			</div>

			<!-- 2° linha do formulário -->

			<div class="row">

				<div class="form-group col-md-3">
					<label for="uf">ESTADO</label>
					<select class="form-control chosen-select" name="estado">

						<?php
						$estados = $estado->listar();
						foreach($estados as $linha){
							echo "<option value='".$linha['uf']."'";
							if ($linha['uf'] == 'PR') echo " selected";
							echo ">".$linha['nome']."</option>";
						}


						?> 
					</select>
				</div>

				<div class="form-group col-md-3">
					<label for="">CIDADE</label>
					<input type="text" class="form-control" name="idcidade" value="<?php echo $e->__get('idcidade');?>">
				</div>
				<div class="form-group col-md-4">
					<label for="">RUA</label>
					<input type="text" class="form-control" name="rua" value="<?php echo $e->__get('rua');?>">
				</div>
				<div class="form-group col-md-2">
					<label for="">NÚMERO</label>
					<input type="text" class="form-control" name="numero" value="<?php echo $e->__get('numero');?>">
				</div>

			</div>

			<!-- 3° linha do formulário -->

			<div class="row">
				<div class="form-group col-md-4">
					<label for="">BAIRRO</label>
					<input type="text" class="form-control" name="bairro" value="<?php echo $e->__get('bairro');?>">
				</div> 

				<div class="form-group col-md-4">
					<label for="">CEP</label>
					<input type="text" id="cep" class="form-control" name="cep" value="<?php echo $e->__get('cep');?>">
				</div>
				<div class="form-group col-md-4">
					<label for="">TELEFONE</label>
					<input type="text" id="telefone" class="form-control" name="telefone" value="<?php echo $e->__get('telefone');?>" required>
				</div> 




			</div>

			<!-- 4° linha do formulário -->
			<div class="row">

				<div class="form-group col-md-4">
					<label for="">E-MAIL</label>
					<input type="text" class="form-control" name="email" value="<?php echo $e->__get('email');?>">
				</div> 	


				<div class="form-group col-md-4">
					<label for="">NOME REPRESENTANTE</label>
					<input type="text" class="form-control" name="representante_nome" value="<?php echo $e->__get('representante_nome');?>" required>
				</div> 

				<div class="form-group col-md-4">
					<label for="">CPF REPRESENTANTE</label>
					<input type="text" id="cpf" class="form-control" name="representante_cpf" value="<?php echo $e->__get('representante_cpf');?>">
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
					<!-- <div id="msg">
						
				</div> -->
			</div>

			<?php
			if($_SERVER['REQUEST_METHOD']=='POST'){
				$e->__set('idempresa',$_POST['idempresa']);
				$e->__set('nome',$_POST['nome']);
				$e->__set('rua',$_POST['rua']);
				$e->__set('numero',$_POST['numero']);
				$e->__set('bairro',$_POST['bairro']);
				$e->__set('idcidade',$_POST['idcidade']);
				$e->__set('cep',$_POST['cep']);
				$e->__set('telefone',$_POST['telefone']);
				$e->__set('email',$_POST['email']);
				$e->__set('cnpj',$_POST['cnpj']);
				$e->__set('estado',$_POST['estado']);
				$e->__set('representante_nome',$_POST['representante_nome']);
				$e->__set('representante_cpf',$_POST['representante_cpf']);




				$resposta = "NULL"	;		
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
	</div>


	<table class="table table-striped table-hover table-condensed">
		<tr>
			<!-- <th>CÓDIGO</th> -->
			<th>NOME</th>
			<th>CIDADE</th>
			<th>RUA</th>
			<th>N°</th>
			<th>BAIRRO</th>
			<th>CEP</th>
			<th>TELEFONE</th>
			<th>E-MAIL</th>
			<th>CNPJ</th>
		</tr>
		<?php


		if(isset($_GET['nome']) && strlen($_GET['nome'])>0){
			$dados = $e->find($_GET['nome']);
		}elseif (isset($_GET['cnpj']) && strlen($_GET['cnpj'])>0){
			$dados = $e->findByCnpj($_GET['cnpj']);
		}else{
			$dados = $e->listar();  
		}

		if($dados->rowCount()>0){

			foreach($dados as $linha){
				echo "<tr onclick=\"location.href='empresa.form.php?codigo=".$linha['idempresa']."'\"><td>";
			// echo $linha['idempresa'];
			// echo "</td><td>";
				echo $linha ['nome_upper'];
				echo "</td><td>";
				echo $linha ['idcidade'];
				echo "</td><td>";
				echo $linha ['rua'];			
				echo "</td><td>";
				echo $linha ['numero'];			
				echo "</td><td>";
				echo $linha ['bairro'];			
				echo "</td><td>";
				echo $linha ['cep'];			
				echo "</td><td>";
				echo $linha ['telefone'];			
				echo "</td><td>";
				echo $linha ['email'];			
				echo "</td><td>";
				echo $linha ['cnpj'];			

				echo "</td></tr>";
			}
		}
		?>
	</table>


	
	
	</html>
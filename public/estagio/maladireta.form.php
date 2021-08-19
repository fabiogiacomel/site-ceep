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

	$dados = $e->listar();

?>
<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Mala direta</title>

		<link href="css/bootstrap.min.css" rel="stylesheet">
		<script src="js/jquery.min.js"></script>
		<script src="js/bootstrap.min.js"></script>
		<script src="js/jquery.maskedinput.min.js"></script>
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

<script type="text/javascript">
  jQuery(function($){
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
			<br><h3 class="page-header">Mala direta</h3>
	
			<form action="maladireta.php" method="post">
		
				<!-- 1° linha do formulário -->
				<div class="row">
					<div class="form-group col-md-0">
						<!-- <label for="">CÓDIGO DA EMPRESA</label> -->
						<input type="hidden" class="form-control"  name="idempresa" value="<?php echo $e->__get('idempresa');?>" readonly>
					</div>
	
					<div class="form-group col-md-6">
						<label for="">Título</label>
						<input type="text" class="form-control"  name="titulo" value="" required>
					</div>
					
					
				</div>
	
				<!-- 2° linha do formulário -->
			<div class="row">
					<div class="form-group col-md-6" >
						<label for="">Selecione as empresas:</label>
						<select name='empresas[]' class="form-control" multiple  style="height:300px">
						<?php
							foreach ($dados as $linha) {
								echo "<option  value='".$linha["idempresa"]."'>";
								echo $linha["nome"]."</option>";
							}
						?>
						</select>
					</div>
											
					<div class="form-group col-md-6">
						<p><b>Mensagem: </b>Palavras chave: @empresa @endereco_empresa @telefone_empresa</p>
						<textarea class="form-control" name="mensagem" style="height:300px"></textarea>
					</div>
				</div>
				
				<!-- 3° linha do formulário -->
	

					<div class="row">
					<div class="form-group col-md-3">
						<label for="">&nbsp;</label>
						<input class="btn btn-primary form-control" type="submit" name="gravar" value="Gerar mala direta">
						</div>
				</div>
	
				<!-- 3° linha do formulário -->
	
				<div class="row">
					<!-- <div id="msg">
						
					</div> -->
				</div>
			</form>
		</div>


	
	</table>


	
	
</html>
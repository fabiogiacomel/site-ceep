<?php

ini_set('display_errors', 1);
ini_set('display_startup_erros', 1);
error_reporting(E_ALL); 

session_start();

if(!isset($_SESSION['logado'])||($_SESSION['logado']!="SIM")){
	header("location:../login");
}
ini_set('display_errors', 1);
ini_set('display_startup_erros', 1);
error_reporting(E_ALL);

//print_r($_SESSION);
include("planejamento.class.php");
include("livroRegistro.class.php");
include("cursoClass.php");

$p = new Planejamento();
$l = new livroRegistro();
$c = Curso::getInstance();
$pagina = "?pagina=ptd/planejamento.form.php";

if ($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['codigo'])) {
	$p->__set('idplanejamento', $_GET['codigo']);
	$p->excluir();
} else {
	//echo "não vai excluir";
}

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['observacao'])) {

	$hash = md5(implode($_POST));

	if (isset($_SESSION['hash']) && $_SESSION['hash'] == $hash) {

		// Refresh! Não faz nada ou re-exibe o formulário preenchido

		echo "Duplicando registros 1...";
	} else {
		$_SESSION['hash']  = md5(implode($_POST));
		$p->__set('idplanejamento', $_POST['idplanejamento']);
		$p->__set('observacao', $_POST['observacao']);
		$p->__set('situacao', '3');
		$p->__set('arquivo', $_FILES['arquivo']);


		if ($p->gravar_retorno()) {
			//	echo "Registro incluído";
		} else {
			//	echo "Erro ao incluír";

		}
	}
} else {
	if (($_SERVER['REQUEST_METHOD'] == 'POST') && isset($_POST['idcurso'])) {
		$hash = md5(implode($_POST));

		if (isset($_SESSION['hash']) && $_SESSION['hash'] == $hash) {

			// Refresh! Não faz nada ou re-exibe o formulário preenchido
			echo "Duplicando registros 2...";
		} else {
			$_SESSION['hash']  = md5(implode($_POST));;

			$p->__set('curso', $_POST['idcurso']);
			$p->__set('serie', $_POST['serie']);
			$p->__set('turma', @$_POST['turma']);
			$p->__set('disciplina', $_POST['disciplina']);
			$p->__set('arquivo', $_FILES['arquivo']);
			$p->__set('idusuario', $_SESSION['idusuario']);


			if ($p->gravar()) {
				//echo "Registro incluído";
			} else {
				//echo "Erro ao incluír";

			}
		}
	}
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
		.page-header {
			margin: 20px 0 0 0;
		}

		input[type=checkbox] {
			width: 20px;
			height: 20px;
		}

		label {
			font-size: 18px;

		}

		table {
			margin-left: 20px;
		}

		#responsive,
		.responsive {
			background-color: white;
			width: 70%;

			position: absolute;
			left: 50%;
			top: 50%;
			transform: translate(-50%, -50%);
			border-radius: 10px;

		}


		#logo {
			width: 244px;
			height: 210px;
			position: absolute;
			left: 50%;
			margin-left: -122px;
			top: 50%;
			margin-top: -105px;
			box-shadow: #FFF 0 0 70px 30px;
			border-radius: 0px;
			background-image: url(images/bg_admin.png);
			background-repeat: no-repeat;
			background-position: center center;
		}

		body {
			background-image: url(../img/bg.png); 
			background-color: #ccc;
			background-size: 100%;
		}

		.obs {
			color: #515151;
			background-color: #D3D3D3;
		}

		.bg-white {
			background-color: #F7F7F7;
		}
	</style>
</head>

<body>
	<!-- Formulario de conteúdos -->
	<div class="container bg-white">
		<div class="row">
			<div class="col-md-12">	

		<br />
		<br />
		<h2 class="modal-title">Incluir planejamento</h2>
		<hr />
		<div class="modal-body">
			<!-- 2 linha do formulário -->
			<!-- 2 linha do formulário -->
			<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data">
				<div class="row">
					<input type="hidden" class="form-control" name="idplanejamento">
					<div class="form-group col-md-5">
						<label for="">CURSO</label>
						<?php
							$c->getSelectCursos(0);
						?>
					</div>
					<div class="form-group col-md-5">
						<label for="data_entrada">SÉRIE</label><br>
						<select name="serie" class="form-control" required>
							<option value="">Selecione a série</option>
							<option value="1">1° ANO</option>
							<option value="2">2° ANO</option>
							<option value="3">3° ANO</option>
							<option value="4">4° ANO</option>
							<option value="5">1° SEMESTRE</option>
							<option value="6">2° SEMESTRE</option>
							<option value="7">3° SEMESTRE</option>
							<option value="8">4° SEMESTRE</option>
						</select>
					</div>

					<div class="form-group col-md-2">
						<label for="data_entrada">TURMA</label><br>
						<label class="checkbox-inline">
							<input type="checkbox" id="inlineCheckbox1" name="turma" value="A"> A
						</label>
						<label class="checkbox-inline">
							<input type="checkbox" id="inlineCheckbox2" name="turma" value="B"> B
						</label>
						<label class="checkbox-inline">
							<input type="checkbox" id="inlineCheckbox3" name="turma" value="C"> C
						</label>

					</div>
				</div>
				<div class="row">
					<div class="form-group col-md-6">
						<label for="campo3">DISCIPLINA</label>
						<input type="text" class="form-control" id="campo3" name="disciplina" required="true">
					</div>
					<div class="form-group col-md-6">
						<label for="campo3">ANEXAR ARQUIVO DO PTD</label>
						<input type="file" class="form-control" id="campo3" name="arquivo" required="true">
					</div>
				</div>

				<!-- 3 linha do formulário -->

				<div class="modal-footer">
					
					<button type="submit" class="btn btn-primary">Enviar</button>
				</div>
			</form>

		</div>
	<!-- Formulario de conteúdos -->

	<div id="main2" class="container-fluid bg-white">
		<h2 class="modal-title">Meus Planejamentos</h2>
		<br>
		<table class="table table-condensed">
			<tr>
				<th>Data</th>
				<th>Curso</th>
				<th>Turma</th>
				<th>Disciplina</th>
				<th>Nome do arquivo</th>
				<th>Situação</th>
				<th>Excluir</th>

			</tr>
			<?php
			$p->__set('idusuario', $_SESSION['idusuario']);
			// pega a variavel GET que passamos no action do form
			$dados = $p->listar();

			//$acao = "PROCURANDO VEÍCULO PELA TG";
			$linha = null;
			$count =  0;
			foreach ($dados as $linha) {
				echo "<tr>";
				echo "<td>" . date('d/m/Y', strtotime($linha['DATA'])) . "</td>";

				$c->set('id', $linha['curso']);
				$c->carregar();


				echo "<td>";
				echo $c->get('nome');

				echo "</td><td>";


				switch ($linha['serie']) {
					case '1':
						echo "1° SÉRIE";
						break;
					case '2':
						echo "2° SÉRIE";
						break;
					case '3':
						echo "3° SÉRIE";
						break;
					case '4':
						echo "4° SÉRIE";
						break;
					case '5':
						echo "1° SEMESTRE";
						break;
					case '6':
						echo "2° SEMESTRE";
						break;
					case '7':
						echo "3° SEMESTRE";
						break;
					case '8':
						echo "4° SEMESTRE";
						break;
					default:
						echo "SÉRIE NÃO INFORMADA";
						break;
				}

				echo " - " . $linha['turma'];
				echo "</td><td>";
				// echo $v->inverteData($linha ['data_entrada']);

				// echo "</td><td>";
				echo $linha['disciplina'];
				echo "</td><td>";
				// echo $v->inverteData($linha ['data_entrada']);

				// echo "</td><td>";
				echo "<a href='" . $linha['arquivo'] . "' target='_blank'>" . $linha['arquivo'];
				echo "</td><td>";


				switch ($linha['situacao_retorno']) {
					case '0':
						echo "<img src='../img/aguardando.png' title='Aguardando' width='100' />";
						break;
					case '1':
						echo "<img src='../img/aprovado.png'  title='Aprovado' width='100' />";
						break;
					case '2':
						echo "<img src='../img/correcoes.png' title='Necessita correções' width='100' />";
						break;
					case '3':
						echo "<img src='../img/reenviado.png' title='Necessita correções' width='100' />";
						break;
					default:
						echo "<img src='../img/aguardando.png' title='Aguardando' width='100' />";
						break;
				}



				if ($linha['idplanejamento_retorno'] == NULL) {

					echo "</td><td>";
					echo "<a href='?pagina=ptd/planejamento.form.php&codigo=" . $linha['idplanejamento'] . "'><img src='../img/excluir.png' title='Excluir' width='25' /></a>";
					echo "</td></tr>";
				}


				if ($linha['situacao'] == 2) {

					$dados2 = $p->listar_observacoes($linha['idplanejamento']);
					foreach ($dados2 as $linha2) {
						echo "<tr class='obs'><td colspan='4'>Observação: " . $linha2['observacao'] . "</td>";
						if (strlen(trim($linha2['arquivo'])) > 0) {
							echo "<td><a href='" . $linha2['arquivo'] . "' target='_blank'>Ver anexo</a></td>";
						} else {
							echo "<td>Nenhum anexo</td>";
						}


						switch ($linha2['situacao']) {
							case '0':
								echo "<td><img src='images/base/aguardando.png' title='Aguardando' width='100' /></td></tr>";
								break;
							case '1':
								echo "<td><img src='images/base/aprovado.png' title='Aguardando' width='100' /></td></tr>";
								break;
							case '2':
								echo '<td><button class="demo btn btn-primary" data-toggle="modal" href="#responsive' . $linha['idplanejamento'] . '">Enviar correção</button></td></tr>';
								break;
							case '3':
								echo "<td><img src='images/base/reenviado.png' title='Aguardando' width='100' /></td></tr>";
								break;
							default:
								echo "<td><img src='images/base/aguardando.png' title='Aguardando' width='100' /></td></tr>";
								break;
						}

						echo "<div ";
						echo "id='responsive" . $linha2['idplanejamento'] . "'";
						echo 'class="modal fade responsive" tabindex="-1" data-width="760" style="display: none;">
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
    <h4 class="modal-title">Enviar correção</h4>
  </div>
  <div class="modal-body">
<!-- 2 linha do formulário -->
		<!-- 2 linha do formulário -->
				<form action="';
						$SELF_PHP;
						echo $pagina;
						echo '" method="post" enctype="multipart/form-data">
				<div class="row">
					
					<div class="form-group col-md-12">
						
						<input type="hidden" name="idplanejamento" value=';
						echo $linha2['idplanejamento'];
						echo '>
						<label for="">OBSERVAÇÃO / COMENTÁRIO</label>
						<textarea class="form-control" id="campo3" name="observacao"  required="true"></textarea>
						
					</div>

					
					<div class="form-group col-md-6">
						<label for="campo3">ANEXAR ARQUIVO CORRIGIDO</label>
						<input type="file" class="form-control" id="campo3" name="arquivo" >
					</div>
					
				</div> 

				<!-- 3 linha do formulário -->

				 <div class="modal-footer">
    	<button type="button" data-dismiss="modal" class="btn btn-default">Fechar</button>
    	<button type="submit" class="btn btn-primary">Enviar</button>
  </div>
    </form>
			
  </div>
  </div>
 
</div>';
					}
				}
			}
			?>
		</table>
	</div>

		</div>
	</div>
</body>

</html>
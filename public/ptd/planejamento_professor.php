<?php
ini_set('display_errors', 1);
ini_set('display_startup_erros', 1);
error_reporting(E_ALL);

session_start();
include "planejamento.class.php";
include "cursoClass.php";

$p = new Planejamento();
$c = Curso::getInstance();
$pagina = "planejamento_professor.php?codigo=" . $_GET['codigo'];

// 	if($_SERVER['REQUEST_METHOD']=='GET' && isset($_GET['codigo'])){
//   		$p->__set('idplanejamento',$_GET['codigo']);
//   		$p->excluir();
//  	 }else{
//  	 	//echo "não vai excluir";
//  	 }

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $hash = md5(implode($_POST));

    if (isset($_SESSION['hash']) && $_SESSION['hash'] == $hash) {
        // Refresh! Não faz nada ou re-exibe o formulário preenchido

        echo "Duplicando registros 1...";
    } else {
        $_SESSION['hash'] = md5(implode($_POST));
        $p->__set('idplanejamento', $_POST['idplanejamento']);
        $p->__set('observacao', $_POST['observacao']);
        $p->__set('situacao', $_POST['situacao_retorno']);
        $p->__set('arquivo', $_FILES['arquivo']);

        if ($p->gravar_retorno()) {
            echo "Registro incluído";
        } else {
            echo "Erro ao incluír";
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
		.page-header{
			margin:20px 0 0 0;
		}
		input[type=checkbox]{
			width: 20px; height: 20px; 
		}

		label{
			font-size: 18px;
		}

		.responsive{
			width: 70%;
			height: 330px;
			background-color: white;
			position: absolute;
			left: 50%;
			margin-left: -35%;
			top: 50%;
			margin-top: -150px;
			border-radius: 10px;

		}
	#logo { width: 244px; height: 210px; position: absolute; left: 50%; margin-left:-122px; top:50%; margin-top:-105px; 
	box-shadow:#FFF 0 0 70px 30px; border-radius:0px; background-image:url(images/bg_admin.png);
	background-repeat:no-repeat; background-position:center center;}
	
	body{background-image:url(images/bg_admin.jpg); background-size: 100%;}

	.obs{
		background-color: #D3D3D3;
	}



	</style>
	</head>
	<body> 
		<div id="main" class="container-fluid">
			<h3 class="page-header">Planejamentos</h3>
			<br>
		</div>




<!-- Tabela Meus planos -->

		<table class="table table-condensed">
		<tr>
			<th>Data</th> 
			<th>Curso</th>
			<th>Turma</th>
			<th>Disciplina</th>
			<th>Nome do arquivo</th>
			<th>Responder</th>
		
			
	</tr>
	<?php
 $p->__set('idusuario', $_GET['codigo']);
 // pega a variavel GET que passamos no action do form
 $dados = $p->listar();

 //$acao = "PROCURANDO VEÍCULO PELA TG";
 $linha = null;
 $count = 0;

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
     echo "<a href='../" .
         $linha['arquivo'] .
         "' target='_blank'>" .
         $linha['arquivo'];
     echo "</a></td><td>";

     if ($linha['situacao_retorno'] == 1) {
         echo "<img src='img/aprovado.png' title='Aguardando' width='100' />";
     } elseif ($linha['situacao_retorno'] == 2) {
         echo "<img src='img/aguardando.png' title='Aguardando' width='100' />";
     } else {
         // echo "<a href='?pagina=ptd/planejamento_retorno.php&planejamento=".$linha['idplanejamento']."'>
         echo "<button class='demo btn btn-primary btn-lg' data-toggle='modal' href='#responsive" .
             $linha['idplanejamento'] .
             "'>Responder / Inserir comentário</button>";
         // echo "</td></tr>";
     }

     if (
         ($linha['situacao_retorno'] == 2) ||
         ($linha['situacao_retorno'] == 3)
     ) {
         $dados2 = $p->listar_observacoes($linha['idplanejamento']);
         foreach ($dados2 as $linha2) {
             echo "<tr class='obs'><td colspan='3'>Observação: " .
                 $linha2['observacao'] .
                 "</td>";
             if (strlen(trim($linha2['arquivo'])) > 0) {
                 echo "<td><a href='../" .
                     $linha2['arquivo'] .
                     "' target='_blank'>Ver anexo</a></td>";
             } else {
                 echo "<td>Nenhum anexo</td>";
             }

             switch ($linha2['situacao_retorno']) {
                 case '0':
                     echo "<td><img src='img/aguardando.png' title='Aguardando' width='100' /></td></tr>";
                     break;
                 case '1':
                     echo "<td><img src='img/aprovado.png' title='Aguardando' width='100' /></td></tr>";
                     break;
                 //case '2': echo '<td><button class="demo btn btn-primary" data-toggle="modal" href="#responsive'.$linha['idplanejamento'].'">Enviar correção</button></td></tr>';break;
                 case '2':
                     echo "<td><img src='img/aguardando.png' title='Aguardando' width='100' /></td></tr>";
                     break;
                 case '3':
                     echo "<td><img src='img/reenviado.png' title='Aguardando' width='100' /></td></tr>";
                     break;
                 default:
                     echo "<td><img src='img/aguardando.png' title='Aguardando' width='100' /></td></tr>";
                     break;
             }
         }
     }

     echo "<div ";
     echo "id='responsive" . $linha['idplanejamento'] . "'";
     echo 'class="modal fade responsive" tabindex="-1" data-width="760" style="display: none;">
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
    <h4 class="modal-title">Responder planejamento</h4>
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
     echo $linha['idplanejamento'];
     echo '>
						<label for="">OBSERVAÇÃO / COMENTÁRIO</label>
						<textarea class="form-control" id="campo3" name="observacao"  required="true"></textarea>
						
					</div>

					<div class="form-group col-md-6">
						<label for="data_entrada">SITUAÇÃO</label><br>
						<select name="situacao_retorno" class="form-control"  required="true"> 
							<option value="">SELECIONE UMA OPÇÃO</option> 
							<option value="1">APROVADO</option> 
							<option value="2">NECESSITA CORREÇÕES</option> 
						</select>
					</div>
					<div class="form-group col-md-6">
						<label for="campo3">ANEXAR ARQUIVO (OPCIONAL)</label>
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
 ?>
	</table>



<!-- Tabela Meus planos -->






















	</body>
	</html>

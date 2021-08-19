<?php 
  // include_once("../aluno/log.php");

  session_start();
  if(!isset($_SESSION['usuario'])){
     header("location:../login");
  }

  include_once("../conexao.class.php");
  include_once("ficha.class.php");

  $f = new Ficha();
  $mensagem = "<div class='alert alert-danger'>ERRO CATASTRÓFICO</div>";
  if($_SERVER['REQUEST_METHOD']=='POST'){  
    
   $count_alunos = 0; 
  //print_r($_POST);
  for ($i=1; $i <= 50; $i++) {
    if (isset($_POST["{$i}"])){ 
    $count = count($_POST["{$i}"]);
    if($count > 0) {
      //varre o array enviado pelo POST
      foreach($_POST["{$i}"] as $key => $value) {
        //exibe pra nos o valor recebido atualmente e pula linha
        //echo $key . "chave " . $value . "<br>"; 

        $f->__set("professor",$_POST['professor']);  
        $f->__set("disciplina",$_POST['disciplina']);  
        $f->__set("idserie",$_POST['idserie']);  
        $f->__set("idcurso",$_POST['idcurso']);  
        $f->__set("idturma",$_POST['idturma']);  

        $f->__set("idinformacao",$value);  
        $f->__set("idaluno",$i);
        //$f->__set("observacao",$_POST['observacao']);

        if($_POST['acao']=='Gravar'){  
          $mensagem = $f->gravar();
        }
      }
    }
  }else{
    $count_alunos++; 
  }
  }

  if($count_alunos == 50){
    $mensagem = "<div class='alert alert-danger'>Informe ao menos uma informação!</div>";
  }
  echo $mensagem;
  }
?>
<!doctype>
<html lang"pt-br">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title> FIcha de acompanhamento </title>
  <link href="css/bootstrap.css" rel="stylesheet">
  <script src="js/jquery-3.2.1.min.js"></script>
  <script src="js/tether.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <link href="../css/login.css" rel="stylesheet">
</head>
<body>
<div id="login-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <!-- <div class="modal-dialog"> -->
  <div class="">
  <div class="loginmodal-container col-md-8">
    <h1>Ficha de acompanhamento on-line</h1><br>
    <form method="POST" action="">
 
    <input type="hidden" name="id" value="<?php echo $f->__get('idlancamentos'); ?>">
<div class="col-md-12">
      <label> Nome do professor: </label>
    <input type="text" name="professor" value="<?php echo $f->__get('professor'); ?>" required>
</div>
    <div class="col-md-12">
      <label> Curso: </label>
    </div>
      <?php
      $count =0;
      echo "<div class='col-md-4'>";
      	$dados = $f->listarCurso();
      	foreach ($dados as $linha) {
         
      		echo "<input type='radio' name='idcurso' value='{$linha['idcurso']}' required>";
      		echo "<label for='curso'>".$linha['nome']."</label>"; 
          if($count % 4== 0){
            echo "</div><div class='col-md-4'>";
          }
      	}

      ?>
    </div>
    <div class="col-md-12">
      <label> Série: </label>
    </div>
   <div class="col-md-12">
      <?php
        $dados = $f->listarSerie();
        foreach ($dados as $linha) {
          echo "<div class='col-md-2'><input type='radio' name='idserie' value='{$linha["idserie"]}' required>";
          echo "<label for='curso'>".$linha['nome']."</label></div>";
        }

      ?>
      <div class="col-md-2"></div><!--só para fechar os doze od layout-->
    </div>
    <div class="col-md-12">
      <label> Turma: </label>
    </div>
    <div class="col-md-12">
    
      <?php
        $dados = $f->listarTurma();
        foreach ($dados as $linha) {
          echo " <div class='col-md-2'><input type='radio' name='idturma' value='".$linha['idturma']."' required>";
          echo "<label for='curso'> ".$linha['nome']." </label></div>";
        }

      ?>
 <div class="col-md-4"></div><!--só para fechar os doze od layout-->
</div>
<div class="col-md-12">
      <label> Disciplina: </label>
    <input type="text" name="disciplina" value="<?php echo $f->__get('disciplina'); ?>" required>
   </div>
    <div class="col-md-12">
      <label> Informações: </label>
      
      <table id="table" border='0'>
      <tr><th></th>
      <?php
        $informacoes = $f->listarInformacao();
        foreach ($informacoes as $coluna) {
          echo "<th class='rotate'><div><span>{$coluna->nome}</span></div></th>";
        }
        ?>
        </tr>
  
            <?php

        $alunos = $f->listarAluno();
        foreach ($alunos as $linha) {
           echo "<tr><td>".$linha['nome']."</td>";
           $informacoes = $f->listarInformacao();
          foreach ($informacoes as $coluna) {
            echo "<td><input type='checkbox' name='{$linha['idaluno']}[]' value='{$coluna['idinformacao']}'></td>";
          }
          echo "<tr>";
          
        }

      ?>
      </table>
    </div>
<div class="col-md-12">
      <br>
    </div>
    
    <div class="col-md-12">
      <button class="btn btn-primary" type="submit" name="acao" value="Gravar">Salvar</button>
    </div>
    </form>
      
    </div>
  </div>
</div>
</body>
</html>
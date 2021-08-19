<?php 
  // include_once("../aluno/log.php");
  ini_set('display_errors',1);
  ini_set('display_startup_erros',1);
  error_reporting(E_ALL);
  
	session_start();

	if(!isset($_SESSION['logado'])||($_SESSION['logado']!="SIM")){
		header("location:../login");
	}

include_once("ficha2.class.php");

$f = new Ficha2();
$mensagem = "<div class='alert alert-danger'>ERRO CATASTRÓFICO</div>";

// if( $_SERVER['REQUEST_METHOD']=='POST' )
// {
//   $request = md5( implode( $_POST ) );

//   if( isset( $_SESSION['last_request'] ) && $_SESSION['last_request']== $request )
//   {
//       //exit();//Sai da requisição por ser apenas um refresh F5
//   }
//   else
//   {
// $_SESSION['last_request']  = $request;
    if($_SERVER['REQUEST_METHOD']=='GET' && isset($_GET['codigo'])){
      $f->__set('idlancamentos',$_GET['codigo']);
      $f->excluir();
    }

    if($_SERVER['REQUEST_METHOD']=='POST'){  
      $count_alunos = 0; 
      if (isset($_POST["idinformacao"])) { 
        $count = count($_POST["idinformacao"]);
        if($count > 0) {
          //varre o array enviado pelo POST
          foreach($_POST["idinformacao"] as $key => $value) {
            //exibe pra nos o valor recebido atualmente e pula linha
            // echo $key . "chave " . $value . "<br>"; 

            $f->__set("usuario",$_SESSION['usuario']);  
            $f->__set("professor",$_POST['professor']);  
            $f->__set("disciplina",$_POST['disciplina']);  
            $f->__set("idserie",$_POST['idserie']);  
            $f->__set("idcurso",$_POST['idcurso']);  
            $f->__set("idturma",$_POST['idturma']);  
            $f->__set("observacao",$_POST['observacao']);  

            $f->__set("idinformacao",$value);  
            $f->__set("idaluno",$_POST['aluno']);
       

            if($_POST['acao']=='Gravar'){  
              $mensagem = $f->gravar();
            }
          }
        }else{
          $mensagem = "<div class='alert alert-danger'>Informe ao menos uma informação!</div>";
        }

        echo $mensagem;

      }
    }
  // }
// }

  
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

  <title> FIcha de acompanhamento </title>
  <link href="css/login.css" rel="stylesheet">
  
  <style type="text/css" >
    select{
      margin: 0; padding: 0; height: auto;
    }
/*    input[type="text"]{
      width: 100%;
    }*/

</style>
</head>
<body>
<!-- <div id="login-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true"> -->
<div class="container-fluid">
  <!-- <div class="modal-dialog"> -->
  <div class="">
  <div class="loginmodal-container col-md-12">
    <h1>Ficha de acompanhamento on-line</h1><br>
    <h2>Bem vindo! <strong><?php echo $_SESSION['usuario'];  ?> </strong> <a href='/logout'>Sair</a></h2>
    <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
 
<div class="col-md-12">
      <label> Nome do professor: </label>
    <input type="text" name="professor" value="<?php 
    if(isset($_POST['professor'])){
      echo $_POST['professor']; 
    }else{
      echo $_SESSION['usuario'];
    }
    ?>" required>
</div>
    <div class="col-md-12">
      <label> Curso: </label>
    </div>
      <?php
      $count =0;
      echo "<div class='col-md-4'>";
        $dados = $f->listarCurso();

      	foreach ($dados as $linha) {
        
      		echo "<input type='radio' name='idcurso' value='{$linha['idcurso']}' required";
          if(isset($_POST['idcurso'])&&($_POST['idcurso']==$linha['idcurso']))
          {
            echo " checked ";
          }
          echo ">";
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
          echo "<div class='col-md-2'><input type='radio' name='idserie' value='{$linha['idserie']}' required";
          if(isset($_POST['idserie'])&&($_POST['idserie']==$linha['idserie']))
          {
            echo " checked ";
          }
          echo ">";
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
          echo " <div class='col-md-2'><input type='radio' name='idturma' value='{$linha['idturma']}' required";
          if(isset($_POST['idturma'])&&($_POST['idturma']==$linha['idturma']))
          {
            echo " checked ";
          }
          echo ">";
          echo "<label for='curso'> ".$linha['nome']." </label></div>";
        }

      ?>
 <div class="col-md-4"></div><!--só para fechar os doze od layout-->
</div>
<div class="col-md-12">
      <label> Disciplina: </label>
    <input type="text" name="disciplina" value="<?php echo @$_POST['disciplina']; ?>" required>
   </div>
    <div class="col-md-12">
      <label> Informações: </label>
      
      <table id="table" border='1'>
      <tr><th class="rotate"><div><span>Número do aluno</span></div></th>
      <?php
        $informacoes = $f->listarInformacao();
        foreach ($informacoes as $coluna) {
          echo "<th class='rotate'><div><span>{$coluna['nome']}</span></div></th>";
          // echo "<th class='textoVertical'>{$coluna->nome}</th>";
        }
        ?>
        </tr>
  
            <?php


           echo "<tr><td><select name='aluno'>";
           for ($i=1; $i <= 50; $i++) { 
             echo "<option value='".$i."'>".$i."</option>";
           }
           echo "</select>";
           echo "</td>";

          // echo "<tr><td><input type='text' name='aluno'></td>";
        
          $informacoes = $f->listarInformacao();
          foreach ($informacoes as $coluna) {
            echo "<td><input type='checkbox' name='idinformacao[]' value='{$coluna['idinformacao']}'></td>";
          }
          echo "<tr>";
          
        

      ?>
      </table>
    </div>

    <div class="col-md-12">
      <label> Observacao: </label>
    <input type="text" name="observacao" value="<?php echo @$_POST['observacao']; ?>">
   </div>
<div class="col-md-12">
      <br>
    </div>
    
    <div class="col-md-12">
      <button class="btn btn-primary" type="submit" name="acao" value="Gravar">Salvar</button>
    </div>
  
</form>
   
<div class="col-md-12">
  <h5>Registros efetuados hoje (<?php echo Date("d/m/y"); ?>):</h5>
  <div class="table-responsive">
  <table class="table table-sm">
  <tr><td>Data</td><td>Curso</td><td>Turma</td><td>Série</td><td>Disciplina</td><td>Aluno</td><td>Informação</td><td>Obs:</td><td>Excluir</td></tr>
<?php
    $dados = $f->listarByUsuario();
    foreach ($dados as $linha) {
       //print_r($linha);
        echo "<tr>";
        echo "<td>". date('d/m/Y', strtotime($linha['data']))."</td>";
        echo "<td>".$linha['curso']."</td>";
        echo "<td>".$linha['turma']."</td>";
        echo "<td>".$linha['serie']."</td>";
        echo "<td>".$linha['disciplina']."</td>";
        echo "<td>".$linha['idaluno']."</td>";
        echo "<td>".$linha['informacao']."</td>";
        echo "<td><button type='button' class='btn btn-secondary' data-toggle='tooltip'  title='".$linha['observacao']."'>?</button></td>";
                                                                  
        echo "<td><a href='?pagina=preconselho/index.php&codigo=".$linha['idlancamentos']."'><img src='../img/excluir.png' title='Excluir' width='40' /></a></td>";
        echo "</tr>";
      }
    ?>
</table>
  </div>
  </div>

     </div>
  </div>
</div>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script>
    $( document ).ready(function() {
      $('[data-toggle="tooltip"]').tooltip()
    });    
  </script>
</body>
</html>
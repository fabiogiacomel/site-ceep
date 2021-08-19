<?php

session_start();
ini_set('display_errors',1);
ini_set('display_startup_erros',1);
error_reporting(E_ALL);

if(!isset($_SESSION['logado'])||($_SESSION['logado']!="SIM")){
  header("location:../login");
}

  // include_once("../aluno/log.php");
  include_once("../conexao.class.php");
  include_once("ficha.class.php");
 
  $f = new Ficha();


  if($_SERVER['REQUEST_METHOD']=='POST'){

require('fpdf.php');
  $pdf = new FPDF(); 



    $f->__set('idcurso',$_POST['idcurso']);
    $f->__set('idserie',$_POST['idserie']);
    $f->__set('idturma',$_POST['idturma']);
    $f->__set('data_ini',$_POST['data_ini']);
    $dados = $f->listarByAluno2();
    $aux = $dados;
     $height = 10;
   $pdf->AddPage();

$pdf->SetFont('Arial','B',12);
        $pdf->MultiCell(0,$height,'RELATÓRIO DE INFORMAÇÕES POR ALUNO',0,'C');
     
   
    $idaluno = 0;
    $curso = 0;
    $disciplina = "Não Informada";
    if($dados != null)
    foreach ($dados as $linha) {
      if ($idaluno != $linha['idaluno']){
        $idaluno = $linha['idaluno'];
        //$pdf->AddPage();

        if ($curso==0){
          $pdf->MultiCell(0,$height,$linha['curso']." - ".$linha['serie']." - ".$linha['turma'],0,'C');
          $curso = 1  ;     
        }
        
$pdf->SetFont('Arial','B',12);
        
           $pdf->MultiCell(0,$height," ",0,'J');
           $pdf->MultiCell(0,$height,"ALUNO N°: ". $linha['idaluno'],0,'J');
        $disciplina = "Não informada";
      }
      if ($disciplina !=$linha['disciplina']){
        $disciplina = $linha['disciplina'];
        $pdf->MultiCell(0,$height,"------------------------------------------------------------------------------------------------------------------",0,'J');
      $pdf->SetFont('Arial','B',12);
        
        $pdf->MultiCell(0,$height,"DISCIPLINA: ". $linha['disciplina']." - PROFESSOR: ". $linha['professor'],0,'J');
      
        $pdf->MultiCell(0,$height,"INFORMAÇÕES:",0,'J');
      }

      $pdf->SetFont('Arial','',12);
      $pdf->MultiCell(0,$height-5, date("d/m/Y", strtotime($linha['data']))."-".$linha['informacao'],0,'J');
  
   
}
$pdf->Output();

         
  echo "</tr>";
  


    $count = 0;



echo "</div>";


   
}
  echo "</div>";
    ?>


<!doctype html>
<html>
<head>
	<meta charset="utf-8">
	<title>Relatório ficha por aluno</title>
  <link href="css/bootstrap.css" rel="stylesheet">
  <script src="js/jquery-3.2.1.min.js"></script>
  <script src="js/tether.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <link href="css/login.css" rel="stylesheet">
</head>
<body>
  <div id="login-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <!-- <div class="modal-dialog"> -->
  <div class="">
  <div class="loginmodal-container col-md-8">
    <h1>Relatório por aluno</h1><br>
	<form name="form1" method="post" action="<?php $SELF_PHP; ?>">
    <div class="col-md-3">
      <label> Curso: </label>
    </div>
     <div class="col-md-3">
      <label> Série: </label>
    </div>
     <div class="col-md-3">
      <label> Turma: </label>
    </div>
    <div class="col-md-3">
      <label> Data inicial: </label>
    </div>
      <?php
      $count =0;
      echo "<div class='col-md-3'>";
      
      echo "<select name='idcurso'>";
        $dados = $f->listarCurso();
        foreach ($dados as $linha) {
          echo "<option value='{$linha['idcurso']}'>";
          echo $linha['nome']."</option>"; 
        }
        echo "</select></div>";

      echo "<div class='col-md-3'>";
      echo "<select name='idserie'>";
        $dados = $f->listarSerie();
        foreach ($dados as $linha) {
          echo "<option value='{$linha['idserie']}'>";
          echo $linha['nome']."</option>"; 
        }
        echo "</select></div>";

      echo "<div class='col-md-3'>";
      echo "<select name='idturma'>";
        $dados = $f->listarTurma();
        foreach ($dados as $linha) {
          echo "<option value='{$linha['idturma']}'>";
          echo $linha['nome']."</option>"; 
        }
        echo "</select></div>";
      ?>
    <div class='col-md-3'>
        <input type="date" name="data_ini" />
    </div>
<div class='col-md-12'>

    <input type="submit" value="consultar" />
  </div>

	</form>


	
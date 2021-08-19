<?php     
  include_once("../conexao.class.php");
  include_once("ficha.class.php");
  $f = new Ficha();

// $pdf = new PDF();
// $title = '20000 Leagues Under the Seas';
// $pdf->SetTitle($title);
// $pdf->SetAuthor('Jules Verne');
// $pdf->PrintChapter(1,'A RUNAWAY REEF','20k_c1.txt');
// $pdf->PrintChapter(2,'THE PROS AND CONS','20k_c2.txt');
// $pdf->Output();



    require('fpdf.php');
    $pdf = new FPDF(); 

    $dados = $f->listarAll();
    $aux = $dados;
    $height = 6;
    //$pdf->AddPage();

    // $pdf->SetFont('Arial','B',12);
    // $pdf->MultiCell(0,$height,'RELATÓRIO DE INFORMAÇÕES POR ALUNO',0,'C');
     
   
    $idaluno = 0;
    $idcurso = 0;
    $curso = 0;
    $disciplina = "Não Informada";
    if($dados != null)
    foreach ($dados as $linha) {
      if($idcurso != $linha['idcurso']){
         $idcurso = $linha['idcurso'];
         $pdf->AddPage();
         $pdf->SetFont('Arial','B',12);
         $pdf->MultiCell(0,$height,'RELATÓRIO DE INFORMAÇÕES POR ALUNO',0,'C');
         //$curso = 0;
       }

      if ($idaluno != $linha['idaluno']){
        $idaluno = $linha['idaluno'];
        //$pdf->AddPage();

        if ($curso==0){
          $pdf->MultiCell(0,$height,strtoupper($linha['curso'])." - ".strtoupper($linha['serie'])." - ".strtoupper($linha['turma']),0,'C');
          $curso = 1  ;     
        }
        
        $pdf->SetFont('Arial','B',12);
        $pdf->SetDrawColor(73,135,74);
        $pdf->SetFillColor(49,61,65);
        $pdf->SetTextColor(255, 255, 255);
        $pdf->MultiCell(0,$height," ",0,'J');
        $pdf->MultiCell(0,$height,"ALUNO N°: ". $linha['idaluno'],0,'J',true);
        $pdf->SetTextColor(54,54,54);
        $disciplina = "Não informada";
      }
      if ($disciplina !=$linha['disciplina']){
        $disciplina = $linha['disciplina'];
      $pdf->SetFont('Arial','B',12);
        
        $pdf->MultiCell(0,$height,"DISCIPLINA: ". strtoupper($linha['disciplina'])." - PROFESSOR: ". strtoupper($linha['professor']),0,'J');
      
        $pdf->MultiCell(0,$height,"INFORMAÇÕES:",0,'J');
      }

      $pdf->SetFont('Arial','',12);
      $pdf->MultiCell(0,$height,$linha['informacao'],0,'J');  
}
$pdf->Output();

         
  echo "</tr>";
  


    $count = 0;



echo "</div>";


   

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
  <link href="../css/login.css" rel="stylesheet">
</head>
<body>
  <div id="login-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <!-- <div class="modal-dialog"> -->
  <div class="">
  <div class="loginmodal-container col-md-8">
    <h1>Relatório por aluno</h1><br>
	<form name="form1" method="post" action="<?php $SELF_PHP; ?>">
    <div class="col-md-4">
      <label> Curso: </label>
    </div>
     <div class="col-md-4">
      <label> Série: </label>
    </div>
     <div class="col-md-4">
      <label> Turma: </label>
    </div>
      <?php
      $count =0;
      echo "<div class='col-md-4'>";
      
      echo "<select name='idcurso'>";
        $dados = $f->listarCurso();
        foreach ($dados as $linha) {
          echo "<option value='{$linha['idcurso']}'>";
          echo $linha['nome']."</option>"; 
        }
        echo "</select></div>";

      echo "<div class='col-md-4'>";
      echo "<select name='idserie'>";
        $dados = $f->listarSerie();
        foreach ($dados as $linha) {
          echo "<option value='{$linha['idserie']}'>";
          echo $linha['nome']."</option>"; 
        }
        echo "</select></div>";

      echo "<div class='col-md-4'>";
      echo "<select name='idturma'>";
        $dados = $f->listarTurma();
        foreach ($dados as $linha) {
          echo "<option value='{$linha['idturma']}'>";
          echo $linha['nome']."</option>"; 
        }
        echo "</select></div>";
      ?>
    
<div class='col-md-4'>

    <input type="submit" value="consultar" />
  </div>

	</form>


	
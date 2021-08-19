<?php
session_start();

ini_set('display_errors',1);
ini_set('display_startup_erros',1);
error_reporting(E_ALL);


if(!isset($_SESSION['logado'])||($_SESSION['logado']!="SIM")){
  header("location:../login");
}   
  include_once("../conexao.class.php");
  include_once("ficha2.class.php");
  $f = new Ficha2();

// $pdf = new PDF();
// $title = '20000 Leagues Under the Seas';
// $pdf->SetTitle($title);
// $pdf->SetAuthor('Jules Verne');
// $pdf->PrintChapter(1,'A RUNAWAY REEF','20k_c1.txt');
// $pdf->PrintChapter(2,'THE PROS AND CONS','20k_c2.txt');
// $pdf->Output();


  function getDataIni(){
    $dia_semana = Date("w");
    $dia_mes = Date("d");
    $primeiro_dia = $dia_mes - $dia_semana + 1;
    return Date("Y") . "-" . Date("m") . "-" . str_pad($primeiro_dia, 2, '0', STR_PAD_LEFT) ;
  }

  function getDataFim(){
    $dia_semana = Date("w");// quarta = 3
    $dia_mes = Date("d");// dia 11
    $primeiro_dia = (5 - $dia_semana) + $dia_mes;//sexta=5
    return Date("Y") . "-" . Date("m") . "-" . str_pad($primeiro_dia, 2, '0', STR_PAD_LEFT) ;
  }


if ($_SERVER['REQUEST_METHOD']=='POST'){
    require('fpdf.php');
    $pdf = new FPDF(); 

    $dados = $f->listarByData($_POST['data_ini'],$_POST['data_fim']);
    $aux = $dados;
    $height = 5;
    //$pdf->AddPage();

    // $pdf->SetFont('Arial','B',12);
    // $pdf->MultiCell(0,$height,'RELATÓRIO DE INFORMAÇÕES POR ALUNO',0,'C');
     
   
    $idaluno = 0;
    $idcurso = 0;
    $idserie = 0;
    $idturma = 0;
    $curso = 0;
    $disciplina = "Não Informada";
    if($dados != null)
    foreach ($dados as $linha) {
      if($idcurso != $linha['idcurso']){
         $idcurso = $linha['idcurso'];
         $idserie = $linha['idserie'];
         $idturma = $linha['idturma'];
         $pdf->AddPage();
         $pdf->SetFont('Arial','B',10);
         $pdf->MultiCell(0,$height,'RELATÓRIO DE INFORMAÇÕES POR ALUNO.',0,'C');
         //$curso = 0;
          $pdf->MultiCell(0,$height,strtoupper($linha['curso'])." - ".strtoupper($linha['serie'])." - ".strtoupper($linha['turma']),0,'C');
       }

  if($idserie != $linha['idserie']){
         $idcurso = $linha['idcurso'];
         $idserie = $linha['idserie'];
         $idturma = $linha['idturma'];
         $pdf->AddPage();
         $pdf->SetFont('Arial','B',10);
         $pdf->MultiCell(0,$height,'RELATÓRIO DE INFORMAÇÕES POR ALUNO.',0,'C');
         //$curso = 0;
          $pdf->MultiCell(0,$height,strtoupper($linha['curso'])." - ".strtoupper($linha['serie'])." - ".strtoupper($linha['turma']),0,'C');
       }

if($idturma != $linha['idturma']){
         $idcurso = $linha['idcurso'];
         $idserie = $linha['idserie'];
         $idturma = $linha['idturma'];
         $pdf->AddPage();
         $pdf->SetFont('Arial','B',10);
         $pdf->MultiCell(0,$height,'RELATÓRIO DE INFORMAÇÕES POR ALUNO.',0,'C');
         //$curso = 0;
          $pdf->MultiCell(0,$height,strtoupper($linha['curso'])." - ".strtoupper($linha['serie'])." - ".strtoupper($linha['turma']),0,'C');
       }       


      if ($idaluno != $linha['idaluno']){
        $idaluno = $linha['idaluno'];
        //$pdf->AddPage();

        // if ($curso==0){
        //   $pdf->MultiCell(0,$height,strtoupper($linha['curso'])." - ".strtoupper($linha['serie'])." - ".strtoupper($linha['turma']),0,'C');
        //   $curso = 1;     
        // }
        
        $pdf->SetFont('Arial','B',10);
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
      $pdf->SetFont('Arial','B',10);
        
        $pdf->MultiCell(0,$height,"DISCIPLINA: ". strtoupper($linha['disciplina'])." - PROFESSOR: ". strtoupper($linha['professor']),0,'J');
      
        $pdf->MultiCell(0,$height,"INFORMAÇÕES: ".date('d/m/Y', strtotime($linha['data'])),0,'J');
        $pdf->SetFont('Arial','',10);
        $pdf->MultiCell(0,$height,$linha['informacao'],0,'J');  
        if(strlen($linha['observacao'])>0){
          $pdf->MultiCell(0,$height,'Observação: ' . $linha['observacao'],0,'J');  
        }
      }


}
$pdf->Output();

        } 
  // echo "</tr>";
  


    $count = 0;



// echo "</div>";


   

  // echo "</div>";

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
  <div class="loginmodal-container col-md-8">
    <h1>Relatório geral por data</h1><br>
	  <form name="form1" method="post" action="<?php $SELF_PHP; ?>">
      <div class="col-md-4">
        <label> Data inicial: </label>
        <input type="date" name="data_ini" value="<?php echo getDataIni(); ?>">
      </div>
      <div class="col-md-4">
        <label> Data final: </label>
        <input type="date" name="data_fim" value="<?php echo getDataFim(); ?>">
      </div>
      <div class='col-md-4'>
        <label> </label>
        <input type="submit" value="consultar" />
      </div>
	  </form>
  </div>
</div>
</body>
</html>
	
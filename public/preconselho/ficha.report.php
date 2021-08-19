<!doctype html>
<html>
<head>
	<meta charset="utf-8">
	<title>Relatório Pré-conselho</title>
  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="/resources/demos/style.css">
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  <script>
  $( function() {
    $( "#tabs" ).tabs();
  } );
  </script>
</head>
<body>
<?php			
  include_once("../aluno/log.php");
  include_once("../conexao.class.php");
  include_once("ficha2.class.php");

  $f = new Ficha2();
  

  ?>
	<form name="form1" method="get" action="<?php $SELF_PHP; ?>">
    <div class="col-md-12">
      <label> Curso: </label>
    </div>
      <?php
      $count =0;
      echo "<div class='col-md-4'>";
      echo "<select name='curso'>";
        $dados = $f->listarCurso();
        foreach ($dados as $linha) {
          echo "<option value='{$linha['curso']}'>";
          echo $linha['curso']."</option>"; 
        }
        echo "</select></div>";
      ?>
    </div>
    <label> Serie: </label>
    </div>
      <?php
      echo "<div class='col-md-4'>";
      echo "<select name='serie'>";
        $dados = $f->listarSerie();
        foreach ($dados as $linha) {
          echo "<option value='{$linha['serie']}'>";
          echo $linha['serie']."</option>"; 
        }
        echo "</select></div>";
      ?>
    </div>
    <label> Turma: </label>
    </div>
      <?php
      echo "<div class='col-md-4'>";
      echo "<select name='turma'>";
        $dados = $f->listarTurma();
        foreach ($dados as $linha) {
          echo "<option value='{$linha['turma']}'>";
          echo $linha['turma']."</option>"; 
        }
        echo "</select></div>";
      ?>
    </div>


    <input type="submit" value="consultar" />
	</form>


	<?php 

	

	if($_SERVER['REQUEST_METHOD']=='GET'){

    $f->__set('idcurso',$_GET['curso']);
    $f->__set('idserie',$_GET['serie']);
    $f->__set('idturma',$_GET['turma']);
    $dados = $f->listarDadosBase();
    $aux = $f->listarDadosBase();
  }  
	

  $total =0;
   echo "<div id='tabs'>
  <ul>";
  $count2=0;
  foreach ($aux as $linha) {
    $count2++;
    echo "<li><a href='#{$count}'>{$linha['disciplina']}</a></li>";
   }
  echo "</ul>";

  $count2=0;
	if($dados != null)
    foreach ($dados as $linha) {
       $count2++;
      echo "<div id='{$count2}'>";
          
	 echo "<table class='table' border='0'>
	 <tr>
    <th colspan='4'>Curso:</th>
    <th colspan='4'>{$linha['curso']}</th>
   </tr>
   <tr> 
    <th colspan='2'>Série:</th>
    <th colspan='2'> {$linha['serie']}</th>
    <th colspan='2'>Turma:</th>
    <th colspan='2'> {$linha['turma']}</th>
   </tr>
   </table>

   echo 
   <tr> 
    <th colspan='2'>Professor:</th>
    <th colspan='2'> {$linha['professor']}</th>
    <th colspan='2'>Quantidade de avaliações:</th>
    <th colspan='2'> {$linha['qtd_avaliacoes']}</th>
    <th colspan='2'>Disciplina:</th>
    <th colspan='2'> {$linha['disciplina']}</th>
   </tr>
  </table>";


  echo "<table border='1'><tr>";

   for($i=1; $i<= 50; $i++){
    echo "<tr><td> $i </td>";
    $index = "aluno".$i;
    echo "<td>{$linha[$index]}</td></tr>";
  }

         
	echo "</tr>";
	


		$count = 0;


//echo "<td>".$cursos[$inscricao->curso]."</td><td>".$modalidades[$inscricao->serial]."</td><td>".$periodos[$inscricao->periodo]."</td><td align='center'>nada</td></tr>";

 		


		echo "<tr class='normal'><td colspan='12' align='left'>Número total de inscritos na turma: ".$total."</td></tr></table>";

echo "</div>";


    //   function inverteData($data){
    //   if(count(explode("/",$data)) > 1){
    //     return implode("-",array_reverse(explode("/",$data)));
    //   }elseif(count(explode("-",$data)) > 1){
    //     return implode("/",array_reverse(explode("-",$data)));
    //   }
    // }
}
  echo "</div>";
		?>

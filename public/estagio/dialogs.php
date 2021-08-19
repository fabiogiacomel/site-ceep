<?php 
function __autoload($classe){
  if (file_exists("{$classe}.class.php")){
    include_once "{$classe}.class.php";
  }
}
date_default_timezone_set('America/Sao_Paulo');
?>

<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>Dialogs</title>

    <!-- Folhas de estilo -->
    <link rel="icon" type="image/ico" href="img/favicon.ico">
    <link href="css/bootstrap.css" rel="stylesheet">
    <link href="css/chosen.css" rel="stylesheet">


    <link href="css/bootstrap-theme.css" rel="stylesheet">
     <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <!-- Plugins jQuery -->
    <script src="js/jquery.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script src="js/chosen.jquery.min.js"></script>
    <script src="js/jquery.maskedinput.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/Chart.min.js"></script>    



    <script type="text/javascript">
        $(document).ready(function() {
            $('.chosen-select').chosen({
            //disable_search_threshold: 10,
            no_results_text: "Oops, nada encontrado!",
            width: "100%"
            });

            $("#cpf").mask("999.999.999-99",{placeholder:" "});
            $("#cep").mask("99.999-999",{placeholder:" "});
            $("#cnpj").mask("99.999.999/9999-99",{placeholder:" "});
            $("#telefone").mask("(99) 9999-9999",{placeholder:" "});
        });
  </script>
</head>
<body>
<?php
//

    $pagina= "home.php";

    if(isset($_GET['pagina'])){
        switch ($_GET['pagina']) {
            case 'propriedade': $pagina = "propriedade.form.php"; break;
            case 'professor'  : $pagina = "professor.form.php";     break;
            case 'supervisor'    : $pagina = "supervisor.form.php";     break;
            default           : $pagina = $_GET['pagina'];
        }
    }

    if (file_exists($pagina)){
        include_once($pagina);
    }else{
        echo "A página não existe:".$pagina;	
    }
?>	   
</body>
</html>
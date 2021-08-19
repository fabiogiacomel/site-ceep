<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Mala direta</title>
	<link rel="stylesheet" href="css/print.css">
</head>
<body>
<?php
		require_once("maladireta.class.php");

		$m = new Maladireta();

		if($_SERVER['REQUEST_METHOD']=='POST'){

			$m->__set('titulo',$_POST['titulo']);
			$m->__set('mensagem',$_POST['mensagem']);
 		  $empresas = $_POST['empresas'];
 			$lista_empresas = "0";
   		foreach ($empresas as $lista=>$value) {
        $lista_empresas .= ",".$value;
      }
			$m->__set('lista_empresas',$lista_empresas);

			$m->gravar();

			$dados_empresas = $m->listarEmpresas($lista_empresas);

			foreach ($dados_empresas as $linha) {
				echo "<h2>".$m->__get("titulo")."</h2>";
				$frase = $m->__get("mensagem");

				$chaves   = array("@empresa", "@endereco_empresa", "@telefone_empresa");
				$valores   = array($linha['nome'], $linha['rua'], $linha['telefone']);

				$novafrase = str_replace($chaves, $valores, $frase);

				echo "<p>" . $novafrase . "</p>";
				//O comando abaixo faz uma quebra de página! Serve para iniciar uma nova página
				echo "<div class='page-break'></div> ";
			}
		}

?>


</body>
</html>
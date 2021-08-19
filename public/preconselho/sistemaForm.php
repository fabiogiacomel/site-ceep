<?php 
	if(!isset($_COOKIE['idusuario'])){
		header("location:home.php");	
	}		
?>
<!doctype html>
<html lang="pt-br">
<head>
<meta charset="utf-8">
<title>Cadastro dos módulos do sistemas</title>
<script type="text/javascript" src="../js/jquery.js"></script>
<link href="css/form.css" rel="stylesheet" type="text/css" />
<link href="css/buttons.css" rel="stylesheet" type="text/css" />

</head>

<body>
  <?php	
	$_COOKIE['destino'] = "noticiaForm.php";
	if(!isset($_COOKIE['idusuario'])){
		header("Location:index.php");
	}
	 $pagina = "?pagina=sistema/sistemaForm.php&";

	include_once('sistemaClass.php');

	/*	$filename = 'noticiaClass.php';

	if (file_exists($filename)) {
    	echo "O arquivo $filename existe";
	} else {
    	echo "O arquivo $filename nÄ‚Â£o existe";
	}*/
	$s = Sistema::getInstance();

	$resposta=null;
	// pega a variavel GET que passamos no action do form
	if (isset($_GET['acao'])){
		$acao = $_GET['acao'];
		//echo $acao;
 
		// Verifica qual formulario foi submetido
		
       		//Criando e Instanciando o objeto
       		
       		//Atribuindo valores ao objeto
		$s->set('idsistema',$_POST['idsistema']);
		$s->set('nome',$_POST['nome']);
    	$s->set('descricao',$_POST['descricao']);
		$s->set('idcategoria', $_POST['idcategoria']);
			
	   if ($acao=="set"){		
	        //chamando a funcao que faz o insert
	   		$resposta = $s->gravar();
			
       }
       if ($acao=="alt"){
	        //chamando a funcao que faz o insert
       		$resposta = $s->alterar();
	   }	   
	   
	   
	}else{
		//echo "<div id='erro' class='MSG_ERRO'></div>";
    	}

	if(isset($_GET['codigo'])){
		$codigo = $_GET['codigo'];
		$s->set('id',$codigo);
	}
	
	//$n->find();
?>

    <form id="form" name="form" action="<?php $SELF_PHP; echo $pagina; if (isset($_GET['acao'])){echo "acao=".$_GET['acao'];}else{echo "acao=set";}?>" method="post" enctype="multipart/form-data" onsubmit="return valida();">
  	   		<h1 class="ribbon">Cadastro dos módulos do sistemas</h1>
      <!--   <label>Código:</label>-->
        <input type="hidden" name="idsistema" value="<?php echo $s->get('idsistema'); ?>" readonly/>
    	<br />
        <label>Nome:</label>
        <input type="text" name="nome" value="<?php echo $s->get('nome'); ?>" placeholder="nomePasta/nomeDaPagina.php" required/>
    	<br />
   		 <label>Descrição:</label>
        <input type="text" name="descricao" value="<?php echo $s->get('descricao'); ?>" placeholder="Cadastro de..." required/>
    	<br />
        <label>Categoria:</label>
        <select name="idcategoria">
        	<option value="1" selected="selected">Cadastros</option>
        	<option value="2">Relatórios</option>
        </select>
        
    	<br />      
        
    	<br/>        
    	<input class="submit" type="submit" value="Enviar" />
        <input class="submit" type="reset" value="Limpar"/>      
        <br />
    
        <?php
		
		echo $resposta;
		?>
	</form>
</body>
</html>
<?php 
	if(!isset($_SESSION['idusuario'])){
		header("location:index.php");	
	}		
	$pagina = "?pagina=ptd/livroRegistro.form.php&";
	
?>
<!doctype html>
<html lang="pt-br">
<head>
<meta charset="utf-8">
<title>Cadastro de noticia</title>


<script type="text/javascript" src="js/jquery.js"></script>

<link href="css/form.css" rel="stylesheet" type="text/css" />
<link href="css/buttons.css" rel="stylesheet" type="text/css" />

<style>

table{width: 100%}
td{/*padding-left: 40px;*/ text-align: center;}
input[type="radio"]{width: 40%; display: none;}
label.umquarto{
	vertical-align: middle ; color : white;
	background-color: transparent; border: none;    margin-top: -10;

}
	</style>
}
</head>

<body>
<div id="alert_container"><div id="alert">Mensagem de aviso</div></div>
  <?php	
	$_SESSION['destino'] = "noticiaForm.php";
	if(!isset($_SESSION['idusuario'])){
		header("Location:index.php");
	}

	include_once('livroRegistro.class.php');

	$n = new LivroRegistro();
	$resposta = "";
	
	// pega a variavel GET que passamos no action do form
	if (isset($_GET['acao'])){
		$acao = $_GET['acao'];
		//echo $acao;
 
		// Verifica qual formulario foi submetido
		
       		//Criando e Instanciando o objeto
       		
       	//Atribuindo valores ao objeto
		$n->__set('idregistro',$_POST['idregistro']);
		//$n->set('data',$_POST['data']);
    	$n->__set('descricao',$_POST['descricao']);
		$n->__set('modalidade', '1');
	   	$n->__set('arquivo', $_FILES['arquivo']);
	   	if ($acao=="set"){		
	        //chamando a funcao que faz o insert
	   		$resposta = $n->gravar();
		}
        if ($acao=="alt"){
	        //chamando a funcao que faz o insert
       		$resposta = $n->alterar();
	    }	   
	}else{
		//echo "<div id='erro' class='MSG_ERRO'></div>";
    }

	if(isset($_GET['codigo'])){
		$codigo = $_GET['codigo'];
		$n->set('idregistro',$codigo);
	}
	
	//$n->find();

?>

    <form id="form" name="form" action="<?php $SELF_PHP; echo $pagina; if (isset($_GET['acao'])){echo "acao=".$_GET['acao'];}else{echo "acao=set";}?>" method="post" enctype="multipart/form-data" onsubmit="return valida();">
  	   		<h1 class="ribbon">Cadastro de Orientação para o LRC</h1>
        <!--<label>CĂ„â€&sup3;digo:</label>-->
        
		<?php
			//echo $resposta;
  		  	if($_SERVER['REQUEST_METHOD']=='POST'){
   		  	echo "<script>showAlert('success','".$resposta."');</script>" ;
   		 }
		?>  

        <input type="hidden" name="idregistro" value="<?php echo $n->__get('idregistro'); ?>" readonly/>
    	<br />
        <label>Descrição:</label>
        <input type="text" id="campoData" name="descricao" value="<?php echo $n->__get('descricao'); ?>" required="true"/>
    	<br />
   
             
      
    	<!-- <label class="cem_porcento">Modalidade:</label><br>
         <input type="checkbox" name="modalidade" value="1"><label class="umquarto">Integrado:</label>
        <input type="checkbox" name="modalidade" value="2"> <label class="umquarto">Subsequente:</label><br> -->

       	<label >Selecione o Arquivo:</label>
        <input type="file" name="arquivo" required="true">

        <br/>        
    	<input class="submit" type="submit" value="Enviar" />
        <input class="submit" type="reset" value="Limpar"/>  
    </form>
        
	
</body>
</html>
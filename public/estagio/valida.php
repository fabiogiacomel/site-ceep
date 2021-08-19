<?php   
	include_once("../conexao.class.php");

	setcookie('idusuario',0,time()-3600);
	setcookie('usuario',"",time()-3600);
	setcookie('tipo',"",time()-3600);
 

 	$sql = "SELECT * FROM usuario WHERE usuario = :p1 and senha = :p2";
	
	$nome =	preg_replace('/[^[:alnum:]_]/', '',$_POST ['usuario']);
  $senha=	preg_replace('/[^[:alnum:]_]/', '',$_POST ['senha']);


	$con = new Conexao();

	$stm = $con->prepare($sql);
	
	$stm->bindValue(":p1", $nome); 
	$stm->bindValue(":p2", $senha); 

	$stm->execute();
		
	$row = $stm->rowCount();	
		

  if ($row > 0)  {
		$linha = $stm->fetch(PDO::FETCH_ASSOC);	
		$idusuario = $linha['idusuario'];	
		$nome 	   = $linha['nome'];
		$tipo 	   = $linha['tipo'];//1 - professor 2 - pedagogo 3 - adm	  
		setcookie('idusuario',$idusuario,time()+6000);
		setcookie('usuario',$nome,time()+6000);
		setcookie('tipo',$tipo,time()+6000);
		if (isset($_COOKIE["MSG_ERRO"])){
			setcookie("MSG_ERRO","",time()-6000);
		}
		 
		header("location:admin.php");
	    }else{
		setcookie("MSG_ERRO", "Usuário ou senha inválidos",time()+3600);
		if (isset($_COOKIE['usuario'])){
			setcookie('idusuario','',time()-3600);
			setcookie('nome','',time()-3600);
		}
	    header("location:index.php");
	 }	?>
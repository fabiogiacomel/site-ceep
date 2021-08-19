<?php
	session_start();
?>
<html>
	<head>
		<meta charset="utf-8"/>
		<title>Vagas de estágio</title>
		<link href="css/bootstrap.min.css" rel="stylesheet">
		<link href='https://fonts.googleapis.com/css?family=Oswald' rel='stylesheet' type='text/css'>
		<script src="js/jquery.min.js"></script>
		<script src="js/bootstrap.min.js"></script>
		<style>	
		body{background-image: url(img/estagio.jpg); 
					background-color: #ffce3b; background-repeat: no-repeat; background-size: 30%;
					color: white;}
			.vaga{
				 height: auto; min-height: 300px; background-color: #f8f8f8; box-shadow: 2px 2px 10px 2px #515151; display: inline-table;
					padding: 10px; margin:10px; max-width: 400px; width: 300px;	
			}
			label{display: inline-block;color:white;}

			form#login{ /*width: 560px;*/ height: 55px; float: left; position: absolute; top:10px;  right: 0; padding: 10px; padding-left: 20px; border-radius: 20px; margin-right:20px;color:black;
				background-image: url("img/fundo-grade.jpg"); border: #4A484F 3px solid; background-size: 100%; background-position: center top;}

			h1,h2,h3,h4,h5,h6,p{text-align: center;color:#4A484F}
			.page-header{text-align: center; font-size:5em;font-family: 'Oswald', sans-serif;
				}
				/*div#main{background-image: url(img/ceep.jpg); background-position: 98% 30px; background-repeat: no-repeat;}*/
			button{width: 60px; display: inline-block;color:#4A484F;

			}
		</style>
	</head>
	<body>
		<div id="main" class="container-fluid">
			
			<br><br><br>
			<h3 class="page-header">Vagas de estágio</h3>
			<br><br>
			<form id="login" method="post" action="">
					<label for="nome">Usuário:</label>
					<input type="text" name="usuario">
					<label for="senha">Senha:</label>
					<input type="password" name="senha">

					<button type="submit">Entrar</button>
<br>	
					<?php
						if (isset($_COOKIE['MSG_ERRO'])){
							echo $_COOKIE['MSG_ERRO'];
							echo "<br>";
						}


					  

					  include("usuario.class.php");
					  $u = new Usuario();
						if($_SERVER['REQUEST_METHOD']=="POST"){
							$u->__set("usuario", $_POST['usuario']);
							$u->__set("senha", $_POST['senha']);

							if($u->validar()){
								$_SESSION["logado"]= "SIM";
								$_SESSION["usuario"]= $_POST['usuario'];
								header("Location:index.php");
							}else{
								echo "<h2>Usuário ou senha inválidos</h2>";
							}
						}
					?>




			</form>
  		<table>
	
	</table>
	</body>
	</html>
<?php
session_start();
?>
<html>
<head>
	<meta charset="utf-8"/>
	<title>Vagas de estágio</title>
	<!-- <link href="css/bootstrap.min.css" rel="stylesheet"> -->
	<link href='https://fonts.googleapis.com/css?family=Oswald' rel='stylesheet' type='text/css'>
	<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
	<script src="https://code.jquery.com/jquery-1.11.1.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>


	<style>	
	@import url(http://fonts.googleapis.com/css?family=Roboto);

	/****** LOGIN MODAL ******/
	.loginmodal-container {
		padding: 30px;
		max-width: 350px;
		width: 100% !important;
		background-color: #F7F7F7;
		margin: 0 auto;
		border-radius: 2px;
		box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
		overflow: hidden;
		font-family: roboto;
	}

	.loginmodal-container h1 {
		text-align: center;
		font-size: 1.8em;
		font-family: roboto;
	}

	.loginmodal-container input[type=submit] {
		width: 100%;
		display: block;
		margin-bottom: 10px;
		position: relative;
	}

	.loginmodal-container input[type=text], input[type=password] {
		height: 44px;
		font-size: 16px;
		width: 100%;
		margin-bottom: 10px;
		-webkit-appearance: none;
		background: #fff;
		border: 1px solid #d9d9d9;
		border-top: 1px solid #c0c0c0;
		/* border-radius: 2px; */
		padding: 0 8px;
		box-sizing: border-box;
		-moz-box-sizing: border-box;
	}

	.loginmodal-container input[type=text]:hover, input[type=password]:hover {
		border: 1px solid #b9b9b9;
		border-top: 1px solid #a0a0a0;
		-moz-box-shadow: inset 0 1px 2px rgba(0,0,0,0.1);
		-webkit-box-shadow: inset 0 1px 2px rgba(0,0,0,0.1);
		box-shadow: inset 0 1px 2px rgba(0,0,0,0.1);
	}

	.loginmodal {
		text-align: center;
		font-size: 14px;
		font-family: 'Arial', sans-serif;
		font-weight: 700;
		height: 36px;
		padding: 0 8px;
		/* border-radius: 3px; */
/* -webkit-user-select: none;
user-select: none; */
}

.loginmodal-submit {
	/* border: 1px solid #3079ed; */
	border: 0px;
	color: #fff;
	text-shadow: 0 1px rgba(0,0,0,0.1); 
	background-color: #4d90fe;
	padding: 17px 0px;
	font-family: roboto;
	font-size: 14px;
	/* background-image: -webkit-gradient(linear, 0 0, 0 100%,   from(#4d90fe), to(#4787ed)); */
}

.loginmodal-submit:hover {
	/* border: 1px solid #2f5bb7; */
	border: 0px;
	text-shadow: 0 1px rgba(0,0,0,0.3);
	background-color: #357ae8;
	/* background-image: -webkit-gradient(linear, 0 0, 0 100%,   from(#4d90fe), to(#357ae8)); */
}

.loginmodal-container a {
	text-decoration: none;
	color: #666;
	font-weight: 400;
	text-align: center;
	display: inline-block;
	opacity: 0.6;
	transition: opacity ease 0.5s;
} 

.login-help{
	font-size: 12px;
}
</style>
</head>
<body>
	<div class="modal-dialog">
		<div class="loginmodal-container">
			<h1>Login do site do CEEP</h1><br>
			<form method="post">
				<input type="text" name="usuario" placeholder="Usuário">
				<input type="password" name="senha" placeholder="Senha">
				<input type="submit" name="login" class="login loginmodal-submit" value="Entrar">
		
		<?php
		ini_set('display_errors',1);
		ini_set('display_startup_erros',1);
		error_reporting(E_ALL);
		
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
				$_SESSION["logado"]= "SIM";
				$_SESSION["usuario"]= $_POST['usuario'];
				if (isset($_GET['origem']) && ($_GET['origem']=='admin') && ($_SESSION['tipo']>1)){
					header("Location:admin.php");
				}else{
					header("Location:index.php");
				}
				// echo "ok";
			}else{
				echo "<h2>Usuário ou senha inválidos</h2>";
			}
		}else{
			// echo "Erro méthodo de entrada inválido";
		}
		?>
			</form>

				 <!--  <div class="login-help">
					<a href="#">Register</a> - <a href="#">Forgot Password</a>
				</div> -->
			</div>
		</div>

</body>
</html>
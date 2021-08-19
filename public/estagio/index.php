<?php
	session_start();
    if (!isset($_SESSION['tipo']) or ($_SESSION['tipo'] < 2)) {
        //echo "otipo é" . $_SESSION['tipo'];
        header('location: /home');
    }
	if(!isset($_SESSION['logado'])||($_SESSION['logado']!="SIM")){
		header("location:../login");
	}

	?>
<!DOCTYPE html>
<html lang="pt_BR">
<head>
	<meta charset="UTF-8">
	<title>Central de estágio</title>
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<script src="js/jquery.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<style type="text/css">
		a{color:#515151;text-decoration: none;}
	</style>
</head>
<body>

<?php
	include("menu.php");
?>

<br><br><br><br><br><br><br><br><br><br><br><br>
<table width="100%">
	<tr>
		<td align="center">
			<a href="empresa.form.php">
			<img src="img/empresa.png"  width="100px" alt="Cadastro de Empresa"/>
			<h4>Cadastro de Empresa</h4> 
			</a>
		</td>

		<td align="center">
			<a href="aluno.form.php">
			<img src="img/aluno.png"  width="125px" alt="Cadastro de Aluno"/>
			<h4>Cadastro de Aluno</h4> 
			</a>
		</td>





		<td align="center">
			<a href="vagas.form.php">
			<img src="img/vagas.png"  width="125px" alt="Cadastro de Vagas"/>
			<h4>Cadastrar vagas de Estágio</h4> 
			</a>
		</td>
	</tr>

	<tr>
		<td align="center">
			<a href="maladireta.form.php">
			<img src="img/mala_direta.jpg"  width="170px" alt="Mala direta"/>
			<h4>Mala direta</h4> 
			</a>
		</td>
		<td align="center">
			<a href="estagio.form.php">
			<!-- <a href="#"> -->
			<img src="img/estagio.png"  width="125px" alt="Cadastro de Estágio"/>
			<h4>Termo de Estágio</h4> 
			</a>
		</td>
		<td align="center">
			<a href="convenio.report.php">
			<img src="img/empresa.png"  width="100px" alt="Relatório de termos de convênio vencendo"/>
			<h4>Termos de convênio vencendo</h4> 
			</a>
		</td>		<td align="center">
			<a href="convenio.form.php">
			<img src="img/convenio.png"  width="125px" alt="Cadastro de Convenio"/>
			<h4>Termo de Convênio</h4> 
			</a>
		</td>
		<td align="center">
			<a href="aluno.empresa.report.php">
			<img src="img/funcionarios.png"  width="125px" alt="Relatório de estagiarios"/>
			<h4>Estagiários por Empresa</h4> 
			</a>
		</td>
	</tr>
</table>
	
</body>
</html>
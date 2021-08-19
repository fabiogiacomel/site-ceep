<nav class="navbar navbar-inverse navbar-fixed-top">
			<div class="container-fluid">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<a class="navbar-brand" href="https://www.ceepcascavel.com.br/">CEEP - PEDRO BOARETTO NETO</a>
				</div>

				<div id="navbar" class="navbar-collapse collapse">
					<ul class="nav navbar-nav navbar-right">
<!-- <li><a href="usuario.form.php?acao=alterar">Bem vindo! Usuário logado: <?php echo $_SESSION['usuario']; ?></a></li> -->
						<li><a href="#">Bem vindo: <?php echo $_SESSION['usuario']; ?>!</a></li>
 <li role="presentation" class="dropdown">
    <a class="dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
      Cadastros <span class="caret"></span>
    </a>
    <ul class="dropdown-menu">
   		<li><a href="aluno.form.php">Alunos</a></li>
      <li><a href="empresa.form.php">Empresas</a></li>
      <li><a href="professor.form.php">Professor supervisor</a></li>
   		<!-- <li><a href="supervisor.form.php">Supervisor na empresa</a></li> -->
    </ul></li>
						
						<li role="presentation" class="dropdown">
    <a class="dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
      Ações <span class="caret"></span>
    </a>
    <ul class="dropdown-menu">
      <li><a href="estagio.form.php">Termo de estágio</a></li>
   		<li><a href="estagio2.form.php">Termo de estágio NOVO</a></li>
   		<li><a href="convenio.form.php">Termo de convênio</a></li>
   		<li><a href="maladireta.form.php">Mala direta</a></li>
    </ul>
    </li>
    <li role="presentation" class="dropdown">
    <a class="dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
      Relatórios <span class="caret"></span>
    </a>
    <ul class="dropdown-menu">
   		<li><a href="aluno.empresa.report.php">Alunos por empresa</a></li>
      <li><a href="convenio.report.php">Termo de convênio vencendo</a></li>
   		<li><a href="estagio.vencidos.report.php">Termo de estágio vencidos</a></li>
    </ul></li>
						<li><a href="/logout">Sair</a></li>
						<!-- <li><a href="manual.pdf" target="_blank">Ajuda</a></li> -->
					</ul>
				</div>
			</div>
		</nav>
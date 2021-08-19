<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="utf-8">
  <title>CEEP - Cascavel</title>
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <meta content="" name="keywords">
  <meta content="" name="description">

  <!-- Favicons -->
  <link href="img/favicon.gif" rel="icon">
  <link href="img/ceep-touch-icon.jpg" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,700,700i|Raleway:300,400,500,700,800|Montserrat:300,400,700" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Poppins" rel="stylesheet">

  <!-- Bootstrap CSS File -->
  <link href="lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Libraries CSS Files -->
  <link href="lib/font-awesome/css/font-awesome.min.css" rel="stylesheet">
  <link href="lib/animate/animate.min.css" rel="stylesheet">
  <link href="lib/ionicons/css/ionicons.min.css" rel="stylesheet">
  <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
  <link href="lib/magnific-popup/magnific-popup.css" rel="stylesheet">

  <!-- Main Stylesheet File -->
  <link href="css/style.css" rel="stylesheet">

  <!-- =======================================================
    Theme Name: Reveal
    Theme URL: https://bootstrapmade.com/reveal-bootstrap-corporate-template/
    Author: BootstrapMade.com
    License: https://bootstrapmade.com/license/
  ======================================================= -->
</head>

<body id="body">

  <!--====================================
        Barra superior telefone e email
  ========================================-->
  <section id="topbar" class="d-none d-lg-block">
    <div class="container clearfix">
      <div class="contact-info float-left">
        <i class="fa fa-envelope-o"></i>
        <a href="mailto:admin@ceepcascavel.com.br">admin@ceepcascavel.com.br</a>
        <i class="fa fa-phone"></i> +55 (45) 3226-2369
      </div>
      <div class="social-links float-right">
        <a href="https://twitter.com/Ceep_Cvel" class="twitter">
          <i class="fa fa-twitter"></i>
        </a>
        <a href="https://www.facebook.com/ceepcascavel" class="facebook">
          <i class="fa fa-facebook"></i>
        </a>
        <!-- <a href="#" class="instagram"><i class="fa fa-instagram"></i></a> -->
        <a href="https://plus.google.com/115902271682364911708/" class="google-plus">
          <i class="fa fa-google-plus"></i>
        </a>
        <a href="https://www.youtube.com/results?search_query=ceep+cascavel" class="linkedin">
          <i class="fa fa-youtube-play"></i></a>
      </div>
    </div>
  </section>

  <!--==========================
    Header
  ============================-->
  <header id="header">
    <div class="container">

      <div id="logo" class="pull-left">
        <!-- <h1><a href="#body" class="scrollto">CEEP<span>Cascavel</span></a></h1> -->
        <!-- Uncomment below if you prefer to use an image logo -->
        <img src="{{ assets('img/logo.jpg') }}" class="logo" alt="" title="" />
      </div>

      <nav id="nav-menu-container">
        <ul class="nav-menu">
          <li class="menu-active"><a href="#body">Início</a></li>
          <!-- <li class="menu-has-children"><a href="#">Cursos</a>
            <ul>
              <li><a href="#"><span class="administracao"></span></a></li>
              <li><a href="#"><span class="edificacoes"></span></a></li>
              <li><a href="#"><span class="eletromecanica"></span></a></li>
              <li><a href="#"><span class="eletronica"></span></a></li>
              <li><a href="#"><span class="enfermagem"></span></a></li>
              <li><a href="#"><span class="informatica"></span></a></li>
              <li><a href="#"><span class="meio_ambiente"></span></a></li>
              <li><a href="#"><span class="seguranca_trabalho"></span></a></li>
            </ul>
 -->
            <!-- <ul>
              <li><a href="#">Administração</a></li>
              <li><a href="#">Edificações</a></li>
              <li><a href="#">Eletromecânica</a></li>
              <li><a href="#">Eletrônica</a></li>
              <li><a href="#">Enfermagem</a></li>
              <li><a href="#">Especialização em Enfermagem</a></li>
              <li><a href="#">Informática</a></li>
              <li><a href="#">Meio Ambiente</a></li>
              <li><a href="#">Segurança do trabalho</a></li>
            </ul>
          </li>-->
          <li><a href="#about">Notícias</a></li>
          <li><a href="#team">Links Úteis</a></li>
          <li><a href="#secretaria">Secretaria</a></li>
          <li><a href="#contato">Contato</a></li>
          <li><a href="#" data-target="#login" data-toggle="modal">Área restrita</a></li>
        </ul>
      </nav><!-- #nav-menu-container -->
    </div>
  </header><!-- #header -->



  <!--Modal box-->
  <div class="modal fade" id="login" role="dialog">
    <div class="modal-dialog">

      <!-- Modal content no 1-->
      <div class="modal-content">
        <div class="modal-header">
          <h3 class="modal-title text-center form-title">Login</h3>
         <!--  <button type="button" class="close" data-dismiss="modal">&times;</button> -->
        </div>
        <div class="modal-body padtrbl">

          <div class="login-box-body">
            <p class="login-box-msg">Por favor informe seus dados para acessar a área restrita</p>
            <div class="form-group">
              <form name="" id="loginForm">
                <div class="form-group has-feedback">
                  <!----- username -------------->
                  <input class="form-control" placeholder="Username" id="loginid" type="text" autocomplete="off" />
                  <span style="display:none;font-weight:bold; position:absolute;color: red;position: absolute;padding:4px;font-size: 11px;background-color:rgba(128, 128, 128, 0.26);z-index: 17;  right: 27px; top: 5px;" id="span_loginid"></span>
                  <!---Alredy exists  ! -->
                  <span class="glyphicon glyphicon-user form-control-feedback"></span>
                </div>
                <div class="form-group has-feedback">
                  <!----- password -------------->
                  <input class="form-control" placeholder="Password" id="loginpsw" type="password" autocomplete="off" />
                  <span style="display:none;font-weight:bold; position:absolute;color: grey;position: absolute;padding:4px;font-size: 11px;background-color:rgba(128, 128, 128, 0.26);z-index: 17;  right: 27px; top: 5px;" id="span_loginpsw"></span>
                  <!---Alredy exists  ! -->
                  <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                </div>
                <div class="modal-footer">
                <div class="row">
                  <div class="col-xs-12">
                    <button type="button" class="btn btn-green btn-flat">Entrar</button>
                  </div>
                </div>
              </div>
              </form>
            </div>
          </div>
        </div>
      </div>

    </div>
  </div>
  <!--/ Modal box-->





<section id="cursos">
    <div class="container">
        <ul class="row ml-0">
        <a class="col-lg col-md-3 col-sm-3 col-4" href="#"><li class="administracao"><span ></span></li></a>
        <a class="col-lg col-md-3 col-sm-3 col-4" href="#"><li class="edificacoes"><span ></span></li></a>
        <a class="col-lg col-md-3 col-sm-3 col-4" href="#"><li class="eletromecanica"><span ></span></li></a>
        <a class="col-lg col-md-3 col-sm-3 col-4" href="#"><li class="eletronica"><span ></span></li></a>
        <a class="col-lg col-md-3 col-sm-3 col-4" href="#"><li class="enfermagem"><span ></span></li></a>
        <a class="col-lg col-md-3 col-sm-3 col-4" href="#"><li class="informatica"><span ></span></li></a>
        <a class="col-lg col-md-3 col-sm-3 col-4" href="#"><li class="meio_ambiente"><span ></span></li></a>
        <a class="col-lg col-md-3 col-sm-3 col-4" href="#"><li class="seguranca_trabalho"><span ></span></li></a>
      </ul>
</section>


  <main id="main">
    <!--==========================
      Services Section
    ============================-->
    <section id="about">
      <div class="container">
        <div class="section-header">
          <h2>Notícias</h2>

        <div class="row">
        <div class="col-lg-12 mt-3">
            <div class="box wow fadeInLeft" data-wow-delay="0.2s">
              <h4 class="title"><a href="">Processo Seletivo - Cursos Técnicos (Integrado/Subsequente) CEEP/2018</a></h4>
              <div class="icon"><img src="img/noticias/3.jpeg" class="img-fluid"></i></div>
              <p class="description">PROCESSO SELETIVO PARA EDUCAÇÃO PROFISSIONAL EM NÍVEL TÉCNICO NAS FORMAS: INTEGRADO AO ENSINO MÉDIO E SUBSEQUENTE AO ENSINO MÉDIO PARA O 1º SEMESTRE/2018.

                  A Direção do Centro Estadual de Educação Profissional Pedro Boaretto Neto, no uso de suas atribuições, pautada na Orientação Conjunta SEED/SUED/DET e SEED/SUED/DIRPE Nº: 02/2017, e demais orientações complementares que pré-estabelecem critérios para as Inscrições e Matriculas dos Cursos Técnicos da Educação Profissional, torna pública a abertura das inscrições do Processo Seletivo para ingresso nos Cursos Técnicos na forma: Integrado ao Ensino Médio para o Ano letivo de 2018 e Subsequente ao Ensino Médio para o 1º Semestre de 2018.</p>
            </div>
          </div>


        </div>
        <div class="row">
          <div class="col-lg-6 mt-3">
            <div class="box wow fadeInRight">
              <h4 class="title"><a href="">Folder - Processo Seletivo 2018/2</a></h4>
              <div class="icon"><img src="img/noticias/2.jpg" class="img-fluid"></i></div>
              <p class="description">CLIQUE NA IMAGEM, ACESSE O FOLDE E SAIBA QUAL DOCUMENTAÇÃO NECESSÁRIA E QUAIS CURSOS SERÃO OFERTADOS.</p>
            </div>
          </div>

          <div class="col-lg-6 mt-3">
            <div class="box wow fadeInLeft" data-wow-delay="0.2s">
              <h4 class="title"><a href="">Processo Seletivo - Cursos Técnicos (Integrado/Subsequente) CEEP/2018</a></h4>
              <div class="icon"><img src="img/noticias/3.jpeg" class="img-fluid"></i></div>
              <p class="description">PROCESSO SELETIVO PARA EDUCAÇÃO PROFISSIONAL EM NÍVEL TÉCNICO NAS FORMAS: INTEGRADO AO ENSINO MÉDIO E SUBSEQUENTE AO ENSINO MÉDIO PARA O 1º SEMESTRE/2018.

                  A Direção do Centro Estadual de Educação Profissional Pedro Boaretto Neto, no uso de suas atribuições, pautada na Orientação Conjunta SEED/SUED/DET e SEED/SUED/DIRPE Nº: 02/2017, e demais orientações complementares que pré-estabelecem critérios para as Inscrições e Matriculas dos Cursos Técnicos da Educação Profissional, torna pública a abertura das inscrições do Processo Seletivo para ingresso nos Cursos Técnicos na forma: Integrado ao Ensino Médio para o Ano letivo de 2018 e Subsequente ao Ensino Médio para o 1º Semestre de 2018.</p>
            </div>
          </div>

          <div class="col-lg-6 mt-3">
            <div class="box wow fadeInRight" data-wow-delay="0.2s">
              <h4 class="title"><a href="">Reunião de Colegiado do Curso Técnico em Administração Matutino e Vespertino - 10/04/17.</a></h4>
              <div class="icon"><img src="img/noticias/1.jpg" class="img-fluid"></i></div>
              <p class="description">Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum rideta zanox satirente madera</p>
            </div>
          </div>
          <div class="col-lg-6 mt-3">
            <div class="box wow fadeInLeft" data-wow-delay="0.2s">
              <h4 class="title"><a href="">Reunião de Colegiado do Curso Técnico em Administração Matutino e Vespertino - 10/04/17.</a></h4>
              <div class="icon"><img src="img/noticias/1.jpg" class="img-fluid"></i></div>
              <p class="description">Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum rideta zanox satirente madera</p>
            </div>
            <div class="col-lg-12 mt-3">
                <div class="box wow fadeInLeft">
                <!-- <div class="icon"><i class="fa fa-bar-chart"></i></div> -->
                <h4 class="title"><a href="">RESULTADO CLASSIFICATÓRIO DE INSCRITOS POR CURSO - SUBSEQUENTE/NOTURNO - 2018/2</a></h4>
                <div class="icon"><img src="img/noticias/4.jpg" class="img-fluid"></i></div>
                <p class="description">RESULTADO CLASSIFICATÓRIO DE INSCRITOS POR CURSO TÉCNICO - SUBSEQUENTE/NOTURNO - 2018/2, OFERTADO PELO CENTRO ESTADUAL DE EDUCAÇÃO PROFISSIONAL PEDRO BOARETTO NETO - CEEP.

                    PARA VER O RESULTADO CLASSIFICATÓRIO CLIQUE     A Q U I      E VEJA NA LISTA DE CLASSIFICAÇÃO GERAL A SUA COLOCAÇÃO.</p>
                </div>
            </div>
          </div>   <div class="col-lg-6 mt-3">
            <div class="box wow fadeInRight" data-wow-delay="0.2s">
              <h4 class="title"><a href="">Reunião de Colegiado do Curso Técnico em Administração Matutino e Vespertino - 10/04/17.</a></h4>
              <div class="icon"><img src="img/noticias/1.jpg" class="img-fluid"></i></div>
              <p class="description">Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum rideta zanox satirente madera</p>
            </div>
          </div>   <div class="col-lg-6 mt-3">
            <div class="box wow fadeInLeft" data-wow-delay="0.2s">
              <h4 class="title"><a href="">Reunião de Colegiado do Curso Técnico em Administração Matutino e Vespertino - 10/04/17.</a></h4>
              <div class="icon"><img src="img/noticias/1.jpg" class="img-fluid"></i></div>
              <p class="description">Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum rideta zanox satirente madera</p>
            </div>
          </div>
        </div>

      </div>
    </section><!-- #services -->
  </main>

  <!--==========================
    Footer
  ============================-->
  <footer id="footer">
    <div class="container">
      <div class="copyright">
        Copyright © 2018  <strong>CEEP - Pedro Boaretto Neto</strong>. Todos os direitos reservados
      </div>
      <div class="credits">
        <a href="https://westsoftware.com.br/"><img src="img/links/westsoftware.png" alt="westsoftware.com.br" width="150"></a>
      </div>
    </div>
  </footer><!-- #footer -->

  <a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>

  <!-- JavaScript Libraries -->
  <script src="lib/jquery/jquery.min.js"></script>
  <script src="lib/jquery/jquery-migrate.min.js"></script>
  <script src="lib/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="lib/easing/easing.min.js"></script>
  <script src="lib/superfish/hoverIntent.js"></script>
  <script src="lib/superfish/superfish.min.js"></script>
  <script src="lib/wow/wow.min.js"></script>
  <script src="lib/owlcarousel/owl.carousel.min.js"></script>
  <script src="lib/magnific-popup/magnific-popup.min.js"></script>
  <script src="lib/sticky/sticky.js"></script>
  <!--<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD-xWexz1U57F9FvJsWM5CaP78JuV1fkV8"></script>-->
  <!-- Contact Form JavaScript File -->
 <!--  <script src="contactform/contactform.js"></script> -->

  <!-- Template Main Javascript File -->
  <script src="js/main.js"></script>

</body>
</html>

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="img/favicon.gif" rel="icon">
  <link href="img/ceep-touch-icon.jpg" rel="apple-touch-icon">
  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,700,700i|Raleway:300,400,500,700,800|Montserrat:300,400,700"
    rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Poppins" rel="stylesheet">
  <!-- Bootstrap CSS File -->
  <link href="{{ asset('lib/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
  <!-- Libraries CSS Files -->
  <link href="{{ asset('lib/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet">
  <link href="{{ asset('lib/animate/animate.min.css') }}" rel="stylesheet">
  <link href="{{ asset('lib/ionicons/css/ionicons.min.css') }}" rel="stylesheet">
  <link href="{{ asset('lib/owlcarousel/assets/owl.carousel.min.css') }}" rel="stylesheet">
  <link href="{{ asset('lib/magnific-popup/magnific-popup.css') }}" rel="stylesheet">
  <!-- Main Stylesheet File -->
  <link href="{{ asset('css/style.css') }}" rel="stylesheet">
  @toastr_css
  @yield('css')
</head>
<body>
<body id="body">
  <!--====================================
Barra superior telefone e email
========================================-->
  <section id="topbar" class="d-none d-lg-block">
    <div class="container clearfix">
      <div class="contact-info float-left">
        <i class="fa fa-envelope-o"></i>
        <a href="mailto:contato@ceepcascavel.com.br">contato@ceepcascavel.com.br</a>
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
        <img src="{{ asset('img/logo.jpg') }}" class="logo" alt="" title="" />
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
          <li><a href="/#about">Notícias</a></li>
          <li><a href="/#team">Links Úteis</a></li>
          <li><a href="/#secretaria">Secretaria</a></li>
          <li><a href="/#contato">Contato</a></li>
          <li><a href="/#" data-target="#login" data-toggle="modal">Área restrita</a></li>
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
              <form name="" id="loginForm" method="post" action="{{ route('login') }}">
                @csrf
                <div class="form-group has-feedback">
                  <!----- username -------------->
                  <input class="form-control" placeholder="Username" name="email" id="loginid" type="text" autocomplete="off" />
                  <span style="display:none;font-weight:bold; position:absolute;color: red;position: absolute;padding:4px;font-size: 11px;background-color:rgba(128, 128, 128, 0.26);z-index: 17;  right: 27px; top: 5px;"
                    id="span_loginid"></span>
                  <!---Alredy exists  ! -->
                  <span class="glyphicon glyphicon-user form-control-feedback"></span>
                </div>
                <div class="form-group has-feedback">
                  <!----- password -------------->
                  <input class="form-control" placeholder="Password" name="password" id="loginpsw" type="password" autocomplete="off" />
                  <span style="display:none;font-weight:bold; position:absolute;color: grey;position: absolute;padding:4px;font-size: 11px;background-color:rgba(128, 128, 128, 0.26);z-index: 17;  right: 27px; top: 5px;"
                    id="span_loginpsw"></span>
                  <!---Alredy exists  ! -->
                  <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                </div>
                <div class="modal-footer">
                  <div class="row">
                    <div class="col-xs-12">
                      <button type="submit" class="btn btn-green btn-flat">Entrar</button>
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
  <!--/ Modal box--
  <section id="cursos">
    <div class="container">
      <ul class="row ml-0">
        <a class="col-lg col-md-3 col-sm-3 col-3" href="#">
          <li class="administracao"><span></span></li>
        </a>
        <a class="col-lg col-md-3 col-sm-3 col-3" href="#">
          <li class="edificacoes"><span></span></li>
        </a>
        <a class="col-lg col-md-3 col-sm-3 col-3" href="#">
          <li class="eletromecanica"><span></span></li>
        </a>
        <a class="col-lg col-md-3 col-sm-3 col-3" href="#">
          <li class="eletronica"><span></span></li>
        </a>
        <a class="col-lg col-md-3 col-sm-3 col-3" href="#">
          <li class="enfermagem"><span></span></li>
        </a>
        <a class="col-lg col-md-3 col-sm-3 col-3" href="#">
          <li class="informatica"><span></span></li>
        </a>
        <a class="col-lg col-md-3 col-sm-3 col-3" href="#">
          <li class="meio_ambiente"><span></span></li>
        </a>
        <a class="col-lg col-md-3 col-sm-3 col-3" href="#">
          <li class="seguranca_trabalho"><span></span></li>
        </a>
      </ul>
  </section>-->
  <!--==========================
Intro Section
============================-->
    <div class="container-fluid">
        @yield('content')
    </div>
    @jquery
    @toastr_js
    @toastr_render
</body>
</html>

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
  <link
    href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,700,700i|Raleway:300,400,500,700,800|Montserrat:300,400,700"
    rel="stylesheet">
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
        <img src="img/logo.jpg" class="logo" alt="" title="" />
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
              <form name="" id="loginForm" method="post" action="{{ route('login') }}">
                @csrf
                <div class="form-group has-feedback">
                  <!----- username -------------->
                  <input class="form-control" placeholder="Username" name="email" id="loginid" type="text"
                    autocomplete="off" />
                  <span
                    style="display:none;font-weight:bold; position:absolute;color: red;position: absolute;padding:4px;font-size: 11px;background-color:rgba(128, 128, 128, 0.26);z-index: 17;  right: 27px; top: 5px;"
                    id="span_loginid"></span>
                  <!---Alredy exists  ! -->
                  <span class="glyphicon glyphicon-user form-control-feedback"></span>
                </div>
                <div class="form-group has-feedback">
                  <!----- password -------------->
                  <input class="form-control" placeholder="Password" name="password" id="loginpsw" type="password"
                    autocomplete="off" />
                  <span
                    style="display:none;font-weight:bold; position:absolute;color: grey;position: absolute;padding:4px;font-size: 11px;background-color:rgba(128, 128, 128, 0.26);z-index: 17;  right: 27px; top: 5px;"
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
  <!--/ Modal box-->
  <section id="cursos">
    @if ($errors->any())
    <div class='container alert alert-danger'>
      @foreach ($errors->all() as $error)
      <p>{{ $error }}</p>
      @endforeach
    </div>
    @endif
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
  </section>
  <!--==========================
Intro Section
============================-->
  <section id="intro">
    {{--    <div class="intro-content">
      <h2>Ensino técnico <span>gratúito</span><br>e de qualidade!</h2>
      <!--
<div>
<a href="#about" class="btn-get-started scrollto">Get Started</a>
<a href="#portfolio" class="btn-projects scrollto">Our Projects</a>
</div> -->
    </div>--}}
    <div id="intro-carousel" class="owl-carousel">
      <a href="https://www.ceepcascavel.com.br#secretaria"><img class="img_fluid" src="img/intro-carousel/resultado.png" /></a>
      
      
      {{-- <a href="https://www.ceepcascavel.com.br#secretariao.ceepcascavel.com.br"><img class="img_fluid" src="img/intro-carousel/expoceep.png" /></a> 
      <div class="item" style="background-image: url('img/intro-carousel/slide3.png');"></div>
      <div class="item" style="background-image: url('img/intro-carousel/slide4.png');"></div>
      <div class="item" style="background-image: url('img/intro-carousel/slide5.png');"></div>
      <div class="item" style="background-image: url('img/intro-carousel/slide6.png');"></div> --}}
    </div>
  </section><!-- #intro -->
  <main id="main">
    <!--==========================
About Section
============================-->
    <section id="asdasdasd" class="wow fadeInUp">
      <div class="container">
        <div class="row">
          <div class="col-lg-6 content">
          </div>
        </div>
      </div>
    </section><!-- #about -->
    <!--==========================
Services Section
============================-->
    <section id="about">
      <div class="container-fluid">
        <div class="section-header">
          <h2>Últimas notícias</h2>
          <div class="row">
            @foreach ($noticias as $noticia)
            <div class="col-lg-4 mt-3">
              <div class="box wow fadeInLeft">
                <!-- <div class="icon"><i class="fa fa-bar-chart"></i></div> -->
                <!--<div class="icon"><img src="{{$noticia->imagem}}" class="img-fluid"></i></div>-->
                <div class="icon"><img src="{{$noticia->imagem}}" class="img-fluid"></i></div>
                <h4 class="title"><a href="/noticia/{{$noticia->id}}">{!!$noticia->titulo!!}</a></h4>
                <p class="title" class="description">{{formatDateAndTime($noticia->created_at)}}</p>
              </div>
            </div>
            @endforeach
            <div class="row">
              @foreach ($posts as $post)
              <div class="col-xl-4 col-md-4 col-sm-12">
                <div class="card mb-4" style="min-height: 490px;">
                  <div class="box wow fadeInLeft">
                    <div class="card-content">
                      <div class="card-body">
                        <div class="icon"><img class="card-img img-fluid mb-1"
                            src="@if (isset($post['full_picture']))  {{$post['full_picture']}}  @else {{'/img/ceep.jpg'}} @endif"
                            alt="Card image cap"></div>
                        <h4 class="card-title">@if (isset($post['name'])) {{$post['name']}} @else {{'CEEP Cascavel'}}
                          @endif</h4>
                        <p class="card-text">@isset ($post['message']){!! preg_replace("(https?:\/\/.*?(
                          |.html|.php$))", "", $post['message']) !!}@endisset</p>
                        @if (isset($post['permalink_url']))
                        <a href="{{$post['permalink_url']}}" class="btn btn-primary fixed">Ler mais no face</a>
                        @endif
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              @endforeach
            </div>
          </div>
        </div>
    </section><!-- #services -->
    <!--==========================
Call To Action Section
============================-->
    <section id="call-to-action" class="wow fadeInUp">
      <div class="container">
        <div class="row">
          <div class="col-lg-9 text-center text-lg-left">
            <h3 class="cta-title">Mais notícias</h3>
            <p class="cta-text">Acesse a página específica de notícias com todas as reportagens relacionadas ao CEEP.
            </p>
          </div>
          <div class="col-lg-3 cta-btn-container text-center">
            <a class="cta-btn align-middle" href="/noticias">Ver mais notícias</a>
          </div>
        </div>
      </div>
    </section><!-- #call-to-action -->
    <!--==========================
Testimonials Section
============================--
<section id="testimonials" class="wow fadeInUp">
<div class="container">
<div class="section-header">
<h2>Social Post</h2>
<p>Últimos posts realacionados ao CEEP nas redes sociais.</p>
</div>
<div class="owl-carousel testimonials-carousel">
<div class="testimonial-item">
<p>
<img src="img/quote-sign-left.png" class="quote-sign-left" alt="">
Proin iaculis purus consequat sem cure digni ssim donec porttitora entum suscipit rhoncus. Accusantium quam, ultricies eget id, aliquam eget nibh et. Maecen aliquam, risus at semper.
<img src="img/quote-sign-right.png" class="quote-sign-right" alt="">
</p>
<img src="img/testimonial-1.jpg" class="testimonial-img" alt="">
<h3>Saul Goodman</h3>
<h4>Ceo &amp; Founder</h4>
</div>
<div class="testimonial-item">
<p>
<img src="img/quote-sign-left.png" class="quote-sign-left" alt="">
Export tempor illum tamen malis malis eram quae irure esse labore quem cillum quid cillum eram malis quorum velit fore eram velit sunt aliqua noster fugiat irure amet legam anim culpa.
<img src="img/quote-sign-right.png" class="quote-sign-right" alt="">
</p>
<img src="img/testimonial-2.jpg" class="testimonial-img" alt="">
<h3>Sara Wilsson</h3>
<h4>Designer</h4>
</div>
<div class="testimonial-item">
<p>
<img src="img/quote-sign-left.png" class="quote-sign-left" alt="">
Enim nisi quem export duis labore cillum quae magna enim sint quorum nulla quem veniam duis minim tempor labore quem eram duis noster aute amet eram fore quis sint minim.
<img src="img/quote-sign-right.png" class="quote-sign-right" alt="">
</p>
<img src="img/testimonial-3.jpg" class="testimonial-img" alt="">
<h3>Jena Karlis</h3>
<h4>Store Owner</h4>
</div>
<div class="testimonial-item">
<p>
<img src="img/quote-sign-left.png" class="quote-sign-left" alt="">
Fugiat enim eram quae cillum dolore dolor amet nulla culpa multos export minim fugiat minim velit minim dolor enim duis veniam ipsum anim magna sunt elit fore quem dolore labore illum veniam.
<img src="img/quote-sign-right.png" class="quote-sign-right" alt="">
</p>
<img src="img/testimonial-4.jpg" class="testimonial-img" alt="">
<h3>Matt Brandon</h3>
<h4>Freelancer</h4>
</div>
<div class="testimonial-item">
<p>
<img src="img/quote-sign-left.png" class="quote-sign-left" alt="">
Quis quorum aliqua sint quem legam fore sunt eram irure aliqua veniam tempor noster veniam enim culpa labore duis sunt culpa nulla illum cillum fugiat legam esse veniam culpa fore nisi cillum quid.
<img src="img/quote-sign-right.png" class="quote-sign-right" alt="">
</p>
<img src="img/testimonial-5.jpg" class="testimonial-img" alt="">
<h3>John Larson</h3>
<h4>Entrepreneur</h4>
</div>
</div>
</div>
</section><!-- #cursos -->
    <!--==========================
Our Team Section
============================-->
    <section id="team" class="wow fadeInUp">
      <div class="container">
        <div class="section-header">
          <h2>Links Úteis</h2>
        </div>
        <div class="row">
          <div class="col-lg-3 col-md-4 col-sm-6 mb-3">
            <a href="MODELO_PARA_TRABALHO_DE_PESQUISA.pdf" target="_blank">
              <div class="service-box text-center">
                <div class="icon-box">
                  <div class="pic my-1"><img class="img-fluid" src="img/links/atividades_pesquisa.png" alt=""></div>
                </div>
                <div class="icon-text">
                  <h4 class="ser-text">Modelo pesquisa</h4>
                </div>
              </div>
            </a>
          </div>
            
          <div class="col-lg-3 col-md-4 col-sm-6 mb-3">
            <a href="https://www.areadoaluno.seed.pr.gov.br" target="_blank">
              <div class="service-box text-center">
                <div class="icon-box">
                  <div class="pic my-4"><img class="img-fluid" src="img/links/area-aluno.png" alt=""></div>
                </div>
                <div class="icon-text">
                  <h4 class="ser-text">Área do aluno</h4>
                </div>
              </div>
            </a>
          </div>
          <div class="col-lg-3 col-md-4 col-sm-6 mb-3">
            <a href="/classroom/cadastro.php" target="_blank">
              <div class="service-box text-center">
                <div class="icon-box">
                  <div class="pic"><img class="img-fluid" src="img/cadastro_classroom.png" alt=""></div>
                </div>
                <div class="icon-text">
                  <h4 class="ser-text">Cadastro Google Sala de Aula</h4>
                </div>
              </div>
            </a>
          </div>
          <div class="col-lg-3 col-md-4 col-sm-6 mb-3">
            <a href="/carteirinha.php" target="_blank">
              <div class="service-box text-center">
                <div class="icon-box">
                  <div class="pic"><img class="img-fluid" src="img/carteirinha.png" alt=""></div>
                </div>
                <div class="icon-text">
                  <h4 class="ser-text">Carteirinha Estudantil</h4>
                </div>
              </div>
            </a>
          </div>
          <div class="col-lg-3 col-md-4 col-sm-6 mb-3">
            <a href="https://www.registrodeclasse.seed.pr.gov.br/rcdig/" target="_blank">
              <div class="service-box text-center">
                <div class="icon-box">
                  <div class="pic"><img class="img-fluid" src="img/links/12.png" alt=""></div>
                </div>
                <div class="icon-text">
                  <h4 class="ser-text">RCO - Registro de Classe On-line</h4>
                </div>
              </div>
            </a>
          </div>
          <div class="col-lg-3 col-md-4 col-sm-6 mb-3">
            <a href="https://seed.pr.gov.br/login.php" target="_blank">
              <div class="service-box text-center">
                <div class="icon-box">
                  <div class="pic"><img class="img-fluid" src="img/links/13.png" alt=""></div>
                </div>
                <div class="icon-text">
                  <h4 class="ser-text">E-mail Expresso</h4>
                </div>
              </div>
            </a>
          </div>
          <div class="col-lg-3 col-md-4 col-sm-6 mb-3">
            <a href="https://classroom.google.com/" target="_blank">
              <div class="service-box text-center">
                <div class="icon-box">
                  <div class="pic"><img class="img-fluid" src="img/links/7.png" alt=""></div>
                </div>
                <div class="icon-text">
                  <h4 class="ser-text">Acesso Google Sala de Aula</h4>
                </div>
              </div>
            </a>
          </div>
          {{--           <div class="col-lg-3 col-md-4 col-sm-6 mb-3">
            <a href="https://m.youtube.com/playlist?list=PLttHxRi-BIziilmn9Gbk2QHvKaTmqgx5L" target="_blank">
              <div class="service-box text-center">
                <div class="icon-box">
                  <div class="pic"><img src="img/links/14.png" alt=""></div>
                </div>
                <div class="icon-text">
                  <h4 class="ser-text">Curso Google Sala de Aula</h4>
                </div>
              </div>
            </a>
          </div> --}}
          <div class="col-lg-3 col-md-4 col-sm-6 mb-3">
            <a href="https://wwws.portaldoservidor.pr.gov.br/cchequenet/" target="_blank">
              <div class="service-box text-center">
                <div class="icon-box">
                  <div class="pic"><img class="img-fluid" src="img/links/10.png" alt=""></div>
                </div>
                <div class="icon-text">
                  <h4 class="ser-text">Consulta Contracheque</h4>
                </div>
              </div>
            </a>
          </div>
          {{-- <div class="col-lg-3 col-md-4 col-sm-6 mb-3">
            <a href="#" target="_blank">
              <div class="service-box text-center">
                <div class="icon-box">
                  <div class="pic"><img src="img/links/1.png" alt=""></div>
                </div>
                <div class="icon-text">
                  <h4 class="ser-text">Calendário Escolar</h4>
                </div>
              </div>
            </a>
          </div> --}}
          <div class="col-lg-3 col-md-4 col-sm-6 mb-3">
            <a href="http://celepar7.pr.gov.br/diplomas/login.asp?ctrl=6" target="_blank">
              <div class="service-box text-center">
                <div class="icon-box">
                  <div class="pic"><img class="img-fluid" src="img/links/5.png" alt=""></div>
                </div>
                <div class="icon-text">
                  <h4 class="ser-text">Registro de diploma</h4>
                </div>
              </div>
            </a>
          </div>
          <div class="col-lg-3 col-md-4 col-sm-6 mb-3">
            <a href="http://www4.pr.gov.br/escolas/frmPesquisaEscolas.jsp" target="_blank">
              <div class="service-box text-center">
                <div class="icon-box">
                  <div class="pic"><img class="img-fluid" src="img/links/3.png" alt=""></div>
                </div>
                <div class="icon-text">
                  <h4 class="ser-text">Consulta escola</h4>
                </div>
              </div>
            </a>
          </div>
          <div class="col-lg-3 col-md-4 col-sm-6 mb-3">
            <a href="Calendario_2020.pdf"  target="_blank">
              <div class="service-box text-center">
                <div class="icon-box">
                  <div class="pic"><img style="width:50%" src="img/links/1.png" alt=""></div>
                </div>
                <div class="icon-text">
                  <h4 class="ser-text">Calendário 2020</h4>
                </div>
              </div>
            </a>
          </div>
          <div class="col-lg-3 col-md-4 col-sm-6 mb-3">
            <a href="/biblioteca" target="_blank">
              <div class="service-box text-center">
                <div class="icon-box">
                  <div class="pic"><img style="width:50%"  src="img/links/biblioteca.png" alt=""></div>
                </div>
                <div class="icon-text">
                  <h4 class="ser-text">Biblioteca</h4>
                </div>
              </div>
            </a>
          </div>
        </div>
      </div><br><br><br><br><br>
    </section><!-- #team -->
    <!--==========================
Services Section
============================-->
    <section id="secretaria" class="wow fadeInUp"></section>
    <div class="container">
      <div class="section-header">
        <h2>Secretaria</h2>
      </div>
      <div class="row">
        @foreach ($secretarias as $secretaria)
        <div class="col-lg-12">
          <div class="box wow fadeInLeft text-justify">
            <!-- <div class="icon"><i class="fa fa-bar-chart"></i></div> -->
            <h4 class="title"><a href="/secretaria/{{$secretaria->id}}">{!!$secretaria->titulo!!}</a></h4>
            @if(isset($secretaria->imagem))
            <div class="icon"><img src="{{$secretaria->imagem}}" class="img-fluid"></i></div>
            @endif
            <p style="word-wrap: break-word;" class="description">{!!$secretaria->mensagem!!}</p>
            <!--  <p class="description">{{formatDateAndTime($secretaria->created_at)}}</p> -->
          </div>
        </div>
        @endforeach

        <!--  <div class="col-lg-12 mt-3">
          <div class="box wow fadeInLeft">
            <!-- <div class="icon"><i class="fa fa-bar-chart"></i></div> -
            <h4 class="title"><a href="">RESULTADO CLASSIFICATÓRIO DE INSCRITOS POR CURSO - SUBSEQUENTE/NOTURNO -
                2018/2</a></h4>
            <div class="icon"><img src="img/noticias/4.jpg" class="img-fluid"></i></div>
            <p class="description">RESULTADO CLASSIFICATÓRIO DE INSCRITOS POR CURSO TÉCNICO - SUBSEQUENTE/NOTURNO -
              2018/2, OFERTADO PELO CENTRO ESTADUAL DE EDUCAÇÃO PROFISSIONAL PEDRO BOARETTO NETO - CEEP.
              PARA VER O RESULTADO CLASSIFICATÓRIO CLIQUE A Q U I E VEJA NA LISTA DE CLASSIFICAÇÃO GERAL A SUA
              COLOCAÇÃO.</p>
          </div>
        </div>
        <div class="col-lg-12 mt-3">
          <div class="box wow fadeInRight">
            <h4 class="title"><a href="">Folder - Processo Seletivo 2018/2</a></h4>
            <div class="icon"><img src="img/noticias/2.jpg" class="img-fluid"></i></div>
            <p class="description">CLIQUE NA IMAGEM, ACESSE O FOLDE E SAIBA QUAL DOCUMENTAÇÃO NECESSÁRIA E QUAIS CURSOS
              SERÃO OFERTADOS.</p>
          </div>
        </div> -->
      </div>
    </div>
    </section><!-- #services -->
    <!--==========================
Call To Action Section
============================-->
    <section id="call-to-action" class="secretaria wow fadeInUp">
      <div class="container">
        <div class="row">
          <div class="col-lg-9 text-center text-lg-left">
            <h3 class="cta-title">Mais informações da secretária</h3>
            <p class="cta-text">Acesse a página da secretaria para mais informações.</p>
          </div>
          <div class="col-lg-3 cta-btn-container text-center">
            <a class="cta-btn2 align-middle" href="/informes_secretaria">Ver página da secretaria</a>
          </div>
        </div>
      </div>
    </section><!-- #call-to-action -->
    <!--==========================
Contact Section
============================-->
    <section id="contato" class="wow fadeInUp">
      <div class="container">
        <div class="section-header">
          <h2>Contato</h2>
        </div>
        <div class="row contact-info">
          <div class="col-md-4">
            <div class="contact-address">
              <h3>Endereço</h3>
              <address>Rua Natal, 2800 - Tropical - Cascavel / PR</address>
            </div>
          </div>
          <div class="col-md-4">
            <div class="contact-phone">
              <h3>Telefone</h3>
              <p><a>(45) 3226-2369</a></p>
            </div>
          </div>
          <div class="col-md-4">
            <div class="contact-email">
              <h3>Email</h3>
              <p><a>contato@ceepcascavel.com.br</a></p>
            </div>
          </div>
        </div>
      </div>
      <iframe
        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d14470.426133186565!2d-53.49120782529779!3d-24.94547056987913!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x94f3d153b5d484d1%3A0x5647507dd574586e!2sCentro+Estadual+de+Educa%C3%A7%C3%A3o+Profissional+Pedro+Boaretto+Neto!5e0!3m2!1spt-BR!2sbr!4v1534965228719"
        width="100%" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
    </section><!-- #contact -->
    <!--==========================
  About Section
  ============================-->
    <section id="asdasdasd" class="wow fadeInUp">
      <div class="container">
        <div class="row">
          <div class="col-lg-6 content">
          </div>
        </div>
      </div>
    </section><!-- #about -->
  </main>
  <!--==========================
  Footer
  ============================-->
  <footer id="footer">
    <div class="container">
      <div class="copyright">
        Copyright © 2018 <strong>CEEP - Pedro Boaretto Neto</strong>. Todos os direitos reservados
      </div>
      <div class="credits">
        <a href="https://westsoftware.com.br/"><img src="img/links/design_by.png" alt="westsoftware.com.br"
            width="300"></a>
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
  <!-- Contact Form JavaScript File
  <script src="{{ asset('js/contactform.js') }}"></script> -->
  <!-- Template Main Javascript File -->
  <script src="js/main.js"></script>
</body>

</html>
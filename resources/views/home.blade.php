@extends('layouts.app')
@php
    $tipo = $_SESSION['tipo'];
@endphp
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Painel de controle</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <section id="team1" class="wow fadeInUp">
                    <div class="row">
                        @if(Auth::user()->name == 'Central de Estagio')
                            <div class="col-lg-3 col-md-4 col-sm-6 mb-3">
                                <a href="/estagio/index.php">
                                <div class="service-box text-center">
                                    <div class="icon-box">
                                    <div class="pic" style="height: 120px;"><img src="img/estagio.jpg" alt="" class="img-fluid"></div>
                                    </div>
                                    <div class="icon-text">
                                    <h4 class="ser-text">Central de Estagio</h4>
                                    </div>
                                </div>
                                </a>
                            </div>
                            
                            @endif
                            <!-- <div class="col-lg-3 col-md-4 col-sm-6 mb-3">
                                <a href="/conselho-disciplina/create">
                                <div class="service-box text-center">
                                    <div class="icon-box">
                                    <div class="pic" style="height: 120px;"><img src="img/preconselho.jpeg" class="img-fluid" alt=""></div>
                                    </div>
                                    <div class="icon-text">
                                    <h4 class="ser-text">Registro On-line (Pré-conselho)</h4>
                                    </div>
                                </div>
                                </a>
                            </div> -->
                            <div class="col-lg-3 col-md-4 col-sm-6 mb-3">
                                <a href="{{route('conselho-registro.index')}}">
                                <div class="service-box text-center">
                                    <div class="icon-box">
                                    <div class="pic" style="height: 120px;"><img src="img/preconselho.jpeg" class="img-fluid" alt=""></div>
                                    </div>
                                    <div class="icon-text">
                                    <h4 class="ser-text">Registro Pré-conselho</h4>
                                    </div>
                                </div>
                                </a>
                            </div>
                            <div class="col-lg-3 col-md-4 col-sm-6 mb-3">
                                <a href="{{route('conselho.admin')}}">
                                <div class="service-box text-center">
                                    <div class="icon-box">
                                    <div class="pic" style="height: 120px;"><img src="img/preconselho.jpeg" class="img-fluid" alt=""></div>
                                    </div>
                                    <div class="icon-text">
                                    <h4 class="ser-text">Admin Pré-conselho</h4>
                                    </div>
                                </div>
                                </a>
                            </div>
                            
                            <div class="col-lg-3 col-md-4 col-sm-6 mb-3">
                                <a href="/planejamento">
                                <div class="service-box text-center">
                                    <div class="icon-box">
                                    <div class="pic" style="height: 120px;"><img src="img/ptd.jpeg" class="img-fluid" alt=""></div>
                                    </div>
                                    <div class="icon-text">
                                    <h4 class="ser-text">PTD</h4>
                                    </div>
                                </div>
                                </a>
                            </div>
                            {{-- <div class="col-lg-3 col-md-4 col-sm-6 mb-3">
                                <a href="http://expo.ceepcascavel.com.br">
                                <div class="service-box text-center">
                                    <div class="icon-box">
                                    <div class="pic" style=""><img src="img/expoceep.png" class="img-fluid" alt=""></div>
                                    </div>
                                    <div class="icon-text">
                                    <h4 class="ser-text"></h4>
                                    </div>
                                </div>
                                </a>
                            </div> --}}
                            <div class="col-lg-3 col-md-4 col-sm-6 mb-3">
                                <a href="{{route('conselho.report.create')}}">
                                <div class="service-box text-center">
                                    <div class="icon-box">
                                    <div class="pic" style="height: 120px;"><img src="img/estagio.jpg" alt="" class="img-fluid"></div>
                                    </div>
                                    <div class="icon-text">
                                    <h4 class="ser-text">Relatório Pré-conselho</h4>
                                    </div>
                                </div>
                                </a>
                            </div>
                            <div class="col-lg-3 col-md-4 col-sm-6 mb-3">
                                <a href="/conselho-graph-report">
                                <div class="service-box text-center">
                                    <div class="icon-box">
                                    <div class="pic" style="height: 120px;"><img src="img/rel_preconselho_totais.png" alt="" class="img-fluid"></div>
                                    </div>
                                    <div class="icon-text">
                                    <h4 class="ser-text">Totais Pré-conselho</h4>
                                    </div>
                                </div>
                                </a>
                            </div>
                            <div class="col-lg-3 col-md-4 col-sm-6 mb-3">
                                <a href="/planejamentos">
                                <div class="service-box text-center">
                                    <div class="icon-box">
                                    <div class="pic" style="height: 120px;"><img src="img/ptd.jpeg" class="img-fluid" alt=""></div>
                                    </div>
                                    <div class="icon-text">
                                    <h4 class="ser-text">PTD por Professor</h4>
                                    </div>
                                </div>
                                </a>
                            </div>
                            <div class="col-lg-3 col-md-4 col-sm-6 mb-3">
                                <a href="/biblioteca/1">
                                <div class="service-box text-center">
                                    <div class="icon-box">
                                    <div class="pic" style="height: 120px;"><img src="img/biblioteca.png" class="img-fluid" alt=""></div>
                                    </div>
                                    <div class="icon-text">
                                    <h4 class="ser-text">Biblioteca</h4>
                                    </div>
                                </div>
                                </a>
                            </div>
                            <!--<div class="col-lg-3 col-md-4 col-sm-6 mb-3">
                                <a href="/noticia">
                                <div class="service-box text-center">
                                    <div class="icon-box">
                                    <div class="pic" style="height: 120px;"><img src="img/noticias.png" class="img-fluid" alt=""></div>
                                    </div>
                                    <div class="icon-text">
                                    <h4 class="ser-text">Notícia</h4>
                                    </div>
                                </div>
                                </a>
                            </div>-->
                            <div class="col-lg-3 col-md-4 col-sm-6 mb-3">
                                <a href="/secretaria">
                                <div class="service-box text-center">
                                    <div class="icon-box">
                                    <div class="pic" style="height: 120px;"><img src="img/secretaria.png" class="img-fluid" alt=""></div>
                                    </div>
                                    <div class="icon-text">
                                    <h4 class="ser-text">Secretaria</h4>
                                    </div>
                                </div>
                                </a>
                            </div>
                            {{-- <div class="col-lg-3 col-md-4 col-sm-6 mb-3">
                                <a href="/classroom">
                                <div class="service-box text-center">
                                    <div class="icon-box">
                                    <div class="pic" style="height: 120px;"><img src="img/links/12.png" alt=""></div>
                                    </div>
                                    <div class="icon-text">
                                    <h4 class="ser-text">Usuarios Google</h4>
                                    </div>
                                </div>
                                </a>
                            </div>
                            <div class="col-lg-3 col-md-4 col-sm-6 mb-3">
                                <a href="/usuarios_internet">
                                <div class="service-box text-center">
                                    <div class="icon-box">
                                    <div class="pic"><img src="img/links/12.png" alt=""></div>
                                    </div>
                                    <div class="icon-text">
                                    <h4 class="ser-text">usuarios_internet</h4>
                                    </div>
                                </div>
                                </a>
                            </div> --}}
                            <!-- <div class="col-lg-3 col-md-4 col-sm-6 mb-3">
                                <a href="/load_usuarios">
                                <div class="service-box text-center">
                                    <div class="icon-box">
                                    <div class="pic" style="height: 120px;"><img src="img/usuario.png" class="img-fluid" alt=""></div>
                                    </div>
                                    <div class="icon-text">
                                    <h4 class="ser-text">Carregar usuários</h4>
                                    </div>
                                </div>
                                </a>
                            </div> -->
                            <div class="col-lg-3 col-md-4 col-sm-6 mb-3">
                                <a href="/users">
                                <div class="service-box text-center">
                                    <div class="icon-box">
                                    <div class="pic" style="height: 120px;"><img src="img/usuario.png" class="img-fluid" alt=""></div>
                                    </div>
                                    <div class="icon-text">
                                    <h4 class="ser-text">Usuários do site</h4>
                                    </div>
                                </div>
                                </a>
                            </div>
                            <div class="col-lg-3 col-md-4 col-sm-6 mb-3">
                                <a href="/permissions">
                                <div class="service-box text-center">
                                    <div class="icon-box">
                                    <div class="pic" style="height: 120px;"><img src="img/permission.png" class="img-fluid" alt=""></div>
                                    </div>
                                    <div class="icon-text">
                                    <h4 class="ser-text">Permissões dos usuários</h4>
                                    </div>
                                </div>
                                </a>
                            </div>
                        </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

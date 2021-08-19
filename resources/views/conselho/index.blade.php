@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Painel de controle conselho de classe</div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif

                    <section id="team1" class="wow fadeInUp">
                        <div class="row">
                            <div class="col-lg-3 col-md-4 col-sm-6 mb-3">
                                <a href="/conselho-categoria">
                                    <div class="service-box text-center">
                                        <div class="icon-box">
                                            <div class="pic" style="height: 120px;"><img src="img/preconselho.jpeg"
                                                    class="img-fluid" alt=""></div>
                                        </div>
                                        <div class="icon-text">
                                            <h4 class="ser-text">Categoria</h4>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="col-lg-3 col-md-4 col-sm-6 mb-3">
                                <a href="/conselho-informacao">
                                    <div class="service-box text-center">
                                        <div class="icon-box">
                                            <div class="pic" style="height: 120px;"><img src="img/preconselho.jpeg"
                                                    class="img-fluid" alt=""></div>
                                        </div>
                                        <div class="icon-text">
                                            <h4 class="ser-text">Informação</h4>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="col-lg-3 col-md-4 col-sm-6 mb-3">
                                <a href="/conselho-disciplina-curso">
                                    <div class="service-box text-center">
                                        <div class="icon-box">
                                            <div class="pic" style="height: 120px;"><img src="img/ptd.jpeg"
                                                    class="img-fluid" alt=""></div>
                                        </div>
                                        <div class="icon-text">
                                            <h4 class="ser-text">Disciplina</h4>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="col-lg-3 col-md-4 col-sm-6 mb-3">
                                <a href="/conselho-registro">
                                    <div class="service-box text-center">
                                        <div class="icon-box">
                                            <div class="pic" style="height: 120px;"><img src="img/ptd.jpeg"
                                                    class="img-fluid" alt=""></div>
                                        </div>
                                        <div class="icon-text">
                                            <h4 class="ser-text">Registro</h4>
                                        </div>
                                    </div>
                                </a>
                            </div>
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

                        </div>
                    </section>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
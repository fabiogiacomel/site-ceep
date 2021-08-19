
@extends('layouts.index')
@section('content')
<section id="about">
      <div class="container-fluid">
        <div class="section-header">
            <h2>Notícias</h2>
            <div class="row">
                @foreach ($noticias as $noticia)
                    <div class="col-lg-4 mt-3">
                        <div class="box wow fadeInLeft">
                            <!-- <div class="icon"><i class="fa fa-bar-chart"></i></div> -->
                            <div class="icon"><img src="{{$noticia->imagem}}" class="img-fluid"></i></div>
                            <h4 class="title"><a href="/noticia/{{$noticia->id}}">{{$noticia->titulo}}</a></h4>
                            <p class="text-justify p-3">{!!$noticia->mensagem!!}</h4>
                        </div>
                    </div>
                @endforeach
          </div>
          <div class="row">
              @foreach ($posts as $post)
                  <div class="col-xl-4 col-md-4 col-sm-12">
                      <div class="card" style="min-height: 495.883px;">
                              <div class="box wow fadeInLeft">                                   
                              <div class="card-content">
                                  <div class="card-body">
                                    <div class="icon"><img class="card-img img-fluid mb-1" src="@if (isset($post['full_picture']))  {{$post['full_picture']}}  @else {{'/img/ceep.jpg'}} @endif" alt="Card image cap"></div>
                                    <h4 class="card-title">@if (isset($post['name']))  {{$post['name']}}  @else {{'CEEP Cascavel'}} @endif</h4>
                                    <p class="card-text">@isset ($post['message']){!!  preg_replace("(https?:\/\/.*?( |.html|.php$))", "", $post['message']) !!}@endisset</p>
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
    </section><!-- #services -->
@stop

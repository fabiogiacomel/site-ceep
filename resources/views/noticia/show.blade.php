
@extends('layouts.index')
@section('content')
    <div class="section-header">
        <h2>{{$noticia->titulo}}</h2>
    </div>
    <div class="row">
        <div class="col-md-3">
            <img src="{{$noticia->imagem}}" class="img-fluid" alt="">
        </div>
        <div class="col-md-9">
            <h4 class="title">{!!$noticia->mensagem!!}</h4>
        </div>
    </div>
@stop
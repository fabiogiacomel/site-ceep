
@extends('layouts.index')
@section('content')
<section id="about">
      <div class="container-fluid">
        <div class="section-header">
            <h2>Informativos da secretaria</h2>
            <div class="row text-justify">
                @foreach ($secretaria as $s)
                    <div class="col-lg-12 mt-3">
                        <div class="box wow fadeInLeft p-4">
                            <!-- <div class="icon"><i class="fa fa-bar-chart"></i></div> -->
                            @if(isset($secretaria->imagem))
                                <div class="icon"><img src="{{$s->imagem}}" class="img-fluid"></i></div>
                            @endif
                            <h4 class="title"><a href="/secretaria/{{$s->id}}">{!!$s->titulo!!}</a></h4>
                            <p class="text-justify p-3">{!!$s->mensagem!!}</h4>
                        </div>
                    </div>
                @endforeach
          </div>
        </div>
    </section><!-- #services -->
@stop

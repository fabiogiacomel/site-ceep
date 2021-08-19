
@extends('layouts.index')
@section('content')
<section id="about">
      <div class="container-fluid">
        <div class="section-header">
            <h2>Facebook</h2>
            <div class="row">
                @foreach ($posts as $post)
                    <div class="col-xl-4 col-md-4 col-sm-12">
                        <div class="card" style="height: 595.883px;">
                                <div class="box wow fadeInLeft">                                   
                                <div class="card-content">
                                    <div class="card-body">
                                                 <div class="icon"><img class="card-img img-fluid mb-1" src="@if (isset($post['full_picture']))  {{$post['full_picture']}}  @else {{'westsoftware.png'}} @endif" alt="Card image cap"></div>
                                    <h4 class="card-title">@if (isset($post['name']))  {{$post['name']}}  @else {{'Westsoftware'}} @endif</h4>
                                    <p class="card-text">@isset ($post['message']){!!$post['message']!!}@endisset</p>
                                    <a href="#" class="btn btn-primary fixed">Ler mais no face</a>
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
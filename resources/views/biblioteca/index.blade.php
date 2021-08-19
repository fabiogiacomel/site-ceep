@extends('layouts.index')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/biblioteca.css') }}" />
    <script src="js/jspdf/build/pdf.js"></script>
@endsection

@section('content')
<div class="row">
  <div class='content-header-right col-md-12 col-12 mt-5'>
      <div class='row breadcrumbs-top'>
          <div class='breadcrumb-wrapper col-6 offset-3'>
              <form action="{{route('biblioteca.index')}}" method="GET" class='form form-horizontal'>
                  <div class="row">
                      <div class='col-md-9'>
                          <label for='curso'>Pesquise pelo título</label>
                          <input name="titulo" class='form-control' type="search" placeholder="Pesquisar...">
                      </div>
                      <div class="col-md-3">
                          <label for='curso'>&nbsp;</label>

                          <button type="submit"  class='form-control'>Pesquisar</button>
                      </div>
                  </div>
              </form>
          </div>
      </div>
  </div>
</div>



<div class="component">
    <ul class="align">

        @foreach ($documentos as $d)
      
      <!-- Book 1 -->
      <li>
        <figure class='book'>        
          <!-- Front -->        
          <ul class='hardcover_front'>
            <li>
              <img src="{{$d->imagem}}" alt="" width="100%" height="100%">
              <span class="ribbon bestseller">Nº1</span>
            </li>
            <li></li>
          </ul>        
          <!-- Pages -->        
          <ul class='page'>
            <li></li>
            <li>
              <a class="btn" href="{{$d->arquivo}}" target="blank">Download</a>
            </li>
            <li></li>
            <li></li>
            <li></li>
          </ul>        
          <!-- Back -->        
          <ul class='hardcover_back'>
            <li></li>
            <li></li>
          </ul>
          <ul class='book_spine'>
            <li></li>
            <li></li>
          </ul>
          <figcaption>
            <h1>{{$d->titulo}}</h1>
            <span>By {{$d->user->name}}</span>
            <p>Curso:  {{$d->curso2->nome}}</p>
          </figcaption>
        </figure>
      </li>  
    @endforeach           
    </ul>  
  </div>




@endsection

@section('js')

@endsection

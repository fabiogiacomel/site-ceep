@extends('layouts.app')
@section('content')

<h1>{{!$noticia==null ? 'Editar Notícia' : 'Cadastrar Notícia'}}</h1>
@if ($errors->any())
<div class='alert alert-danger'>
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif
@if (!$noticia==null)
<form method="post" action="{{route('noticia.update', ['id'=> $noticia ->id])}}" enctype="multipart/form-data">
    {!! method_field('PUT')!!}
    @else
    <form action="{{route('noticia.store')}}" method='post' enctype="multipart/form-data">
    @endif

    {{ csrf_field() }}
        <div class='form-group'>
            <label>Titulo</label>
            <input name='titulo' value='{{$noticia==null ? old("titulo") : $noticia->titulo }}' class='form-control'/>
        </div>
        <div class='form-group'>
            <label>Imagem</label>
            <input type="file" name='imagem' value='{{$noticia==null ? old("imagem") : $noticia->imagem }}' class='form-control'/>
        </div>
        <div class='form-group'>
            <label>Mensagem</label>
           {{--  <textarea id="my-editor" name='mensagem' class='form-control'>{{$noticia==null ? old("mensagem") : $noticia->mensagem }}</textarea> --}}
            <script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
            <textarea  name='mensagem'  class="form-control my-editor">{{$noticia==null ? old("mensagem") : $noticia->mensagem }}</textarea>
            <script>
              var editor_config = {
                path_absolute : "/",
                selector: "textarea.my-editor",
                plugins: [
                  "advlist autolink lists link image charmap print preview hr anchor pagebreak",
                  "searchreplace wordcount visualblocks visualchars code fullscreen",
                  "insertdatetime media nonbreaking save table contextmenu directionality",
                  "emoticons template paste textcolor colorpicker textpattern"
                ],
                toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image media",
                relative_urls: false,
                file_browser_callback : function(field_name, url, type, win) {
                  var x = window.innerWidth || document.documentElement.clientWidth || document.getElementsByTagName('body')[0].clientWidth;
                  var y = window.innerHeight|| document.documentElement.clientHeight|| document.getElementsByTagName('body')[0].clientHeight;
            
                  var cmsURL = editor_config.path_absolute + 'laravel-filemanager?field_name=' + field_name;
                  if (type == 'image') {
                    cmsURL = cmsURL + "&type=Images";
                  } else {
                    cmsURL = cmsURL + "&type=Files";
                  }
            
                  tinyMCE.activeEditor.windowManager.open({
                    file : cmsURL,
                    title : 'Filemanager',
                    width : x * 0.8,
                    height : y * 0.8,
                    resizable : "yes",
                    close_previous : "no"
                  });
                }
              };
            
              tinymce.init(editor_config);
            </script>
           
        </div>
<!--         <div class='form-group'>
            <label>mensagem_alternativa</label>
            <input name='mensagem_alternativa' value='{{$noticia==null ? old("mensagem_alternativa") : $noticia->mensagem_alternativa }}' class='form-control'/>
        </div> -->

        <input type="hidden" name='tipo' value='1' class='form-control'/>

    @if (isset($noticia))
        <button type="submit" class="btn btn-primary btn-block">Alterar</button>
    @else
        <button type="submit" class="btn btn-primary btn-block">Enviar</button>
    @endif
    </form>
    @stop

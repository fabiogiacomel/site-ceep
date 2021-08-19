@extends('layouts.app')
@section('css')
<script src="/js/jspdf/build/pdf.js"></script>

<style>
    body {
        background-image: url("{{ asset('img/bg.png') }}");
    }

    input[type='checkbox'] {
        width: 20px;
        height: 20px;
    }
    label.turma{
        position: relative;
        top: -1px;
        font-size: 1.3em;
        margin-bottom: 5px;
    }

</style>
@endsection

@section('content')
<div class='row justify-content-center'>
    <div class='col-xl-10 col-12'>
        <div class='card px-2'>
            <div class='card-header'>
                <h4 class='card-title'>{{isset($documento) ? 'Editar documento' : 'Novo documento' }}</h4>
                <a class='heading-elements-toggle'><i class='la la-ellipsis-v font-medium-3'></i></a>
            </div>
            <div class='card-content collapse show'>
                <div class='card-body'>
                    @if (isset($documento))
                  {{--   <form method='post' action="{{route('biblioteca.update', ['id'=> $documento->id])}}"
                        enctype='multipart/form-data'>
                        {!! method_field('PUT')!!} --}}
                        @else
                  <form method='POST' action="{{route('biblioteca.store')}}"class='form form-horizontal' id="formulario"  enctype='multipart/form-data'>
                        @endif
                        @csrf
                        <div class='form-body'>
                            <h4 class='form-section'><i class='icon-notebook'></i> Dados do documento</h4>
                            <div class="row">
                                <div class='col-md-12'>
                                    <label for='curso'>Curso</label>
                                    <select name="curso" class='form-control' id='curso' required>
                                        <option value="">Selecione </option>
                                        @foreach ($curso as $c)
                                        <option value="{{$c->idcurso}}" @if(isset($documento) && ($documento->curso == $c->idcurso))
                                            selected
                                            @else
                                            {{ old('curso')==$c->idcurso ? 'selected' : '' }}
                                            @endif>{{$c->nome}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class='row'><br></div>

                            <div class='row'>
                                <div class='col-md-12'>
                                    <label for='titulo'>Título do documento</label>
                                    <input type='text' id='titulo' class='form-control' placeholder=''
                                        name='titulo'
                                        value="{{$documento->titulo ?? old('titulo')}}"  required>
                                </div>
                                <div class='col-md-12'>
                                    <label for='arquivo'>Selecione o arquivo</label>
                                    <input type='file' id='arquivo' class='form-control' placeholder=''
                                        name='arquivo' value="{{$documento->arquivo ?? old('arquivo')}}"  required>
                                    <textarea style="display: none" id='imagem' name="imagem" class='form-control'></textarea>
                                </div>
                            </div>
                            <hr />
                            <div class='form-actions'>

                                <button type='submit' class='btn btn-primary'>
                                    {{isset($documento) ? 'Salvar alteração' : 'Salvar' }} <i
                                        class='ft-play'></i>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<canvas id="meuCanvas" style="display:none"></canvas>

@endsection

@section('js')

<script>
$(document).ready(function () {

    var tmppath;
    var pdfjsLib = window['pdfjs-dist/build/pdf'];
    var imagem;
   // pdfjsLib.GlobalWorkerOptions.workerSrc = "build/pdf.worker.min.js";
   var pages = [], heights = [], width = 0, height = 0, currentPage = 1;
        var scale = 1.5;
        function draw() {
            var canvas = document.createElement('canvas'), ctx = canvas.getContext('2d');
            canvas.width = width;
            canvas.height = height;
            for(var i = 0; i < pages.length; i++)
                ctx.putImageData(pages[i], 0, heights[i]);
            document.body.appendChild(canvas);
            url = canvas.toDataURL();
            console.log(url);
            $('#imagem').val(url);
        }

    $('#arquivo').change( function(e) {
        var file = e.target.files[0];
        var url = URL.createObjectURL(file);


        // var jsonfile = JSON.parse(JSON.stringify(file)), jsonurl = JSON.parse(JSON.stringify(url));
        var pdf = pdfjsLib.getDocument(url).then(function (pdf) {
            pdf.getPage(1).then(function(page) {
                var scale = 1.5; //Scala inicial desejada, ajuste como quiser

                var viewport = page.getViewport(scale);

                var canvas = document.getElementById('meuCanvas');
                var context = canvas.getContext('2d');
                canvas.height = viewport.height;
                canvas.width = viewport.width;

                var renderContext = { canvasContext: context, viewport: viewport };

                page.render(renderContext).then(function() {
                pages.push(context.getImageData(0, 0, canvas.width, canvas.height));
                heights.push(height);
                height += canvas.height;
                if (width < canvas.width) width = canvas.width;
                draw();
            });
        });
    });
        
  
});
});
</script>
@endsection

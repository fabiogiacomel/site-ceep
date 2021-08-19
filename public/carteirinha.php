<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.js"></script>
    <title>Carteirinha</title>
    <style>
        iframe { width : 640;
        position: absolute;
        left: 50%;
        margin-left: -320px;
        }

        .jconfirm .jconfirm-scrollpane {
            width: 500px !important;
            position: absolute !important; 
            left: 50% !important;
            margin-left: -250px !important; 
        }
    </style>
</head>
<body>
<iframe src="https://docs.google.com/forms/d/e/1FAIpQLScgLz4cGOK0qTjCOiixsgLQH4rzE9lzkOR5sIQVM6RcYo7dEw/viewform?embedded=true" width="640" height="1351" frameborder="0" marginheight="0" marginwidth="0">Carregando…</iframe>    
<script>
$.confirm({
    title: 'Aviso importante!',
    content: 'A confecção da carteirinha tem um custo de R$ 10,00.<br> O Aluno deve efetuar o pagamento no período máximo de 3 dias, na sala da coordenação do CELEM com Alice (Manhã e Tarde) ou na sala ao lado da direção com Rita (Tarde e Noite).',
    draggable: true,
    buttons: {   
        ok: {
            text: "OK!",
            btnClass: 'btn-primary',
            keys: ['enter'],
            action: function(){
                 console.log('O aluno aceitou');
            }
        }
    }
});
</script>
</body>
</html>
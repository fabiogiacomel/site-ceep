@extends('layouts.index')

@section('title', 'Anúncios')

@section('css')
    <link type="text/css" rel="stylesheet" href="{{ asset('css/error.css')}}" />
    
    <!-- <!DOCTYPE html>
<html lang="pt-BR">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags --

	<title>Página não encontrada</title>

	<!-- Google font --
	<link href="https://fonts.googleapis.com/css?family=Quicksand:700" rel="stylesheet">

	<!-- Font Awesome Icon 
	<link type="text/css" rel="stylesheet" href="css/font-awesome.min.css" />--

	<!-- Custom stlylesheet --
	<link type="text/css" rel="stylesheet" href="css/error.css" />

	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries --
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// --
	<!--[if lt IE 9]>
		  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
		  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<![endif]--
</style>-->
@endsection

@section('content')

	<div id="notfound">
		<div class="notfound">
			<div class="notfound-bg">
				<div></div>
				<div></div>
				<div></div>
			</div>
			<h1>Oops!</h1>
			<h2>Error 404 : Página não encontrada</h2>
			<a href="/">Voltar para a página principal</a>
			<div class="notfound-social">
				<a href="https://www.facebook.com/ceepcascavel"><i class="fa fa-facebook"></i></a>
				<a href="https://twitter.com/Ceep_Cvel"><i class="fa fa-twitter"></i></a>
				<a href="https://www.youtube.com/results?search_query=ceep+cascavel"><i class="fa fa-youtube-play"></i></a>
				<a href="https://plus.google.com/115902271682364911708/"><i class="fa fa-google-plus"></i></a>
			</div>
		</div>
	</div>

@endsection
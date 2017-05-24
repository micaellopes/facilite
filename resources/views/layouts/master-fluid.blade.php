<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

	<title>@yield('title')</title>

	{{-- Bootstrap CSS --}}
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">

    {{-- CSS --}}
    {{-- <link href="{{ asset('css/style.css') }}" rel="stylesheet"> --}}
    <link href="{{ asset('css/dashboard-style.css') }}" rel="stylesheet">

    {{-- Fonts --}}
    <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
	@stack('styles')
</head>
<body>

	@yield('navbar')
	
	<div class="container-fluid">
		@yield('content')
	</div>

	@yield('footer')

	{{-- JS Bootstrap Archives --}}
	<script src="{{ asset('js/jquery.min.js') }}"></script>
	<script src="{{ asset('js/bootstrap.min.js') }}"></script>
	{{-- Tooltips Bootstrap --}}
  	<script src="{{ asset('js/tooltips.js') }}"></script>

	@stack('scripts')
</body>
</html>
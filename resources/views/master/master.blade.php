<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="X-UA-Compatile" content="ie=edge">
	
	<link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/font-awesome.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/prettyPhoto.css') }}" rel="stylesheet">
    <link href="{{ asset('css/price-range.css') }}" rel="stylesheet">
    <link href="{{ asset('css/animate.css') }}" rel="stylesheet">
	<link href="{{ asset('css/main.css') }}" rel="stylesheet">
	<link href="{{ asset('css/responsive.css') }}" rel="stylesheet">
	<title>@yield('title')</title>
	
	{{-- css chung --}}
</head>
<body>
	
	{{-- Goi code trang header --}}
	@include('master.header')

	

	{{-- Noi chua noi dung thay doi --}}
	@yield('content')

	


	{{-- goi code trang footer --}}
	@include('master.footer')

	{{-- js chung --}}
	
	<script src="{{ asset('js/jquery.js') }}"></script>
	<script src="{{ asset('js/bootstrap.min.js') }}"></script>
	<script src="{{ asset('js/jquery.scrollUp.min.js') }}"></script>
	<script src="{{ asset('js/price-range.js') }}"></script>
    <script src="{{ asset('js/jquery.prettyPhoto.js') }}"></script>
    <script src="{{ asset('js/main.js') }}"></script>	
</body>
</html>
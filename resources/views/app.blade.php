<!doctype html>
<html class="no-js" lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="x-ua-compatible" content="ie=edge">

	<title>@yield('title')</title>
	
	<meta name="description" content="">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<link rel="shortcut icon" type="image/x-icon" href="{{asset('assets/images/repairlogo.png')}}">
	<link rel="stylesheet" href="{{asset('assets/css/bootstrap.min.css')}}">
	<link rel="stylesheet" href="{{asset('assets/css/icon-font.min.css')}}">
	<link rel="stylesheet" href="{{asset('assets/css/plugins.css')}}">
	<link rel="stylesheet" href="{{asset('assets/css/style.css')}}">
	<script src="{{asset('assets/js/vendor/modernizr-2.8.3.min.js')}}"></script>

	@yield('css-plus')
</head>

<body>
	@include('components.header')

	@yield('content')

	<script src="{{asset('assets/js/vendor/jquery-1.12.4.min.js')}}"></script>
	<script src="{{asset('assets/js/popper.min.js')}}"></script>
	<script src="{{asset('assets/js/bootstrap.min.js')}}"></script>
	<script src="{{asset('assets/js/plugins.js')}}"></script>
	<script src="{{asset('assets/js/main.js')}}"></script>

	@yield('js-plus')
</body>

</html>
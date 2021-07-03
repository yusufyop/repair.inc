<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>@yield('title')</title>

	<link rel="stylesheet" href="{{asset('assets/admin/assets/css/bootstrap.css')}}">
	<link rel="stylesheet" href="{{asset('assets/admin/assets/vendors/chartjs/Chart.min.css')}}">
	<link rel="stylesheet" href="{{asset('assets/admin/assets/vendors/perfect-scrollbar/perfect-scrollbar.css')}}">
	<link rel="stylesheet" href="{{asset('assets/admin/assets/css/app.css')}}">
	<link rel="shortcut icon" href="{{asset('assets/admin/assets/images/favicon.svg')}}" type="image/x-icon">

	<link rel="stylesheet" href="{{asset('assets/admin/assets/vendors/choices.js/choices.min.css')}}" />

	<link rel="stylesheet" href="{{asset('assets/admin/assets/vendors/simple-datatables/style.css')}}">
</head>
<body>

	@include('components.dashboard.sidebar')
	@include('components.dashboard.header')
	
	<div id="app">
		<div id="main">
			<div class="main-content container-fluid">
				@yield('content')
			</div>
		</div>
	</div>

	<script src="{{asset('assets/admin/assets/js/feather-icons/feather.min.js')}}"></script>
	<script src="{{asset('assets/admin/assets/vendors/perfect-scrollbar/perfect-scrollbar.min.js')}}"></script>
	<script src="{{asset('assets/admin/assets/js/app.js')}}"></script>

	<script src="{{asset('assets/admin/assets/vendors/simple-datatables/simple-datatables.js')}}"></script>
	<script src="{{asset('assets/admin/assets/js/vendors.js')}}"></script>

	<script src="{{asset('assets/admin/assets/vendors/choices.js/choices.min.js')}}"></script>

	<script src="{{asset('assets/admin/assets/js/main.js')}}"></script>

	@yield('js-plus')
</body>
</html>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<meta name="keywords" content="" />
		<meta name="description" content="" />
		<meta name="language" content="fa" />
		<meta name="csrf-token" content="{{ csrf_token() }}" />
		<title>نغمه ماندگار | @yield('title')</title>
		<link rel="stylesheet" type="text/css" href="{{ config('app.url').'css/bootstrap.min.css' }}">
		<link rel="stylesheet" type="text/css" href="{{ config('app.url').'css/Admin.css' }}">
		<link rel="stylesheet" type="text/css" href="{{ config('app.url').'css/all.min.css' }}">
	</head>
	<body>
		@include('Partials.adminHeader')
		@yield('content')
		<script type="text/javascript" src="{{ config('app.url').'js/jquery.min.js' }}"></script>
		<script type="text/javascript" src="{{ config('app.url').'js/popper.min.js' }}"></script>
		<script type="text/javascript" src="{{ config('app.url').'js/bootstrap.min.js' }}"></script>
		<script type="text/javascript" src="{{ config('app.url').'js/all.min.js' }}"></script>
		<script type="text/javascript" src="{{ config('app.url').'js/sweetalert.min.js' }}"></script>
		<script type="text/javascript" src="{{ config('app.url').'js/Admin/Regulation.js' }}"></script>
		<script type="text/javascript" src="{{ config('app.url').'js/Admin/Authorities.js' }}"></script>
		<script type="text/javascript">
			$(function () {
				  $('[data-toggle="tooltip"]').tooltip()
				})
		</script>
	</body>
</html>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<meta name="keywords" content="" />
		<meta name="description" content="" />
		<meta name="language" content="fa" />
		<meta name="author" content="روزبه شفیعی بافتی" />
		<meta name="csrf-token" content="{{ csrf_token() }}" />
		<title>نغمه ماندگار | @yield('title')</title>
		<link rel="stylesheet" type="text/css" href="{{ config('app.url').'css/bootstrap.min.css' }}">
		<link rel="stylesheet" type="text/css" href="{{ config('app.url').'css/Admin.css' }}">
		<link rel="stylesheet" type="text/css" href="{{ config('app.url').'css/all.min.css' }}">
		<link rel="stylesheet" type="text/css" href="{{ config('app.url').'css/jquery-ui.min.css' }}">
		<link rel="stylesheet" type="text/css" href="{{ config('app.url').'css/templatemo-style.css' }}">
		<link rel="stylesheet" type="text/css" href="{{ config('app.url').'css/home.css' }}">
	</head>
	<body>
		@include('Partials.mainHeader')
        @yield('content')
		@include('Partials.mainFooter')
    </body>
    <script type="text/javascript" src="{{ config('app.url').'js/jquery.min.js' }}"></script>
		<script type="text/javascript" src="{{ config('app.url').'js/jquery-ui.min.js' }}"></script>
		<script type="text/javascript" src="{{ config('app.url').'js/popper.min.js' }}"></script>
		<script type="text/javascript" src="{{ config('app.url').'js/bootstrap.min.js' }}"></script>
		<script type="text/javascript" src="{{ config('app.url').'js/all.min.js' }}"></script>
		<script type="text/javascript" src="{{ config('app.url').'js/sweetalert.min.js' }}"></script>
		<script type="text/javascript">
			$(function () {
				  $('[data-toggle="tooltip"]').tooltip()
				});
				var Height = $( document ).height() + 'px';
				$('#SideBare').css('height',Height) ;
		</script>
</html>
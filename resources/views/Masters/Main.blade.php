<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<meta name="csrf-token" content="{{ csrf_token() }}" />
		<meta name="keywords" content="" />
		<meta name="description" content="" />
		<meta name="language" content="fa" />
		<meta name="author" content="روزبه شفیعی بافتی" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<title>نغمه ماندگار | @yield('title')</title>
		<link rel="manifest" href="{{ config('app.url').'manifest.json' }}">
		<link rel="stylesheet" type="text/css" href="{{ config('app.url').'css/bootstrap.min.css' }}">
		<link rel="stylesheet" type="text/css" href="{{ config('app.url').'css/Admin.css' }}">
		<link rel="stylesheet" type="text/css" href="{{ config('app.url').'css/all.min.css' }}">
		<link rel="stylesheet" type="text/css" href="{{ config('app.url').'css/jquery-ui.min.css' }}">
		<link rel="stylesheet" type="text/css" href="{{ config('app.url').'css/templatemo-style.css' }}">
		<link rel="stylesheet" type="text/css" href="{{ config('app.url').'css/home.css' }}">
		<link rel="stylesheet" type="text/css" href="{{ config('app.url').'css/header.css' }}">
		<link rel="stylesheet" type="text/css" href="{{ config('app.url').'css/footer.css' }}">
		<link rel="stylesheet" type="text/css" href="{{ config('app.url').'css/history.css' }}">
		<link rel="stylesheet" type="text/css" href="{{ config('app.url').'css/chart.css' }}">
		<link rel="stylesheet" type="text/css" href="{{ config('app.url').'css/ethics.css' }}">
		<link rel="stylesheet" type="text/css" href="{{ config('app.url').'css/regulation.css' }}">
		<link rel="stylesheet" type="text/css" href="{{ config('app.url').'css/form.css' }}">
		<link rel="stylesheet" type="text/css" href="{{ config('app.url').'css/authorities.css' }}">
		<link rel="stylesheet" type="text/css" href="{{ config('app.url').'css/news.css' }}">
		<link rel="stylesheet" type="text/css" href="{{ config('app.url').'css/newsReadMore.css' }}">
		<link rel="stylesheet" type="text/css" href="{{ config('app.url').'css/pagination.css' }}">
		<link rel="stylesheet" type="text/css" href="{{ config('app.url').'css/representation.css' }}">
		<link rel="stylesheet" type="text/css" href="{{ config('app.url').'css/readMoreRepresentation.css' }}">
		<link rel="stylesheet" type="text/css" href="{{ config('app.url').'css/membership.css' }}">
		<link rel="stylesheet" type="text/css" href="{{ config('app.url').'css/search.css' }}">
		<link rel="stylesheet" type="text/css" href="{{ config('app.url').'css/activities.css' }}">
		<link rel="stylesheet" type="text/css" href="{{ config('app.url').'css/activity.css' }}">
		<link rel="stylesheet" type="text/css" href="{{ config('app.url').'css/allActivities.css' }}">
	</head>
	<body >
		<div class="No-PreView">
			<p class="mt-5 mr-2 ml-2 text-center alert alert-warning">نمایشگر شما برای نمایش سایت نغمه ماندگار مناسب نیست، لطفا از نمایشگر بزرگتری استفاده کنید</p>
		</div>
		<div class="Body-Heigh-level">
    		@yield('content')
			<script type="text/javascript" src="{{ config('app.url').'js/jquery.min.js' }}"></script>
			<script type="text/javascript" src="{{ config('app.url').'js/jquery-ui.min.js' }}"></script>
			<script type="text/javascript" src="{{ config('app.url').'js/popper.min.js' }}"></script>
			<script type="text/javascript" src="{{ config('app.url').'js/bootstrap.min.js' }}"></script>
			<script type="text/javascript" src="{{ config('app.url').'js/all.min.js' }}"></script>
			<script type="text/javascript" src="{{ config('app.url').'js/sweetalert.min.js' }}"></script>
			<script type="text/javascript" src="{{ config('app.url').'js/Main/home.js' }}"></script>
			<script type="text/javascript" src="{{ config('app.url').'js/Main/register.js' }}"></script>
			<script type="text/javascript" src="{{ config('app.url').'js/Main/pagination.js' }}"></script>
			<script type="text/javascript" src="{{ config('app.url').'js/Main/activity.js' }}"></script>
			<script type="text/javascript">
				$(function () {
					$('[data-toggle="tooltip"]').tooltip()
					});
					var Height = $( document ).height() + 'px';
					$('#SideBare').css('height',Height) ;
			</script>
		</div>
  </body>
</html>
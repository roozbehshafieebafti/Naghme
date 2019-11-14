<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<meta name="language" content="fa" />
		<meta name="keywords" content="نغمه ماندگار، کرمان، موسیقی، هنری، سمن، جوانان، انجمن، انجمن نغمه ماندگار، ایران، عکاسی، تئاتر، نمایش، سینما، نقاشی، معماری، تجسمی" />
		<meta name="description" content="انجمن مردم نهاد نغمه ماندگار با محوریت هنری- ادبی (موسیقی، عکس و...) با مرکزیت استان کرمان از سال 1387 آغاز به فعالیت نموده است."/>
		<meta name="author" content="roozbe shafiee bafti: roozbehp.shafiee@gmail.com" />
		<meta name="copyright" content="کليه حقوق مادي و معنوي اين سايت محفوظ و متعلق به انجمن نغمه ماندگار مي باشد.">
		<meta name="owner" content="انجمن نغمه ماندگار">
		<meta name="csrf-token" content="{{ csrf_token() }}" />
		<meta name="theme-color" content="#000000"/>
		<meta name="msapplication-navbutton-color" content="#000000"/>
		<meta name="apple-mobile-web-app-status-bar-style" content="#000000"/>
		<title>نغمه ماندگار | @yield('title')</title>
		<link rel="shortcut icon" type="image/png" href="{{ config('app.url').'picture/logos/64x64.png' }}">
		<link rel="stylesheet" type="text/css" href="{{ config('app.url').'css/app.css' }}">
	</head>
	<body style="direction:rtl;background-color:rgb(239,239,239)">
		<div >
			<div>
				@include('Partials.adminSideBar')
			</div>
			<div style="float:left;width:80%;" class="c0l-10" >
				@include('Partials.adminHeader')
				<div style="" class="container">
					@yield('content')
				</div>
			</div>
		</div>
		<script type="text/javascript" src="{{ config('app.url').'js/jquery.min.js' }}"></script>
		<script type="text/javascript" src="{{ config('app.url').'js/jquery-ui.min.js' }}"></script>
		<script type="text/javascript" src="{{ config('app.url').'js/popper.min.js' }}"></script>
		<script type="text/javascript" src="{{ config('app.url').'js/bootstrap.min.js' }}"></script>
		<script type="text/javascript" src="{{ config('app.url').'js/all.min.js' }}"></script>
		<script type="text/javascript" src="{{ config('app.url').'js/sweetalert.min.js' }}"></script>
		<script type="text/javascript" src="{{ config('app.url').'js/tinymce.min.js' }}"></script>
		<script type="text/javascript" src="{{ config('app.url').'js/Admin/Regulation.js' }}"></script>
		<script type="text/javascript" src="{{ config('app.url').'js/Admin/Authorities.js' }}"></script>
		<script type="text/javascript" src="{{ config('app.url').'js/Admin/Form.js' }}"></script>
		<script type="text/javascript" src="{{ config('app.url').'js/Admin/News.js' }}"></script>
		<script type="text/javascript" src="{{ config('app.url').'js/Admin/User.js' }}"></script>
		<script type="text/javascript" src="{{ config('app.url').'js/Admin/Post.js' }}"></script>
		<script type="text/javascript" src="{{ config('app.url').'js/Admin/Slider.js' }}"></script>
		<script type="text/javascript">
			$(function () {$('[data-toggle="tooltip"]').tooltip()});var Height = $( document ).height() + 'px';$('#SideBare').css('height',Height) ;
		</script>
	</body>
</html>
<!doctype html>
<html lang="en" class="h-100">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="">
	<meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
	<meta name="generator" content="Hugo 0.88.1">
	<title>Telzir Telecom - @yield('title')</title>

	<!-- Bootstrap core CSS -->
	<link rel="stylesheet" href="{{ asset('css/bootstrap/bootstrap.min.css') }}">

	<style>
		.bd-placeholder-img {
			font-size: 1.125rem;
			text-anchor: middle;
			-webkit-user-select: none;
			-moz-user-select: none;
			-ms-user-select: none;
			user-select: none;
		}

		@media (min-width: 768px) {
			.bd-placeholder-img-lg {
				font-size: 3.5rem;
			}
		}
	</style>
	
	<!-- Custom styles for this template -->
	<link href="{{ asset('css/sticky-footer-navbar.css') }}" rel="stylesheet">
</head>
<body class="d-flex flex-column h-100">
	@include('site.layouts._partials.header')

	@include('site.layouts._partials.content')
	
	@include('site.layouts._partials.footer')

	<script src="{{ asset('js/jquery-3.6.0.min.js') }}"></script>
	<script src="{{ asset('js/bootstrap/bootstrap.min.js') }}"></script>

	<script>
		$(document).ready(function() {
   			$('.load').fadeOut('slow');
		});
	</script>
</body>
</html>

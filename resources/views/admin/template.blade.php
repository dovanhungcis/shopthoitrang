<!DOCTYPE html>
<html lang="en">
<head>
<!-- META SECTION -->
<title>@yield('title')</title> @include('admin.partials.css')
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="X-UA-Compatible" content="IE=edge" />
<meta name="viewport" content="width=device-width, initial-scale=1" />
<meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<body>
	<!-- START PAGE CONTAINER -->
	<div class="page-container">
		@include('admin.partials.sidebar')
		<!-- PAGE CONTENT -->
		<div class="page-content">@include('admin.partials.header')
			@yield('content')</div>
		<!-- END PAGE CONTENT -->
	</div>
	<!-- END PAGE CONTAINER -->

	<!-- START PRELOADS -->
	<audio id="audio-alert" src="{!!asset('/admin1/audio/alert.mp3')!!}"
		preload="auto"></audio>
	<audio id="audio-fail" src="{!!asset('admin1/audio/fail.mp3')!!}"
		preload="auto"></audio>
	<!-- END PRELOADS -->
	<!-- START SCRIPTS -->
	@include('admin.partials.js') @yield('script')
	<!-- END SCRIPTS -->
</body>
</html>







@include('partials.header')
<body id="simolux-responsive-shopify-theme" class="template-index">
	@include('partials.menu')
	<main class="wrapper main-content fade out">
	@include('partials.banner')
	<div class="container">
		<div class="row">
			@include('partials.sidebar') 
			@yield('container')</div>
	</div>
	</main>
</body>
@include('partials.footer')

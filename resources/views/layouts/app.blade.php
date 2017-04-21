@include('partials.header')
 
	@include('partials.menu')
	@include('partials.search')
	@yield('container')
	@include('partials.sidebar')
 	
@include('partials.footer')
@yield('script')

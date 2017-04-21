<header class="site-header">
	<div class="site-header__wrapper  js-sticky">
		<div class="site-header__container">
			<div class="header flexbox">
				<div class="header-component  header-component--left">
					<ul class="nav  site-header__menu">
						<li><a class="social-icon"><i class="fa fa-facebook"
								aria-hidden="true"></i></a></li>
						<li><a class="social-icon"><i class="fa fa-instagram"
								aria-hidden="true"></i></a></li>
						<li><a class="social-icon"><i class="fa fa-rss fa-5"
								aria-hidden="true"></i></a></li>
					</ul>
				</div>
				<div
					class="header-component  header-component--center header-transition--image-to-text">
					<div class="site-header__branding">
						<h1 class="site-title site-title--image">
							<a class="site-logo  site-logo--image   " href="{{url('/')}}"
								title="Leflair Style Guide" rel="home"> <img
								src="{{url('img/style-guide-logo.png')}}" rel="logo"
								alt="Leflair Style Guide" />
							</a>
						</h1>
						<p class="site-header__description"></p>
					</div>
					<h1 class="site-title  site-title--small">
						<a href="{{url('/')}}">Leflair Style Guide</a>
					</h1>
				</div>
				<div class="header-component  header-component--right">
					<ul class="nav  site-header__menu">
						<li class="search-trigger"><a href="#" class="js-search-trigger"><i
								class="fa fa-search"></i></a></li>
					</ul>
				</div>
			</div>
			<nav class="navigation  navigation--main" id="js-navigation--main">
				<h2 class="accessibility">Primary Navigation</h2>
				<ul id="menu-main-menu" class="nav--main">
					@foreach($categoriesBlog as $cate)
					<li id="menu-item-10025"
						class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-10025"><a
						title="{{$cate->name}}" href="/category/{{$cate->slug}}">{{$cate->name}}</a></li>
					@endforeach
				</ul>
			</nav>
			<!-- .navigation  .navigation- -main -->
		</div>
		<!-- .site-header__container -->
	</div>
	<!-- .site-header__wrapper -->
</header>
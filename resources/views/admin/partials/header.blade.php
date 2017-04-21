<!-- START X-NAVIGATION VERTICAL -->
<ul class="x-navigation x-navigation-horizontal x-navigation-panel">
	<!-- TOGGLE NAVIGATION -->
	<li class="xn-icon-button"><a href="#" class="x-navigation-minimize"><span
			class="fa fa-dedent"></span></a></li>
	<!-- END TOGGLE NAVIGATION -->
	<!-- SEARCH -->
	<li class="xn-search">
		<form role="form">
			<input type="text" name="search" placeholder="Search..." />
		</form>
	</li>
	<!-- END SEARCH -->
	<!-- POWER OFF -->
	<li class="xn-icon-button pull-right last"><a
		href="{{route('admin@logout')}}"><span class="fa fa-power-off"></span></a>
	</li>
	<!-- END POWER OFF -->
	<!-- LANG BAR -->
	<li class="xn-icon-button pull-right"><a href="#"><span
			class="flag flag-gb"></span></a>
		<ul class="xn-drop-left xn-drop-white animated zoomIn">
			<li><a href="{{URL::asset('')}}language/en"><span class="flag flag-gb"></span> English</a></li>
			<li><a href="{{URL::asset('')}}language/vi"><span class="flag flag-vn"></span> Vietnamese</a></li>
		</ul></li>
	<!-- END LANG BAR -->
</ul>
<!-- END X-NAVIGATION VERTICAL -->

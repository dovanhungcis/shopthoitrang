<!-- START PAGE SIDEBAR -->
<div class="page-sidebar">
	<!-- START X-NAVIGATION -->
	<ul class="x-navigation">
		<li class="xn-logo"><a href="{{route('admin@dashboard')}}">ATLANT</a>
			<div class="profile">
				<div class="profile-image">
					<img
						src="{{asset('/admin1/assets/uploads/'.Sentinel::getUser()->avatar)}}"
						alt="John Doe" />
				</div>
				<div class="profile-data">
					<div class="profile-data-name">{{Sentinel::getUser()->first_name}}
						{{Sentinel::getUser()->last_name}}</div>
					<div class="profile-data-title">{{Sentinel::getUser()->email}}</div>
				</div>
				<div class="profile-controls">
					<a href="{{route('admin@profile')}}" class="profile-control-left"><span
						class="fa fa-info"></span></a> <a href="pages-messages.html"
						class="profile-control-right"><span class="fa fa-envelope"></span></a>
				</div>
			</div></li>

		<li class="xn-openable active"><a href="#"><span
				class="fa fa-dashboard"></span> <span class="xn-text">{{trans('app.dashboard')}}</span></a>
			<ul>
				<li><a href="{{route('admin@user@user')}}"><span class="xn-text">Users</span></a>
					<div class="informer informer-danger">New!</div></li>
			</ul>
			<ul>
				<li><a href="{{route('admin@user@customer')}}"><span class="xn-text">{{trans('app.customers')}}</span></a>

			</ul>
		</li>

		<li class="xn-title">{{trans('app.manager')}}</li>
		<li class="xn-openable active"><a href="#"><span
				class="fa fa-dashboard"></span> <span class="xn-text">{{trans('app.blog')}}</span></a>
			<ul>
				<li><a href="{{route('admin@category@category')}}"><span
						class="xn-text">{{trans('app.categories')}}</span></a>

				<li><a href="{{route('admin@post@post')}}"><span class="xn-text">{{trans('app.posts')}}</span></a>

			</ul></li>
		<li class="xn-openable active"><a href="#"><span
				class="fa fa-dashboard"></span> <span class="xn-text">{{trans('app.shop')}}</span></a>
			<ul>

				<li><a href="{{route('admin@supplier@supplier')}}"><span class="xn-text">{{trans('app.supplier')}}</span></a>

				<li><a href="{{route('admin@item@item')}}"><span class="xn-text">{{trans('app.item')}}</span></a>

				<li><a href="{{route('admin@sale@sale')}}"><span class="xn-text">{{trans('app.sale')}}</span></a>

				<li><a href="{{route('admin@product@product')}}"><span class="xn-text">{{trans('app.product')}}</span></a>

				<li><a href="{{route('admin@invoice@invoice')}}"><span class="xn-text">{{trans('app.invoice')}}</span></a>

			</ul></li>
	</ul>
	<!-- END X-NAVIGATION -->
</div>
<!-- END PAGE SIDEBAR -->

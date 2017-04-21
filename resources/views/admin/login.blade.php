<!DOCTYPE html>
<html lang="en" class="body-full-height">
<head>
<!-- META SECTION -->
<title>Login</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="X-UA-Compatible" content="IE=edge" />
<meta name="viewport" content="width=device-width, initial-scale=1" />
<link rel="icon" href=" {!!asset('/admin1/favicon.ico')!!}"
	type="image/x-icon" />
<!-- END META SECTION -->
<!-- CSS INCLUDE -->
<link rel="stylesheet" type="text/css" id="theme"
	href=" {!! asset('/admin1/css/theme-forest.css')!!}" />
</head>
<body>

	<div class="login-container">

		<div class="login-box animated fadeInDown">
			<div>
				<img style="max-width: 400px" alt="logo"
					src="{!! asset('/admin1/img/logo-lr3.png')!!}">
			</div>
			<div class="login-body">
				<div class="login-title">
					<strong>Welcome</strong>, Please login
				</div>
				<form action="{{route('admin@postLogin')}}" class="form-horizontal"
					method="post">
					<input type="hidden" name="_token" value="{{ csrf_token() }}">
					@if(session('err'))
					<div class="form-group">
						<div class="col-md-12">
							<div class="alert alert-warning" role="alert">{{ session('err')
								}}</div>
						</div>
					</div>
					@endif
					<div class="form-group">
						<div class="col-md-12">
							<input type="email" class="form-control" placeholder="Email"
								name="email" />
						</div>
					</div>
					<div class="form-group">
						<div class="col-md-12">
							<input type="password" class="form-control"
								placeholder="Password" name="password" />
						</div>
					</div>
					<div class="form-group">
						<div class="col-md-12">
							<input type="checkbox" name="remember" value="1"> Remember me
						</div>
					</div>
					<div class="form-group">
						<div class="col-md-6">
							<a href="/forgot-password" class="btn btn-link btn-block">Forgot
								your password?</a>
						</div>
						<div class="col-md-6">
							<button class="btn btn-info btn-block">Login</button>
						</div>
					</div>
				</form>
			</div>
			<div class="login-footer">
				<div class="pull-left">&copy; 2017 Co-well Asia</div>
				<div class="pull-right">
					<a href="#">About</a> | <a href="#">Privacy</a> | <a href="#">Contact
						Us</a>
				</div>
			</div>
		</div>

	</div>

</body>
</html>







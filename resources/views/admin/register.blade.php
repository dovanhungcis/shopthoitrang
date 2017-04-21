<!DOCTYPE html>
<html lang="en" class="body-full-height">
<head>
<!-- META SECTION -->
<title>Register</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="X-UA-Compatible" content="IE=edge" />
<meta name="viewport" content="width=device-width, initial-scale=1" />
<link rel="icon" href=" {!!asset('/admin1/favicon.ico')!!}"
	type="image/x-icon" />
<!-- END META SECTION -->
<!-- CSS INCLUDE -->
<link rel="stylesheet" type="text/css" id="theme"
	href=" {!! asset('/admin1/css/theme-forest.css')!!}" />
<!-- EOF CSS INCLUDE -->
</head>
<body>
	<div class="registration-container">
		<div class="registration-box animated fadeInDown"
			style="padding-top: 0px;">
			<div>
				<img style="max-width: 400px" alt="logo"
					src="{!! asset('/admin1/img/logo-lr3.png')!!}">
			</div>
			<div class="registration-body">
				<div class="registration-title">
					<strong>Registration</strong>
				</div>
				<form action="{{route('admin@postRegister')}}"
					class="form-horizontal" method="post">
					<input type="hidden" name="_token" value="{{ csrf_token() }}">
					<h4>Authenticate</h4>
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
							<input type="password" class="form-control"
								placeholder="Confirm Password" name="confirmpassword" />
						</div>
					</div>
					<h4>Personal info</h4>
					<div class="form-group">
						<div class="col-md-12">
							<input type="text" class="form-control" placeholder="First name"
								name="first_name" />
						</div>
					</div>
					<div class="form-group">
						<div class="col-md-12">
							<input type="text" class="form-control" placeholder="Last name"
								name="last_name" />
						</div>
					</div>
					<div class="form-group push-up-30">
						<div class="col-md-6">
							<a href="{{route('admin@getLogin')}}"
								class="btn btn-link btn-block">Already have account?</a>
						</div>
						<div class="col-md-6">
							<button class="btn btn-danger btn-block">Sign Up</button>
						</div>
					</div>
				</form>
			</div>
			<div class="registration-footer">
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












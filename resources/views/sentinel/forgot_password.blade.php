<link
	href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"
	rel="stylesheet"
	integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u"
	crossorigin="anonymous">
<link
	href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"
	rel="stylesheet"
	integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN"
	crossorigin="anonymous">
<div class="container">
	<div class="row">

		<div class="panel panel-primary">

			<div class="panel-heading">
				<h3 class="panel-title">forgot password</h3>

			</div>
			<div class="panel-body">
				<form action="/forgot-password" method="POST">
					{{ csrf_field() }} 
					@if(session('success'))
					<div class="alert alert-sussess">{{ session('success') }}</div>
					@endif
					<div class="form-group">
						<div class="input-group">
							<span class="input-group-addon"><i class="fa fa-envelope-o"></i></span>
							<input type="email" name="email" class="form-control"
								placeholder="example@example.com" required="required">
						</div>
					</div>
					
					<div class="form-group">

						<input type="submit" value="Send code"
							class="btn btn-success pull-right">

					</div>
				</form>
			</div>
		</div>
		<div class="panel panel-primary">@if(Sentinel::check()) Hello, {{
			Sentinel::getUser()->first_name }} @else ban chua dang nhap @endif</div>
	</div>
</div>
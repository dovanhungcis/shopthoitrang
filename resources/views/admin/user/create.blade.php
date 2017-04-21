@extends('admin.template')
@section('title', 'Users')
@section('content')
<!-- START BREADCRUMB -->
<ul class="breadcrumb">
	<li><a href="{{route('admin@dashboard')}}">Home</a></li>
	<li class="active">Users</li>
</ul>
<div class="page-content-wrap">
	<div class="row">
		<div class="col-md-12">
			<form class="form-horizontal"
				action="{{ route('admin@user@store') }}" method="post">
				{!! Form::token() !!}
				<div class="panel panel-default">
					<div class="panel-heading">
						<h3 class="panel-title">
							<strong>Create User</strong>
						</h3>
						<ul class="panel-controls">
							<li><a href="#" class="panel-remove"><span class="fa fa-times"></span></a></li>
						</ul>
					</div>
					<div class="panel-body">
						<div class="form-group">
							<label class="col-md-3 col-xs-12 control-label">Email</label>
							<div class="col-md-6 col-xs-12">
								<div class="input-group">
									<span class="input-group-addon"><span class="fa fa-user"></span></span>
									<input class="form-control" type="text" name="email">
								</div>
								<span class="help-block"></span>
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-3 col-xs-12 control-label">Password</label>
							<div class="col-md-6 col-xs-12">
								<div class="input-group">
									<span class="input-group-addon"><span class="fa fa-unlock-alt"></span></span>
									<input class="form-control" type="password" name="password">
								</div>
								<span class="help-block"></span>
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-3 col-xs-12 control-label">First name</label>
							<div class="col-md-6 col-xs-12">
								<div class="input-group">
									<span class="input-group-addon"><span class="fa fa-pencil"></span></span>
									<input class="form-control" type="text" name="first_name">
								</div>
								<span class="help-block"></span>
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-3 col-xs-12 control-label">Last name</label>
							<div class="col-md-6 col-xs-12">
								<div class="input-group">
									<span class="input-group-addon"><span class="fa fa-pencil"></span></span>
									<input class="form-control" type="text" name="last_name">
								</div>
								<span class="help-block"></span>
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-3 col-xs-12 control-label">Role</label>
							<div class="col-md-6 col-xs-12">
								<div class="input-group">
									<span class="input-group-addon"><span class="fa fa-building"></span></span>
									<select class="form-control js-example-basic"
										 name='id_role' required>
										@foreach($roles as $row)
											<option value="{{$row->id}}">{{$row->name}}</option>
										@endforeach
									</select>
								</div>
								<span class="help-block"></span>
							</div>
						</div>
						<div class="panel-footer">
							<button class="btn btn-default">Clear Form</button>
							<button class="btn btn-primary pull-right">Create</button>
						</div>
					</div>

			</form>
		</div>
	</div>
</div>
@endsection
@section('script')
<script type="text/javascript">
	$(".js-example-basic").select2();
</script>
@endsection
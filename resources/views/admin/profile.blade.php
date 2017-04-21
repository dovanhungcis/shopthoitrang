@extends('admin.template') @section('title', 'Profile')
@section('content')
<!-- START BREADCRUMB -->
<ul class="breadcrumb">
	<li><a href="{{route('admin@dashboard')}}">Home</a></li>
	<li class="active">Profile</li>
</ul>
<!-- END BREADCRUMB -->

<!-- PAGE TITLE -->
<div class="page-title">
	<h2>
		<span class="fa fa-cogs"></span> Edit Profile
	</h2>
</div>
<!-- END PAGE TITLE -->

<!-- PAGE CONTENT WRAPPER -->
<div class="page-content-wrap">
	<div class="row">
		<div class="col-md-12">
			<div class="alert alert-warning" role="alert">
				<button type="button" class="close" data-dismiss="alert">
					<span aria-hidden="true">×</span><span class="sr-only">Close</span>
				</button>
				<strong>Important!</strong> Main feature of this page is "Change
				photo" function. Press button "Change photo" and try to use this
				awesome feature.
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-md-3 col-sm-4 col-xs-5">
			<form action="#" class="form-horizontal">
				<input type="hidden" name="_token" value="{{ csrf_token() }}">
				<div class="panel panel-default">
					<div class="panel-body">
						<h3>
							<span class="fa fa-user"></span>
							{{Sentinel::getUser()->first_name}}
							{{Sentinel::getUser()->last_name}}
						</h3>
						<p>{{Sentinel::getUser()->email}}</p>
						<div class="text-center" id="user_image">
							<img
								src="{{asset('/admin1/assets/uploads/'.Sentinel::getUser()->avatar)}}"
								class="img-thumbnail">
						</div>
					</div>
					<div class="panel-body form-group-separated">
						<div class="form-group">
							<div class="col-md-12 col-xs-12">
								<a href="#" class="btn btn-primary btn-block btn-rounded"
									data-toggle="modal" data-target="#modal_change_photo">Change
									Photo</a>
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-3 col-xs-5 control-label">#ID</label>
							<div class="col-md-9 col-xs-7">
								<input type="text" value="{{Sentinel::getUser()->id}}"
									class="form-control" disabled="">
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-3 col-xs-5 control-label">E-mail</label>
							<div class="col-md-9 col-xs-7">
								<input type="text" value="{{Sentinel::getUser()->email}}"
									class="form-control">
							</div>
						</div>
						<div class="form-group">
							<div class="col-md-12 col-xs-12">
								<a href="#" class="btn btn-danger btn-block btn-rounded"
									data-toggle="modal" data-target="#modal_change_password">Change
									password</a>
							</div>
						</div>
					</div>
				</div>
			</form>
		</div>
		<div class="col-md-9 col-sm-8 col-xs-7">
			<form action="{{route('admin@updateprofile')}}"
				class="form-horizontal" method="post">
				<input type="hidden" name="_token" value="{{ csrf_token() }}">
				<div class="panel panel-default">
					<div class="panel-body">
						<h3>
							<span class="fa fa-pencil"></span> Profile
						</h3>
					</div>
					<div class="panel-body form-group-separated">
						<div class="form-group">
							<label class="col-md-3 col-xs-5 control-label">First Name</label>
							<div class="col-md-9 col-xs-7">
								<input type="text" value="{{Sentinel::getUser()->first_name}}"
									class="form-control" name="first_name">
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-3 col-xs-5 control-label">Last Name</label>
							<div class="col-md-9 col-xs-7">
								<input type="text" value="{{Sentinel::getUser()->last_name}}"
									class="form-control" name="last_name">
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-3 col-xs-5 control-label">Birthday</label>
							<div class="col-md-9 col-xs-7">
								<input type="text" value="{{Sentinel::getUser()->birthday}}"
									class="form-control datepicker" name="birthday">
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-3 col-xs-5 control-label">Gender</label>
							<div class="col-md-9 col-xs-7">
								<select class="form-control" name='gender' required>
									<option value="1"{{(Sentinel::getUser()->gender==1)?'selected="selected"':''}}>Nam</option>
									<option value="2"{{(Sentinel::getUser()->gender==2)?'selected="selected"':''}}>Nữ</option>
								</select>
							</div>
						</div>
						<div class="form-group">
							<div class="col-md-12 col-xs-5">
								<button class="btn btn-primary btn-rounded pull-right">Save</button>
							</div>
						</div>
					</div>
				</div>
			</form>
		</div>
		<div class="modal animated fadeIn" id="modal_change_photo"
			tabindex="-1" role="dialog" aria-labelledby="smallModalHead"
			aria-hidden="true">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal">
							<span aria-hidden="true">&times;</span><span class="sr-only">Close</span>
						</button>
						<h4 class="modal-title" id="smallModalHead">Change photo</h4>
					</div>
					<form class="form-horizontal"
						action="{{route('admin@updateavatar')}}" method="post"
						enctype="multipart/form-data">
						<input type="hidden" name="_token" value="{{ csrf_token() }}">
						<div class="panel-body">
							<div class="form-group">
								<label class="col-md-3 col-xs-12 control-label">New Photo</label>
								<div class="col-md-6 col-xs-12">
									<div class="input-group">{!! Form::file('avatar') !!}</div>
									<span class="help-block"></span>
								</div>
							</div>
						</div>
						<div class="panel-footer">
							<button type="reset" class="btn btn-default">Clear Form</button>
							<button class="btn btn-primary pull-right">Change avatar</button>
						</div>
					</form>
				</div>
			</div>
		</div>
		<!-- EOF MODALS -->
	</div>
</div>
@stop

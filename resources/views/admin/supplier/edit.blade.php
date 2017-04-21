@extends('admin.template') @section('title', 'Posts')
@section('content')
<meta name="csrf-token" content="{{ csrf_token() }}">
<!-- START BREADCRUMB -->
<ul class="breadcrumb">
	<li><a href="{{route('admin@dashboard')}}">Home</a></li>
	<li class="active">Posts</li>
</ul>
<!-- END BREADCRUMB -->
<div class="page-content-wrap">
	<div class="row">
		<div class="col-md-12">
			<form class="form-horizontal"
				action="{{ route('admin@supplier@update',$supplier->id) }}"
				method="post" enctype="multipart/form-data">
				<input type="hidden" name="_token" value="{{ csrf_token() }}">
				<div class="panel panel-default">
					<div class="panel-heading">
						<h3 class="panel-title">
							<strong>Edit Supplier</strong>
						</h3>
						<ul class="panel-controls">
							<li><a href="#" class="panel-remove"><span class="fa fa-times"></span></a></li>
						</ul>
					</div>
					<div class="panel-body">
						<div class="form-group">
							<label class="col-md-12 col-xs-12">
								@if ($errors->any()) {{'Error: '}}
								{!! implode('', $errors->all(
    								'<span style="color: red">:message</span><br />'
    								))
								!!}
								@endif
							</label>
						</div>
						<div class="form-group">
							<label class="col-md-2 col-xs-12 control-label">Supplier's name</label>
							<div class="col-md-10 col-xs-12">
								<div class="input-group">
									<span class="input-group-addon"><span class="fa fa-building"></span></span>
									<input class="form-control" type="text" name="name"
										value="{{$supplier->name}}">
								</div>
								<span class="help-block"></span>
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-2 col-xs-12 control-label">IMG</label>
							<div class="col-md-10 col-xs-12">
								<div class="input-group">{!! Form::file('photo') !!}</div>
								<span class="help-block"></span>
							</div>
						</div>
					</div>
				</div>
				<div class="panel-footer">
					<button type="reset" class="btn btn-default">Clear Form</button>
					<button class="btn btn-primary pull-right">Create</button>
				</div>
			</form>
		</div>
	</div>
</div>
@stop




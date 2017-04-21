@extends('admin.template') @section('title', 'Item') @section('content')
<!-- START BREADCRUMB -->
<ul class="breadcrumb">
	<li><a href="{{route('admin@dashboard')}}">Home</a></li>
	<li class="active">Item</li>
</ul>
<!-- END BREADCRUMB -->
<div class="page-content-wrap">
	<div class="row">
		<div class="col-md-12">
			<form class="form-horizontal"
				action="{{ route('admin@item@store') }}" method="post"
				enctype="multipart/form-data">
				<input type="hidden" name="_token" value="{{ csrf_token() }}">
				<div class="panel panel-default">
					<div class="panel-heading">
						<h3 class="panel-title">
							<strong>Create Item</strong>
						</h3>
						<ul class="panel-controls">
							<li><a href="#" class="panel-remove"><span class="fa fa-times"></span></a></li>
						</ul>
					</div>
					<div class="panel-body">
						<div class="form-group">
							<label class="col-md-12 col-xs-12">
							@if ($errors->any()) {{'Error : '}}
								{!! implode('', $errors->all(
									'<span style="color: red">:message</span><br />
								'))
								!!}
							@endif
							</label>
						</div>
						<div class="form-group">
							<label class="col-md-2 col-xs-12 control-label">Item's name</label>
							<div class="col-md-10 col-xs-12">
								<div class="input-group">
									<span class="input-group-addon"><span class="fa fa-television"></span></span>
									<input class="form-control" type="text" name="name">
								</div>
								<span class="help-block"></span>
							</div>
						</div>
					</div>
					<div class="panel-footer">
						<button type="reset" class="btn btn-default">Clear Form</button>
						<button class="btn btn-primary pull-right">Create</button>
					</div>
				</div>
			</form>
		</div>
	</div>
</div>
@stop



@extends('admin.template') @section('title', 'Products')
@section('content')
<!-- START BREADCRUMB -->

<ul class="breadcrumb">
	<li><a href="{{route('admin@dashboard')}}">Home</a></li>
	<li class="active">Products</li>
</ul>
<!-- END BREADCRUMB -->
<div class="page-content-wrap">
	<div class="row">
		<div class="col-md-12">
			<form class="form-horizontal"
				action="{{ route('admin@product@store') }}" method="post" enctype="multipart/form-data">
				<input type="hidden" name="_token" value="{{ csrf_token() }}">
				<div class="panel panel-default">
					<div class="panel-heading">
						<h3 class="panel-title">
							<strong>Create Product</strong>
						</h3>
						<ul class="panel-controls">
							<li><a href="#" class="panel-remove"><span class="fa fa-times"></span></a></li>
						</ul>
					</div>
					<div class="panel-body">
						<div class="form-group">
							<label class="col-md-12 col-xs-12"> @if ($errors->any()) {{'Error
								: '}} {!! implode('', $errors->all('<span style="color: red">:message</span><br />'))
								!!} @endif
							</label>
						</div>
						<div class="form-group">
							<label class="col-md-2 col-xs-12 control-label">Product's name</label>
							<div class="col-md-10 col-xs-12">
								<div class="input-group">
									<span class="input-group-addon"><span class="fa fa-user"></span></span>
									<input class="form-control" type="text" name="name">
								</div>
								<span class="help-block"></span>
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-2 col-xs-12 control-label">Product's image</label>
							<div class="col-md-10 col-xs-12">
								<div class="input-group">
									<input type="file" class="fileinput btn-warning" name="photos[]" id="photo" data-filename-placement="inside" title="File name goes inside" multiple >
								</div>
								<span class="help-block"></span>
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-2 col-xs-12 control-label">Sale</label>
							<div class="col-md-10 col-xs-12">
								<div class="input-group">
									<span class="input-group-addon"><span class="fa fa-building"></span></span>
									<select class="form-control js-example-basic" name='id_sale'>
										<option value="0">Select Sale</option>
										@foreach($sales as $row)
										<option value="{{$row->id}}">{{$row->name}}</option>
										@endforeach
									</select>
								</div>
								<span class="help-block"></span>
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-2 col-xs-12 control-label">Supplier</label>
							<div class="col-md-10 col-xs-12">
								<div class="input-group">
									<span class="input-group-addon"><span class="fa fa-building"></span></span>
									<select class="form-control js-example-basic" name='id_supplier'>
										<option value="0">Select Supplier</option>
										@foreach($suppliers as $row)
										<option value="{{$row->id}}">{{$row->name}}</option>
										@endforeach
									</select>
								</div>
								<span class="help-block"></span>
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-2 col-xs-12 control-label">Item</label>
							<div class="col-md-10 col-xs-12">
								<div class="input-group">
									<span class="input-group-addon"><span class="fa fa-building"></span></span>
									<select class="form-control js-example-basic" name='id_item'>
										<option value="0">Select Item</option>
										@foreach($items as $row)
										<option value="{{$row->id}}">{{$row->name}}</option>
										@endforeach
									</select>
								</div>
								<span class="help-block"></span>
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-2 col-xs-12 control-label">Quantity</label>
							<div class="col-md-10 col-xs-12">
								<div class="input-group">
									<span class="input-group-addon"><span class="fa fa-user"></span></span>
									<input class="form-control" type="number" name="quantity">
								</div>
								<span class="help-block"></span>
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-2 col-xs-12 control-label">Sold</label>
							<div class="col-md-10 col-xs-12">
								<div class="input-group">
									<span class="input-group-addon"><span class="fa fa-user"></span></span>
									<input class="form-control" type="number" name="sold" value="0" disabled>
								</div>
								<span class="help-block"></span>
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-2 col-xs-12 control-label">Product's detail</label>
							<div class="col-md-10 col-xs-12">
								<div class="input-group">
									<span class="input-group-addon"><span class="fa fa-user"></span></span>
									<textarea class="form-control" id="editor1" name="detail_product"></textarea>
								</div>
								<span class="help-block"></span>
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-2 col-xs-12 control-label">Detail size</label>
							<div class="col-md-10 col-xs-12">
								<div class="input-group">
									<span class="input-group-addon"><span class="fa fa-user"></span></span>
									<textarea class="form-control" id="editor2" name="detail_size"></textarea>
								</div>
								<span class="help-block"></span>
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-2 col-xs-12 control-label">Detail information</label>
							<div class="col-md-10 col-xs-12">
								<div class="input-group">
									<span class="input-group-addon"><span class="fa fa-user"></span></span>
									<textarea class="form-control" id="editor3" name="detail_information"></textarea>
								</div>
								<span class="help-block"></span>
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-2 col-xs-12 control-label">Material</label>
							<div class="col-md-10 col-xs-12">
								<div class="input-group">
									<span class="input-group-addon"><span class="fa fa-user"></span></span>
									<textarea class="form-control" id="editor4" name="material_storage"></textarea>
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
@section('script')
<script type="text/javascript">
	$(".js-example-basic").select2();
</script>
<script type="text/javascript"
	src=" {!!asset('/admin1/js/plugins/daterangepicker/daterangepicker.js')!!}"></script>
<script type="text/javascript" src="{!!asset('/admin1/js/plugins/bootstrap/bootstrap-file-input.js')!!}"></script>
@endsection



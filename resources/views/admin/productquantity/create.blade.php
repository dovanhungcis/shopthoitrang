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
			<form class="form-horizontal" action="{{ route('admin@productquantity@store') }}" method="post">
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
							@if (session()->has('success'))
								<div class="alert alert-success">{{ session()->get('success') }}</div>
							@endif
							<label class="col-md-12 col-xs-12"> @if ($errors->any()) {{'Error
								: '}} {!! implode('', $errors->all('<span style="color: red">:message</span><br />'))
								!!} @endif
							</label>
						</div>
						<div class="form-group">
							<label class="col-md-2 col-xs-12 control-label">Products's name</label>
							<div class="col-md-10 col-xs-12">
								<div class="input-group">
									<span class="input-group-addon"><span class="fa fa-user"></span></span>
									<input class="form-control" type="text" name="name" value="{{$product->name}}" disabled>
									<input type="hidden" name="product_id" value="{{$product->id}}">
								</div>
								<span class="help-block"></span>
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-2 col-xs-12 control-label">Size</label>
							<div class="col-md-2 col-xs-12">
								<div class="input-group">
									<span class="input-group-addon"><span class="fa fa-building"></span></span>
									<select class="form-control js-example-basic" name='size_id'>
										<option value="0">Select size</option>
										@foreach($sizes as $row)
										<option value="{{$row->id}}">{{$row->size}}</option>
										@endforeach
									</select>
								</div>
							</div>
							<label class="col-md-2 col-xs-12 control-label">Color</label>
							<div class="col-md-2 col-xs-12">
								<div class="input-group">
									<span class="input-group-addon"><span class="fa fa-building"></span></span>
									<select class="form-control js-example-basic" name='color_id'>
										<option value="0">Select color</option>
										@foreach($colors as $row)
										<option value="{{$row->id}}">{{$row->color}}</option>
										@endforeach
									</select>
								</div>
							</div>
								<span class="help-block"></span>
						</div>
						<div class="form-group">
							<label class="col-md-2 col-xs-12 control-label">Price</label>
							<div class="col-md-2 col-xs-12">
								<div class="input-group">
									<span class="input-group-addon"><span class="fa fa-money"></span></span>
									<input class="form-control" type="text" name="price">
								</div>
							</div>
							<label class="col-md-2 col-xs-12 control-label">Price sale</label>
							<div class="col-md-2 col-xs-12">
								<div class="input-group">
									<span class="input-group-addon"><span class="fa fa-money"></span></span>
									<input class="form-control" type="text" name="price_sale">
								</div>
							</div>
							<label class="col-md-2 col-xs-12 control-label">Quantity</label>
							<div class="col-md-2 col-xs-12">
								<div class="input-group">
									<span class="input-group-addon"><span class="fa fa-money"></span></span>
									<input class="form-control" type="text" name="quantity">
								</div>
							</div>
								<span class="help-block"></span>
						</div>
					<div class="panel-footer">
						<button type="reset" class="btn btn-default">Clear Form</button>
						<button class="btn btn-primary pull-right">Create</button>
						<a class="btn btn-primary pull-right" href="{{route('admin@productquantity@show',$product->id)}}"> Back </a>
					</div>
				</div>
			</form>
		</div>
	</div>
</div>
@stop
@section('script')
<script type="text/javascript">
                // Replace the <textarea id="editor1"> with a CKEditor
                // instance, using default configuration.
                CKEDITOR.replace( 'editor1');
                CKEDITOR.replace( 'editor2');
                CKEDITOR.replace( 'editor3');
                CKEDITOR.replace( 'editor4');
</script>
<script type="text/javascript">
	$(".js-example-basic").select2();
</script>
@endsection



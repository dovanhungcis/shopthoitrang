@extends('admin.template') @section('title', 'Product Quantity')
@section('content')
<!-- START BREADCRUMB -->
<ul class="breadcrumb">
	<li><a href="{{route('admin@dashboard')}}">Home</a></li>
	<li class="active">Products Quantity</li>
</ul>
<!-- END BREADCRUMB -->
<div class="page-title">
	<h2>
		<span class="fa fa-arrow-circle-o-left"></span> {{$product->name}}
	</h2>
	<div class="page-content-wrap">

		<div class="row">
			<div class="col-md-12">
				<div class="panel panel-default tabs">
					<ul class="nav nav-tabs" role="tablist">
						<li class="active"><a href="#tab-first" role="tab"
							data-toggle="tab"><strong>Color and Price</strong></a></li>
						<li><a href="#tab-second" role="tab" data-toggle="tab"><strong>Product
									Detail</strong></a></li>
					</ul>
					<div class="panel-body tab-content">
						<div class="tab-pane active" id="tab-first">
							<div class="row">
								<div class="col-md-12">
									@if (session()->has('success'))
									<div class="alert alert-success">{{ session()->get('success')
										}}</div>
									@endif
									<!-- START DEFAULT DATATABLE -->
									<div class="panel panel-default">
										<div class="panel-body">
											<div class="table-responsive">
												<p>
													<strong> Color and Price </strong>
												</p>
												<a href="{{route('admin@productquantity@create',$product->id)}}"
													class="btn btn-warning btn-xs pull-right"> <h7>+ Products
													Quantity</h7>
												</a>
												<div class="panel-body panel-body-table">
													<div class="table-responsive">
														<table
															class="table table-bordered table-striped table-actions">
															<thead>
																<tr>
																	<th width="100">Size</th>
																	<th width="100">Color</th>
																	<th width="100">Price</th>
																	<th width="100">Sale Price</th>
																	<th width="100">Quantity</th>
																	<th width="120">Action</th>
																</tr>
															</thead>
															<tbody>
																@foreach($list as $row)
																<tr id="trow_1">
																	<td><strong>{{$row->size->size}}</strong></td>
																	<td><span style = "background:{{$row->color->bc}}; color:{{$row->color->bc}};">color</span></td>
																	<td>{{$row->price}}</td>
																	<td>{{$row->price_sale}}</td>
																	<td>{{$row->quantity}}</td>
																	<td><a
																		href="{{route('admin@productquantity@edit',$row->id)}}"
																		class="btn btn-default btn-rounded btn-condensed btn-sm">
																			<span class="fa fa-pencil"></span>
																	</a> <a
																		href="{{ route('admin@productquantity@destroy',$row->id) }}"
																		class="btn btn-danger btn-rounded btn-condensed btn-sm"
																		onclick="return myFunction();"> <span
																			class="fa fa-times"></span></a></td>
																</tr>
																@endforeach
															</tbody>
														</table>
													</div>
												</div>
												<div class="dataTables_paginate paging_simple_numbers">
													{{$list->links()}}</div>
												<div class="dataTables_info" role="status"
													aria-live="polite">Showing {{$thisPage}} to
													{{$thisPageEnd}} of {{$total}} entries</div>
											</div>
										</div>
									</div>
								</div>
								<!-- END DEFAULT DATATABLE -->
							</div>
						</div>
						<div class="tab-pane" id="tab-second">
							<div class="page-content-wrap">

								<div class="row">
									<div class="col-md-3 col-sm-4 col-xs-5">
										<div class="panel panel-default">
											<div class="panel-body">
												<h3>
													Image
												</h3>
												Image product
												<div class="text-center" id="user_image">
												@for ($i = 0; $i < $countPhoto; $i++)
													<img src="{{asset('/admin1/assets/uploads/posts/'.$product->product_images[$i]->photo)}}"
														class="img-thumbnail">
												@endfor
												</div>
											</div>
										</div>
									</div>
									<div class="col-md-6 col-sm-8 col-xs-7">
										<div class="panel panel-default">
											<div class="panel-body">
												<h3>
													<span class="fa fa-pencil"></span> Detail product
												</h3>
												<p>{!!$product->detail_product!!}</p>
											</div>
											<div class="panel-body">
												<h3>
													<span class="fa fa-pencil"></span> Detail size
												</h3>
												<p>{!!$product->detail_size!!}</p>
											</div>
											<div class="panel-body">
												<h3>
													<span class="fa fa-pencil"></span> Detail information
												</h3>
												<p>{!!$product->detail_information!!}</p>
											</div>
											<div class="panel-body">
												<h3>
													<span class="fa fa-pencil"></span> Material Storage
												</h3>
												<p>{!!$product->material_storage!!}</p>
											</div>
										</div>
									</div>
									<div class="col-md-3">
										<div class="panel panel-default form-horizontal">
											<div class="panel-body">
												<h3>
													<span class="fa fa-info-circle"></span> Info
												</h3>
												<p>Some info about product</p>
											</div>
											<div class="panel-body form-group-separated">
												<div class="form-group">
													<label class="col-md-4 col-xs-5 control-label">Supplier</label>
													<div class="col-md-8 col-xs-7 line-height-30">{{$product->supplier->name}}
													<img src="{{asset('/admin1/assets/uploads/suppliers/'.$product->supplier->photo)}}"
														class="img-thumbnail">
													</div>
												</div>
												<div class="form-group">
													<label class="col-md-4 col-xs-5 control-label">Sale</label>
													<div class="col-md-8 col-xs-7 line-height-30">{{$product->sale->name}}</div>
												</div>
												<div class="form-group">
													<label class="col-md-4 col-xs-5 control-label">Item</label>
													<div class="col-md-8 col-xs-7">{{$product->item->name}} </div>
												</div>
												<div class="form-group">
													<label class="col-md-4 col-xs-5 control-label">Quantity</label>
													<div class="col-md-8 col-xs-7 line-height-30">{{$product->quantity}} </div>
												</div>
												<div class="form-group">
													<label class="col-md-4 col-xs-5 control-label">Sold</label>
													<div class="col-md-8 col-xs-7 line-height-30">{{$product->sold}} </div>
												</div>
												<div class="form-group">
													<label class="col-md-4 col-xs-5 control-label">Created_at</label>
													<div class="col-md-8 col-xs-7 line-height-30">{{$product->created_at}} </div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

</div>
<div class="page-content-wrap"></div>
<script>
function myFunction() {
  var r = confirm("Delete?");
  if (r)
    return true;
  else
    return false;
}
</script>
@endsection

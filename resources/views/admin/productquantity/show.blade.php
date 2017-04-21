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
		<span class="fa fa-arrow-circle-o-left"></span> Product Quantity
	</h2>
	<div class="page-content-wrap">
		<div class="row">
			<div class="col-md-12">
				@if (session()->has('success'))
					<div class="alert alert-success">{{ session()->get('success') }}</div>
				@endif
				<!-- START DEFAULT DATATABLE -->
				<div class="panel panel-default">
					<div class="panel-body">
						<div class="table-responsive">
							<div id="DataTables_Table_0_wrapper"
								class="dataTables_wrapper no-footer">
								<div class="dataTables_length" id="DataTables_Table_0_length">
									<label>Show <select name="DataTables_Table_0_length"
										aria-controls="DataTables_Table_0" class="">
											<option value="10">10</option>
											<option value="25">25</option>
											<option value="50">50</option>
											<option value="100">100</option>
									</select> entries
									</label>
								</div>
								<div id="DataTables_Table_0_filter" class="dataTables_filter">
									<label>Search:<input class="" placeholder=""
										aria-controls="DataTables_Table_0" type="search"></label>
								</div>
								<a href="{{route('admin@productquantity@create')}}"
									class="btn btn-warning btn-xs pull-right"> <h7>+ Products Quantity</h7>
								</a>
								<table class="table dataTable no-footer"
									id="DataTables_Table_0" role="grid"
									aria-describedby="DataTables_Table_0_info">
									<thead>
										<tr role="row" style="">
											<th class="sorting_asc" style="width: 20px;">ID</th>
											<th class="sorting_asc" style="width: 20px;">Name Product</th>
											<th class="sorting_asc" style="width: 50px;">Size</th>
											<th class="sorting_asc" style="width: 50px;">Color</th>
											<th class="sorting_asc" style="width: 50px;">Price</th>
											<th class="sorting_asc" style="width: 50px;">Sale Price</th>
											<th class="sorting_asc" style="width: 96px;">Action</th>
										</tr>
									</thead>
									<tbody>
										@foreach($list as $row)
										<tr role="row" class="odd">
											<td class="sorting_1">{{$row->id}}</td>
											<td class="sorting_1">{{$row->product->name}}</td>
											<td class="sorting_1">{{$row->size->size}}</td>
											<td class="sorting_1">{{$row->color->color}}</td>
											<td class="sorting_1">{{$row->price}}</td>
											<td class="sorting_1">{{$row->price_sale}}</td>
											<td><a href="{{route('admin@productquantity@edit',$row->id)}}"
												class="label label-primary">Edit</a><a
												onclick="return myFunction();"
												href="{{ route('admin@productquantity@destroy',$row->id) }}"
												class="label label-danger">Delete</a></td>
										</tr>
										@endforeach
									</tbody>
								</table>
								<div class="dataTables_paginate paging_simple_numbers">
									{{$list->links()}}</div>
								<div class="dataTables_info" role="status" aria-live="polite">Showing
									{{$thisPage}} to {{$thisPageEnd}} of {{$total}} entries</div>
							</div>
						</div>
					</div>
				</div>
				<!-- END DEFAULT DATATABLE -->
			</div>
		</div>

	</div>
</div>
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
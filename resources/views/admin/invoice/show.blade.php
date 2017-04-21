@extends('admin.template') @section('title', 'Invoice')
@section('content')
<!-- START BREADCRUMB -->
<ul class="breadcrumb">
	<li><a href="{{route('admin@dashboard')}}">Home</a></li>
	<li class="active">Invoice</li>
</ul>
<!-- END BREADCRUMB -->
<div class="page-title">
	<h2>
		<span class="fa fa-arrow-circle-o-left"></span> Invoice
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
								<table class="table dataTable no-footer"
									id="DataTables_Table_0" role="grid"
									aria-describedby="DataTables_Table_0_info">
									<thead>
										<tr role="row" style="">
											<th class="sorting_asc" style="width: 20px;">ID</th>
											<th class="sorting_asc" style="width: 20px;">ID User</th>
											<th class="sorting_asc" style="width: 50px;">Address</th>
											<th class="sorting_asc" style="width: 50px;">District</th>
											<th class="sorting_asc" style="width: 50px;">City</th>
											<th class="sorting_asc" style="width: 50px;">Phone</th>
											<th class="sorting_asc" style="width: 96px;">Price</th>
											<th class="sorting_asc" style="width: 96px;">Status</th>
										</tr>
									</thead>
									<tbody>
										@foreach($list as $row)
										<tr role="row" class="odd">
											<td class="sorting_1"><a href="{{route('admin@invoice@show',$row->id)}}">{{$row->id}}</a></td>
											<td class="sorting_1">{{$row->id_user}}</td>
											<td class="sorting_1">{{$row->address}}</td>
											<td class="sorting_1">{{$row->district}}</td>
											<td class="sorting_1">{{$row->city}}</td>
											<td class="sorting_1">{{$row->phone}}</td>
											<td class="sorting_1">{{$row->price}}</td>
											<td class="sorting_1">{{($row->status==0)?'Pending':'Accepted'}}</td>
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
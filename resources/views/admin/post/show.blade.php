@extends('admin.template') @section('title', 'Posts')
@section('content')
<!-- START BREADCRUMB -->
<ul class="breadcrumb">
	<li><a href="{{route('admin@dashboard')}}">Home</a></li>
	<li class="active">Posts</li>
</ul>
<!-- END BREADCRUMB -->
<div class="page-title">
	<h2>
		<span class="fa fa-arrow-circle-o-left"></span> Customers
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
								<a href="{{route('admin@post@create')}}"
									class="btn btn-warning btn-xs pull-right"> <h7>+ Post</h7>
								</a>
								<table class="table dataTable no-footer"
									id="DataTables_Table_0" role="grid"
									aria-describedby="DataTables_Table_0_info">
									<thead>
										<tr role="row" style="">
											<th class="sorting_asc" style="width: 20px;">ID</th>
											<th class="sorting_asc" style="width: 20px;">Title</th>
											<th class="sorting_asc" style="width: 50px;">Img</th>
											<th class="sorting_asc" style="width: 96px;">Description</th>
											<th class="sorting_asc" style="width: 96px;">Content</th>
											<th class="sorting_asc" style="width: 96px;">Categories</th>
											<th class="sorting_asc" style="width: 96px;">Action</th>
										</tr>
									</thead>
									<tbody>
										@foreach($list as $row)
										<tr role="row" class="odd">
											<td class="sorting_1">{{$row->id}}</td>
											<td class="sorting_1">{{$row->title}}</td>
											<td><img
												src="{{asset('/admin1/assets/uploads/posts/'.$row->img)}}"
												class="img-thumbnail" style="min-width: 150px; max-width:100px;"></td>
											<td>{{Str::words($row->description, 50,'....')}}</td>
											<td>{{ Str::words($row->content, 50,'....') }}</td>
											<td>@foreach($row->category as $category)
													{{$category->name}}<br>
												@endforeach
											</td>
											<td><a href="{{route('admin@post@edit',$row->id)}}"
												class="label label-primary">Edit</a><a
												onclick="return myFunction();"
												href="{{ route('admin@post@destroy',$row->id) }}"
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
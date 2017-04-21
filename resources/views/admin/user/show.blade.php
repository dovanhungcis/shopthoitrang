@extends('admin.template')
@section('title', 'Users')
@section('content')
<!-- START BREADCRUMB -->
<ul class="breadcrumb">
	<li><a href="{{route('admin@dashboard')}}">Home</a></li>
	<li class="active">Users</li>
</ul>
<!-- END BREADCRUMB -->
<div class="page-title">
	<h2>
		<span class="fa fa-arrow-circle-o-left"></span> Users
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
								<a href="{{route('admin@user@create')}}"
									class="btn btn-warning btn-xs pull-right"> <h7>+ User</h7>
								</a>
								<table class="table dataTable no-footer"
									id="DataTables_Table_0" role="grid"
									aria-describedby="DataTables_Table_0_info">
									<thead>
										<tr role="row">
											<th class="sorting_asc" tabindex="0"
												aria-controls="DataTables_Table_0" rowspan="1" colspan="1"
												aria-sort="ascending"
												aria-label="Name: activate to sort column descending">ID</th>
											<th class="sorting_asc" tabindex="0"
												aria-controls="DataTables_Table_0" rowspan="1" colspan="1"
												aria-sort="ascending"
												aria-label="Name: activate to sort column descending">Email</th>
											<th class="sorting" tabindex="0"
												aria-controls="DataTables_Table_0" rowspan="1" colspan="1"
												style="width: 96px;"
												aria-label="Salary: activate to sort column ascending">First
												Name</th>
											<th class="sorting" tabindex="0"
												aria-controls="DataTables_Table_0" rowspan="1" colspan="1"
												style="width: 96px;"
												aria-label="Salary: activate to sort column ascending">Last
												Name</th>
											<th class="sorting" tabindex="0"
												aria-controls="DataTables_Table_0" rowspan="1" colspan="1"
												style="width: 96px;"
												aria-label="Salary: activate to sort column ascending">Role</th>
											<th class="sorting" tabindex="0"
												aria-controls="DataTables_Table_0" rowspan="1" colspan="1"
												style="width: 96px;"
												aria-label="Salary: activate to sort column ascending">Action</th>
										</tr>
									</thead>
									<tbody>
										@foreach($list as $row)
										@if ($row->inRole($user)==FALSE)
										<tr role="row" class="odd">
											<td class="sorting_1">{{$row->id}}</td>
											<td class="sorting_1">{{$row->email}}</td>
											<td>{{$row->first_name}}</td>
											<td>{{$row->last_name}}</td>
											<td>@if ($row->inRole($admin))
                                                    <span class="label label-warning">{{ 'Admin' }}</span>
                                                @elseif ($row->inRole($mod))
                                                	<span class="label label-success">{{ 'Mod' }}</span>
                                                @elseif ($row->inRole($writter))
                                                	<span class="label label-danger">{{ 'Writter' }}</span>
                                                @endif
                                                </td>
											<td><a href="{{route('admin@user@edit',$row->id)}}"
												class="label label-primary">Edit</a><a
												onclick="return myFunction();"
												href="{{ route('admin@user@destroy',$row->id) }}"
												class="label label-danger">Delete</a></td>
										</tr>
										@endif
										@endforeach
									</tbody>
								</table>
								<div class="dataTables_paginate paging_simple_numbers">
									{{$list->links()}}</div>
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

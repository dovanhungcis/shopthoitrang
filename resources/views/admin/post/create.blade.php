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
				action="{{ route('admin@post@store') }}" method="post"
				enctype="multipart/form-data">
				<input type="hidden" name="_token" value="{{ csrf_token() }}">
				<div class="panel panel-default">
					<div class="panel-heading">
						<h3 class="panel-title">
							<strong>Create post</strong>
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
							<label class="col-md-2 col-xs-12 control-label">Title</label>
							<div class="col-md-10 col-xs-12">
								<div class="input-group">
									<span class="input-group-addon"><span class="fa fa-bookmark"></span></span>
									<input class="form-control" type="text" name="title">
								</div>
								<span class="help-block"></span>
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-2 col-xs-12 control-label">Description</label>
							<div class="col-md-10 col-xs-12">
								<div class="input-group">
									<span class="input-group-addon"><span class="fa fa-navicon"></span></span>
									<input class="form-control" type="text" name="description">
								</div>
								<span class="help-block"></span>
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-2 col-xs-12 control-label">Content</label>
							<div class="col-md-10 col-xs-12">
								<textarea class="form-control" id="editor1" rows="10" cols="80"
									name="content"></textarea>
								<span class="help-block"></span>
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-2 col-xs-12 control-label">Categories</label>
							<div class="col-md-10 col-xs-12">
								<div class="input-group">
									<span class="input-group-addon"><span class="fa fa-book"></span></span>
									<select class="form-control js-example-basic-multiple"
										multiple="multiple" name='id_categories[]' required>
										@foreach($categories as $row)
										<option value="{{$row->id}}">{{$row->name}}</option>
										@endforeach
									</select>
								</div>
								<span class="help-block"></span>
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-2 col-xs-12 control-label">Tags</label>
							<div class="col-md-10 col-xs-12">
								<div class="input-group">
									<span class="input-group-addon"><span class="fa fa-tag"></span></span>
									<select class="form-control js-example-basic-multiple"
										multiple="multiple" name='id_tags[]' id='tags' required>
										@foreach($tags as $row)
										<option value="{{$row->id}}">{{$row->name}}</option>
										@endforeach
									</select>
								</div>
								<label class="col-md-3 col-xs-12 control-label">Add new tag</label>
								<a href="#"
									class="btn btn-default btn-rounded btn-condensed btn-sm"
									data-toggle="modal" data-target="#create_tag"> <span
									class="fa fa-pencil"></span>
								</a> <span class="help-block"></span>

							</div>
						</div>
						<div class="form-group">
							<label class="col-md-2 col-xs-12 control-label">IMG</label>
							<div class="col-md-10 col-xs-12">
								<div class="input-group">{!! Form::file('img') !!}</div>
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
	<div class="modal animated fadeIn" id="create_tag" tabindex="-1"
		role="dialog" aria-labelledby="smallModalHead" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">
						<span aria-hidden="true">&times;</span><span class="sr-only">Close</span>
					</button>
					<h4 class="modal-title" id="smallModalHead">Add new Tag</h4>
				</div>
				<input type="hidden" name="_token" value="{{ csrf_token() }}">
				<div class="panel-body">
					<div class="form-group">
						<label class="col-md-2 col-xs-12 control-label">Tag</label>
						<div class="col-md-10 col-xs-12">
							<div class="input-group">
								<span class="input-group-addon"><span class="fa fa-tag"></span></span>
								<input class="form-control" type="text" name="tag" id="tag">
							</div>
							<span class="help-block"></span>
						</div>
					</div>
				</div>
				<div class="panel-footer">
					<button type="reset" class="btn btn-default">Clear Form</button>
					<button class="btn btn-primary pull-right" onclick="createtag()">Create</button>
				</div>
			</div>
		</div>
	</div>
</div>
@stop @section('script')
<script>
function createtag(){
  var tag = $('#tag').val();
    $.ajaxSetup({
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
    });
    $.ajax({
      type :'post',
      url : '/admin/tag/store',
      data : {
        "data" : tag
      },
       success:function(data){
         $('#create_tag').modal('hide');
         $('#tags').append($('<option>', {
         value: data['id'],
         text: data['name']
       }));
       }
      });
}
</script>
<script type="text/javascript">
                // Replace the <textarea id="editor1"> with a CKEditor
                // instance, using default configuration.
                CKEDITOR.replace( 'editor1' );
</script>
<script type="text/javascript">
	$(".js-example-basic-multiple").select2();
</script>
@endsection


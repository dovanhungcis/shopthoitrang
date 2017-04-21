@extends('shop.layouts.layout') @section('banner')
<div class="banner"
	style="background: url('/admin1/assets/uploads/sales/{{$sale[0]->img_banner}}') no-repeat; background-size: cover; min-height: 300px;">
</div>
@endsection @section('container')
<nav class="grow">
	<div class="container">
		<h5>
			<a class="breadcrumb-item" href="/sales">Sale</a> <a>/</a> <span
				class="breadcrumb-item active">{{$sale[0]->name}}</span>
		</h5>
	</div>
</nav>
<div class="product">
	<div class="container">
		<div class="product-price1">
			<div class="row ">
				<div class="col-lg-12">
					<center><h3>
						<i class="fa fa-clock-o" aria-hidden="true"></i> Sẽ diễn ra trong
						<span style="color:#337ab7;"><div id="getting-started"></div></span>
					</h3></center>
				</div>
			</div>
			<div class="row comming">
				<div class="col-lg-9">
					<img alt="" src="/admin1/assets/uploads/sales/{{$sale[0]->img_event}}">
				</div>
				<div class="col-lg-3">
					<center><h3>
						{{$sale[0]->name}}						
					</h3></center>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection @section('script')
<script src="/shop/js/jquery.countdown.min.js"></script>
<script src="/shop/js/jquery.countdown.js"></script>
<script type="text/javascript">
  $("#getting-started")
  .countdown("{{$sale[0]->start_date}}", function(event) {
    $(this).text(
      event.strftime('%D Days %H:%M:%S')
    );
  });
</script>
@endsection

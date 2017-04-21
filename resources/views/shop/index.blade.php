@extends('shop.layouts.app') @section('container')
<div class="container">
	<div class="cont">
		<div class="content">
			<div class="content-top-bottom">
				<h2>Shop Today's Sales</h2>

			</div>
			<div class="content-top">
				<div class="grid-in">
					@foreach($sales as $sale)
					<div class="col-md-6 grid-top simpleCart_shelfItem">
						<a href="/sales/products/{{$sale->slug}}" class="b-link-stripe b-animate-go  thickbox"><img
							class="img-responsive" src="/admin1/assets/uploads/sales/{{$sale->img_event}}" alt="">
							<div class="b-wrapper">
								<h3 class="b-animate b-from-left    b-delay03 ">
									<span>{{$sale->name}}</span>
								</h3>
							</div> </a>
						<p>
							<a href="/sales/products/{{$sale->slug}}">{{$sale->name}}</a>
						</p>
						<a href="#" class="item_add"><p class="number item_price">
								Ending in <?php   $interval = date_diff(date_create(date('Y-m-d')), date_create($sale->end_date));
								echo $interval->format('%a Days');
								?>
							</p></a>
						<hr>
					</div>
					@endforeach
					<div class="clearfix"></div>

				</div>
			</div>

			<div class="content-top">
				<h1>Today's best sellers</h1>
				<div id="owl-example" class="owl-carousel">
					@foreach($best_seller as $sale)
					<div class="">
						<a href="/sales/single/{{$sale->slug}}" class="b-link-stripe b-animate-go  thickbox"><img
							class="img-responsive" src="/admin1/assets/uploads/posts/{{$sale->product_images[0]->photo}}" alt="">
							<div class="b-wrapper">
								<h3 class="b-animate b-from-left    b-delay03 ">
									<span>{{$sale->name}}</span>
								</h3>
							</div> </a>
						<p>
							<a href="/sales/single/{{$sale->slug}}">{{$sale->name}}</a>
						</p>
						<a href="#" class="item_add"><p class="number item_price">
								<i></i><s>{{$sale->product_quantities[0]->price}}₫</s> <span class=""> {{$sale->product_quantities[0]->price}}₫</span>
							</p></a>
					</div>
					@endforeach
					<div class="clearfix"></div>
				</div>
			</div>
			<div class="content-top">
				<h1>Upcoming Sales</h1>

				<div class="grid-in">
					@foreach($comming as $item)
					<div class="col-md-4 grid-top simpleCart_shelfItem">
						<a href="/sales/upcoming/{{$item->slug}}" class="b-link-stripe b-animate-go  thickbox"><img
							class="img-responsive" src="/admin1/assets/uploads/sales/{{$item->img_event}}" alt="">
							<div class="b-wrapper">
								<h3 class="b-animate b-from-left    b-delay03 ">
									<span>{{$item->name}}</span>
								</h3>
							</div> </a>
						<p>
							<a href="/sales/upcoming/{{$item->slug}}">{{$item->name}}</a>
						</p>
						<a href="/sales/upcoming/{{$item->slug}}" class="item_add"><p class="number item_price">
								 Starts in <?php   $interval = date_diff(date_create($item->start_date), date_create(date('Y-m-d')));
								echo $interval->format('%a Days');
								?>
							</p></a>
					</div>
					@endforeach
					<div class="clearfix"></div>
				</div>
			</div>
		</div>
		<!----->
	</div>
	<!---->
</div>
@endsection @section('script')
<!-- Important Owl stylesheet -->
<link rel="stylesheet" href="/shop/owl-carousel/owl.carousel.css">
<!-- Default Theme -->
<link rel="stylesheet" href="/shop/owl-carousel/owl.theme.css">
<!--  jQuery 1.7+  -->
<!-- Include js plugin -->
<script src="/shop/owl-carousel/owl.carousel.js"></script>
<script>
$(document).ready(function() {

  $("#owl-example").owlCarousel();

});
</script>
@endsection

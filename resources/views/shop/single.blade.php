@extends('shop.layouts.layout') @section('banner')
<div class="banner"
	style="background: url('/admin1/assets/uploads/sales/{{$product[0]->sale->img_banner}}') no-repeat; background-size: cover; min-height: 300px;">
</div>
@endsection @section('container')
<nav class="grow">
	<div class="container">
		<h5>
			<a class="breadcrumb-item" href="/sales">Sale</a> <a>/</a>
			<a class="breadcrumb-item" href="/sales/products/{{$product[0]->sale->slug}}">{{$product[0]->sale->name}}</a> <a>/</a> <span
				class="breadcrumb-item active">{{$product[0]->name}}</span>
		</h5>
	</div>
</nav>
<div class="product">
	<div class="container">
		<div class="product-price1">
			<div class="top-sing">
				<div class="col-md-7 single-top">
					<div class="flexslider">
						<ul class="slides">
						@if(count($product[0]->product_images)>0)
							@foreach($product[0]->product_images as $image)
							<li data-thumb="/admin1/assets/uploads/posts/{{$image->photo}}">
								<div class="thumb-image">
									<img src="/admin1/assets/uploads/posts/{{$image->photo}}" data-imagezoom="true"
										class="img-responsive">
								</div>
							</li>
							@endforeach
						@endif
						</ul>
					</div>
				
					<div class="clearfix"></div>
					<!-- slide -->
					<!-- FlexSlider -->
					<script defer src="/shop/js/jquery.flexslider.js"></script>
					<link rel="stylesheet" href="/shop/css/flexslider.css"
						type="text/css" media="screen" />
					<script>
// Can also be used with $(document).ready()
$(window).load(function() {
  $('.flexslider').flexslider({
    animation: "slide",
    controlNav: "thumbnails"
  });
});
</script>
				</div>	
				<div class="col-md-5 single-top-in simpleCart_shelfItem">
					<div class="single-para ">
						<h4>{{$product[0]->item->name}}</h4>
						<div class="star-on">
							<div class="review">
								<a> {{$product[0]->name}} </a>
							</div>
							<div class="clearfix"></div>
						</div>
						@if(count($product[0]->product_quantities)>0)
						<div class="tab-content">
								<?php $count_size = $count_color = $fade_color = $fade_size = 0; ?>
    							<input type="hidden" name="dataProduct" value="{{$product[0]->product_quantities[0]->id}}" id="dataProduct">
    							@foreach($product[0]->product_quantities as $key => $quantitites)
    								@if($quantitites->quantity > 0)
        							@if($fade_color == 0)
        							<?php $fade_color = 1; ?>
        							<div id="{{$quantitites->color_id}}{{$quantitites->id}}" class="tab-pane fade in active">
        							@else
        							<div id="{{$quantitites->color_id}}{{$quantitites->id}}" class="tab-pane fade">
        							@endif
    								<?php $count = 0; ?>
        							@for($i=0; $i< $key; $i++)
        								@if($product[0]->product_quantities[$i]->color_id == $quantitites->color_id)
        								<?php $count++; ?>
        								@endif								
            						@endfor
            						@if($count == 0)
            							<div class="tab-content">
            								@foreach($product[0]->product_quantities as $k => $size)
                								@if($size->color_id == $quantitites->color_id)
                									@if($fade_size == 0)
                									<?php $fade_size = 1; ?>
                            						<div id="size{{$quantitites->Product_color->bc}}{{$size->Product_sizes->id}}" class="tab-pane fade in active">
                            						@else
                            						<div id="size{{$quantitites->Product_color->bc}}{{$size->Product_sizes->id}}" class="tab-pane fade">
                            						@endif
                            							<h6 style="float: left;">
                                							<s>{{ number_format($size->price,0,',', '.') }}</s>₫
                                						</h6>
                                						<h5 class="item_price">{{ number_format($size->price_sale,0,',', '.') }}₫</h5>
                                						<div id="getdata">#code: 
                    										{{$size->id}}
                    									</div>
                            						</div>
                        						@endif
                        					@endforeach
            							</div>
            							<ul class="nav nav-tabs">
                							@foreach($product[0]->product_quantities as $k => $size)
                								@if($size->color_id == $quantitites->color_id)
                									@if($count_size == 0)
                									<?php $count_size = 1;?>
                            						<li class="active"><a data-toggle="tab" href="#size{{$quantitites->Product_color->bc}}{{$size->Product_sizes->id}}" onclick="changeDataProduct({{$size->id}});">{{$size->Product_sizes->size}}</a></li>
                            						@else
                            						<li class=""><a data-toggle="tab" href="#size{{$quantitites->Product_color->bc}}{{$size->Product_sizes->id}}" onclick="changeDataProduct({{$size->id}});">{{$size->Product_sizes->size}}</a></li>
                            						@endif
                        						@endif
                        					@endforeach
                						</ul>
            						@endif
        						</div>
        						@endif
        						@endforeach
        				
        				</div>
    						<ul class="nav nav-tabs colorList">
        						@foreach($product[0]->product_quantities as $key => $quantitites)
            						<?php $count = 0; ?>
        							@for($i=0; $i< $key; $i++)
        								@if($product[0]->product_quantities[$i]->color_id == $quantitites->color_id)
        								<?php $count++; ?>
        								@endif								
            						@endfor
            						@if($count == 0)
            							@if($count_color == 0)
            							<?php $count_color = 1; ?>
                            			<li class="active" style="background-color:{{$quantitites->Product_color->bc}}; border:1px solid black; margin-left: 3px;"><a data-toggle="tab" href="#{{$quantitites->color_id}}{{$quantitites->id}}"></a></li>
                            			@else
                            			<li class="" style="background-color:{{$quantitites->Product_color->bc}}; border:1px solid black; margin-left: 3px;"><a data-toggle="tab" href="#{{$quantitites->color_id}}{{$quantitites->id}}"></a></li>
                            			@endif
                            		@endif
                            	@endforeach
                        	</ul>
                    	@endif
						<div class="star-on">
							<p>
								<i class="fa fa-star-o" aria-hidden="true"></i> Cam kết 100%
								chính hãng
							</p>
							<p>
								<i class="fa fa-check-square-o" aria-hidden="true"></i> Giao
								hàng trong 2-7 ngày
							</p>
							<p>
								<i class="fa fa-refresh" aria-hidden="true"></i> Sản phẩm này
								không được đổi trả.
							</p>
						</div>
						<a href="#" id="add-to-cart" class="add-cart item_add" onclick='addcart();'>ADD TO CART</a>
						<div class="star-on">
							<div class="btn btn-info edit-collapse" data-toggle="collapse"
								data-target="#thongtin">Thông tin sản phẩm</div>
							<div id="thongtin" class="collapse">
								{{$product[0]->detail_product}}
							</div>
						</div>
						<div class="star-on">
							<button type="button" class="btn btn-info edit-collapse"
								data-toggle="collapse" data-target="#chatlieu">Chất liệu và cách
								bảo quản</button>
							<div id="chatlieu" class="collapse">
								{{$product[0]->material_storage}}
							</div>
						</div>
						<div class="star-on">
							<button type="button" class="btn btn-info edit-collapse"
								data-toggle="collapse" data-target="#kichco">Chi tiết về kích cỡ</button>
							<div id="kichco" class="collapse">
								{{$product[0]->detail_size}}
							</div>
						</div>
					</div>
				</div> 
				<div class="clearfix"></div>
				<div class="col-lg-12">
					{{$product[0]->detail_information}}
				</div>
			</div>
			<!---->
		</div>
		<div class="clearfix"></div>
	</div>
</div>
@endsection
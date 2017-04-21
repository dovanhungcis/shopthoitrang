@extends('shop.layouts.layout') @section('banner')
<div class="banner"
	style="background: url('/admin1/assets/uploads/sales/{{$products[0]->sale->img_banner}}') no-repeat; background-size: cover; min-height: 300px;">
</div>
@endsection @section('container')
<nav class="grow">
	<div class="container">
		<h5>
			<a class="breadcrumb-item" href="/sales">Sale</a> <a>/</a> <span
				class="breadcrumb-item active">{{$products[0]->sale->name}}</span>
		</h5>
	</div>
</nav>
<div class="pro-du">
	<div class="container">
		<div class="row ">
			<div class="col-lg-12">
				<h6>
					<i class="fa fa-clock-o" aria-hidden="true"></i> CLOSING IN 6 DAYS
				</h6>
			</div>
		</div>
		<div class="row" style="margin: 15px; margin-left: 0px;">
			<div class="col-lg-12 form-group ">
				<div class="input-group col-lg-12">
					<span class="input-group-addon" id="categories"> 
						@foreach($products as $key => $product)
							<?php $count = 0; ?>
							@for($i=0; $i< $key; $i++)
								@if($products[$i]->item->name == $product->item->name)
								<?php $count++; ?>
								@endif								
    						@endfor
    						@if($count == 0)
            					<span class="input-group">
                					<input type="checkbox" aria-label="Checkbox for following text input" name="product[]" value="{{$product->item->id}}"">
                					<span style="margin-left: 4px; margin-right: 8px;">{{$product->item->name}}</span>
            					</span>
            				@endif
						@endforeach
					</span>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-lg-12" id = "listProduct">
				@foreach($products as $product)
				<div class="bottom-cd simpleCart_shelfItem">
					<div class="product-at ">
						<a href="/sales/single/{{$product->slug}}">
						@if(count($product->product_images) == 0)
						<img
							class="img-responsive"
							src="/admin1/assets/uploads/CuteGirls(2).png" alt="">
						@else
						@foreach($product->product_images as $item) <img
							class="img-responsive"
							src="/admin1/assets/uploads/posts/{{$item->photo}}" alt="">
						@break @endforeach
						@endif
						<div class="pro-grid">
							<span class="buy-in">Chi tiết</span>
						</div>
						</a>
					</div>
					<p class="tun">
						<span>{{$product->name}}</span><br>{{$product->item->name}}
					</p>
					<div class="ca-rt">
						<a href="#" class="item_add"><p class="number item_price">
								<i> </i>
								<span>
								@if(count($product->product_images) == 0)
									Liên hệ với chúng tôi để biết giá
								@else
								@foreach($product->product_quantities as $quantities)
									<s>{{number_format($quantities->price, 0, ',', '.')}}</s>₫ {{ number_format($quantities->price_sale,0,',', '.')}}₫
								@break
								@endforeach
								@endif
								</span>
							</p></a>
					</div>
				</div>
				@endforeach
			</div>
		</div>
	</div>
</div>
@endsection
@section('script')
<script>
	$( "#categories" ).click(function() {
		$.ajaxSetup({
			headers: {
		    	'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		    }
		});
		var obj = [];
		var i = 0;
		$('input[name^="product"]').each(function() {
		    if($(this).is(':checked')){
				obj[i++] = $(this).val();
			}
		});
		if(obj.length==0){
			$('input[name^="product"]').each(function() {
				obj[i++] = $(this).val();
			});
		}
		$.ajax({
			type :'post',
		    url : '/sales/filter',
		    data : {
				"data" : obj,
				"sales" : {{$product->sale->id}}
			},
			success:function(data){
		    	
		    	$("#listProduct").empty();
		    	console.log(data);
		    	$( data ).each(function( i ) {
		    		$( data[i] ).each(function( i1 ) {
		    			console.log(i1);
		    			$("#listProduct").append(
		    					"<div class='col-md-6 bottom-cd simpleCart_shelfItem'>"+
		    					"<div class='product-at'>"+
		    						"<a href='/sales/single/"+ data[i][i1]['slug'] +"'>"+
		    						" <img class='img-responsive' src='/admin1/assets/uploads/posts/"+ data[i]['image'][0]['photo'] +"' alt=''>"+
		    						"<div class='pro-grid'>"+
		    							"<span class='buy-in'>Chi tiết</span>"+
		    						"</div>"+
		    						"</a>"+
		    					"</div>"+
		    					"<p class='tun'>"+
		    						"<span>"+data[i][i1]['name']+"</span><br>"+data[i]['item'][0]['name']+
		    					"</p>"+
		    					"<div class='ca-rt'>"+
		    						"<a href='#' class='item_add'><p class='number item_price'>"+
		    								"<i> </i>"+
		    								"<span>"+
		    								"<s>"+data[i]['price'][0]['price']+"</s>₫ "+ data[i]['price'][0]['price_sale'] +"₫"+
		    								"</span>"+
		    							"</p></a>"+
		    					"</div>"+
		    				"</div>");
		    		});
		    	});
		    }
		});
	});
</script>
@endsection
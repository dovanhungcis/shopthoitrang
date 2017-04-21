@extends('shop.layouts.layout') @section('container')
<nav class="grow">
	<div class="container">
		<center>
			<h3>
				Tổng Kết Đơn Hàng
				<h3>
		
		</center>
	</div>
</nav>
<div class="product">
	<div class="container">
	@if($products == 0)
		Không có sản phẩm nào.
	@else
		<div class="row">
			<div class="col-xs-12">
				<div class="col-xs-12">
    				<div class="col-xs-12"><h4>Đơn hàng ({{count($products)}} sản phẩm)</h4></div>
    				<div class="col-xs-12"><hr></div>
    				<div class="col-xs-12">
        				<div class="col-xs-6">Tổng tiền sản phẩm</div>
        				<div class="col-xs-6" id = "total_money_checkout">
        					<?php   $total_money_checkout = 0; 
        							foreach($products as $key => $product){
        								$total_money_checkout += $product->price_sale * $product->quantitiesOrder;
        							}
							?>
							{{ number_format($total_money_checkout,0,',', '.') }}₫
						</div>
    				</div>
    				<div class="col-xs-12">
        				<div class="col-xs-6">Phí vận chuyển</div>
        				<div class="col-xs-6">15.000₫</div>
    				</div>
    				<div class="col-xs-12"><hr></div>
    				<div class="col-xs-12">
        				<div class="col-xs-6"><h4>Tổng tiền</h4></div>
        				<div class="col-xs-6"><h4 id = "total_checkout">{{number_format(($total_money_checkout+15000),0,',', '.')}}₫</h4></div>
    				</div>
				</div>
				<div class="col-xs-12"><hr></div>
				<div class="col-xs-12">
    				<div class="col-xs-11"><h4>Địa chỉ giao hàng & hoá đơn</h4></div>
    				<div class="col-xs-1"><a class="color2" data-toggle="modal"
					data-target="#address" href="#">Edit</span></a></div>
    				<div class="col-xs-12"><hr></div>
    				<div class="col-xs-12">
        				<div class="col-xs-4">Họ và tên: {{ Sentinel::getUser()->last_name }} {{ Sentinel::getUser()->first_name }}  </div>
        				<div id="phone_checkout" class="col-xs-6"> Số điện thoại: <span id="phone_co"></span></div>
    				</div>
    				<div class="col-xs-12">
        				<div class="col-xs-4"></div>
        				<div id="error_phone" class="col-xs-6 error_order"> Bạn phải nhập số điện thoại.</div>
    				</div>
    				<div class="col-xs-12">
        				<div class="col-xs-12" id="address_checkout">Địa chỉ: <span id="address_co"></span> <span id="district_co"></span> <span id="city_co"></span></div>
    				</div>
    				<div class="col-xs-12">
        				<div class="col-xs-12 error_order" id="error_add">Bạn phải nhập đủ thông tin về địa chỉ.</div>
    				</div>
    				<div class="col-xs-12"><hr></div>
				</div>
				<div class="col-xs-12">
    				<div class="col-xs-11"><h4>Sản phẩm</h4></div>
    				<div class="col-xs-1"><a class="color2" data-toggle="modal"
					data-target="#myModal" href="#" onclick="showCart()">Edit</span></a></div>
    				<div class="col-xs-12"><hr></div>
    				 
    				@foreach($products as $key => $product)
    				<div class="col-xs-12" id = "item_product_checkout{{$product->id}}">
    					<div class="col-xs-2">
    						<img src = "/admin1/assets/uploads/posts/{{isset($product->Product->product_images[0]->photo)? $product->Product->product_images[0]->photo : ''}}" style="width: 100%; height: 100%;">
    					</div>
    					<div class="col-xs-8">
            				<div class="col-xs-12">
                				<div class="col-xs-12">
                					{{$product->Product->name}}
            					</div>
            				</div>
            				<div class="col-xs-12">
                				<div class="col-xs-6">
                					<div class="col-xs-4">Số lượng:</div>
                				
                					<div class="col-xs-1" id = "qty_checkout{{$product->id}}">{{$product->quantitiesOrder}}</div>
                					
            					</div>
            					<div class="col-xs-6">
                					<s>{{ number_format($product->price,0,',', '.') }}</s>₫ {{ number_format($product->price_sale,0,',', '.') }}₫
                					
                				</div>
            				</div>
            				
            				<div class="col-xs-12">
                				<div class="col-xs-6">
                					<div class="col-xs-12">Màu: {{$product->Product_color->color}}</div>
            					</div>
            					<div class="col-xs-6">
                					Kích cỡ: {{$product->Product_sizes->size}}
            					</div>
            				</div>
            				
            			</div>
    					<div class="col-xs-12"><hr></div>
    					</div>
    					 
    				@endforeach
				</div>
			</div>
			<div class="col-xs-12">
				<center><button type="button" class="btn btn-default" onclick="order()">Đặt hàng</button></center>
			</div>
		</div>
		<div class="clearfix"></div>
	</div>
</div>
<div id="address" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Modal Header</h4>
      </div>
      <div class="modal-body">
         
      			<div class = "">
      				Địa chỉ
      			</div>
      			<div class = "">
      				<input type="text" class="form-control" id="address_change">
      			</div>
      			<div class = "">
      				Tỉnh/Thành phố
      			</div>
      			<div class = "">
      				<input type="text" class="form-control" id="city">
      			</div>
      			<div class = "">
      				Quận/Huyện
      			</div>
      			<div class = "">
      				<input type="text" class="form-control" id="district">
      			</div>
      			<div class = "">
      				Số điện thoại di động
      			</div>
      			<div class = "">
      				<input type="number" class="form-control" id="phone">
      			</div>
      		 
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal" onclick="updateAddress()">Cập nhật</button>
      </div>
    </div>
	@endif
  </div>
</div>
@endsection

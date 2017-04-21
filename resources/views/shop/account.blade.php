@extends('shop.layouts.layout') @section('container')
<div class="container form-group">
	<ul class="nav nav-tabs">
		<li class="active"><a data-toggle="tab" href="#home">Thông tin tài
				khoản</a></li>
		<li><a data-toggle="tab" href="#menu1">Lịch sử đơn hàng</a></li>
	</ul>
	<div class="tab-content">
		<div id="home" class="tab-pane fade in active">
			<h3>Thông tin tài khoản</h3>
			<div class="container">
				<div class="row">
					<div class="col-lg-12">
						<h4>Thông tin cá nhân</h4>
					</div>
				</div>
				<div class="row">
					<div class="col-lg-12">
						<img
							src="/admin1/assets/uploads/{{ Sentinel::getUser()->avatar }}">
					</div>
				</div>
				<div class="row">
					<div class="col-lg-1">Họ và tên:</div>
					<div class="col-lg-1 l_name" id="l_name">{{
						Sentinel::getUser()->last_name }}</div>
					<div class="col-lg-9" id="f_name">{{
						Sentinel::getUser()->first_name }}</div>
				</div>
				<div class="row">
					<div class="col-lg-1">Email:</div>
					<div class="col-lg-11" id="">{{ Sentinel::getUser()->email }}</div>
				</div>
				<div class="row">
					<div class="col-lg-1">Giới tính:</div>
					<div class="col-lg-11" id="sex">{{ (Sentinel::getUser()->gender ==
						1) ? 'Nam' : 'Nữ' }}</div>
				</div>
				<div class="row">
					<div class="col-lg-1">Ngày sinh:</div>
					<div class="col-lg-11" id="birthday">{{
						Sentinel::getUser()->birthday }}</div>
				</div>
				<div class="row">
					<div class="col-lg-12">
						<div class="btn btn-info " data-toggle="modal"
							data-target="#myModal1" onclick="editInfo()">Sửa thông tin</div>
					</div>
				</div>
			</div>
		</div>
		<div id="menu1" class="tab-pane fade">
			@if($user->invoice != "null") @foreach($user->invoice as $invoice)

			<div class="col-xs-12">
				<hr>
			</div>
			<row>
			<div class="col-xs-12">
				<h4>Mã đơn hàng: #{{$invoice->id}}</h4>
			</div>
			<div class="col-xs-12">
				<hr>
			</div>
			<div class="col-xs-12">
				<div class="col-lg-12">
					<h4>Tổng tiền: {{ number_format($invoice->price,0,',', '.') }}₫</h4>
				</div>
			</div>
			<div class="col-xs-12">
				<hr>
			</div>
			<div class="col-xs-12">
				<div class="col-xs-11">
					<h4>Địa chỉ giao hàng & hoá đơn</h4>
				</div>
				<div class="col-xs-12">
					<div class="col-xs-4">Họ và tên: {{ Sentinel::getUser()->last_name
						}} {{ Sentinel::getUser()->first_name }}</div>
					<div id="phone_checkout" class="col-xs-6">Số điện thoại:
						{{$invoice->phone}}</div>
				</div>
				<div class="col-xs-12">
					<div class="col-xs-12" id="address_checkout">Địa chỉ:
						{{$invoice->address}}, {{$invoice->district}}, {{$invoice->city}}</div>
				</div>

				<div class="col-xs-12">
					<hr>
				</div>
			</div>
			<div class="col-xs-12">
				<div class="col-xs-11">
					<h4>Sản phẩm</h4>
				</div>
				<div class="col-xs-12">
					<hr>
				</div>

				@foreach($invoice->invoice_product as $key => $product)

				<div class="col-xs-12" id="item_product_checkout{{$product->id}}">

					<div class="col-xs-8">
						<div class="col-xs-12">
							<div class="col-xs-12">{{($product->Product->Product->name)}}</div>
						</div>
						<div class="col-xs-12">
							<div class="col-xs-6">
								<div class="col-xs-4">Số lượng:</div>

								<div class="col-xs-1" id="qty_checkout{{$product->id}}">{{$product->quantity}}</div>

							</div>
							<div class="col-xs-6">
								<s>{{ number_format($product->Product->price,0,',', '.') }}</s>₫
								{{ number_format($product->Product->price_sale,0,',', '.') }}₫

							</div>
						</div>

						<div class="col-xs-12">
							<div class="col-xs-6">
								<div class="col-xs-12">Màu:
									{{$product->Product->Product_color->color}}</div>
							</div>
							<div class="col-xs-6">Kích cỡ:
								{{$product->Product->Product_sizes->size}}</div>
						</div>

					</div>
					<div class="col-xs-12">
						<hr>
					</div>
				</div>

				@endforeach
			</div>
			</row>
			@endforeach @endif
		</div>
	</div>
</div>
<div id="myModal1" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Modal Header</h4>
      </div>
      <div class="modal-body">
       		<form class="form-horizontal">
                <div class="form-group">
                  <label class="control-label col-sm-2">Họ:</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="last_name">
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-sm-2">Tên:</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="first_name" placeholder="">
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-sm-2">Ngày sinh</label>
                  <div class="col-sm-10">
                    <input type="date" class="form-control" id="date" placeholder="">
                  </div>
                </div>
                 <div class="form-group">
                  <label class="control-label col-sm-2">Giới tính</label>
                  <div class="col-sm-10">
                   <input type="radio" name="inlineRadioOptions" id="inlineRadio1" value="1"> Nam
                   <input type="radio" name="inlineRadioOptions" id="inlineRadio" value="0"> Nữ
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-sm-2" for="pwd">Mật khẩu mới:</label>
                  <div class="col-sm-10">
                    <input type="password" class="form-control" id="pwd" placeholder="">
                  </div>
                </div>
              </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal" onclick="updateInfo()">Cập nhật</button>
      </div>
    </div>

  </div>
</div>
@endsection
@section('script')
	<script type="text/javascript">

    </script>
@endsection

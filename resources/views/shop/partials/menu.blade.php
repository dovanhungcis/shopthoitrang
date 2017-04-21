
<div class="container">
	<div class="head-top">
		<div class="logo">
			<h1>
				<a href="{{url('/sales/')}}">
				<img
					src="{{asset('/img/Logo.png')}}">
				</a>
			</h1>
		</div>
		<div class=" h_menu4">
			<ul class="memenu skyblue">

				<li><a class="color1" href="#">MY ACCOUNT</a>
					<div class="mepanel">
						<div class="row">
							<div class="col1">
								<div class="h_nav">
									<ul>
										<li><a href="{{url('/sales/account')}}">PROFILE</a></li>
										<li><a href="{{url('/sales/logout')}}">LOGOUT</a></li>
									</ul>
								</div>
							</div>
						</div>
					</div></li>
				<li class="grid"><a class="color2" data-toggle="modal"
					data-target="#myModal" href="#" onclick="showCart()">BAG: <span id = "number_order" style="color: red;">
                                        					<?php  $value = session('cart');
                                                                   echo count($value);
                                                             ?>
                                              			  </span></a></li>
			</ul>
		</div>
		<div id="myModal" class="modal fade" role="dialog">
			<div class="modal-dialog">
				<!-- Modal content-->
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal">&times;</button>
						<h4 class="modal-title">Giỏ Hàng</h4>
					</div>
					<div class="modal-body" id = "">
						<div id = "cart_order">
    							<p>Đang xử lý...</p>
    							<div class="clearfix"></div>
    					</div>
    						<hr>

						<div class="form-inline">
							<label for="example-text-input" class="col-2 col-form-label">Tổng tiền</label>
							<label class="col-form-label" id = "total_money"></label>
						</div>
						<div class="form-inline">
							<label for="example-text-input" class="col-2 col-form-label">Tiết kiệm</label>
							<label class="col-form-label col-4" id = "safe_money"></label>
						</div>
					</div>
					<div class="modal-footer">
						<a href="/sales/cart/checkout"><button type="button" class="btn btn-default" >Tiến
							hành đặt hàng</button></a>
						<button type="button" class="btn btn-default" data-dismiss="modal">Tiếp
							tục mua sắm</button>
					</div>
				</div>
			</div>
		</div>
		<div class="clearfix"></div>
	</div>
</div>
</div>



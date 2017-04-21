@extends('admin.template') @section('title', 'Invoice')
@section('content')

<!-- START BREADCRUMB -->
<ul class="breadcrumb">
	<li><a href="#">Home</a></li>
	<li><a class="active" href="#">Invoice</a></li>
</ul>
<!-- END BREADCRUMB -->

<!-- PAGE CONTENT WRAPPER -->
<div class="page-content-wrap">
	<div class="row">
		<div class="col-md-12">
			<div class="panel panel-default">
				<div class="panel-body">
					<h2>
						INVOICE <strong>#{{$invoice->id}}</strong>
					</h2>
					<div class="push-down-10 pull-right">
						<button class="btn btn-default">
							<span class="fa fa-print"></span> Print
						</button>
					</div>
					<!-- INVOICE -->
					<div class="invoice">

						<div class="row">
							<div class="col-md-4">
								<div class="invoice-address">
									<h5>From</h5>
									<h6>MeraShop</h6>
									<p>Cowell-Asia</p>
									<p>3D Building Duy Tan Street</p>
									<p>HaNoi, VietNam</p>
									<p>Phone: (+84)999 999 999</p>
								</div>
							</div>
							<div class="col-md-4">
								<div class="invoice-address">
									<h5>To</h5>
									<h6>{{$invoice->user->first_name}} {{$invoice->user->last_name}}</h6>
									<p>{{$invoice->address}}</p>
									<p>{{$invoice->district}}</p>
									<p>{{$invoice->city}}</p>
									<p>Phone: {{$invoice->phone}}</p>
								</div>
							</div>
							<div class="col-md-4">
								<div class="invoice-address">
									<h5>Invoice</h5>
									<table class="table table-striped">
										<tbody>
											<tr>
												<td width="200">Invoice Number:</td>
												<td class="text-right">#{{$invoice->id}}</td>
											</tr>
											<tr>
												<td>Invoice Date:</td>
												<td class="text-right">{{$invoice->created_at}}</td>
											</tr>
											<tr>
												<td><strong>Total:</strong></td>
												<td class="text-right"><strong>{{$invoice->price}}₫</strong></td>
											</tr>
										</tbody>
									</table>
								</div>
							</div>
						</div>

						<div class="table-invoice">
							<table class="table">
								<tbody>
									<tr>
										<th>Item Description</th>
										<th class="text-center">Unit Price</th>
										<th class="text-center">Price Sale</th>
										<th class="text-center">Quantity</th>
										<th class="text-center">Total</th>
									</tr>
									@foreach($invoice->invoice_product as $key => $product)
									<tr>
										<td><strong>{{($product->Product->Product->name)}}<strong>
										<td class="text-center"><s>{{ number_format($product->Product->price,0,',', '.') }}</s>₫</td>
										<td class="text-center">{{ number_format($product->Product->price_sale,0,',', '.') }}₫</td>
										<td class="text-center">{{$product->quantity}}</td>
										<td class="text-center">{{ number_format($product->Product->price_sale*$product->quantity,0,',', '.') }}</td>
									</tr>
									@endforeach
								</tbody>
							</table>
						</div>

						<div class="row">
							<div class="col-md-6">
								<h4>Payment Methods</h4>

								<div class="paymant-table">
									<a>
										Ship COD
										<p>Receive and Pay</p>
									</a>
								</div>

							</div>
							<div class="col-md-6">
								<h4>Amount Due</h4>

								<table class="table table-striped">
									<tbody>
										<tr class="total">
											<td>Total Amount:</td>
											<td class="text-right">{{ number_format($invoice->price,0,',', '.')}}₫</td>
										</tr>
									</tbody>
								</table>
							</div>
						</div>

						<div class="row">
							<div class="col-md-12">
								<div class="pull-right push-down-20">
									<a href="{{route('admin@invoice@acceptorder', $invoice->id)}}" class="btn btn-success fa fa-credit-card"> Accept Order</a>
								</div>
							</div>
						</div>
					</div>
					<!-- END INVOICE -->

				</div>
			</div>

		</div>
	</div>

</div>
<!-- END PAGE CONTENT WRAPPER -->

@endsection

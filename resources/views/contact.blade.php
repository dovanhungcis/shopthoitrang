@extends('layouts.app') @section('container')
<div class="breadcrumb breadcrumb-v2 breadcrumb-bg">
	<img
		src="//cdn.shopify.com/s/files/1/1204/0390/t/16/assets/breadcrumbs.jpg?14366963195442213923"
		alt="" />
	<div class="breadcrumb-inner ">
		<div class="container">
			<a href="/" title="Home">Home</a> <span class="scr"
				aria-hidden="true">/</span> <span>Contact</span>
			<h3>Contact</h3>
		</div>
	</div>
</div>
<div class="container">
	<div class="page-content">
		<div class="row">
			<div class="col-md-6">
				<div class="contact-info">
					<div id="map" class="contact-map">day la map</div>
					<div class="rte">
						<p>Simolux, Inc. fosters a culture of invention. We create
							products, services and experiences for today’s man while solving
							problems for the next generation.</p>
						<h2>FIND THE BEST CONTACT INFO FOR YOUR NEEDS</h2>
						<div class="row">
							<div class="col-md-6">
								<h3>CALL US</h3>
								<ul>
									<li>84-4567-421-978</li>
									<li>4 am - 11 pm, PT</li>
									<li>7 days a week</li>
								</ul>
							</div>
							<div class="col-md-6">
								<h3>LIVE CHAT</h3>
								<div>Locate a Simolux retail store or authorized retailer.</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-md-6">
				<h1 class="page-title">Contact us</h1>
				<form method="post"
					action="https://simolux.myshopify.com/contact#contact_form"
					id="contact_form" class="contact-form" accept-charset="UTF-8">
					<input type="hidden" value="contact" name="form_type" /><input
						type="hidden" name="utf8" value="✓" />
					<div class="row">
						<div class="col-md-6">
							<label for="ContactFormName" class="label--hidden">Name</label> <input
								type="text" id="ContactFormName" name="contact[name]"
								placeholder="Name" autocapitalize="words" value="">
						</div>
						<div class="col-md-6">
							<label for="ContactFormEmail" class="label--hidden">Email</label>
							<input type="email" id="ContactFormEmail" name="contact[email]"
								placeholder="Email" autocorrect="off" autocapitalize="off"
								value="">
						</div>
					</div>
					<label for="ContactFormPhone" class="label--hidden">Phone Number</label>
					<input type="tel" id="ContactFormPhone"
						name="contact[phone-number]" placeholder="Phone Number"
						pattern="[0-9\-]*" value=""> <label for="ContactFormMessage"
						class="label--hidden">Message</label>
					<textarea rows="10" id="ContactFormMessage" name="contact[body]"
						placeholder="Message"></textarea>
					<br> <input type="submit" class="btn btn-primary pull-right"
						value="Send">
				</form>
			</div>
		</div>
	</div>
</div>

@endsection

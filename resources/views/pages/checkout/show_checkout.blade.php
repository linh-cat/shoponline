@extends('welcome')

@section('content')
	<section id="cart_items">
			<div class="breadcrumbs">
				<ol class="breadcrumb">
				  <li><a href="#">Home</a></li>
				  <li class="active">Check out</li>
				</ol>
			</div><!--/breadcrums-->

			<div class="register-req">
				<p>Please use Register And Checkout to easily get access to your order history, or use Checkout as Guest</p>
			</div><!--/register-req-->

			<div class="shopper-informations">
				<div class="row">
					<div class="col-sm-6">
						<div class="shopper-info">
							<p>Shipping Information</p>
                            <form action="/save-checkout-customer" method="POST">
                                {{ csrf_field() }}
								<input type="email" placeholder="Email" name="shipping_email">
								<input type="text" placeholder="First and last name" name="shipping_name">
								<input type="text" placeholder="Address" name="shipping_address">
                                <input type="text" placeholder="Phone" name="shipipng_phone">
                                <textarea name="shipipng_notes"  placeholder="Notes order" rows="3"></textarea>

                                <input type="submit" value="Sent" name="sent-order" class="btn btn-primary">
							</form>

						</div>
					</div>
					<div class="col-sm-6">
						<div class="order-message">
							<p>Shipping Notes</p>
							<textarea name="message"  placeholder="Notes about your order, Special Notes for Delivery" rows="16"></textarea>
							<label><input type="checkbox"> Shipping to bill address</label>
						</div>
					</div>
				</div>
			</div>
			<div class="review-payment mb-3">
				<h2>Review & Payment</h2>
			</div>

			<div class="payment-options">
					<span>
						<label><input type="checkbox" style="margin-top: 20px;"> Direct Bank Transfer</label>
					</span>
					<span>
						<label><input type="checkbox"> Check Payment</label>
					</span>
					<span>
						<label><input type="checkbox"> Paypal</label>
					</span>
				</div>
	</section> <!--/#cart_items-->

@endsection

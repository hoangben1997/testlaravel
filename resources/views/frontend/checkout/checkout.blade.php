@extends('frontend.layouts.app')
@section('content')
<section id="cart_items">
	<div class="container">
		<div class="breadcrumbs">
			<ol class="breadcrumb">
			  <li><a href="#">Home</a></li>
			  <li class="active">Check out</li>
			</ol>
		</div><!--/breadcrums-->

		<div class="step-one">
			<h2 class="heading">Step1</h2>
		</div>
		<div class="checkout-options">
			<h3>New User</h3>
			<p>Checkout options</p>
			<ul class="nav">
				<li>
					<label><input type="checkbox"> Register Account</label>
				</li>
				<li>
					<label><input type="checkbox"> Guest Checkout</label>
				</li>
				<li>
					<a href=""><i class="fa fa-times"></i>Cancel</a>
				</li>
			</ul>
		</div><!--/checkout-options-->

		<div class="register-req">
			<p>Please use Register And Checkout to easily get access to your order history, or use Checkout as Guest</p>
		</div><!--/register-req-->

		
			
					<div class="signup-form"><!--sign up form-->
						<h2>Register Account!</h2>
						@if(session('success'))
		                <div class="alert alert-success alert-dismissible">
		                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
		                    <h4><i class="icon fa fa-check"></i>Thong bao!</h4>
		                    {{session('success')}}
		                </div>
		                @endif
		                @if($errors->any())
		                <div class="alert alert-danger alert-dismissible">
		                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
		                    <h4><i class="icon fa fa-check"></i>Thong bao!</h4>
		                    <ul>
		                        @foreach($errors->all() as $error)
		                        <li>{{$error}}</li>
		                        @endforeach
		                    </ul>
		                </div>
		                @endif

						<form action="" method="POST" enctype="multipart/form-data">
							@csrf
							<input type="text" placeholder="Name" name="name" value=""/>
							<input type="text" placeholder="Email Address" name="email" value=""/>
							<input type="password" placeholder="Password" name="password" value=""/>
							<input type="file" placeholder="Images" name="avatar" value="" />
							<input type="text" placeholder="Phones" name="phone" value=""/>
							<button type="submit" class="btn btn-default" name="submit">Register</button>
						</form>
					
					</div>
			
		


		<div class="review-payment">
			<h2>Review & Payment</h2>
		</div>
<?php
	$cartProduct = session()->get('cart');	
	$a = empty($cartProduct);
	if ($a != 1) {
?>
		<div class="table-responsive cart_info">
			
			<table class="table table-condensed">
				<thead>
					<tr class="cart_menu">
						<td class="description">STT</td>
						<td class="image">Item</td>
						<td class="description">Name</td>
						<td class="price">Price</td>
						<td class="quantity">Quantity</td>
						<td class="total">Total</td>
						<td></td>
					</tr>
				</thead>
				<tbody>
					
<?php
	$cartProduct = session()->get('cart');	//	  
	if (isset($cartProduct)) {
		$totalAll = 0;
		foreach($cartProduct as $key => $value){
			$getArrImage = json_decode($value['avatar'], true);
			
			$qty = $value['qty'];
			$price = (int)str_replace('$','',$value['price']);
			$total = $qty * $price;
			$totalAll = $totalAll + $total;
			// echo $total;

?>
					<tr id="{{$value['id']}}">
						<td class="cart_description">
							<h4><a href="">{{ $key+1 }}</a></h4>
						</td>
						
						<td class="cart_product">
							<a><img src="{{asset('upload/frontend/product/'.Auth::id().'/'.$getArrImage[0])}}" alt="" width="85px" height="84px"></a>
						</td>
						<td class="cart_description">
							<h4><a href=""><?php echo $value['name']; ?></a></h4>
							<p>Web ID: <?php echo $value['id']; ?></p>
						</td>
						<td id="{{$price}}" class="cart_price">
							<p><?php echo $value['price']; ?></p>
						</td>
						<td class="cart_quantity">
							<div class="cart_quantity_button buttonCart">
								<a class="cart_quantity_up upCart" href=""> + </a>
								<input id="{{$qty}}" class="cart_quantity_input inputCart" type="text" name="quantity" value="{{$value['qty']}}" autocomplete="off" size="2">
								<a class="cart_quantity_down downCart" href=""> - </a>
							</div>
						</td>
						<td class="cart_total">
							<p id="{{$total}}" class="cart_total_price priceCart">$<?php echo $total; ?></p>
						</td>
						<td class="cart_delete">
							<a class="cart_quantity_delete deleteCart" href=""><i class="fa fa-times"></i></a>
						</td>
					</tr>
<?php
		}
	}
?>
					
						<td colspan="4">&nbsp;</td>
						<td colspan="2">
							<div class="total_area">
							<table class="table table-condensed total-result">
								<tr>
									<td>Cart Sub Total</td>
									<td><span id="<?php echo (!empty($totalAll)) ? $totalAll : 0;?>" class="totalAll">$<?php echo (!empty($totalAll)) ? $totalAll : 0;?></span ></td>
								</tr>
								<tr>
									<td>Exo Tax</td>
									<td><span>$2</span></td>
								</tr>
								<tr class="shipping-cost">
									<td>Shipping Cost</td>
									<td><span>Free</span></td>										
								</tr>
								<tr>
									<td>Total</td>
									<td><span class="totalTax">$<?php echo (!empty($totalAll)) ? $totalAll+2 : 0;?></span></td>
								</tr>
							</table>
							</div>
						</td>
					</tr>
				</tbody>
			</table>
			

				<a class="btn btn-default get pull-right" href="{{url ('/order')}}"> Order </a>
			
			
		</div>
	
<?php
	  }else{
?>
<div class="col-sm-12"><h2>Ban chua mua san pham nao</h3></div>

<?php
}  

?>
		<div class="payment-options">
				<span>
					<label><input type="checkbox"> Direct Bank Transfer</label>
				</span>
				<span>
					<label><input type="checkbox"> Check Payment</label>
				</span>
				<span>
					<label><input type="checkbox"> Paypal</label>
				</span>
			</div>
	</div>
</section> <!--/#cart_items-->
@endsection
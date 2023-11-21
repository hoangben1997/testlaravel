@extends('frontend.layouts.app')
@section('content')

<?php
	$cartProduct = session()->get('cart');	
	$a = empty($cartProduct);
	if ($a != 1) {
?>
<section id="cart_items" >
	<div class="container">
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
					
				</tbody>
			</table>
		</div>	
	</div>
</section> <!--/#cart_items-->
<?php
	  }else{
?>
<h2>Ban chua mua san pham nao</h3>
<?php
}  

?>

<section id="do_action">
<div class="container">
	<div class="heading">
		<h3>What would you like to do next?</h3>
		<p>Choose if you have a discount code or reward points you want to use or would like to estimate your delivery cost.</p>
	</div>
	<div class="row">
		<div class="col-sm-6">
			<div class="chose_area">
				<ul class="user_option">
					<li>
						<input type="checkbox">
						<label>Use Coupon Code</label>
					</li>
					<li>
						<input type="checkbox">
						<label>Use Gift Voucher</label>
					</li>
					<li>
						<input type="checkbox">
						<label>Estimate Shipping & Taxes</label>
					</li>
				</ul>
				<ul class="user_info">
					<li class="single_field">
						<label>Country:</label>
						<select>
							<option>United States</option>
							<option>Bangladesh</option>
							<option>UK</option>
							<option>India</option>
							<option>Pakistan</option>
							<option>Ucrane</option>
							<option>Canada</option>
							<option>Dubai</option>
						</select>
						
					</li>
					<li class="single_field">
						<label>Region / State:</label>
						<select>
							<option>Select</option>
							<option>Dhaka</option>
							<option>London</option>
							<option>Dillih</option>
							<option>Lahore</option>
							<option>Alaska</option>
							<option>Canada</option>
							<option>Dubai</option>
						</select>
					
					</li>
					<li class="single_field zip-field">
						<label>Zip Code:</label>
						<input type="text">
					</li>
				</ul>
				<a class="btn btn-default update" href="">Get Quotes</a>
				<a class="btn btn-default check_out" href="">Continue</a>
			</div>
		</div>
		<div class="col-sm-6">
			<div class="total_area">
				<ul>
					<li>Cart Sub Total <span id="<?php echo (!empty($totalAll)) ? $totalAll : 0;?>" class="totalAll">$<?php echo (!empty($totalAll)) ? $totalAll : 0;?></span ></li>
					<li>Eco Tax <span>$2</span></li>
					<li>Shipping Cost <span id="free">Free</span></li>
					<li>Total <span class="totalTax">$<?php echo (!empty($totalAll)) ? $totalAll+2 : 0;?></span></li>
				</ul>
					<a class="btn btn-default update" href="">Update</a>
					<a class="btn btn-default check_out" href="{{url ('/cart/checkout')}}">Check Out</a>
			</div>
		</div>
	</div>
</div>
</section><!--/#do_action-->

@endsection
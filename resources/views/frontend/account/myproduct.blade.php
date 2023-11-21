@extends('frontend.layouts.app')
@section('content')



<section id="cart_items">
	<div class="container">
		<div class="row">
			<div class="col-sm-3">
				<div class="left-sidebar">
					<h2>Account</h2>
					<div class="panel-group category-products" id="accordian"><!--category-productsr-->
						
						<div class="panel panel-default">
							<div class="panel-heading">
								<h4 class="panel-title"><a href="{{ url('account/update') }}">ACCOUNT</a></h4>
							</div>
						</div>
						<div class="panel panel-default">
							<div class="panel-heading">
								<h4 class="panel-title"><a href="{{ url('account/myproduct') }}">MY PRODUCT</a></h4>
							</div>
						</div>
					</div><!--/category-productsr-->
				</div>
			</div>
			
			<div class="col-sm-9 padding-right">
				<div class="features_items"><!--features_items-->
					<h2 class="title text-center">MY PRODUCT</h2>
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
					<div class="signup-form">
						

	                    

						<div class="table-responsive cart_info">
							<table class="table table-condensed">
								<thead>
									<tr class="cart_menu ">
										<td class="id">Id</td>
										<td class="name">Name</td>
										<td class="image">Images</td>
										<td class="price">Price</td>
										<td class="price">Action</td>
										<td></td>
									</tr>
								</thead>
								<tbody>
								@if(!empty($product))
									@foreach($product as $key => $value)

									<tr>
										<td class="cart_description">
											<h4><a href="">{{ $key+1 }}</a></h4>
										</td>

										<td class="cart_description">
											<h4><a href="">{{$value['name']}}</a></h4>
										</td>
										
										
										<?php

											$getArrImage = json_decode($value['avatar'], true); 
											if ($getArrImage) {
												
												
										?>
										<td class="cart_product">
											<a><img src="{{asset('upload/frontend/product/'.Auth::id().'/'.$getArrImage[0])}}" alt="" width="85px" height="84px"></a>
										</td>
										<?php
												
											}else{
										?>
										<td class="cart_product">
											<a href="">Chua co hinh anh</a>
										</td>
										<?php
											}
										?>

										
										

										<td class="cart_price">
											<p>{{$value['price']}}</p>
										</td>
										
										<td class="cart_delete">
											<a class="cart_quantity_delete" href="{{'product/delete/'.$value['id']}}"><i class="fa fa-times"></i></a>
											<a class="cart_quantity_delete" href="{{'product/edit/'.$value['id']}}"><i class="fa fa-edit" ></i></a>
										</td>
									</tr>
									@endforeach
								
								@endif
								</tbody>
								
							</table>
							<tfoot >
			                    <tr>
			                        <td >
			                            
			                            <a  href="{{'product/add'}}"><button  class="btn btn-default check_out pull-right">Add product</button></a>

			                        </td>
			                    </tr>
			                </tfoot>
						</div>
					
				    </div>
				</div><!--features_items-->
			</div>
		</div>
	</div>
</section>



	
@endsection
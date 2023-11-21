@extends('frontend.layouts.app')
@section('title', 'Product detail')
@section('content')
<section>
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
					<h2 class="title text-center">CREATE PRODUCT</h2>

					<div class="signup-form">
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

						<div class="form-data">
							<form action="#" method="POST" enctype="multipart/form-data">
								@csrf
								<input type="text" placeholder="Name" name="name" value=""/>
						
								<input type="price" placeholder="Price" name="price" value=""/>
								<input type="hidden" placeholder="" name="iduser" value=""/>

								<select class="form-control form-control-line" name="category">
									<!-- <option>Please choose category</option> -->
									<?php
	                                    if (!empty($category)) {
	     
	                                        foreach ($category as $key => $value){
	                                ?>
	                                
	                 				<option value="{{ $value->id }}"><?php echo $value->category; ?></option>
	                 				<?php
                                            }
                                        }
                                    ?>
	                            </select>

	                            <select class="form-control form-control-line" name="brand">
	                 				<!-- <option>Please choose brand</option> -->
	                 				<?php
	                                    if (!empty($brand)) {
	     
	                                        foreach ($brand as $key => $items){
	                                ?>
	                                <option value="{{ $items->id }}"><?php echo $items->brand; ?></option>
	                                <?php
                                            }
                                        }
                                    ?>
	                            </select>
	                            <!-- <select class="form-control form-control-line">
	                 				<option>Sale</option>
	                            </select> -->
	                            <div class="form-group"> 
	                                <select class="form-control form-control-line-status" name="status">
	                               		<option class="op1" value="1">New</option>
	                               		<option class="op2" value="2">Sale</option>
	                                </select>
	                                <input class="op2sale" type="text" placeholder="0%" name="sale" value=""/>
		                        </div>

								<input type="text" placeholder="Company profile" name="company"/>
								<input type="file" placeholder="Images" name="avatar[]" multiple="multiple"/>
								
								<textarea class="form-control-detail" placeholder="Detail" name="detail"></textarea>
					
								<button type="submit" class="btn btn-default" name="submit">Add product</button>
							</form>
						</div>
				    </div>
				</div><!--features_items-->
			</div>
		</div>
	</div>
</section>

@endsection
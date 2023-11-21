@extends('frontend.layouts.app')
@section('title', 'Account')
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
					<h2 class="title text-center">ACCOUNT</h2>
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
								<input type="text" placeholder="Name" name="name" value="{{Auth::user()->name}}"/>
							
								<input type="email" disabled placeholder="Email Address" name="email" value="{{Auth::user()->email}}"/>
								
								<input type="password" placeholder="Password" name="password" value=""/>
								
								<input type="text" placeholder="Phones" name="phone" value="{{Auth::user()->phone}}"/>
								<input type="text" placeholder="Address" name="address" value="{{Auth::user()->address}}"/>
								<input type="file" placeholder="Images" name="avatar" />
								
								
								<button type="submit" class="btn btn-default pull-right" name="submit">Update</button>
							</form>
						</div>
					</div>
				</div><!--features_items-->
			</div>
		</div>
	</div>
</section>
@endsection
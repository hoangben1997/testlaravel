@extends('frontend.layouts.app')
@section('content')
<section id=""><!--form-->
	<div class="container">
		<div class="card-body">
				<div class="signup-form"><!--sign up form-->
					<h2>Register!</h2>
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
		</div>
	</div>
</section><!--/form-->
@endsection
@extends('frontend.layouts.app')
@section('content')

<?php
        if (!empty($table)) {

            foreach ($table as $key => $value){
    ?>
<div class="form-group col-sm-12">
	
	<div class="blog-post-area">
		<h2 class="title text-center">Latest From our Blog</h2>
		<div  id="{{$value->id}}" class="single-blog-post">
			<h3><?php echo $value->title; ?></h3>
			<div class="post-meta">
				<ul>
					<li><i class="fa fa-user"></i> Mac Doe</li>
					<li><i class="fa fa-clock-o"></i> 1:33 pm</li>
					<li><i class="fa fa-calendar"></i> DEC 5, 2013</li>
				</ul>
				

			</div>
			<a href=""><img src="{{asset('admin/assets/images/users/'.$value->image)}}" alt=""></a>
			<p></p>

			
			<div class="pager-area">
				
				<ul class="pager pull-right">
					<?php
					if (!empty($previous)) {
					?>
					<li><a href="{{ URL::to( 'blogsingle/' . $previous ) }}">Pre</a></li>
					<?php
					}
					?>
					
					<?php
					if (!empty($next)) {
					?>
					<li><a href="{{ URL::to( 'blogsingle/' . $next ) }}">Next</a></li>
					<?php
					}
					?>
				</ul>
			</div>
		</div>
	</div><!--/blog-post-area-->


<div class="rating-area">

		<ul class="ratings">
			<li class="rate-this">Rate this item:</li>
			<li>
				
				<div class="rate">
				    <div class="vote">
				    	<?php
				    if (!empty($rateTB)) {
				    		
				    	
				    	for($i = 1; $i<=5; $i++){
				    		$xx="";
				    		if ($i <= $rateTB) {
				    			$xx="ratings_over";
				    		}
				    				
				    	?>
						<div class="star_<?php echo $i; ?> ratings_stars <?php echo $xx; ?>"><input value="<?php echo $i; ?>" type="hidden"></div>
				       	<?php
				       		// }
						}
					}
				       	?>

				        <span class="rate-np"><?php echo $rateTB; ?></span>
				    </div> 
				</div>
			</li>
			<li class="color">(<?php echo $count; ?> votes)</li>
		</ul>
		<ul class="tag">
			<li>TAG:</li>
			<li><a class="color" href="">Pink <span>/</span></a></li>
			<li><a class="color" href="">T-Shirt <span>/</span></a></li>
			<li><a class="color" href="">Girls</a></li>
		</ul>
	</div><!--/rating-area-->

	<div class="socials-share">
		<a href=""><img src="images/blog/socials.png" alt=""></a>
	</div><!--/socials-share-->

	<div class="media commnets">
		<a class="pull-left" href="#">
			<img class="media-object" src="images/blog/man-one.jpg" alt="">
		</a>
		<div class="media-body">
			<h4 class="media-heading">Annie Davis</h4>
			<p><?php echo $value->content; ?></p>
			<div class="blog-socials">
				<ul>
					<li><a href=""><i class="fa fa-facebook"></i></a></li>
					<li><a href=""><i class="fa fa-twitter"></i></a></li>
					<li><a href=""><i class="fa fa-dribbble"></i></a></li>
					<li><a href=""><i class="fa fa-google-plus"></i></a></li>
				</ul>
				<a class="btn btn-primary" href="">Other Posts</a>
			</div>
		</div>
	<?php
        }
    }
?>
	</div><!--Comments-->

	
	
	
	<div class="response-area">
		<h2>{{$countcmt}} Bình Luận</h2>

		@if(!empty($blogcomment))
			@foreach($blogcomment as $key => $value)  
		<ul class="media-list">
			<li class="media">	
				<a class="pull-left" href="#">
					<img  class="media-object pull-left" src="{{asset('admin/assets/images/users/'.$value['avatar'])}}" width="100px" alt="">
				</a>
				<div class="media-body">
					<ul class="sinlge-post-meta">
						<li><i class="fa fa-user"></i>{{$value['name']}}</li>
						<li><i class="fa fa-clock-o"></i> {{$value['created_at']}}</li>
						<!-- <li><i class="fa fa-calendar"></i> </li> -->
					</ul>
					<p>{{$value['comment']}}</p>
					
					<div class="div_con">
                        <button class="btn btn-primary replay_cmt" type="submit">Replay</button>


                        <form class="cmtcon col-sm-12  text-area blank-arrow " action="" method="POST">
                            @csrf
                            <textarea name="message" class="message" rows="2" id="text_rep"></textarea>
                            <input type="hidden" class="rep_cmt" name="level" value="{{$value['id']}}">
                            <button action="" class="btn btn-primary replay_cmt2" type="submit">Rep comment</button>
                        </form>
                    </div>
				</div>
	
			</li>
						
				@foreach($blogcomment as $key => $repcmt)
		            @if($repcmt['level'] == $value['id'])

		            <li class="media second-media">
		                <a class="pull-left" href="#">
		                    <img class="media-object" src="{{asset('admin/assets/images/users/'.$repcmt['avatar'])}}" width="100px" alt="">
		                </a>
		                <div class="media-body">
		                    <ul class="sinlge-post-meta">
		                        <li><i class="fa fa-user"></i>{{$repcmt['name']}}</li>
		                        <li><i class="fa fa-clock-o"></i>  {{$repcmt['created_at']}}</li>
		                        <!-- <li><i class="fa fa-calendar"></i></li> -->
		                    </ul>
		                    <p>  {{$repcmt['comment']}}</p>
		                    

		                </div>
		            </li>
		            @endif
		        @endforeach
		</ul>
			@endforeach	
		@endif					
	</div><!--/Response-area-->
	
	
	<div class="replay-box">
		<div class="row">
			<div class="col-sm-12">
				<h2>Leave a replay</h2>
				<form  method="POST">
					@csrf
					<!-- <div class="blank-arrow">
						<label>Your Name</label>
					</div>
					<span>*</span>
					<input type="text" placeholder="write your name...">
					<div class="blank-arrow">
						<label>Email Address</label>
					</div>
					<span>*</span>
					<input type="email" placeholder="your email address...">
					<div class="blank-arrow">
						<label>Web Site</label>
					</div>
					<input type="email" placeholder="current city..."> -->
					<input type="hidden" class="_token" value="{{csrf_token()}}" >
					<div>
					<textarea class="comment_content" name="comment" rows="8"></textarea>
					</div>
					<!-- <a class="btn btn-primary" href="">post comment</a> -->
					<button type="submit" class="btn btn-primary send_cmt" name="submit">post comment</button>

				</form>
			</div>
			<div class="col-sm-8">
				<!-- <div class="text-area"> -->
					<!-- <div class="blank-arrow"> -->
						<!-- <label>Your Name</label> -->
					<!-- </div> -->
					<!-- <span>*</span> -->
					<!-- <textarea name="message" rows="11"></textarea> -->
					<!-- <a class="btn btn-primary" href="">post comment</a> -->
				<!-- </div> -->
			</div>
		</div>
	</div><!--/Repaly Box-->
</div>	
@endsection
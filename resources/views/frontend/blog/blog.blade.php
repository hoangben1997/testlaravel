@extends('frontend.layouts.app')
@section('content')

<div class="form-group col-sm-12">
    <div class="blog-post-area">
        <h2 class="title text-center">Latest From our Blog</h2>

        <?php
        // dd($idblog);

            if (!empty($table)) {

                foreach ($table as $value){
                    // foreach ($rate as $items){
                    // dd($value->title);
        ?>
        <div id="{{$value->id}}" class="single-blog-post">
            <h3><?php echo $value->title; ?></h3>
            <div class="post-meta">
                <ul>
                    <li><i class="fa fa-user"></i> Mac Doe</li>
                    <li><i class="fa fa-clock-o"></i> 1:33 pm</li>
                    <li><i class="fa fa-calendar"></i> DEC 5, 2013</li>
                </ul>
                <span>
                    <div class="rate">
                        <div class="vote">
                                        @csrf
                                        <div class="star_1 ratings_stars"><input value="1" type="hidden"></div>
                                        <div class="star_2 ratings_stars"><input value="2" type="hidden"></div>
                                        <div class="star_3 ratings_stars"><input value="3" type="hidden"></div>
                                        <div class="star_4 ratings_stars"><input value="4" type="hidden"></div>
                                        <div class="star_5 ratings_stars"><input value="5" type="hidden"></div>
                                        
                                        <span class="rate-np" value=""></span>
                                        
                                        </div> 
                    </div>
                </span>
                
            </div>
            <a href="">
                <img src="{{asset('admin/assets/images/users/'.$value->image)}}" alt="">
            </a>
            <p><?php echo $value->content; ?></p>
            <a  class="btn btn-primary" href="{{'blogsingle/'.$value->id}}">Read More</a>
        </div>
        <?php
                }
            // }
        }
        ?>
        {{$table->links("pagination::bootstrap-4")}}
        
    </div>
</div>

@endsection

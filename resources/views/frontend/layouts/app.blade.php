<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- <title>Home | E-Shopper</title> -->
    <title>@yield('title')</title>
    <link href="{{asset('frontend/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('frontend/css/font-awesome.min.css')}}" rel="stylesheet">
    <link href="{{asset('frontend/css/prettyPhoto.css')}}" rel="stylesheet">
    <link href="{{asset('frontend/css/price-range.css')}}" rel="stylesheet">
    <link href="{{asset('frontend/css/animate.css')}}" rel="stylesheet">
	<link href="{{asset('frontend/css/main.css')}}" rel="stylesheet">
	<link href="{{asset('frontend/css/responsive.css')}}" rel="stylesheet">
    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->       
    <link rel="shortcut icon" href="{{asset('frontend/images/ico/favicon.ico')}}">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="{{asset('frontend/images/ico/apple-touch-icon-144-precomposed.png')}}">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="{{asset('frontend/images/ico/apple-touch-icon-114-precomposed.png')}}">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="{{asset('frontend/images/ico/apple-touch-icon-72-precomposed.png')}}">
    <link rel="apple-touch-icon-precomposed" href="{{asset('frontend/images/ico/apple-touch-icon-57-precomposed.png')}}">
    <link type="text/css" rel="stylesheet" href="{{asset('rate/css/rate.css')}}">
    <script src="{{asset('rate/js/jquery-1.9.1.min.js')}}"></script>
    <style type="text/css">
    .hide {
      display: none;
    }
    .show {
      display: block;
    }

    

    </style>
    
    <script>
        if(screen.width <= 736){
            document.getElementById("viewport").setAttribute("content", "width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no");
        }
    </script>
    <script>
        
    $(document).ready(function(){
        $('.hoang').addClass('search_hoang');

        //vote
        $('.ratings_stars').hover(
            // Handles the mouseover
            function() {
                $(this).prevAll().andSelf().addClass('ratings_hover');
                // $(this).nextAll().removeClass('ratings_vote'); 
            },
            function() {
                $(this).prevAll().andSelf().removeClass('ratings_hover');
                // set_votes($(this).parent());
            }
        );

        //xử lý phần đánh giá
        $('.ratings_stars').click(function(){
             

            var values =  $(this).find("input").val();
            // alert(values);

            //kiểm tra đăng nhập trước khi đánh giá
            var check = "{{Auth::check()}}";
            // alert(check);
            if (check != "") {
                 if ($(this).hasClass('ratings_over')) {

                    $('.ratings_stars').removeClass('ratings_over');
                    $(this).prevAll().andSelf().addClass('ratings_over');
                } else {
                    
                    $(this).prevAll().andSelf().addClass('ratings_over');
                }
                var id_blog = $(this).closest(".single-blog-post").attr("id");
                var id_user = "{{Auth::id()}}";

                //truyền id và vote qua ajax để xử lý
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    type: 'POST',
                    url: "{{ url('blogAjax') }}",
                    data: {
                        values: values,
                        id_blog: id_blog,
                        id_user: id_user
                    },
                    
                    success: function(response) {
                        //
                    }
                 }); 
                $(this).closest(".rate").find(".rate-np").text(values); // chen vao mục rate
                
                 
            }else{
               
                alert('Vui long login truoc khi danh gia');
                
            }

            
        });

        //kiểm tra đăng nhập trước khi cmt
        $('.send_cmt').click(function(){
            // alert(1);
            var check = "{{Auth::check()}}";
            // alert(check);
            if (check == "") {
                alert('Vui lòng đăng nhập');
                
            }else{
                return true;
            }
            return false;

        });

        //kiểm tra đăng nhập trước khi cmt
        $('.replay_cmt2').click(function(){
            // alert(1);
            var check = "{{Auth::check()}}";
            // alert(check);
            if (check == "") {
                alert('Vui lòng đăng nhập');
                
            }else{
                return true;
            }
            return false;

        });

        var hide = $('.cmtcon'); //form replay
        if(hide)
        {
            
            $('.cmtcon').addClass('hide');
            $('.hide').hide();

            
        }
        //xử lý phần blog
        $('.replay_cmt').click(function(){
            $(this).hide(); // ẩn button replay
            $('.cmtcon').removeClass('hide');
            $(this).closest('.div_con').find('.cmtcon').show(100); // show form

            
        });

        // xử lý phần comment trong blog single
        var op2 = $('.form-control-line-status').val();
        if(op2 == 2)
        {
            $('.op2sale').show();
        }else{
            $('.op2sale').hide();
        }
        //hiển thị cmt trả lời trong phần blog
        $('.form-control-line-status').click(function(){

            var op2 = $('.form-control-line-status').val();
            if (op2 == 2) {
                $('.op2sale').show();
            }else{
                $('.op2sale').hide();
            }

        });

        //xử lý ảnh phẩn product detail
        $(".carousel-inner a").click(function(){

            // alert(1); 
            var xx = "{{asset('upload/frontend/product/'.Auth::id().'/')}}";  // lấy link của ảnh
            // alert(xx);
            var getId = $(this).attr("id"); //lấy tên ảnh có trong id để truyền vào link
            var link = xx + '/'+ getId;
            // alert(link);

            $("img.hinh1").attr("src", link); //chèn vào link ảnh
            $("a.zoomHinh").attr("href", link);
            
            return false;
        });

        // xử lý phần addtocart bên trang home
        $(".add-to-cart a").click(function(){
            alert(111);
            //lấy id trên trang home truyền qua ajax để xử lý
            var getId =  $(this).attr("id")
            // alert(111);
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                type: 'POST',
                url: "{{ url('cartAjax') }}",
                data: {
                    getId: getId,
                    
                },
                
                success: function(response) {
                    //
                }
            }); 
            return false;
              
        })

        //xử lý phần click "-" bên trang addtocart
        $(".downCart").click(function(){

            //lấy id truyền qua ajax để xử lý
            var id_down =  $(this).closest("tr").attr("id")
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                type: 'POST',
                url: "{{ url('cart') }}",
                data: {
                    id_down: id_down,
                    
                },
                
                success: function(response) {
                    //
                }
            });  
            
            var price = $(this).closest("tr").find(".cart_price").attr("id")
            var qty = $(this).closest(".buttonCart").find(".inputCart").val();

            //xử lý qty sau khi nhấp -
            a = parseInt(qty) - 1;
            $(this).closest(".buttonCart").find(".inputCart").val(a)

            //xử lý price sau khi nhấp -
            total = price * a;
            $(this).closest("tr").find(".priceCart").text("$"+ total)

            //xóa sp sau khi qty = 0
            if (a == 0) {
                $(this).closest("tr").find("td").hide();
            }

            //xử lý khi qty = 1
            if (a == 1) {
                var subTotalAll = parseInt(subTotal) - parseInt(total);
                $("span.totalAll").text("$"+subTotalAll)
            }

            // xử lý tổng tiên sau khi -
            var subTotal= $(".total_area").find("span.totalAll").attr("id") //lấy tổng tiền qua id
            var subTotalAll = parseInt(subTotal) - parseInt(price); //lấy tổng tiền + vs giá khi click tăng qty
            $("span.totalAll").attr("id",subTotalAll) //chèn tổng tiền vào làm id để lấy ra chèn vào bảng

            //chèn tổng giá sau khi - vào bảng subTotal
            var xx = $("span.totalAll").attr("id") //chèn id mới vào bảng subtotal
            $("span.totalAll").text("$"+xx) //lấy id chèn vào text để hiển thị tổng giá trên bảng
            // alert(xx);
            
            //cong them tax
            y = parseInt(xx) + 2;
            $("span.totalTax").text("$"+y)
            if (parseInt(xx) == 0) {
                $("span.totalTax").text("$0")
            }

            //chèn tổng giá sau khi - vào bảng subTotal
            var xx = $("span.totalAll").attr("id") //chèn id mới vào bảng subtotal
            $("span.totalAll").text("$"+xx) //lấy id chèn vào text để hiển thị tổng giá trên bảng
            // alert(xx);
            
            //cong them tax
            y = parseInt(xx) + 2;
            $("span.totalTax").text("$"+y)
            if (parseInt(xx) == 0) {
                $("span.totalTax").text("$0")
            }
            return false; //để không load lại trang
               
        })

        //xử lý phần "+" bên trang addtocart
        $(".upCart").click(function(){

            //lấy id để truyền qua ajax xử lý
            var id_up =  $(this).closest("tr").attr("id")
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                type: 'POST',
                url: "{{ url('cart') }}",
                data: {
                    id_up: id_up,
                    
                },
                
                success: function(response) {
                    //
                }
            });  

            var price =  $(this).closest("tr").find(".cart_price").attr("id")
            var qty = $(this).closest(".buttonCart").find(".inputCart").val()
            
            // tổng qty trong bảng sản phẩm
            a = parseInt(qty) + 1; //tổng qty sau mỗi lần click
            $(this).closest(".buttonCart").find(".inputCart").val(a) // chèn tổng qty vào bảng
            
            // tổng tiền trong bảng sản phẩm
            total = price * a; //tổng price sau khi tăng qty
            $(this).closest("tr").find(".priceCart").text("$"+ total) //chèn tổng qrice vào bảng

            // xử lý tổng tiên sau khi +
            var subTotal= $(".total_area").find("span.totalAll").attr("id") //lấy tổng tiền qua id
            var subTotalAll = parseInt(subTotal) + parseInt(price); //lấy tổng tiền + vs giá khi click tăng qty
            $("span.totalAll").attr("id",subTotalAll) //chèn tổng tiền vào làm id để lấy ra chèn vào bảng

            //chèn tổng giá sau khi + vào bảng subTotal
            var xx = $("span.totalAll").attr("id") //chèn id mới vào bảng subtotal
            $("span.totalAll").text("$"+xx) //lấy id chèn vào text để hiển thị tổng giá trên bảng
            // alert(xx);

            //cong them tax
            y = parseInt(xx) + 2;
            $("span.totalTax").text("$"+y)
            return false;
        })

        //xóa sp bên trang addtocart
        $(".deleteCart").click(function(){

            //lấy id truyền qua ajax để xử lý
            var id_delete =  $(this).closest("tr").attr("id")
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                type: 'POST',
                url: "{{ url('cart') }}",
                data: {
                    id_delete: id_delete,
                    
                },
                
                success: function(response) {
                    //
                }
            }); 

            //lay total trong bang subtotal
            var xxx = $(".total_area").find("span.totalAll").text(); 
            subTotal = xxx.replace('$','');

            //xử lý phần tổng trong bảng subtotal
            var xx = $(this).closest("tr").find(".cart_total p").text();
            total = xx.replace('$','');
            // alert(total); 
            
            //trừ total sau khi xóa rồi chèn vào bảng
            subTotalAll = parseInt(subTotal) - parseInt(total);
            $("span.totalAll").text("$" + subTotalAll) 
            // alert(subTotal);
            
            //cong them tax
            y = parseInt(subTotalAll) + 2;
            $("span.totalTax").text("$"+y)
            if (parseInt(subTotalAll) == 0) {
                $("span.totalTax").text("$0")
            }
            $(this).closest("tr").find("td").hide(); //xóa sản phẩm hiển thị khi nhấp vào delete
            return false;
            
        })
       

        $(".clickPrice").click(function(){
            var priceRange = $(this).closest(".clickPrice").find("input").val();
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                type: 'POST',
                url: "{{ url('homeindex') }}",
                data: {
                    priceRange: priceRange,
                    
                },
                
                success: function(response) {
                    //
                }
            });\
            return false;
            // alert(price);
        })

    
    });
</script>
    
    
</head><!--/head-->

<body>
	@include('frontend.layouts.header')

	@include('frontend.layouts.slide')
	<section>
		<div class="container">
			<div class="row">
                <?php 
                $url = $_SERVER['REQUEST_URI'];
                // dd($url);
                if (str_contains($url, 'account') == false && str_contains($url, 'checkout') == false) {
                ?>
                @include('frontend.layouts.menu-left')
                <?php
                }
                ?>
				

				<div class="col-sm-9 padding-right">	
					@yield('content')	
				</div>
				
			</div>
		</div>
	</section>l

	@include('frontend.layouts.footer')
  	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="{{asset('frontend/js/jquery.js')}}"></script>
	<script src="{{asset('frontend/js/bootstrap.min.js')}}"></script>
	<script src="{{asset('frontend/js/jquery.scrollUp.min.js')}}"></script>
	<script src="{{asset('frontend/js/price-range.js')}}"></script>
    <script src="{{asset('frontend/js/jquery.prettyPhoto.js')}}"></script>
    <script src="{{asset('frontend/js/main.js')}}"></script>
    <script type="text/javascript">
        $(document).ready(function(){
            $("a[rel^='prettyPhoto']").prettyPhoto();


            // $("a").click(function(){
            //     $("form").submit();
            // })
        });
    </script>
</body>
</html>
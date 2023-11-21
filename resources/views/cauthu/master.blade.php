<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="X-UA-Compatile" content="ie=edge">
	<style type="text/css">
            table{
                width: 800px;
                margin: auto;
                text-align: center;
            }
            tr {
                border: 1px solid;
            }
            th {
                border: 1px solid;
            }
            td {
                border: 1px solid;
            }
            h1{
                text-align: center;
                color: red;
            }
            #button{
                margin: 2px;
                margin-right: 10px;
                float: right;
            }
    </style>
	<title>@yield('title')</title>
	
	{{-- css chung --}}
</head>
<body>
	{{-- Goi code trang header --}}
	@include('master.header')

	

	{{-- Noi chua noi dung thay doi --}}
	@yield('content')

	


	{{-- goi code trang footer --}}
	@include('master.footer')

	{{-- js chung --}}
	
	
</body>
</html>
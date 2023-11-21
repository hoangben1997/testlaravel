@extends('master.master')
@section('content')

    
    


    <form action="" method="POST">
    @csrf

    Tên cầu thủ <input type="text" name="tencauthu" value="">
    @error('tencauthu')
    <span>{{$message}} </span>  
    @enderror
    <br>
    Tuổi<input type="text" name="tuoi" value="">
     @error('tuoi')
    <span>{{$message}} </span>  
    @enderror
    <br>
    Quốc tịch<input type="text" name="quoctich" value=""> 
     @error('quoctich')
    <span>{{$message}} </span>  
    @enderror
    <br> 
    Vị trí<input type="text" name="vitri" value=""> 
     @error('vitri')
    <span>{{$message}} </span>  
    @enderror
    <br> 
    Lương<input type="text" name="luong" value="">
     @error('luong')
    <span>{{$message}} </span>  
    @enderror
    <br>
    <button type="submit" name="submit">Click</button>
    </form>
@endsection

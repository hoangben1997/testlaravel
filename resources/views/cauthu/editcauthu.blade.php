@extends('master.master')
@section('content')

<?php 
  if (!empty($table)) {
  	 foreach ($table as $key => $value){
?>
<form action="" method="POST">
    @csrf
    Tên cầu thủ <input type="text" name="tencauthu" value="<?php echo $value->ten; ?>">
    <br>
    Tuổi<input type="text" name="tuoi" value="<?php echo $value->tuoi; ?>">
    <br>
    Quốc tịch<input type="text" name="quoctich" value="<?php echo $value->quoctich; ?>"> 
    <br> 
    Vị trí<input type="text" name="vitri" value="<?php echo $value->vitri; ?>"> 
    <br> 
    Lương<input type="text" name="luong" value="<?php echo $value->luong; ?>">
    <br>
    <button type="submit" name="submit">Cập nhật</button>
</form>
<?php
  	 }
      
  }

?>


@endsection
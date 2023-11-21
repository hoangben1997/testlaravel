@extends('master.master')
@section('content')


<table id="datatable" style="border: 1px solid">
    <h1>Quản lý cầu thủ</h1>
    <thead>
        <tr role="row">
            <th>ID</th>
            <th>Tên cầu thủ</th>
            <th>Tuổi</th>
            <th>Quốc tịch</th>
            <th>Vị trí</th>
            <th>Lương</th>
            <th style="width: 7%;">Edit</th>
            <th style="width: 10%;">>Delete</th>
        </tr>
    </thead>
    <tbody>
        <?php
            if (!empty($table)) {
             
                foreach ($table as $key => $value){
        ?>

                        <tr role="row">
                            <td><?php echo $value->id; ?></td>
                            <td><?php echo $value->ten; ?></td>
                            <td><?php echo $value->tuoi; ?></td>
                            <td><?php echo $value->quoctich; ?></td>
                            <td><?php echo $value->vitri; ?></td>
                            <td><?php echo $value->luong; ?></td>
                            <td><a href="{{'edit/'.$value->id}}">Edit</a></td>
                            <td><a href="{{'delete/'.$value->id}}">Delete</a></td>
                        </tr>';
        <?php
                }
            }
        ?>
    </tbody>
    <tfoot>
        <tr>
            <td colspan="8">
                <a href="{{'add'}}"><button id="button">Thêm cầu thủ</button></a>
            </td>
        </tr>
    </tfoot>
</table>

@endsection
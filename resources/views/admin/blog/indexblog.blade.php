@extends('admin.layouts.app')
@section('content')
<div class="container-fluid">
    <div class="row">
                    <!-- column -->
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Table blog</h4>
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
                            </div>
                            <div class="table-responsive">

                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th class="border-top-0">ID</th>
                                            <th class="border-top-0">Title</th>
                                            <th class="border-top-0">Image</th>
                                            <th class="border-top-0">Description</th>
                                            <th class="border-top-0">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            if (!empty($table)) {
             
                                                foreach ($table as $key => $value){
                                        ?>
                                        <tr>
                                            
                                            <td class="txt-oflo"><?php echo $value->id; ?></td>
                                            <td class="txt-oflo"><?php echo $value->title; ?></td>
                                            <td class="txt-oflo"><img src="{{asset('admin/assets/images/users/'.$value->image)}}" class="rounded-circle" width="150" /></td>
                                            <td class="txt-oflo"><?php echo $value->description; ?></td>
                                            <td>
                                            	<a class="font-medium" href="{{'deleteblog/'.$value->id}}">Delete</a>
                                            	<br>
                                            	<a class="font-medium" href="{{'editblog/'.$value->id}}">Edit</a>
                                            </td>

                                        </tr>
                                        <?php
                                                }
                                            }
                                        ?>

                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <td >
                                                {{$table->links("pagination::bootstrap-4")}}
                                                <!-- {{ $table->links() }} -->
                                                <a class="font-medium" href="{{'addblog'}}"><button id="button">Add blog</button></a>

                                            </td>
                                        </tr>
                                    </tfoot>

                                </table>
                                
                                    
                                

                                
                            </div>
                        </div>
                    </div>
    </div>

</div>
<footer class="footer text-center">
    All Rights Reserved by Nice admin. Designed and Developed by
    <a href="https://wrappixel.com">WrapPixel</a>.
</footer>
@endsection
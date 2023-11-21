@extends('admin.layouts.app')
@section('content')
<div class="container-fluid">
    <div class="row">
                    <!-- column -->
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Menu country</h4>
                            </div>
                            <div class="table-responsive">
                                @if(session('success'))
                                <div class="alert alert-success alert-dismissible">
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
                                    <h4><i class="icon fa fa-check"></i>Thong bao!</h4>
                                    {{session('success')}}
                                </div>
                                @endif

                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th class="border-top-0">ID</th>
                                            
                                            <th class="border-top-0">Country</th>
                                            
                                            <th class="border-top-0" >DELETE</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            if (!empty($table)) {
             
                                                foreach ($table as $key => $value){
                                        ?>
                                        <tr>
                                            
                                            <td class="txt-oflo"><?php echo $value->id; ?></td>
                                            
                                            <td class="txt-oflo"><?php echo $value->country; ?></td>
                                            
                                            <td><a class="font-medium" href="{{'delete/'.$value->id}}">DELETE</a></td>
                                        </tr>
                                        <?php
                                                }
                                            }
                                        ?>
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <td >
                                                <a class="font-medium" href="{{'addcountry'}}"><button id="button">Add country</button></a>
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
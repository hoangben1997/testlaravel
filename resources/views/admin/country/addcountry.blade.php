@extends('admin.layouts.app')
@section('content')
<div class="container-fluid">
    <div class="row">
                    

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
                    <!-- column -->
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Menu country</h4>
                            </div>
                            <div class="table-responsive">
                        <form class="form-horizontal form-material" method="POST" >
                            @csrf
                            <div class="form-group">
                                <label class="col-md-12">Country</label>
                                <div class="col-md-12">
                                    <input type="text" class="form-control form-control-line" name="country">
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <div class="col-sm-12">
                                    <button class="btn btn-success" type="submit" name="submit">Add Country</button>
                                </div>
                            </div>
                        </form>

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
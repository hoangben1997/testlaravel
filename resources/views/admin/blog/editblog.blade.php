@extends('admin.layouts.app')
@section('content')
<div class="container-fluid">
    <div class="row">
                    
                    <!-- column -->
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Update blog</h4>
                    
                            </div>
                            <div class="table-responsive">
                                <?php
                                    if (!empty($table)) {
     
                                        foreach ($table as $key => $value){
                                ?>
                        <form class="form-horizontal form-material" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label class="col-md-12">Title</label>
                                <div class="col-md-12">
                                    <input type="text" class="form-control form-control-line" name="title" value="<?php echo $value->title; ?>">
                                </div>
                            </div>
                            <div class="form-group">
                            <label class="col-md-12">Image</label>
                            <div class="col-md-12">
                                <input type="file" accept="image/*" class="form-control form-control-line" value="" name="image">
                            </div>
                        </div>
                            <div class="form-group">
                                <label class="col-md-12">Description</label>
                                <div class="col-md-12">
                                    <input type="text" class="form-control form-control-line" name="description" value="<?php echo $value->description; ?>">
                                </div>
                            </div>
                            <div class="form-group col-md-12">
                                <label class="col-md-12">Content</label>
                                <textarea class="form-control" name="content" id="demo" value="<?php echo $value->content; ?>"></textarea>
                                
                            </div>
                            
                            <div class="form-group">
                                <div class="col-sm-12">
                                    <button class="btn btn-success" type="submit" name="submit">Update Blog</button>
                                </div>
                            </div>
                        </form>
                            <?php
                                                }
                                            }
                                        ?>
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
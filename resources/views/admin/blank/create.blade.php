@extends('admin.layouts.app')
@section('content')
<section class="content-header">
    @include('admin.includes.breadcumb',['title'=>'Create Form'])
</section>
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card card-primary">
                    <div class="card-header">
                    <h3 class="card-title">Form Validation</small></h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form id="quickForm">
                        <div class="card-body">
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" name="username" class="form-control" id="username" placeholder="Enter Name">
                            </div>
                            <div class="form-group">
                                <label for="email">Email address</label>
                                <input type="email" name="email" class="form-control" id="email" placeholder="Enter email">
                            </div>
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="password" name="password" class="form-control" id="password" placeholder="Password">
                            </div>
                            <div class="form-group mb-0">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" name="terms" class="custom-control-input" id="check">
                                <label class="custom-control-label" for="check">I agree to the <a href="#">terms of service</a>.</label>
                            </div>
                            </div>
                        </div>
                    <!-- /.card-body -->
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
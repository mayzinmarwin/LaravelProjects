@extends('admin.layouts.app')
@section('content')
<section class="content-header">
    @include('admin.includes.breadcumb',['title'=>'Update Main Category'])
</section>
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card card-info">
                    <div class="card-header">
                        <h3 class="card-title float-left">Main Category</h3>
                        <a class="btn btn-secondary float-right" href="{{ route('main_category.index') }}"> Back</a>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <div class="col-md-6 col">
                        <form id="brandForm" action="{{ route('main_category.update',$main_category->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="card-body ">
                                <div class="row">
                                    <div class="form-group col-md-12">
                                        <label for="name">Name</label>
                                        <input type="text" name="name" value="{{$main_category->name}}" class="form-control" id="name" placeholder="Name">
                                        @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label for="icon">Icon</label>
                                        <input type="file" name="logo" id="logo" class="form-control">
                                        <img src="/{{ $main_category->logo}}"  height="60px;" alt="icon" class="mt-1">
                                        @error('logo')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer">
                                <button type="submit" class="btn btn-info">Update</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
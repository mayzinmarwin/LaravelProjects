@extends('admin.layouts.app')
@section('content')
<section class="content-header">
    @include('admin.includes.breadcumb',['title'=>'Update Category'])
</section>
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card card-info">
                    <div class="card-header">
                        <h3 class="card-title float-left">Category</h3>
                        <a class="btn btn-secondary float-right" href="{{ route('category.index') }}"> Back</a>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <div class="col-md-6 col">
                        <form id="brandForm" class="update_form" name="update_form" action="{{ route('category.update',$category->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="preloader"></div>
                            <div class="card-body ">
                                <div class="row">
                                    <div class="form-group col-md-12">
                                        <label for="name">Name</label>
                                        <input type="text" name="name" class="form-control" value="{{$category->name}}" id="name" placeholder="Name">
                                        <span class="text-danger name"></span>
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label for="main_category_id">Select Main Category</label>
                                        <select name="main_category_id" id="main_category_id" class="form-control">
                                            <option value="">Select</option>
                                            @foreach ($main_categories as $main_category)
                                                <option {{$category->main_category_id == $main_category->id ? 'selected' : ''}} value="{{ $main_category->id }}">{{ $main_category->name }}</option>
                                            @endforeach
                                        </select>
                                        <span class="text-danger main_category_id"></span>
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label for="icon">Icon</label>
                                        <input type="file" name="logo" id="logo" class="form-control">
                                        <img src="/{{ $category->logo}}"  height="60px;" alt="icon" class="mt-1">
                                        <span class="text-danger logo"></span>
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
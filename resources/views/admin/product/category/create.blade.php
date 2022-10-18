@extends('admin.layouts.app')
@section('content')
<section class="content-header">
    @include('admin.includes.breadcumb',['title'=>'Category Create'])
</section>
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card card-info">
                    <div class="card-header">
                        <h3 class="card-title">Category Form</h3>
                        <a href="{{route('category.index')}}" class="float-right btn btn-secondary">Back</a>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <div class="col-md-6 col">
                        <form id="categoryForm"  class="insert_form" name="insert_form" action="{{route('category.store')}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="preloader"></div>
                            <div class="card-body ">
                                <div class="row">
                                    <div class="form-group col-md-12">
                                        <label for="name">Name</label>
                                        <input type="text" name="name" class="form-control" id="name" placeholder="Name">
                                        <span class="text-danger name"></span>
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label for="main_category_id">Select Main Category</label>
                                        <select name="main_category_id" id="main_category_id" class="form-control">
                                            <option value="">Select</option>
                                            @foreach ($main_categories as $main_category)
                                                <option value="{{$main_category->id}}">{{$main_category->name}}</option>
                                            @endforeach
                                        </select>
                                        <span class="text-danger main_category_id"></span>
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label for="icon">Icon</label>
                                        <input type="file" name="logo" id="logo" class="form-control">
                                        <span class="text-danger logo"></span>
                                    </div>
                                </div>
                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer">
                                <button type="submit" class="btn btn-info">Create Category</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
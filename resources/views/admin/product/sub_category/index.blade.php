@extends('admin.layouts.app')
@section('content')
<!-- Main content -->
<section class="content-header">
    @include('admin.includes.breadcumb',['title'=>'All Sub  Categories'])
</section>
<section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
                <div class="card-title float-left">
                    Category
                </div>
                <a href="{{ route('sub_category.create')}}" class="btn btn-info float-right">
                    <i class="fas fa-plus"></i> Add
                </a>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example2" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th>#</th>
                  <th>Name</th>
                  <th>Main Category</th>
                  <th>Category</th>
                  <th>Sub Category Image</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                   @foreach ($sub_categories as $sub_category)
                      <tr>
                        <td>{{$sub_category->id}}</td>
                        <td>{{$sub_category->name}}</td>
                        <td>{{$sub_category->main_category_info ? $sub_category->main_category_info->name : '' }}</td>
                        <td>{{$sub_category->category_info ? $sub_category->category_info->name : '' }}</td>
                        <td><img src="/{{ $sub_category->logo}}"  height="60px;" srcset="" alt=""></td>
                        <td>
                            <a href="{{ route('sub_category.edit',$sub_category->id)}}" class="btn btn-info"><i class="fas fa-edit"></i>Edit</a>
                            <a href="{{ route('sub_category.destroy',$sub_category->id)}}" class="delete_btn btn btn-danger"><i class="fas fa-trash"></i>Delete</a>
                        </td>
                      </tr>
                   @endforeach
                </tbody>
              </table>
              <div class="mt-3 float-right">
              </div>
            </div>
            <!-- /.card-body -->
            <div class="card-footer">
                {{$sub_categories->links('pagination::bootstrap-4')}}
            </div>
          </div>
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
  </section>
@endsection
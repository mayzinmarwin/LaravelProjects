@extends('admin.layouts.app')
@section('content')
<!-- Main content -->
<section class="content-header">
    @include('admin.includes.breadcumb',['title'=>'All Main Categories'])
</section>
<section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
                <div class="card-title float-left">
                    Main Category
                </div>
                <a href="{{ route('main_category.create')}}" class="btn btn-info float-right">
                    <i class="fas fa-plus"></i> Add
                </a>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example2" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th>#</th>
                  <th>Main Category</th>
                  <th>Logo</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                   @foreach ($main_categories as $main_category)
                      <tr>
                        <td>{{$main_category->id}}</td>
                        <td>{{$main_category->name}}</td>
                        <td><img src="/{{ $main_category->logo}}"  height="60px;" srcset="" alt=""></td>
                        <td>
                            <a href="{{ route('main_category.edit',$main_category->id)}}" class="btn btn-info"><i class="fas fa-edit"></i>Edit</a>
                            <a href="{{ route('main_category.destroy',$main_category->id)}}" class="delete_btn btn btn-danger"><i class="fas fa-trash"></i>Delete</a>
                        </td>
                      </tr>
                   @endforeach
                </tbody>
              </table>
              <div class="mt-3 float-right">
              </div>
            </div>
            <!-- /.card-body -->
          </div>
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
  </section>
@endsection
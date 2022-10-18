@extends('admin.layouts.app')
@section('content')
<!-- Main content -->
<section class="content-header">
    @include('admin.includes.breadcumb',['title'=>'All Color'])
</section>
<section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
                <div class="card-title float-left">
                    Color
                </div>
                <a href="{{ route('color.create')}}" class="btn btn-info float-right">
                    <i class="fas fa-plus"></i> Add
                </a>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example2" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th>#</th>
                  <th>Color Name</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                   @foreach ($colors as $color)
                      <tr>
                        <td>{{$color->id}}</td>
                        <td>{{$color->name}}</td>
                        <td>
                            <a href="{{ route('color.edit',$color->id)}}" class="btn btn-info"><i class="fas fa-edit"></i>Edit</a>
                            <a href="{{ route('color.destroy',$color->id)}}" class="delete_btn btn btn-danger"><i class="fas fa-trash"></i>Delete</a>
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
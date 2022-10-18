@extends('admin.layouts.app')
@section('content')
<!-- Main content -->
<section class="content-header">
    @include('admin.includes.breadcumb',['title'=>'All Status'])
</section>
<section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
                <div class="card-title float-left">
                    Status
                </div>
                <a href="{{ route('status.create')}}" class="btn btn-info float-right">
                    <i class="fas fa-plus"></i> Add
                </a>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example2" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th>#</th>
                  <th>Size Name</th>
                  <th>Serial</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                   @foreach ($statuses as $status)
                      <tr>
                        <td>{{$status->id}}</td>
                        <td>{{$status->name}}</td>
                        <td>{{$status->serial}}</td>
                        <td>
                            <a href="{{ route('status.edit',$status->id)}}" class="btn btn-info"><i class="fas fa-edit"></i>Edit</a>
                            <a href="{{ route('status.destroy',$status->id)}}" class="delete_btn btn btn-danger"><i class="fas fa-trash"></i>Delete</a>
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
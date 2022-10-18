@extends('admin.layouts.app')
@section('content')
<!-- Main content -->
<section class="content-header">
    @include('admin.includes.breadcumb',['title'=>'All Brands'])
</section>
<section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
                <div class="card-title float-left">
                    Brands
                </div>
                <a href="{{ route('brand.create')}}" class="btn btn-info float-right">
                    <i class="fas fa-plus"></i> Add
                </a>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example2" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th>#</th>
                  <th>Brand Name</th>
                  <th>Logo</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                    @foreach ($brands as $i=> $brand)
                    <tr>
                        <td>{{$brand->id}}</td>
                        <td>{{$brand->name}}</td>
                        <td><img src="/{{ $brand->logo}}"  height="60px;" srcset="" alt=""></td>
                        <td>
                            {{-- <form action="{{ route('brand.destroy',$brand->id) }}" method="POST">
                                <a href="{{route('brand.edit',$brand->id)}}" class="btn btn-info"><i class="fas fa-edit"></i>Edit</a>
                                    @csrf
                                    @method('DELETE')    
                                
                                    <button type="submit" class="btn btn-danger">
                                        <i class="fas fa-trash"></i>Delete
                                    </button>        
                            </form> --}}
                            <a href="{{route('brand.edit',$brand->id)}}" class="btn btn-info"><i class="fas fa-edit"></i>Edit</a>
                            <a href="{{route('brand.destroy',$brand->id)}}" class="delete_btn btn btn-danger" type="button"><i class="fas fa-trash"></i>Delete</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
              </table>
              <div class="mt-3 float-right">
                {{$brands->links('pagination::bootstrap-4')}}
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
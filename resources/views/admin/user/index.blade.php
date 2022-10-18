@extends('admin.layouts.app')
@section('content')
<!-- Main content -->
<section class="content-header">
    @include('admin.includes.breadcumb',['title'=>'User Management'])
</section>
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-6">
           
            </div>
        </div>
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">All Users</h3>
              <a href="{{ route('admin.user.create')}}" class="btn btn-info float-right"><i class="fas fa-plus"></i> Add User</a>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="allusers" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th>#</th>
                  <th>First Name</th>
                  <th>Last Name</th>
                  <th>User Name</th>
                  <th>Email</th>
                  <th>Role Name</th>
                  <th>Profile Image</th>
                  <th>Created At</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                    @foreach ($users as $i =>$user)
                        <tr>
                            <td>{{++$i}}</td>
                            <td>{{$user->first_name}}</td>
                            <td>{{$user->last_name}}</td>  
                            <td><a href="{{ route('admin.user.view', $user->id) }}">{{$user->username}}</a></td>  
                            <td>{{$user->email}}</td>  
                            <td>{{ !empty($user->role) ? $user->role->name:'' }}</td> 
                            <td><img src="{{ asset('uploads/user/'.$user->photo)}}"  height="60px;" srcset="" alt=""></td> 
                            <td>{{$user->created_at->format('d M Y h:i:s a')}}</td>
                            <td>
                                <div class="">
                                    {{-- <a  href="{{ route('admin.user.edit', $user->id) }}" class="btn btn-secondary"><i class="fas fa-edit"></i> Edit</a>
                                    <a data-toggle="modal" data-target="#deleteModal"  
                                    onclick="return (modal_delete_form.action= '{{ route('admin.user.delete') }}',modal_delete_form.id.value ='{{$user->id}}')"
                                    href="" class="btn btn-danger">
                                    <i class="fas fa-trash"></i> 
                                    Delete
                                    </a> --}}
                                    <a  href="{{ route('admin.user.edit', $user->id) }}" class="btn btn-secondary"><i class="fas fa-edit"></i> Edit</a>
                                    
                                    <a type="button"   
                                    onclick="return (confirm('Hi,Do You sure want to delete.')&& $.post('{{ route('admin.user.delete', ['id'=>$user->id]) }}',(res)=>{console.log(res,$(this).parents('tr').remove())}))"
                                    href="#" class="btn btn-danger">
                                    <i class="fas fa-trash"></i> 
                                    Delete
                                    </a>
                                </div>
                            </td>
                            
                        </tr>
                    @endforeach 
                </tbody>
            </table>
            <div class="float-right">
                {{ $users->render('pagination.custompagination') }}
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
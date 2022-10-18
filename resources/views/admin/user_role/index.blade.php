@extends('admin.layouts.app')
@section('content')
<!-- Main content -->
<section class="content-header">
    @include('admin.includes.breadcumb',['title'=>'User Role'])
</section>
<section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">All Users Role</h3>
              {{-- <a href="{{ route('admin.user_role.create')}}" class="btn btn-info float-right"><i class="fas fa-plus"></i> Add User Role</a> --}}
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="allusers" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th>#</th>
                  <th>Name</th>
                  <th>Serial</th>
                  <th>Created At</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                    @foreach ($userRoles as $i =>$userRole)
                        <tr>
                            <td>{{++$i}}</td>
                            <td>{{$userRole->name}}</td>  
                            <td>{{$userRole->serial}}</td> 
                            <td>{{$userRole->created_at->format('d M Y h:i:s a')}}</td>
                            <td>
                                <div class="">
                                    <a href="" class="btn btn-secondary role-update-btn" data-url="{{route('admin.user_role.update')}}"  
                                    data-id="{{$userRole->id}}" data-name="{{$userRole->name}}"  
                                    data-serial="{{$userRole->serial}}" 
                                    onclick="return(update_role_form.name = '{{$userRole->name}}');"
                                    data-toggle="modal" 
                                    data-target="#userRoleUpdateModal">
                                    <i class="fas fa-edit"> </i>Edit
                                    </a>
                                    <button class="btn btn-danger"><i class="fas fa-trash"></i> Delete</button>
                                </div>
                            </td>
                        </tr>
                    @endforeach 
                </tbody>
            </table>
            <div class="float-right">
                {{-- {{ $userRoles->links('pagination.custompagination') }} --}}
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
    
    <div class="modal fade" id="userRoleUpdateModal" tabindex="-1" aria-labelledby="userRoleUpdateLabel" aria-hidden="true">
        <div class="modal-dialog">
            <form class="update_role_form" value="" action="{{route('admin.user_role.update')}}" method="POST"  name="update_role_form">
                @csrf
                <div class="modal-content">
                    <div class="modal-header">
                    <h5 class="modal-title" id="userRoleUpdateLabel">Update User Role</h5>
                    <button type="button" class="close"  data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    </div>
                        <div class="modal-body">
                            <input type="hidden" id="name" name="id" value="">
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" class="form-control" id="name" name="name" value="">
                            </div>
                            <div class="form-group">
                                <label for="name">Serial</label>
                                <input type="text" class="form-control" id="serial" name="serial" value="">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary" >Save changes</button>
                        </div>
                    </div>
                </div>
            </form>
    </div>{{-- userRoleUpdate-Modal --}}
    
  </section>
  @push('cjs')
    <script>
        $('.role-update-btn').on('click',function(){
           let url =  $(this).data('url');
           let name =  $(this).data('name');
           let serial =  $(this).data('serial');
           let id =  $(this).data('id');
          //console.log(url,name,serial,id);
          $('.update_role_form').attr('url',url);
           $('.update_role_form input[name=name]').val(name);
           $('.update_role_form input[name=serial]').val(serial);
           $('.update_role_form input[name=id]').val(id);
        // update_role_form.id.value=id;
        // update_role_form.name.value=name;
        // update_role_form.serial.value=serial;    
        });
    </script>   
  @endpush
@endsection
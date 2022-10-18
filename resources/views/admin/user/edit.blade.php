@extends('admin.layouts.app')
@section('content')
<section class="content-header">
    @include('admin.includes.breadcumb',['title'=>'Update Form'])
</section>
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card card-info mb-0">
                    <div class="card-header">
                    <h3 class="card-title">Update User</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form method="POST" autocomplete="off" action="{{route('admin.user.update',$users->id)}}" enctype="multipart/form-data">
                        {{-- <form method="POST" autocomplete="off" action="{{route('admin.user.update',$users->id)}}" enctype="multipart/form-data"> --}}
                        @csrf
                        <input type="hidden" name="id" value="{{$users->id}}">
                        <div class="card-body">
                            <div class="form-group">
                                <label for="first_name" >First Name</label>
                                <input type="text" name="first_name" value="{{$users->first_name}}" class="form-control col-md-6 @error('first_name') is-invalid @enderror" id="first_name">
                                @error('first_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                </div>
                            <div class="form-group">
                                <label for="last_name">Last Name</label>
                                <input type="text" name="last_name" value="{{$users->last_name}}" class="form-control col-md-6 @error('last_name') is-invalid @enderror" id="last_name" >
                                @error('last_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="username">User Name</label>
                                <input type="text" name="username" value="{{$users->username}}" class="form-control col-md-6 @error('username') is-invalid @enderror" id="username" >
                                @error('username')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            </div>
                            <div class="form-group">
                                <label for="role">User Role</label>
                                <select name="role_id" id="role_id" class="form-control col-md-6">
                                    @foreach ($user_roles as $user_role)
                                        <option {{$users->role_id == $user_role-> serial ? 'selected':''}} value="{{$user_role->serial}}">{{$user_role->name}}</option>
                                    @endforeach
                                </select>
                                @error('role_id')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            </div>
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="text" name="email" value="{{$users->email}}" class="form-control col-md-6 @error('email') is-invalid @enderror" id="email" >
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="phone">Phone</label>
                                <input type="text" name="phone"  value="{{$users->phone}}" class="form-control col-md-6 @error('phone') is-invalid @enderror" id="phone" >
                                @error('phone')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="old_password">Old Password</label>
                                <input type="password" name="old_password" class="form-control col-md-6 @error('old_password') is-invalid @enderror" id="old_password">
                                {{-- @error('old_password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror --}}
                                @if(Session::has('old_password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{Session::get('old_password') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="password" name="password" class="form-control col-md-6 @error('password') is-invalid @enderror" id="password">
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="password-confirm">Confirm Password</label>
                                <input type="password" name="password_confirmation" class="form-control col-md-6 @error('password_confirmation') is-invalid @enderror" id="password_confirmation">
                                @error('password_confirmation')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="photo">Image</label>
                                <img src="{{ asset('uploads/user/'.$users->photo)}}"  style="height:50px;margin-bottom:10px" alt="">
                                <input type="file" name="image"  class="form-control col-md-6 @error('image') is-invalid @enderror" id="image">
                                @error('image')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            
                            {{-- <div class="form-group mb-0">
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="terms" class="custom-control-input" id="check">
                                    <label class="custom-control-label" for="check">I agree to the <a href="#">terms of service</a>.</label>
                                </div> --}}
                            </div>
                        </div>
                    <!-- /.card-body -->
                        <div class="card-footer">
                            {{-- <button type="button" class="btn btn-info" onClick="return( confirm('hi, Do you sure want to Update.') && $.post('{{route('admin.user.update')}}',new FormData($(this).parents('form')[0]), (res)=>{console.log('done')}))">
                            <i class="icon-lock"></i>Update
                           </button> --}}
                            <button class="btn btn-info" type="submit">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
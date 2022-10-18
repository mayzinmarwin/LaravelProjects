@extends('admin.layouts.app')
@section('content')
<section class="content-header">
    @include('admin.includes.breadcumb',['title'=>'Create Form'])
</section>
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card card-info">
                    <div class="card-header">
                    <h3 class="card-title">User</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form method="POST" action="{{route('admin.user.store')}}" id="quickForm" enctype="multipart/form-data">
                        @csrf
                        <div class="card-body">
                            <div class="form-group">
                                <label for="first_name" >First Name</label>
                                <input type="text" name="first_name" class="form-control col-md-6 @error('first_name') is-invalid @enderror" id="first_name">
                                @error('first_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                </div>
                            <div class="form-group">
                                <label for="last_name">Last Name</label>
                                <input type="text" name="last_name" class="form-control col-md-6 @error('last_name') is-invalid @enderror" id="last_name" >
                                @error('last_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="username">User Name</label>
                                <input type="text" name="username" class="form-control col-md-6 @error('username') is-invalid @enderror" id="username" >
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
                                        <option value="{{$user_role->serial}}">{{$user_role->name}}</option>
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
                                <input type="text" name="email" class="form-control col-md-6 @error('email') is-invalid @enderror" id="email" >
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="phone">Phone</label>
                                <input type="text" name="phone" class="form-control col-md-6 @error('phone') is-invalid @enderror" id="phone" >
                                @error('phone')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
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
                                <input type="password" name="password_confirmation" class="form-control col-md-6 @error('password_confirmation') is-invalid @enderror" id="password-confirm"s>
                                @error('password_confirmation')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="photo">Image</label>
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
                        <button class="btn btn-info" type="submit">Create</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
@extends('admin.layouts.app')
@section('content')
<section class="content-header">
    @include('admin.includes.breadcumb',['title'=>'Profile Details'])

    <div class="card">
        <div class="card-header">
            <h2>{{$users->username}}</h2>
        </div>
        <div class="card-body">
            <div class="profile-block">
                <div class="row">
                    <div  class="col-md-2">
                        <strong>Profile Image   : </strong>
                    </div>
                    <figure class="col-md-10">
                        <img src="{{ asset('uploads/user/'.$users->photo)}}"  height="60px;" srcset="" alt="">
                    </figure>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <p><strong>First Name  :</strong> {{$users->first_name}} </p>
                        <p><strong>Last Name   : </strong>{{$users->last_name}}</p>
                        <p><strong>Email   : </strong>{{$users->email}}</p>
                        <p><strong>Phone No   : </strong>{{$users->phone}}</p>          
                    </div>
                </div>
             </div>                 
            </div>
        </div>
    </div>

</section>
@endsection
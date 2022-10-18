@extends('admin.layouts.app')
@section('content')
<section class="content-header">
    @include('admin.includes.breadcumb',['title'=>'Update Unit'])
</section>
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card card-info">
                    <div class="card-header">
                        <h3 class="card-title float-left">Unit</h3>
                        <a class="btn btn-secondary float-right" href="{{ route('unit.index') }}"> Back</a>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <div class="col-md-6 col">
                        <form id="unitForm" class="update_form" name="update_form" action="{{ route('unit.update',$unit->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="card-body ">
                                <div class="row">
                                    <div class="form-group col-md-12">
                                        <label for="name">Name</label>
                                        <input type="text" name="name" value="{{$unit->name}}" class="form-control" id="name" placeholder="Name">
                                        <span class="text-danger"></span>
                                    </div>
                                </div>
                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer">
                                <button type="submit" class="btn btn-info">Update</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
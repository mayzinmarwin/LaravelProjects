@extends('admin.layouts.app')
@section('content')
<section class="content-header">
    @include('admin.includes.breadcumb',['title'=>'Writer Create'])
</section>
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card card-info">
                    <div class="card-header">
                    <h3 class="card-title">Writer</h3>
                    <a href="{{route('writer.index')}}" class="float-right btn btn-secondary">Back</a>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <div class="col-md-6 col">
                        <form id="insert_form" class="insert_form" name="insert_form" action="{{route('writer.store')}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="card-body ">
                                <div class="row">
                                    <div class="form-group col-md-12">
                                        <label for="name">Name</label>
                                        <input type="text" name="name" class="form-control" id="name" placeholder="Name">
                                        <span class="text-danger name"></span>
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label for="name">Description</label>
                                        <textarea name="description" id="description" class="form-control" cols="30" rows="10"></textarea>
                                        {{-- <span class="text-danger description"></span> --}}
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label for="icon">Image</label>
                                        <input type="file" name="image" id="image" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer">
                                <button type="submit" class="btn btn-info">Create Writer</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
@push('cjs')
    <script>
        $('#description').summernote({
                height:200,
            });
    </script>
@endpush
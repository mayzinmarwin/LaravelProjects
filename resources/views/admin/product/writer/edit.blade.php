@extends('admin.layouts.app')
@section('content')
<section class="content-header">
    @include('admin.includes.breadcumb',['title'=>'Update Writer'])
</section>
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card card-info">
                    <div class="card-header">
                        <h3 class="card-title float-left">Writer</h3>
                        <a class="btn btn-secondary float-right" href="{{ route('writer.index') }}"> Back</a>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <div class="col-md-6 col">
                        <form id="update_form" class="update_form" name="update_form" action="{{ route('writer.update',$writer->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="card-body ">
                                <div class="row">
                                    <div class="form-group col-md-12">
                                        <label for="name">Name</label>
                                        <input type="text" name="name" value="{{$writer->name}}" class="form-control" id="name" placeholder="Name">
                                        <span class="text-danger name"></span>
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label for="name">Description</label>
                                        <textarea id="description" name="description">
                                            {{$writer->description}}
                                        </textarea>
                                        {{-- <span class="text-danger description"></span> --}}
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label for="icon">Icon</label>
                                        <input type="file" name="image" id="image" class="form-control">
                                        <img src="/{{ $writer->image}}"  height="60px;" alt="icon" class="mt-1">
                                        @error('image')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
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
@push('cjs')
    <script>
        $('#description').summernote({
                height:200,
            });
    </script>
@endpush
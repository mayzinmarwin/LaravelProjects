@extends('admin.layouts.app')
@section('content')
<section class="content-header">
    @include('admin.includes.breadcumb',['title'=>'Product Create'])
</section>
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card card-info">
                    <div class="card-header">
                    <h3 class="card-title">Add Product</small></h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                        <form id="productForm" class="insert_form" name="insert_form" action="{{route('product.store')}}" method="POST">
                            @csrf
                            <div class="card-body ">
                                <div class="row">
                                    <div class="form-group col-md-4">
                                        <label for="name">Name</label>
                                        <input type="text" name="name" class="form-control" id="name" placeholder="Name">
                                        <span class="text-danger name"></span>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="brand">Brand</label>
                                        <select name="brand" id="brand" class="form-control select2" multiple="multiple">
                                            {{-- <option value="">Select Brand</option> --}}
                                            @foreach ($brands as $key=>$brand)
                                                <option {{ $key == 0 ? 'selected':''}} value="{{ $brand->id }}">{{$brand->name}}</option>    
                                            @endforeach
                                        </select>
                                        <span class="text-danger brand"></span>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="main_category">Main Category</label>
                                        <select name="main_category_id" id="main_category_id" class="form-control">
                                            @foreach ($main_categories as $key=>$main_category)
                                                <option {{ $key == 0 ? 'selected':''}} value="{{ $main_category->id }}">{{$main_category->name}}</option>    
                                            @endforeach
                                        </select>
                                        <span class="text-danger main_category_id"></span>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-4">
                                        <label for="category_id">Category</label>
                                        <select name="category_id" id="category_id"  class="form-control select2" multiple="multiple">
                                            @foreach ($categories as $key=>$category)
                                                <option {{ $key == 0 ? 'selected':''}} value="{{ $category->id }}">{{$category->name}}</option>    
                                            @endforeach
                                        </select>
                                        <span class="text-danger category_id"></span>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="sub_category">Sub Category</label>
                                        <select name="sub_category_id" id="sub_category_id" class="form-control select2" multiple="multiple">
                                            @foreach ($sub_categories as $key=>$sub_category)
                                                <option {{ $key == 0 ? 'selected':''}} value="{{ $sub_category->id }}">{{$sub_category->name}}</option>    
                                            @endforeach
                                        </select>
                                        <span class="text-danger sub_category_id"></span>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="color">Color</label>
                                        @include('admin.product.components.select')
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-4">
                                        <label for="size">Size</label>
                                        <select name="size_id" id="size_id" class="form-control select2" multiple="multiple">
                                            @foreach ($sizes as $key=>$size)
                                                <option {{ $key == 0 ? 'selected':''}} value="{{ $size->id }}">{{$size->name}}</option>    
                                            @endforeach
                                        </select>
                                        <span class="text-danger size"></span>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="unit_id">Unit</label>
                                        <select name="unit_id" id="unit_id" class="form-control select2" multiple="multiple">
                                            @foreach ($units as $key=>$unit)
                                                <option {{ $key == 0 ? 'selected':''}} value="{{ $unit->id }}">{{$unit->name}}</option>    
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="price">Price</label>
                                        <input type="text" name="price" class="form-control" id="price" placeholder="price">
                                        @error('price')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-4">
                                        <label for="writer">Writer</label>
                                        <select name="writer" id="writer" class="form-control">
                                            @foreach ($writers as $key=>$writer)
                                                <option {{ $key == 0 ? 'selected':''}} value="{{ $writer->id }}">{{$writer->name}}</option>    
                                            @endforeach
                                        </select>
                                        <span class="text-danger sub_category_id"></span>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="publication">Publication</label>
                                        <select name="publication" id="publication" class="form-control">
                                            @foreach ($publications as $key=>$publication)
                                                <option {{ $key == 0 ? 'selected':''}} value="{{ $publication->id }}">{{$publication->name}}</option>    
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-4">
                                        <label for="discount">Discount</label>
                                        <input type="text" name="discount" class="form-control" id="discount" placeholder="discount">
                                        @error('discount')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="expiration_date">Expiration Date</label>
                                        <input type="date" name="expiration_date" class="form-control" id="expiration_date" placeholder="Expriation Date">
                                        @error('expiration_date')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="stock">Stock</label>
                                        <input type="number" name="stock" class="form-control" id="stock" placeholder="Stock">
                                        @error('stock')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <label for="alert_quantity">Alert Quantity</label>
                                        <input type="number" name="alert_quantity" class="form-control" id="alert_quantity" placeholder="Alert Quantity">
                                        @error('alert_quantity')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="status">Status</label>
                                        <select name="status" id="status" class="form-control">
                                            <option value="active">Active </option>
                                            <option value="pending">Pending </option>
                                            <option value="draft">Draft </option>
                                        </select>
                                        @error('status')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <label for="description">Description</label>
                                        <textarea id="description">
                                            Place <em>some</em> <u>text</u> <strong>here</strong>
                                            </textarea>
                                        {{-- <textarea name="description" id="description" class="form-control" cols="30" rows="3"></textarea> --}}
                                        @error('description')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="features">Features</label>
                                        {{-- <textarea name="features" id="features" class="form-control" cols="30" rows="3"></textarea> --}}
                                        <textarea id="feature">
                                            Place <em>some</em> <u>text</u> <strong>here</strong>
                                            </textarea>
                                        @error('features')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <label for="thumb_image">Thumb Image</label>
                                        <input type="file" class="form-control" id="thumb_image" name="thumb_image">
                                        @error('thumb_image')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="related_image">Related Image</label>
                                        <input type="file" name="related_image" multiple class="form-control" id="thumb_image" name="related_image[]">
                                        @error('related_image')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                
                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer">
                                <button type="submit" class="btn btn-info">Create Product</button>
                            </div>
                        </form>
                </div>
            </div>
        </div>
    </div>
</section>
@push('cjs')
        <script>
            $('#description').summernote({
                height:200,
            });
            $('#feature').summernote({
                height:200
            });
            $('.select2').select2();

            //Initialize Select2 Elements
            $('.select2bs4').select2({
            theme: 'bootstrap4'
            })
            $('#main_category_id').on('change',function(){
                let value = $(this).val();
                $.get("/admin/product/get-all-category-selected-by-main-category/"+value,(res)=>{
                    $('#category_id').html(res);
                })
            });
        //    $('#category_id').on('change',function(){
        //         let value = $(this).val();
        //         $.get("/admin/product/get-all-sub_category-selected-by-category/"+value,(res)=>{
        //             $('#sub_category_id').html(res);
        //         })
        //     });
        </script>
    @endpush
@endsection
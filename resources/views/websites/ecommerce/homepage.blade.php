@extends('websites.ecommerce.index')
@section('content')
<section class="categories">
    <div class="container">
        <div class="row">
            @include('websites.ecommerce.categories.index')
        </div>
    </div>
</section>{{-- categories --}}
<section class="featured spad">
    <div class="container">
        @include('websites.ecommerce.products.index')
    </div>
</section>{{-- .featured --}}
<div class="banner">
    <div class="container">
        @include('websites.ecommerce.banner.index')
    </div>
</div>{{-- banner --}}
<section class="latest-product spad">
    <div class="container">
        @include('websites.ecommerce.products.latest.index')
    </div>
</section>{{-- .latest-product --}}
<section class="from-blog spad">
    <div class="container">
        @include('websites.ecommerce.blog.index')
    </div>
</section>
@endsection
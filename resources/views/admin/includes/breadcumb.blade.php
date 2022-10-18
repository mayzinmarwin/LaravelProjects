<div class="contaner-fluid">
    <div class="row mb-2">
        <div class="col-sm-6">
            <h3>{{$title}}</h3>
        </div><!-- /.col -->
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                @php
                $path_info = $_SERVER['REQUEST_URI'];
                $path_info  =explode('/',$path_info);
                @endphp
                @foreach ($path_info as $item)
                    <li class="breadcrumb-item">
                        <a href="#">{{$item}}</a>
                    </li>
                @endforeach
            </ol>
        </div><!-- /.col -->
    </div><!-- /.row -->
</div>
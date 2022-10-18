
<script>
    const Toast = Swal.mixin({
    toast: true,
    position: 'center',
    showConfirmButton: false,
    timer: 3000,
    timerProgressBar: true,
    didOpen: (toast) => {
        toast.addEventListener('mouseenter', Swal.stopTimer)
        toast.addEventListener('mouseleave', Swal.resumeTimer)
    }
})
</script>
@if ($message = Session::get('success'))
    <script>
        Toast.fire({
        icon: 'success',
        title: '{{$message}}'
        })
    </script>
@endif

@if ($message = Session::get('error'))
    <script>
        Toast.fire({
        icon: 'error',
        title: '{{$message}}'
        })
    </script>
@endif

@if ($message = Session::get('warning'))
    <script>
        Toast.fire({
        icon: 'warning',
        title: '{{$message}}'
        })
    </script>
@endif

@if ($message = Session::get('info'))
    <div class="alert alert-inf alert-block">
        <button class="close" type="button" data-dismiss="alert">
            x
        </button>
        <strong>{{$message}}</strong>
    </div>
@endif

@if ($errors->any())
    <script>
        Toast.fire({
        icon: 'error',
        title: 'Please check the form below for errors'
        })
    </script>
@endif

{{-- @if ($errors->any())
    <div class="row">
        <div class="col-xs-12">
            <div class="alert alert-danger alert-alt">
                <strong><i class="fa fa-bug fa-fw"></i> </strong><br>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
    <br/>
@endif --}}
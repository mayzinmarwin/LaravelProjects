<div class="">
    <select name="color_id" id="color_id" class="form-control select2" multiple="multiple">
        @foreach ($colors as $key=>$color)
            <option {{ $key == 0 ? 'selected':''}} value="{{ $color->id }}">{{$color->name}}</option>    
        @endforeach
    </select>
    <span class="text-danger color"></span>
</div>
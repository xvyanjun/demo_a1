<select class="form-control" name="brand_id">
@foreach($brand_info as $k=>$v)
<option value="{{$v['brand_id']}}">{{$v['brand_name']}}</option>
{{--<option value="{{$v->brand_id}}">{{$v->brand_name}}</option>--}}
@endforeach
</select>

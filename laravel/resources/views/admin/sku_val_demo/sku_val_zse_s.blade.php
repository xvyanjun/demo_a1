@foreach($xxi as $c=>$v)
                <tr>
                    <td><input  type="checkbox"></td>
                    <td>{{$v['val_id']}}</td>
                    <td id='eva_jd_s' val_id="{{$v['val_id']}}">{{$v['val_name']}}</td>
                    <td>{{date('Y-m-d H:i',$v['val_time'])}}</td>
                    <td class="text-center">
                        <button type="button" id='sc' val_id="{{$v['val_id']}}" class="btn bg-olive btn-xs">删除</button>
                    </td>
                </tr>
                @endforeach
                <tr>
                    <td colspan='9'>
                    <center>
                        {{$xxi->appends($xx)->links()}}
                    </center>
                    </td>
                </tr>
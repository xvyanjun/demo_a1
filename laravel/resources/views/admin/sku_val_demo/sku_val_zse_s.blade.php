@foreach($xxi as $c=>$v)
                <tr>
                    <td><input  name='ck' type="checkbox" val_id="{{$v['val_id']}}"></td>
                    <td>{{$v['val_id']}}</td>
                    <td id='eva_jd_s' val_id="{{$v['val_id']}}">{{$v['val_name']}}</td>
                    <td >
                      @foreach($sxing as $h=>$j)
                       @if($j['attr_id']==$v['attr_id'])
                        {{$j['attr_name']}}
                       @endif
                      @endforeach
                    </td>
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
 @foreach($xxi as $c=>$v)
                <tr>
                    <td><input  name='ck' type="checkbox" attr_id="{{$v['attr_id']}}"></td>
                    <td>{{$v['attr_id']}}</td>
                    <td id='eva_jd_s' attr_id="{{$v['attr_id']}}">{{$v['attr_name']}}</td>
                    <td>{{date('Y-m-d H:i',$v['attr_time'])}}</td>
                    <td class="text-center">
                        <button type="button" id='sc' attr_id="{{$v['attr_id']}}" class="btn bg-olive btn-xs">删除</button>
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
 @foreach($xxi as $c=>$v)
                <tr>
                    <td><input  type="checkbox"></td>
                    <td>{{$v['service_id']}}</td>
                    <td id='eva_jd_s' service_id="{{$v['service_id']}}">{{$v['service_title']}}</td>
                    <td>{{$v['service_titles']}}</td>
                    @php $text=mb_substr($v['service_text'],0,20).'....'; @endphp
                    <td title="{{$v['service_text']}}">{{$text}}</td>
                    <td>{{$v['service_sort']}}</td>
                    <td id='eva_jd' service_id="{{$v['service_id']}}">{{$v['service_show']=='1'?'√':'×'}}</td>
                    <td>{{date('Y-m-d H:i',$v['service_time'])}}</td>
                    <td class="text-center">
                        <button type="button" id='sc' service_id="{{$v['service_id']}}" class="btn bg-olive btn-xs">删除</button>
                        <a href="/service/service_xgq?service_id={{$v['service_id']}}" class="btn bg-olive btn-xs">
                           修改 
                        </a>
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
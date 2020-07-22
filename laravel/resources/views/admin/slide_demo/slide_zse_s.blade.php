 @foreach($xxi as $c=>$v)
                <tr>
                    <td><input  type="checkbox"></td>
                    <td>{{$v['slide_id']}}</td>
                    <td id='eva_jd_s' slide_id="{{$v['slide_id']}}">{{$v['slide_url']}}</td>
                    <td>
                        <img src="{{$v['slide_img']}}" width="50" height="50">
                    
                    </td>
                    <td>{{$v['slide_weight']}}</td>
                    <td id='eva_jd' slide_id="{{$v['slide_id']}}">{{$v['slide_show']=='1'?'√':'×'}}</td>
                    <td>{{date('Y-m-d H:i',$v['slide_time'])}}</td>
                    <td class="text-center">
                        <button type="button" id='sc' slide_id="{{$v['slide_id']}}" class="btn bg-olive btn-xs">删除</button>
                        <a href="/slide/slide_xgq?slide_id={{$v['slide_id']}}" class="btn bg-olive btn-xs">
                           修改 
                        </a>
                    </td>
                </tr>
                @endforeach
                <tr>
                    <td colspan='8'>
                    <center>
                        {{$xxi->appends($xx)->links()}}
                    </center>
                    </td>
                </tr>
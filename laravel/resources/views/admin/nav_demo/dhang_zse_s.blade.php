 @foreach($xxi as $c=>$v)
                <tr>
                    <td><input  type="checkbox"></td>
                    <td>{{$v['nav_id']}}</td>
                    <td id='eva_jd_s' nav_id="{{$v['nav_id']}}">{{$v['nav_name']}}</td>
                    <td>{{$v['nav_url']}}</td>
                    <td id='eva_jd' nav_id="{{$v['nav_id']}}">{{$v['nav_show']=='1'?'√':'×'}}</td>
                    <td>{{date('Y-m-d H:i',$v['nav_time'])}}</td>
                    <td class="text-center">
                        <button type="button" id='sc' nav_id="{{$v['nav_id']}}" class="btn bg-olive btn-xs">删除</button>
                        <a href="/nav/nav_xgq?nav_id={{$v['nav_id']}}" class="btn bg-olive btn-xs">
                           修改 
                        </a>
                        <!-- <button type="button" id='xg' nav_id="{{$v['nav_id']}}" class="btn bg-olive btn-xs">修改</button> -->
                    </td>
                </tr>
                @endforeach
                <tr>
                    <td colspan='7'>
                    <center>
                        {{$xxi->appends($xx)->links()}}
                    </center>
                    </td>
                </tr>
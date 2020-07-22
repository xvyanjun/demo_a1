<link rel="stylesheet" href="/admin/plugins/bootstrap/css/bootstrap.min.css">
<link rel="stylesheet" href="/admin/plugins/adminLTE/css/AdminLTE.css">
<link rel="stylesheet" href="/admin/plugins/adminLTE/css/skins/_all-skins.min.css">
<link rel="stylesheet" href="/admin/css/style.css">
<script src="/admin/plugins/jQuery/jquery-2.2.3.min.js"></script>
<script src="/admin/plugins/bootstrap/js/bootstrap.min.js"></script>
    <div class="box-header with-border">
        <h3 class="box-title">咨讯管理</h3>
    </div>

    <div class="box-body">

        <!-- 数据表格 -->
        <div class="table-box">

            <!--工具栏-->
            <div class="pull-left">
                <div class="form-group form-inline">
                    <div class="btn-group">
                        <a href="/service/service_tjq" class="btn btn-default" title="添加">
                            <i class="fa fa-file-o"></i>添加咨讯
                        </a>
                    </div>
                </div>
            </div>
    <!--         <div class="box-tools pull-right">
                <div class="has-feedback">
                    咨讯标题：<input id='title_cx' placeholder='标题'>
                    <button class="btn btn-default" id='cx'>查询</button>
                </div>
            </div> -->
            <!--工具栏/-->

            <!--数据列表-->
            <table id="dataList" class="table table-bordered table-striped table-hover dataTable">
                <thead>
                <tr>
                    <th class="" style="padding-right:0px">
                        <input id="selall" type="checkbox" class="icheckbox_square-blue">
                    </th>
                    <th class="sorting_asc" >咨讯ID</th>
                    <th class="sorting">标题</th>
                    <th class="sorting">副标题</th>
                    <th class="sorting">内容</th>
                    <th class="sorting">权重</th>
                    <th class="sorting">是否显示</th>
                    <th class="sorting">时间</th>
                    <th class="sorting">操作</th>
                </tr>
                </thead>
                <tbody id='th'>
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
                </tbody>
            </table>
            <!--数据列表/-->


        </div>
        <!-- 数据表格 /-->


    </div>
    <script>
    $(function(){
//-----------------------------------------------------------------
      $(document).on('click','#sc',function(){
        var service_id=$(this).attr('service_id');
        if(service_id!=''){
            $.ajax({
              url:'service_sce',
              type:'post',
              dataType:'json',
              data:{'service_id':service_id},
              success:function(jk){
                if(jk.a1==0){
                    location.href='/service/service_zse';
                }
                console.log(jk.a2);
              }
            });
        }
        console.log(service_id);
      });
//-----------------------------------------------------------------
      $(document).on('click','.pagination a',function(){
       var url=$(this).attr('href');
             $.ajax({
              url:url,
              type:'post',
              dataType:'html',
              success:function(ty){
                    $("#th").html(ty);
              }
            });
       return false;
      });
//-----------------------------------------------------------------      
      $(document).on('click','#eva_jd',function(){
        var ts=$(this);
        var service_id=$(this).attr('service_id');
        var service_show=$(this).text();
        if(service_id!=''&&service_show!=''){
            if(service_show=='√'){
               service_show='2'; 
            }else{
               service_show='1';
            }
            $.ajax({
              url:'/service/service_jd',
              type:'post',
              dataType:'json',
              data:{'service_id':service_id,'service_show':service_show},
              success:function(go){
                    if(go.a1==0){
                      var sf='';  
                      if(service_show==1){sf='√';}else{sf='×';}  
                      ts.text(sf);
                    }
                    console.log(go.a2);
              }
            });
        }
        console.log(service_id,service_show);
      });
//-----------------------------------------------------------------
      $(document).on('click','#eva_jd_s',function(){
        var ts=$(this);
        var service_id=$(this).attr('service_id');
        var service_name=$(this).text();
        var sf=$(this).children("#js_s").val();
        if(sf==undefined){
          $(this).empty();
          var input="<input type='text' id='js_s' s_id='"+service_id+"' s_yvl='"+service_name+"' value='"+service_name+"'/>";
          $(this).html(input);
          $("#js_s").focus(); 
        }
        console.log(sf);
        return false;
      });
//-----------------------------------------------------------------
      $(document).on('blur','#js_s',function(){
              var ts=$(this);
              var service_id=$(this).attr('s_id');
              var service_ytitle=$(this).attr('s_yvl');
              var service_title=$(this).val();
              var zz=/^[a-z \w A-Z 0-9 \u4e00-\u9fa5]{1,}$/;
              if(!zz.test(service_title)){
                $(this).after(service_ytitle);
                $(this).remove();
                console.log('标题中文数字字母下划线至少一位');
              }
              $.ajax({
                 url:'/service/service_jd_s',
                 type:'post',
                 dataType:'json',
                 data:{'service_id':service_id,'service_title':service_title},
                 success:function(go){
                       if(go.a1==0){
                         ts.after(service_title);
                         ts.remove();
                         console.log('eva1');
                       }else{
                         ts.after(service_ytitle);
                         ts.remove();
                         console.log('eva2');
                       }
                       console.log(go.a2);
                 }
              });
              console.log(service_id,service_ytitle,service_title);
            return false;
       }); 
//-----------------------------------------------------------------

//-----------------------------------------------------------------             
    });
</script>


<link rel="stylesheet" href="/admin/plugins/bootstrap/css/bootstrap.min.css">
<link rel="stylesheet" href="/admin/plugins/adminLTE/css/AdminLTE.css">
<link rel="stylesheet" href="/admin/plugins/adminLTE/css/skins/_all-skins.min.css">
<link rel="stylesheet" href="/admin/css/style.css">
<script src="/admin/plugins/jQuery/jquery-2.2.3.min.js"></script>
<script src="/admin/plugins/bootstrap/js/bootstrap.min.js"></script>
    <div class="box-header with-border">
        <h3 class="box-title">轮播图列表</h3>
    </div>

    <div class="box-body">

        <!-- 数据表格 -->
        <div class="table-box">

            <!--工具栏-->
            <div class="pull-left">
                <div class="form-group form-inline">
                    <div class="btn-group">
                        <a href="/slide/slide_tjq" class="btn btn-default" title="添加">
                            <i class="fa fa-file-o"></i>添加图片
                        </a>
                    </div>
                </div>
            </div>
<!--             <div class="box-tools pull-right">
                <div class="has-feedback">
                    状态：<select>
                        <option value="">id</option>
                        <option value="0">未申请</option>
                        <option value="1">申请中</option>
                        <option value="2">审核通过</option>
                        <option value="3">已驳回</option>
                    </select>
                    商品名称：<input >
                    <button class="btn btn-default" >查询</button>
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
                    <th class="sorting_asc" >ID</th>
                    <th class="sorting">url</th>
                    <th class="sorting">图片</th>
                    <th class="sorting">权重</th>
                    <th class="sorting">显示</th>
                    <th class="sorting">时间</th>
                    <th class="sorting">操作</th>
                </tr>
                </thead>
                <tbody id='th'>
                @foreach($xxi as $c=>$v)
                <tr>
                    <td><input  type="checkbox"></td>
                    <td>{{$v['slide_id']}}</td>
                    <td id='eva_jd_s' slide_id="{{$v['slide_id']}}">{{$v['slide_url']}}</td>
                    <td>
                        <img src="{{$v['slide_img']}}" width="50" height="50">
                    <!-- {{$v['slide_img']}} -->
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
        var slide_id=$(this).attr('slide_id');
        if(slide_id!=''){
            $.ajax({
              url:'/slide/slide_sce',
              type:'post',
              dataType:'json',
              data:{'slide_id':slide_id},
              success:function(jk){
                if(jk.a1==0){
                    location.href='/slide/slide_zse';
                }
                console.log(jk.a2);
              }
            });
        }
        console.log(slide_id);
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
        var slide_id=$(this).attr('slide_id');
        var slide_show=$(this).text();
        if(slide_id!=''&&slide_show!=''){
            if(slide_show=='√'){
               slide_show='2'; 
            }else{
               slide_show='1';
            }
            $.ajax({
              url:'/slide/slide_jd',
              type:'post',
              dataType:'json',
              data:{'slide_id':slide_id,'slide_show':slide_show},
              success:function(go){
                    if(go.a1==0){
                      var sf='';  
                      if(slide_show==1){sf='√';}else{sf='×';}  
                      ts.text(sf);
                    }
                    console.log(go.a2);
              }
            });
        }
        console.log(slide_id,slide_show);
      });
//-----------------------------------------------------------------
      $(document).on('click','#eva_jd_s',function(){
        var ts=$(this);
        var slide_id=$(this).attr('slide_id');
        var slide_url=$(this).text();
        var sf=$(this).children("#js_s").val();
        if(sf==undefined){
          $(this).empty();
          var input="<input type='text' id='js_s' s_id='"+slide_id+"' s_yvl='"+slide_url+"' value='"+slide_url+"'/>";
          $(this).html(input);
          $("#js_s").focus(); 
        }
        console.log(sf);
        return false;
      });
//-----------------------------------------------------------------
      $(document).on('blur','#js_s',function(){
              var ts=$(this);
              var slide_id=$(this).attr('s_id');
              var slide_yurl=$(this).attr('s_yvl');
              var slide_url=$(this).val();
              if(slide_url==''){
                $(this).after(slide_yurl);
                $(this).remove();
                console.log('url不能为空');
              }
              $.ajax({
                 url:'/slide/slide_jd_s',
                 type:'post',
                 dataType:'json',
                 data:{'slide_id':slide_id,'slide_url':slide_url},
                 success:function(go){
                       if(go.a1==0){
                         ts.after(slide_url);
                         ts.remove();
                         console.log('eva1');
                       }else{
                         ts.after(slide_yurl);
                         ts.remove();
                         console.log('eva2');
                       }
                       console.log(go.a2);
                 }
              });
              console.log(slide_id,slide_yurl,slide_url);
            return false;
       });         
//-----------------------------------------------------------------
    });
</script>


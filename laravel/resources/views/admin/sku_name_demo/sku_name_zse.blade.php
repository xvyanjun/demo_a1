<link rel="stylesheet" href="/admin/plugins/bootstrap/css/bootstrap.min.css">
<link rel="stylesheet" href="/admin/plugins/adminLTE/css/AdminLTE.css">
<link rel="stylesheet" href="/admin/plugins/adminLTE/css/skins/_all-skins.min.css">
<link rel="stylesheet" href="/admin/css/style.css">
<script src="/admin/plugins/jQuery/jquery-2.2.3.min.js"></script>
<script src="/admin/plugins/bootstrap/js/bootstrap.min.js"></script>
    <div class="box-header with-border">
        <h3 class="box-title">属性管理</h3>
    </div>

    <div class="box-body">

        <!-- 数据表格 -->
        <div class="table-box">

            <!--工具栏-->
            <div class="pull-left">
                <div class="form-group form-inline">
                    <div class="btn-group">
                        <a href="/sku_name/sku_name_tjq" class="btn btn-default" title="添加">
                            <i class="fa fa-file-o"></i>添加属性
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
                    <th class="sorting">属性名称</th>
                    <th class="sorting">时间</th>
                    <th class="sorting">操作
                    <button type="button" class="btn btn-warning" id='sc_s'>删除已选</button>
                    </th>
                </tr>
                </thead>
                <tbody id='th'>
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
                </tbody>
            </table>
            <!--数据列表/-->


        </div>
        <!-- 数据表格 /-->


    </div>
    <script>
    $(function(){
      $("#sc_s").hide();  
//-----------------------------------------------------------------
      $(document).on('click','#sc',function(){
        var attr_id=$(this).attr('attr_id');
        if(attr_id!=''){
            $.ajax({
              url:'/sku_name/sku_name_sce',
              type:'post',
              dataType:'json',
              data:{'attr_id':attr_id},
              success:function(jk){
                if(jk.a1==0){
                    location.href='/sku_name/sku_name_zse';
                }
                console.log(jk.a2);
              }
            });
        }
        console.log(attr_id);
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
                    $("#selall").prop('checked',false);//去除复选框选中状态 
                    $("#sc_s").hide();//删除按钮隐藏 
              }
            });
       return false;
      });
//-----------------------------------------------------------------
      $(document).on('click','#eva_jd_s',function(){
        var ts=$(this);
        var attr_id=$(this).attr('attr_id');
        var attr_name=$(this).text();
        var sf=$(this).children("#js_s").val();
        if(sf==undefined){
          $(this).empty();
          var input="<input type='text' id='js_s' a_id='"+attr_id+"' a_yvl='"+attr_name+"' value='"+attr_name+"'/>";
          $(this).html(input);
          $("#js_s").focus(); 
        }
        console.log(sf);
        return false;
      });
//-----------------------------------------------------------------
      $(document).on('blur','#js_s',function(){
              var ts=$(this);
              var attr_id=$(this).attr('a_id');
              var attr_yname=$(this).attr('a_yvl');
              var attr_name=$(this).val();
              var zz=/^[a-z \w A-Z 0-9 \u4e00-\u9fa5]{1,}$/;
              if(!zz.test(attr_name)){
                $(this).after(attr_yname);
                $(this).remove();
                console.log('属性中文数字字母下划线至少一位');
              }
              $.ajax({
                 url:'/sku_name/sku_name_jd_s',
                 type:'post',
                 dataType:'json',
                 data:{'attr_id':attr_id,'attr_name':attr_name},
                 success:function(go){
                       if(go.a1==0){
                         ts.after(attr_name);
                         ts.remove();
                         console.log('eva1');
                       }else{
                         ts.after(attr_yname);
                         ts.remove();
                         console.log('eva2');
                       }
                       console.log(go.a2);
                 }
              });
              console.log(attr_id,attr_yname,attr_name);
            return false;
       }); 
//-----------------------------------------------------------------全选
       $(document).on('click','#selall',function(){
        var sf=$(this).prop('checked');
               $("[type='checkbox'][name='ck']").prop('checked',sf);
            if(sf){
              $("#sc_s").show();  
            }else{
              $("#sc_s").hide(); 
            }
       });
//-----------------------------------------------------------------
       $(document).on('click',"[type='checkbox'][name='ck']",function(){
            var sf=0;
            $("[type='checkbox'][name='ck']:checked").each(function(){
               sf=sf+1;
            }); 
              if(sf>0){
                $("#sc_s").show();  
              }else{
                $("#sc_s").hide(); 
                $("#selall").prop('checked',false);//去除复选框选中状态 
              }
       });
//-----------------------------------------------------------------删除已选
       $(document).on('click',"#sc_s",function(){
            var id_s='';
            $("[type='checkbox'][name='ck']:checked").each(function(){
               id_s=id_s+$(this).attr('attr_id')+',';
            });
            var cd=(id_s.length)-1;
            var id_s=id_s.substr(0,cd);
            if(id_s!=''){
              $.ajax({
                url:'/sku_name/sku_name_qx',
                type:'post',
                dataType:'json',
                data:{'id_s':id_s},
                success:function(rc){
                  if(rc.a1=='0'){
                    location.href='/sku_name/sku_name_zse';
                  }
                  console.log(rc.a2);
                }
              });
            }
        });      
//-----------------------------------------------------------------             
    });
</script>


<link rel="stylesheet" href="/admin/plugins/bootstrap/css/bootstrap.min.css">
<link rel="stylesheet" href="/admin/plugins/adminLTE/css/AdminLTE.css">
<link rel="stylesheet" href="/admin/plugins/adminLTE/css/skins/_all-skins.min.css">
<link rel="stylesheet" href="/admin/css/style.css">
<script src="/admin/plugins/jQuery/jquery-2.2.3.min.js"></script>
<script src="/admin/plugins/bootstrap/js/bootstrap.min.js"></script>
    <div class="box-header with-border">
        <h3 class="box-title">属性值管理</h3>
    </div>

    <div class="box-body">

        <!-- 数据表格 -->
        <div class="table-box">

            <!--工具栏-->
            <div class="pull-left">
                <div class="form-group form-inline">
                    <div class="btn-group">
                        <a href="/sku_val/sku_val_tjq" class="btn btn-default" title="添加">
                            <i class="fa fa-file-o"></i>添加属性值
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
                    <th class="sorting">属性值名称</th>
                    <th class="sorting">所属属性</th>
                    <th class="sorting">时间</th>
                    <th class="sorting">操作
                    <button type="button" class="btn btn-warning" id='sc_s'>删除已选</button>
                    </th>
                </tr>
                </thead>
                <tbody id='th'>
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
        var val_id=$(this).attr('val_id');
        if(val_id!=''){
            $.ajax({
              url:'/sku_val/sku_val_sce',
              type:'post',
              dataType:'json',
              data:{'val_id':val_id},
              success:function(jk){
                if(jk.a1==0){
                    location.href='/sku_val/sku_val_zse';
                }
                console.log(jk.a2);
              }
            });
        }
        console.log(val_id);
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
        var val_id=$(this).attr('val_id');
        var val_name=$(this).text();
        var sf=$(this).children("#js_s").val();
        if(sf==undefined){
          $(this).empty();
          var input="<input type='text' id='js_s' v_id='"+val_id+"' v_yvl='"+val_name+"' value='"+val_name+"'/>";
          $(this).html(input);
          $("#js_s").focus(); 
        }
        console.log(sf);
        return false;
      });
//-----------------------------------------------------------------
      $(document).on('blur','#js_s',function(){
              var ts=$(this);
              var val_id=$(this).attr('v_id');
              var val_yname=$(this).attr('v_yvl');
              var val_name=$(this).val();
              var zz=/^[a-z \w A-Z 0-9 \u4e00-\u9fa5]{1,}$/;
              if(!zz.test(val_name)){
                $(this).after(val_yname);
                $(this).remove();
                console.log('属性值中文数字字母下划线至少一位');
              }
              $.ajax({
                 url:'/sku_val/sku_val_jd_s',
                 type:'post',
                 dataType:'json',
                 data:{'val_id':val_id,'val_name':val_name},
                 success:function(go){
                       if(go.a1==0){
                         ts.after(val_name);
                         ts.remove();
                         console.log('eva1');
                       }else{
                         ts.after(val_yname);
                         ts.remove();
                         console.log('eva2');
                       }
                       console.log(go.a2);
                 }
              });
              console.log(val_id,val_yname,val_name);
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
               id_s=id_s+$(this).attr('val_id')+',';
            });
            var cd=(id_s.length)-1;
            var id_s=id_s.substr(0,cd);
            if(id_s!=''){
              $.ajax({
                url:'/sku_val/sku_val_qx',
                type:'post',
                dataType:'json',
                data:{'id_s':id_s},
                success:function(rc){
                  if(rc.a1=='0'){
                    location.href='/sku_val/sku_val_zse';
                  }
                  console.log(rc.a2);
                }
              });
            }
        });
//-----------------------------------------------------------------             
    });
</script>


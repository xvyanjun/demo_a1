@extends('layouts_q.tw_jz')
@section('title','个人中心安全管理')
@section('content')
<script type="text/javascript" src="/qtai/js/plugins/jquery/jquery.min.js"></script>
<script type="text/javascript">
$(function(){
	$("#service").hover(function(){
		$(".service").show();
	},function(){
		$(".service").hide();
	});
	$("#shopcar").hover(function(){
		$("#shopcarlist").show();
	},function(){
		$("#shopcarlist").hide();
	});

})
</script>
<script type="text/javascript" src="/qtai/js/plugins/jquery.easing/jquery.easing.min.js"></script>
<script type="text/javascript" src="/qtai/js/plugins/sui/sui.min.js"></script>
<script type="text/javascript" src="/qtai/js/widget/nav.js"></script>
<!-- <script type="text/javascript" src="/qtai/plugins/jquery.validate/jquery.validate.js"></script> -->
<script>
        $(function(){
            //jquery.validate
            $("#jsForm").validate({
            submitHandler: function() {
                //验证通过后 的js代码写在这里
            }
        })		
        })
    
        //下面是一些常用的验证规则扩展

        /*-------------验证插件配置 懒人建站http://www.51xuediannao.com/-------------*/

        //配置错误提示的节点，默认为label，这里配置成 span （errorElement:'span'）
        $.validator.setDefaults({
        errorElement:'span'
        });

        //配置通用的默认提示语
        $.extend($.validator.messages, {
        required: '必填',
        equalTo: "请再次输入相同的值"
        });

        /*-------------扩展验证规则使用-------------*/
        //邮箱 
        jQuery.validator.addMethod("mail", function (value, element) {
        var mail = /^[a-z0-9._%-]+@([a-z0-9-]+\.)+[a-z]{2,4}$/;
        return this.optional(element) || (mail.test(value));
        }, "邮箱格式不对");

        //电话验证规则
        jQuery.validator.addMethod("phone", function (value, element) {
        var phone = /^0\d{2,3}-\d{7,8}$/;
        return this.optional(element) || (phone.test(value));
        }, "电话格式如：0371-68787027");

        //区号验证规则  
        jQuery.validator.addMethod("ac", function (value, element) {
        var ac = /^0\d{2,3}$/;
        return this.optional(element) || (ac.test(value));
        }, "区号如：010或0371");

        //无区号电话验证规则  
        jQuery.validator.addMethod("noactel", function (value, element) {
        var noactel = /^\d{7,8}$/;
        return this.optional(element) || (noactel.test(value));
        }, "电话格式如：68787027");

        //手机验证规则  
        jQuery.validator.addMethod("mobile", function (value, element) {
        var mobile = /^1[3|4|5|7|8]\d{9}$/;
        return this.optional(element) || (mobile.test(value));
        }, "手机格式不对");

        //邮箱或手机验证规则  
        jQuery.validator.addMethod("mm", function (value, element) {
        var mm = /^[a-z0-9._%-]+@([a-z0-9-]+\.)+[a-z]{2,4}$|^1[3|4|5|7|8]\d{9}$/;
        return this.optional(element) || (mm.test(value));
        }, "格式不对");

        //电话或手机验证规则  
        jQuery.validator.addMethod("tm", function (value, element) {
        var tm=/(^1[3|4|5|7|8]\d{9}$)|(^\d{3,4}-\d{7,8}$)|(^\d{7,8}$)|(^\d{3,4}-\d{7,8}-\d{1,4}$)|(^\d{7,8}-\d{1,4}$)/;
        return this.optional(element) || (tm.test(value));
        }, "格式不对");

        //年龄
        jQuery.validator.addMethod("age", function(value, element) {   
        var age = /^(?:[1-9][0-9]?|1[01][0-9]|120)$/;
        return this.optional(element) || (age.test(value));
        }, "不能超过120岁"); 
        ///// 20-60   /^([2-5]\d)|60$/

        //传真
        jQuery.validator.addMethod("fax",function(value,element){
        var fax = /^(\d{3,4})?[-]?\d{7,8}$/;
        return this.optional(element) || (fax.test(value));
        },"传真格式如：0371-68787027");

        //验证当前值和目标val的值相等 相等返回为 false
        jQuery.validator.addMethod("equalTo2",function(value, element){
        var returnVal = true;
        var id = $(element).attr("data-rule-equalto2");
        var targetVal = $(id).val();
        if(value === targetVal){
            returnVal = false;
        }
        return returnVal;
        },"不能和原始密码相同");

        //大于指定数
        jQuery.validator.addMethod("gt",function(value, element){
        var returnVal = false;
        var gt = $(element).data("gt");
        if(value > gt && value != ""){
            returnVal = true;
        }
        return returnVal;
        },"不能小于0 或空");

        //汉字
        jQuery.validator.addMethod("chinese", function (value, element) {
        var chinese = /^[\u4E00-\u9FFF]+$/;
        return this.optional(element) || (chinese.test(value));
        }, "格式不对");

        //指定数字的整数倍
        jQuery.validator.addMethod("times", function (value, element) {
        var returnVal = true;
        var base=$(element).attr('data-rule-times');
        if(value%base!=0){
            returnVal=false;
        }
        return returnVal;
        }, "必须是发布赏金的整数倍");

        //身份证
        jQuery.validator.addMethod("idCard", function (value, element) {
        var isIDCard1=/^[1-9]\d{7}((0\d)|(1[0-2]))(([0|1|2]\d)|3[0-1])\d{3}$/;//(15位)
        var isIDCard2=/^[1-9]\d{5}[1-9]\d{3}((0\d)|(1[0-2]))(([0|1|2]\d)|3[0-1])\d{3}([0-9]|X)$/;//(18位)

        return this.optional(element) || (isIDCard1.test(value)) || (isIDCard2.test(value));
        }, "格式不对");
    </script>
</body>
    <!--header-->
    <div id="account">
        <div class="py-container">
            <div class="yui3-g home">
                <!--左侧列表-->
               <div class="yui3-u-1-6 list">

<link rel="stylesheet" type="text/css" href="/qtai/css/pages-seckillOrder.css" />

                    <div class="person-info">
                        <div class="person-photo"><img src="/qtai/img/_/photo.png" alt=""></div>
                        <div class="person-account">
                            <span class="name">Michelle</span>
                            <span class="safe">账户安全</span>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="list-items">
                        <dl>
                            <dt><i>·</i> 订单中心</dt>
                            <dd ><a href="/center"  class="" >我的订单</a></dd>
                            <dd><a href="/home_order_pay" class="" >待付款</a></dd>
                            <dd><a href="/home_order_send"  >待发货</a></dd>
                            <dd><a href="home-order-receive.html" class="" >待收货</a></dd>
                        </dl>
                        <dl>
                            <dt><i>·</i> 我的中心</dt>
                            <dd><a href="/shop_user_list/collect" >我的收藏</a></dd>
                            <dd><a href="/shop_user_list/history" >我的足迹</a></dd>
                        </dl>
                        <dl>
                            <dt><i>·</i> 设置</dt>
                            <dd><a href="/add" class="">个人信息</a></dd>
                            <dd><a href="/add_list">地址管理</a></dd>
                            <dd><a href="/lists"  class="list-active">安全管理</a></dd>
                        </dl>
                    </div>
                </div>
                <!--右侧主内容-->
                <div class="yui3-u-5-6">
                    <div class="body userSafe">
                        <ul class="sui-nav nav-tabs nav-large nav-primary ">
                            <li class="active"><a href="#one" data-toggle="tab">密码设置</a></li>
                            <li><a href="#two" data-toggle="tab">绑定手机</a></li>
                        </ul>
                        <div class="tab-content ">
                            <div id="one" class="tab-pane active">
                                <form class="sui-form form-horizontal sui-validate" id="jsForm">
                                    <div class="control-group">
                                        <label for="inputusername" class="control-label">用户名：</label>
                                        <div class="controls">
                                            <input id="pwdid" type="text" name="u_name"/>
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <label for="inputPassword" class="control-label">原密码：</label>
                                        <div class="controls">
                                            <input class="fn-tinput" type="password" name="u_pwd" value="" placeholder="新密码" required id="password" data-rule-remote="php.php"  name="u_pwd" id="u_pwd">
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <label for="inputPassword" class="control-label">新密码：</label>
                                        <div class="controls">
                                            <input class="fn-tinput" type="password" name="new_pwd" value="" placeholder="新密码" required id="password" data-rule-remote="php.php"  name="u_pwd" id="u_pwd">
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <label for="inputRepassword" class="control-label">重复密码：</label>
                                        <div class="controls">
                                            <input class="fn-tinput" type="password" id="re_pwd" name="=re_pwd" value="" placeholder="确认新密码" required equalTo="#password" name="u_pwd" id="u_pwd">
                                        </div>
                                    </div>

                                    <div class="control-group">
                                        <label class="control-label"></label>
                                        <div class="controls">
                                            <button type="button" id="change" class="sui-btn btn-primary">修改密码</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div id="two" class="tab-pane">
                                <!--步骤条-->
                                <div class="sui-steps steps-auto">
                                    <div class="wrap">
                                        <div class="finished">
                                        <label><span class="round"><i class="sui-icon icon-pc-right"></i></span><span>第一步 验证身份</span></label><i class="triangle-right-bg"></i><i class="triangle-right"></i>
                                        </div>
                                    </div>
                                    <div class="wrap">
                                        <div class="todo">
                                        <label><span class="round">2</span><span>第二步 绑定新手机号</span></label><i class="triangle-right-bg"></i><i class="triangle-right"></i>
                                        </div>
                                    </div>
                                    <div class="wrap">
                                        <div class="todo">
                                        <label><span class="round">3</span><span>第三步 完成</span></label>
                                        </div>
                                    </div>
                                </div>

                                <!--表单-->

                                <form class="sui-form form-horizontal sui-validate" data-toggle='validate' id="bind-form">

                                    <div class="control-group">
                                        <label for="inputPassword" class="control-label">手机号：</label>
                                        <input type="text" name="u_phone">
                                        <div class="controls fixed"></div>
                                    </div>
                                    <div class="control-group">
                                        <label for="inputRepassword" type="button" class="control-label">短信验证码：</label>
                                        <div class="controls">
                                            <input name="msgcode" type="text" id="msgcode">
                                        </div>
                                        <div class="controls">
                                            <button class="sui-btn btn-info" type="button" id="send">发送</button>
                                        </div>
                                    </div>
                                    <div class="control-group next-btn">
                                        <a class="sui-btn btn-primary" id="next" href="javascript:void(0)">下一步</a>
                                    </div>
                                </form>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>


<!-- 底部栏位 -->
<!--页面底部-->

<script src="/admin/plugins/jQuery/jquery-2.2.3.min.js"></script>
<script src="/admin/plugins/bootstrap/js/bootstrap.min.js"></script>

<script>
    $(function(){
        $(document).on('click','#change',function(){
            var data = {};
            data.u_name = $('input[name=u_name]').val();
            data.u_pwd = $('input[name=u_pwd]').val();
            data.new_pwd = $('input[name=new_pwd]').val();
            var re_pwd = $('#re_pwd').val();
            if(data.u_pwd == data.new_pwd){
                alert("新密码不能和旧密码一致！");
                return false;
            }
            if(data.new_pwd != re_pwd){
                alert("两次密码必须一致！！");
                return false;
            }
            $.ajax({
                data:data,
                type:'post',
                dataType:'json',
                url:'/login_do',
                success:function(res){
                    if(res.errno == 00001){
                        alert(res.msg);
                    }else{
                        alert(res.msg);
                        location.href = '/login';
                    }
                }
            })
        }) ;
    });
</script>

<script>
    $(function(){
        $(document).on('click','#send',function(){
            var u_phone = $('input[name=u_phone]').val();
            if(validatorTel(u_phone) == false){
                alert("手机号格式不对");
                return false;
            }

            $.ajax({
                data:{u_phone:u_phone},
                dataType:'json',
                type:'post',
                url:'/sendcode',
                success:function(res){
                    alert(res.msg);
                }

            });
        });
        function validatorTel(content){

            // 正则验证格式
            eval("var reg = /^1[34578]\\d{9}$/;");
            return RegExp(reg).test(content);
        }

        $(document).on('click','#next',function(){
            var u_phone = $('input[name=u_phone]').val();
            var msgcode = $('input[name=msgcode]').val();
            if(validatorTel(u_phone) == false){
                alert("手机号格式不对");
                return false;
            }
            $.ajax({
                data:{u_phone:u_phone,msgcode:msgcode},
                dataType:'json',
                type:'post',
                url:'/change_phone',
                success:function(res){
                    alert(res.msg);
                }

            });

        });
    });
</script>


@endsection


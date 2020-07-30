<!DOCTYPE html>
<html>

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=9; IE=8; IE=7; IE=EDGE">
	<meta http-equiv="X-UA-Compatible" content="IE=EmulateIE7" />
	<meta name="csrf-token" content="{{ csrf_token()}}">
	<title>用户注册</title>
    <link rel="stylesheet" type="text/css" href="/admin/css/webbase.css" />
    <link rel="stylesheet" type="text/css" href="/admin/css/pages-register.css" />
</head>

<body>
	<div class="register py-container ">
		<!--head-->
		<div class="logoArea">
			<a href="" class="logo"></a>
		</div>
		<!--register-->  
		<div class="registerArea">
			<h3>用户注册<span class="go">我有账号，去<a href="/login">登陆</a></span></h3>
			<div class="info">
				<form class="sui-form form-horizontal">
					<div class="control-group">
						<label class="control-label">用户名：</label>
						<div class="controls">
							<input type="text" placeholder="请输入你的用户名" class="input-xfat input-xlarge" id="u_name" name="u_name" >
						</div>
					</div>
					<div class="control-group">
						<label for="inputPassword" class="control-label">登录密码：</label>
						<div class="controls">
							<input type="password" placeholder="设置登录密码" class="input-xfat input-xlarge" id="u_pwd" name="u_pwd">
						</div>
					</div>
					<div class="control-group">
						<label for="inputPassword" class="control-label">确认密码：</label>
						<div class="controls">
							<input type="password" placeholder="再次确认密码"  class="input-xfat input-xlarge" id="repwd"  name="" >
						</div>
					</div>
					
					<div class="control-group">
						<label class="control-label">手机号：</label>
						<div class="controls">
							<input type="text" placeholder="请输入你的手机号" class="input-xfat input-xlarge" id="u_phone" name="u_phone" >
						</div>
					</div>
					<div class="control-group">
						<label for="inputPassword" class="control-label">短信验证码：</label>
						<div class="controls">
							<input type="text" placeholder="短信验证码" class="input-xfat input-xlarge" id="code" name="code" >  <a href="#" id="verify">获取短信验证码</a>
						</div>
					</div>
					
					<div class="control-group">
						<label for="inputPassword" class="control-label">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
						<div class="controls">
							<input name="m1" type="checkbox" value="2" checked=""><span>同意协议并注册《品优购用户协议》</span>
						</div>
					</div>
					<div class="control-group">
						<label class="control-label"></label>
						<div class="controls btn-reg">
							<a class="sui-btn btn-block btn-xlarge btn-danger" target="_blank" id="reg">完成注册</a>
						</div>
					</div>
				</form>
				<div class="clearfix"></div>
			</div>
		</div>
		<!--foot-->
		<div class="py-container copyright">
			<ul>
				<li>关于我们</li>
				<li>联系我们</li>
				<li>联系客服</li>
				<li>商家入驻</li>
				<li>营销中心</li>
				<li>手机品优购</li>
				<li>销售联盟</li>
				<li>品优购社区</li>
			</ul>
			<div class="address">地址：北京市昌平区建材城西路金燕龙办公楼一层 邮编：100096 电话：400-618-4000 传真：010-82935100</div>
			<div class="beian">京ICP备08001421号京公网安备110108007702
			</div>
		</div>
	</div>

<script src="/admin/plugins/jQuery/jquery-2.2.3.min.js"></script>
<script src="/admin/plugins/bootstrap/js/bootstrap.min.js"></script>
	<script src="/static/js/jquery.min.js"></script>
</body>
</html>
	<script>
		//发送手机验证码
	$(document).on('click','#verify',function(){
		var u_phone = $('#u_phone').val();
		// alert(123);
		$.ajax({
			url:'/go_reg',
			type:'post',
			dataType:'json',
			data:{'u_phone':u_phone},
			success:function(res){
				alert(res.msg);
			}

		});
	});


	//注册
	$(document).on('click','#reg',function(){
		var u_name = $('#u_name').val();
		var u_phone = $('#u_phone').val();
		var code = $('#code').val();
		var u_pwd = $('#u_pwd').val();
		var repwd = $('#repwd').val();

		if(repwd != u_pwd){
           alert('两次密码不一致');
			return false;
		}
		if(!validatorTel(u_phone)){
			alert("手机号格式不正确哦");
		}

		//alert(123);
		$.ajax({
			url: '/reg_do',
			type: 'post',
			dataType: 'json',
			data: {'u_name': u_name, 'u_phone': u_phone, 'code': code, 'u_pwd': u_pwd},
			success: function (res) {
				//console.log(res);

				if(res.code==0){
					alert('注册成功')
					location.href='/login'
				}else{
					alert(res.msg);
				}

//
			}

		});
	});
		/*
		 * 验证手机号码
		 */
		function validatorTel(content){

			// 正则验证格式
			eval("var reg = /^1[34578]\\d{9}$/;");
			return RegExp(reg).test(content);
		}

</script>

<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=9; IE=8; IE=7; IE=EDGE">
	<meta http-equiv="X-UA-Compatible" content="IE=EmulateIE7" />
	<title>用户登录</title>
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
			<h3>用户登录<span class="go">我没有账号，去<a href="/reg">注册</a></span></h3>
			<div class="info">
				<form class="sui-form form-horizontal">				
					<div class="control-group">
						<label class="control-label">用户名：</label>
						<div class="controls">
							<input type="text" placeholder="手机号" id="u_phone" name="u_phone" class="input-xfat input-xlarge">
						</div>
					</div>
					
					<div class="control-group">
						<label class="control-label">用户密码：</label>
						<div class="controls">
							<input type="password" placeholder="登陆密码" id="u_pwd"  name="u_pwd"  class="input-xfat input-xlarge">
						</div>
					</div>
					
					<div class="control-group">
						<label for="inputPassword" class="control-label">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
						<div class="controls">
							<input name="m1" type="checkbox" value="2" checked=""><span>同意协议并注册  <a href="sampling.html">《品优购商家入驻协议》</a></span>
						</div>
					</div>
					<div class="control-group">
						<label class="control-label"></label>
						<div class="controls btn-reg">
							<a class="sui-btn btn-block btn-xlarge btn-danger" id="login" href="javascript:;">登录</a>
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
</body>
</html>

<script>
      $(document).on('click','#login',function(){
          var u_phone = $('#u_phone').val();
          var u_pwd = $('#u_pwd').val();
          $.ajax({
              url:'/login_do',
              type:'post',
              dataType:'json',
              data:{'u_phone':u_phone,'u_pwd':u_pwd},
              success:function(res){
				  if(res.code==00000){
					  alert(res.msg);
					  location.href = "/";
				  }else{
                  alert(res.msg);
				  }
              }
          })

      });

</script>
<!DOCTYPE html>
<html>

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=9; IE=8; IE=7; IE=EDGE">
	<meta http-equiv="X-UA-Compatible" content="IE=EmulateIE7" />
	<title>商家入驻申请</title>
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
			<h3>商家入驻详情页<span class="go"></h3>
			<div class="info">
				<form class="sui-form form-horizontal" action="{{url('/admin/login/homeAdd')}}" method="post" enctype="multipart/form-data">
                @csrf
                <input type="hidden" value="{{$id}}" name="admin_id">
					<div class="control-group">
						<label class="control-label">个人昵称：</label>
						<div class="controls">
							<input type="text" placeholder="昵称" name="s_name" class="input-xfat input-xlarge">
						</div>
					</div>
					
					<div class="control-group">
						<label class="control-label">性别：</label>
						<div class="controls">
                            <input type="radio"  name="s_sex" class="input-xfat input-xlarge" value="1" checked>男
                            <input type="radio"  name="s_sex" class="input-xfat input-xlarge" value="2">女
						</div>
                    </div>
                    <div class="control-group">
						<label class="control-label">年龄：</label>
						<div class="controls">
							<input type="text" placeholder="年龄" name="s_birt" class="input-xfat input-xlarge">
						</div>
					</div>
                    <div class="control-group">
						<label class="control-label">头像：</label>
						<div class="controls">
							<input type="file" name="s_img" class="input-xfat input-xlarge">
						</div>
					</div>
					
					<div class="control-group">
						<label class="control-label"></label>
						<div class="controls btn-reg">
                            <input type="submit" class="sui-btn btn-block btn-xlarge btn-danger" value="详情信息">
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

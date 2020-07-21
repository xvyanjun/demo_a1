<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8"> 
	<title>Bootstrap 实例 - demo</title>
	<link rel="stylesheet" href="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/css/bootstrap.min.css">  
	<script src="https://cdn.staticfile.org/jquery/2.1.1/jquery.min.js"></script>
	<script src="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
<form action="{{url('/eva_demo_b')}}" method="post" enctype="multipart/form-data" class="form-horizontal" role="form">
	<div class="form-group">
<input type="file" name='imgs[]' multiple class="form-control" id="lastname">
	</div>
	<button type="submit" class="btn btn-default">提交</button>
</form>
	
</body>
</html>
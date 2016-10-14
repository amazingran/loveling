<html>
<meta charset="utf-8">
<title>test</title>
<body>
<form>
<label for="userName"> 用户名：</label>
<input type="text" name="userName"/>
<label for="gender">性别：</label>
<input type="text" name="gender"/>
<input type="button" value="submit"/>
</form>
<script src="//cdn.bootcss.com/jquery/3.1.0/jquery.min.js"></script>
<script type="text/javascript">
$(function(){
	$("input[type='button']").click(
		var dd="abc";
		var datas=$("form").serializeArray();
		$.ajax({
			url:"/site/test",
			type:"post",
			data:datas,
			datatype:"json",
			success:function(data){
				console.log(data);
			}
		});
	);
});
</script>
</body>
</html>
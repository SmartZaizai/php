<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<script type="text/javascript" src="http://apps.bdimg.com/libs/jquery/2.1.4/jquery.min.js"></script>
	<script type="text/javascript">
	$(document).ready(function(){

		//button start
		$('button').click(function(){
			alert(1)
		});

		
	})
	</script>
</head>
<body>
	<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post" enctype="multipart/form-data">
		<fieldset>
			<legend>文件上传</legend>
			选择文件:<input type="file" name='upload'>
			<button type="submit">上传</button>
		</fieldset>
	</form>
</body>
</html>
<?php  
	//$_SERVER['PHP_SELF'] 表示当前php文件相对于网站根目录的位置地址
	//echo htmlspecialchars($_SERVER['PHP_SELF']);
	
	$type = ['image/jpg','image/jpeg', 'image/png'];
	

	if($_SERVER['REQUEST_METHOD']=='POST'){

		// 1.先判读选择框是否已选择文件
		if(isset($_FILES['upload'])){
			echo('未选择文件');
			//2.文件类型进行判断		
		}else{
			echo('未选择文2件');
		}



	}


?>
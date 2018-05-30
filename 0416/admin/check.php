<?php 



switch ($_GET['check']) {
	
	case 'email':

		$email = $_POST['email'];

		if(empty($email)){
			exit(json_encode(['status'=>0,'msg'=>'邮箱不能为空']));
		}else if (in_array($email, ['admin@qq.com','admin@qq.cn'])){
			exit(json_encode(['status'=>1,'msg'=>'邮箱地址已存在']));		
		}else if(!preg_match("/([\w\-]+\@[\w\-]+\.[\w\-]+)/",$email)) {
  			exit(json_encode(['status'=>2,'msg'=>'无效的 email 格式']));
  		}else{
  			exit(json_encode(['status'=>3,'msg'=>'email正确']));
  		}
		break;
	

	case 'password1':

		$password1 = $_POST['password1'];
		
		if( strlen($password1)<6 ){
			exit(json_encode(['status'=>0,'msg'=>'密码长度不应小于6位!']));
		}else{
			exit(json_encode(['status'=>1,'msg'=>'密码长度正确!']));
		}
		break;


	case 'password2':

		$password1 = $_POST['password1'];
 		$password2 = $_POST['password2'];
		
		if( strlen($password2)<6 ){
			exit(json_encode(['status'=>0,'msg'=>'密码长度不应小于6位!']));
		}else if(strcmp($password1,$password2)){
			exit(json_encode(['status'=>1,'msg'=>'确认密码与初始密码不符!']));
		}else{
			exit(json_encode(['status'=>1,'msg'=>'密码正确']));
		}
		break;

	default:
		# code...
		break;
}
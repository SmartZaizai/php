<?php 

$fileName = $_POST['fileName'];
//print_r($fileName);

if(!file_exists($fileName))
	mkdir($fileName);

$type = ['image/jpg','image/jpeg', 'image/png'];

if(in_array($_FILES['fileJpg']['type'],$type)){
	if(file_exists($fileName.'/'.$_FILES['fileJpg']['name'])){  

    	die($_FILES['fileJpg']['name']."文件已存在");  //如果上传的文件已经存在 

	}else{

	    move_uploaded_file($_FILES['fileJpg']['tmp_name'], $fileName.'/'.$_FILES['fileJpg']['name']);  //保存在缓冲区的是临时文件名而不是文件名  
	}  

}else{

	die("格式错误，必须为图片格式");
}


$json_array = array('fileName'=>$fileName,'fileJpg'=>$_FILES['fileJpg']['name']); //转换成数组类型  
     //$json_array = array('name'=>$username,'age'=>$age ,'file1'=>$filesName[0] ); //转换成数组类型  
  
$json= json_encode($json_array);  //将数组转换成json对象  
echo   $json;  

?>
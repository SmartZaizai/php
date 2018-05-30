<?php  

    date_default_timezone_set('PRC');  //获取中国时区，'PRC':中华人民共和国  
    
    $type = ['image/jpg','image/jpeg', 'image/png'];

    if(!file_exists(date("Ymd",time()))) //如果文件夹不存在，则创建一个  
        mkdir(date("Ymd",time()));    
  

    $username = $_POST['name']; //获取索引  
    $age = $_POST['age'];  
   

    
    $filesName = $_FILES['file']['name'];  //文件名数组  
    
    $filesTmpNamew = $_FILES['file']['tmp_name'];  //临时文件名数组  
    

   

    for($i= 0;$i<count($filesName);$i++)  // count():php获取数组长度的方法  
    {  
        if(file_exists(date("Ymd",time()).'/'.$filesName[$i])){  
            die($filesName[$i]."文件已存在");  //如果上传的文件已经存在  
        }else{  
            move_uploaded_file($filesTmpNamew[$i], date("Ymd",time()).'/'.$filesName[$i]);  //保存在缓冲区的是临时文件名而不是文件名  
        }  
    }  
  
  
  
    //$file = basename($_POST['file']);  //php的basename() 方法可获取文件名  
    // if(file_exists(date("Ymd",time()).'/'.$file)){  
    //  //die("文件已存在");  
    // }  
    // else{  
    //  move_uploaded_file($_FILES['file']['tmp_name'], date("Ymd",time()).'/'.$file);  
    // }  
  
     $json_array = array('name'=>$username,'age'=>$age ,'file1'=>$filesName[0] ,'file2'=>$filesName[1]); //转换成数组类型  
     //$json_array = array('name'=>$username,'age'=>$age ,'file1'=>$filesName[0] ); //转换成数组类型  
  
    $json= json_encode($json_array);  //将数组转换成json对象  
    echo   $json;  
      
?>  
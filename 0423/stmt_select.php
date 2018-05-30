<?php

require 'content.php';


$sql = 'select name,age,address,iphone from staff where staff_id>?';


//1.创建预处理对象
$stmt = mysqli_stmt_init($connect);

//2.预处理是否正常执行
if(mysqli_stmt_prepare($stmt,$sql)){

    //3.与预处理进行绑定
    mysqli_stmt_bind_param($stmt,'i',$staff_id);

    $staff_id = 2;

    //4.执行
    mysqli_stmt_execute($stmt);

    //5.获取查询结果集
    mysqli_stmt_store_result($stmt);


    //6.查询受影响行数
    if(mysqli_stmt_num_rows($stmt)>0){

        //7.将结果集与变量进行绑定
        mysqli_stmt_bind_result($stmt,$name,$age,$address,$iphone);

        //遍历输出
        while(mysqli_stmt_fetch($stmt)){
            echo '姓名：'.$name.'，年龄：'.$age.'，国籍：'.$address.'，电话：'.$iphone.'<br>';
        }


    }else{
        echo '无相关数据记录';
        exit();
    }

}else{
    exit(mysqli_stmt_errno($stmt).''.mysqli_stmt_error($stmt));
}

mysqli_stmt_close($stmt);
mysqli_close($connect);

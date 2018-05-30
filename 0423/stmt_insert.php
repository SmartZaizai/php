<?php


require 'content.php';


$sql = 'insert ignore staff set name=?,age=?,address=?,iphone=?;';

//1.初始化stmt对象
$stmt = mysqli_stmt_init($connect);

$name = '百里玄策';
$age = 18;
$address = '东京';
$iphone = '11111111111';

//2.检测预处理语句是否正确
if(mysqli_stmt_prepare($stmt,$sql)){

    //3.将变量与SQL中占位符进行绑定
    mysqli_stmt_bind_param($stmt,'siss',$name,$age,$address,$iphone);
    //4.执行SQL语句
    if(mysqli_stmt_execute($stmt)){

        //5.受影响纪录数
        if(mysqli_stmt_affected_rows($stmt)>0){

            echo '操作成功: 序列号'.mysqli_stmt_insert_id($stmt).'';

        }else{
            echo '操作失败';
            exit();
        }

    }else{
        exit('执行操作失败:'.mysqli_stmt_errno($stmt).':'.mysqli_stmt_error($stmt));
    }


}else{
    exit(mysqli_stmt_errno($stmt).':'.mysqli_stmt_error($stmt));
}

mysqli_stmt_close($stmt);

mysqli_close($connect);
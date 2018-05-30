<?php


require 'mysqli-obj.php';

//创建预处理对象
$stmt = $mysql->stmt_init();


$sql = "insert ignore staff set name=?,age=?,address=?,iphone=?;";

//校验预处理SQL语句
if($stmt->prepare($sql)){

    $stmt->bind_param('siss',$name,$age,$address,$iphone);

    $name='宫本武藏';
    $age='35';
    $address='日本';
    $iphone='888';


    if($stmt->execute()){

        echo '执行成功，共计新增：'.$stmt->affected_rows.'条记录';

    }else{

        echo '执行失败：'.$stmt->error;

    }


}else{

    echo $stmt->error;

}





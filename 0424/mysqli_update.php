<?php


require 'mysqli-obj.php';

$stmt = $mysql->stmt_init();

$sql = "update staff set iphone=? where name=?";

if($stmt->prepare($sql)){

    $stmt->bind_param('ss',$iphone,$name);
    $iphone='777';
    $name='女娲';

    $stmt->execute();

    if($stmt->affected_rows>0){

        echo '更新成功:'.$stmt->affected_rows;

    }else{

        echo '更新失败';

    }


}else{

    echo $stmt->error;

}
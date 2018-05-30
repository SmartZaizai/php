<?php


require 'pdo_connect.php';


$sql = "insert ignore staff set name=:name,age=:age,address=:address,iphone=:iphone;";



if($stmt = $pdo->prepare($sql)){

    $data = ['name'=>'刘备','age'=>60,'address'=>'汉中','iphone'=>'8888888'];

    if($stmt->execute($data)) {

        if( $stmt->rowCount() >0){
            echo '操作成功';
        }else{
            echo '操作失败';
        }


    }else{

        echo $stmt->errorInfo();
    }

}else{

    echo 'STMT Error!:'.$pdo->errorInfo();



}
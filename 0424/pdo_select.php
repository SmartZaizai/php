<?php

require 'pdo_connect.php';


$sql = 'select name,age,address,iphone from staff where staff_id>:id;';

if($stmt = $pdo->prepare($sql)){

    $stmt->bindParam('i',$id);

    $data = ['id'=>6];

    if($stmt->execute($data)){

        echo '<table border=1><tr><td>姓名</td><td>年龄</td><td>国籍</td><td>联系电话</td></tr>';

        while($res = $stmt->fetch(PDO::FETCH_ASSOC)){
            echo '<tr><td>'.$res['name'].'</td><td>'.$res['age'].'</td><td>'.$res['address'].'</td><td>'.$res['iphone'].'</td></tr>';
        }

        echo '</table>';

    }else{

        echo '查询失败，无数据';
        die();
    }

}else{

    echo $pdo->errorInfo();

}


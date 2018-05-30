<?php

require 'lib/pdo_connect.php';

$pdo = connect('127.0.0.1','php','root','root');


//1.新增数据
$data = ['name'=>'虞姬','age'=>24,'address'=>'江东','iphone'=>'88889999'];
insert_one($pdo,'staff',$data);


//2.更新数据
//$data1 = ['name'=>'刘邦','age'=>28];
//update($pdo,'staff',$data1,'staff_id=13');


//3.删除数据
//$data2 = ['name'=>'虞姬','age'=>24,'address'=>'江东','iphone'=>'88889999'];
//delete($pdo,'staff',$data2);
//
//4.精准条件查询
//4.1 模糊查询全部
$data2 = ['*'];
$data = [];

//4.1 指定字段查询
//$data2 = ['name','age','address'];
//$data = ['age'=>24];
$res = select($pdo,$data2,'staff',$data);

foreach($res as $key => $link)
{
    foreach($link as $key1 => $val)
    {
        echo $key1 . '-->'.$val." ";
    }
    echo '<br>';
}

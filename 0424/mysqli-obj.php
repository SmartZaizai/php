<?php


$URL = '127.0.0.1';
$dbName = 'php';
$userName = 'root';
$passWord = 'root';
$char = 'utf8';

$mysql = new mysqli($URL,$userName,$passWord,$dbName);

if($mysql->connect_errno){
    echo '连接失败:'.$mysql->error;
}

$mysql->set_charset($char);


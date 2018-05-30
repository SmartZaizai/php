<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/4/24
 * Time: 14:03
 */

session_start();

$email = $_POST['email'];
$password = $_POST['password'];

//连接数据库
require ('inc/content.php');

//加载公共函数库
require ('inc/function.php');

//验证登陆 将返回的数据保存在list中；
list($check,$data) = check_User($connect,$email,$password);

if($check){
//    print_r($data['user_name']);
    $_SESSION['username'] = $data['user_name'];
    jump_user('login_ok.php');
}else{
    $errors = $data;
    include ('login.php');
//    jump_user('login.php');
}


mysqli_close($connect);


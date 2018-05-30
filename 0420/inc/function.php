<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/4/24
 * Time: 13:11
 */


//验证用户登录
function check_User($connect,$email='',$password=''){

    //创建错误信息数组
    $errors = [];


    //简易校验email不能为空
    if(empty($email)){
        $errors[]='邮箱地址不能为空';
    }else{
        $e = mysqli_real_escape_string($connect,trim($email));
    }

    if(empty($password)){
        $errors[] = '密码不能为空';
    }else{
        $p = mysqli_real_escape_string($connect,trim($password));
    }

//    校验过，不存在错误信息
    if(empty($errors)){
        $mysql = "select `user_id`,`user_name` from `user` where `email`= '$e' and `password`=sha1('$p')";

        $result = mysqli_query($connect,$mysql);

        if(mysqli_num_rows($result) == 1){

            $row = mysqli_fetch_array($result,MYSQLI_ASSOC);

            return [true,$row];

        }else{
            $errors[] = '邮箱或密码错误';

        }
    }

    return [false,$errors];
}


function jump_user($page='index.php'){

//    URL地址
    $local_URL = 'http://'.$_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF']);

    $local_URL = rtrim($local_URL,'/\\');

    $local_URL.='/'.$page;

    header('Location:'. $local_URL);

    exit();
}

<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/4/24
 * Time: 16:01
 */

session_start();


if(!isset($_SESSION['username'])) {
    require('inc/function.php');
    jump_user();
}else{
    $_SESSION = [];
    session_destroy();
}

echo '退出成功<a href="login.php">登录</a>';
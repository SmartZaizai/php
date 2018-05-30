<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/4/24
 * Time: 15:27
 */
session_start();
include ('inc/header.php');

if(!isset($_SESSION['username'])) {
    require('inc/function.php');
    jump_user('login.php');
}

echo '欢迎:'.$_SESSION['username'].'<br>';
echo '<a href="logout.php">退出</a>';


include ('inc/footer.php');
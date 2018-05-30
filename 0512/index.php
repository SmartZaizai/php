<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/5/15
 * Time: 13:53
 */


require 'Controller.php';

$c = $_GET['c'];
$a = $_GET['a'];

$controller = new $c();
$controller-> $a();

//Controller::show();
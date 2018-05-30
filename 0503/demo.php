<?php


require 'PerInfo.php';


$per = new PerInfo('PHP',8,'www','www');

//echo $per->getUserName();

//不存在属性值 username
$per->username = '1';
echo '<br>';

//agea 属性值不存在
echo $per->agea;


$per->age = '19';
echo '<br>';
echo $per->age;

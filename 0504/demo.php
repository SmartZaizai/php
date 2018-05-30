<?php


spl_autoload_register(function($class){    
    require 'class/'.$class.'.php';
});

$length = 5;
$width = 6;
$height = 10;
$sq = new Square($length,$width,$height);

echo '面积:'.$sq->ares().'<br>';

echo '周长:'.$sq->perimeter().'<br>';

echo '体积:'.$sq->volume();
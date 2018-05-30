<?php

define("APP_PATH",__DIR__."/");

define("APP_REBUG",true);


define("APP_URL",'www.');

//require './fastphp/FastPTP.php';

//echo DIRECTORY_SEPARATOR;
//echo '<hr>';
//echo getcwd();
//echo '<hr>';
//echo APP_PATH;
//
//defined('FRAME_PATH') or define('FRAME_PATH', __DIR__.'/');
//echo '<hr>';
//echo FRAME_PATH;

$a = explode('\\',APP_PATH);
var_dump($a);

echo $b = ucfirst($a[1]);
<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/5/14
 * Time: 11:18
 */

//Base Controller
class Controller
{

    protected $loader;

    public function __construct()
    {
        $this->loader = new Loader();
    }

    public function redirect($url,$message,$wait= 0){
        if($wait == 0){
            header("Location:{$url}");
        }else{
            include CURR_VIEW_PATH."message.html";
        }
    }
}
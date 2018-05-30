<?php

class Core{


    function run(){

        spl_autoload_register(array($this,'loadClass'));


    }


    //路由处理
    function Route(){
        $controllerName = 'Index';
        $action = 'index';

        if(!empty($_GET['url'])){
            $url = $_GET['url'];

            //把字符串打散为数组：
            $urlArray = explode('/',$url);

            //获取控制器名
            //转换为大写字母
            $controllerName = ucfirst($urlArray[0]);


            //获取动作名
            //删除数组中的第一个元素（red），并返回被删除元素的值
            array_shift($urlArray);

            $action = empty($urlArray[0]?'index':$urlArray[0]);

            //获取URL参数
            array_shift($urlArray);
            $queryString = empty($urlArray)?array():$urlArray;
        }

        //数据为空处理
        $queryString = empty($queryString)?array():$queryString;

        $controller = $controllerName.'Controller';
        $dispatch = new $controller($controllerName,$action);

        if((int)method_exists($controller,$action)){
            call_user_func_array(array($dispatch,$action),$queryString);
        }else{
            exit($controller.'控制器不存在');
        }

    }

    //检测开发环境
    function setReporting(){
        if(APP_DEBUG === true){
            error_reporting(E_ALL);
            ini_set('display_errors','On');
        }else{
            error_reporting(E_ALL);
            ini_set('display_errors','Off');
            ini_set('log_errors','On');
            ini_set('error_log',RUNTIME_PATH,'logs/error.log');
        }
    }


    //删除敏感字符
    function stripSlashesDeep($value){

        $value = is_array($value)?array_map('stripSlashesDeep',$value):stripslashes($value);
        return $value;
    }


    function removeMagicQuotes(){
        if(get_magic_quotes_gpc()){
            $_GET = $this->stripSlashesDeep($_GET);
            $_POST = $this->stripSlashesDeep($_POST);
            $_COOKIE = $this->stripSlashesDeep($_COOKIE);
            $_SESSION = $this->stripSlashesDeep($_SESSION);
        }
    }


    function unregisterGlobals(){
        if(ini_get('register_globals')){
            $array = array('_SESSION','_POST','_GET',"_COOKIE",'_REQUEST','_SERVER','_ENV','_FILES');
            foreach ($array as $value){
                foreach ($GLOBALS[$value] as $key => $value){
                    if($value == $GLOBALS[$key]){
                        unset($GLOBALS[$key]);
                    }
                }
            }
        }

    }


    static function loadClass($class){

        $fremeworks = FRAME_PATH.$class.'.php';

        $controllers = APP_PATH.'application/controllers'.$class.'.php';

        $models = APP_PATH.'application/models'.$class.'.php';

        if(file_exists($fremeworks)){
            include $fremeworks;
        }elseif(file_exists($controllers)){
            include $controllers;
        }elseif (file_exists($models)){
            include $models;
        }else{
            die('不存在');
        }

    }


}
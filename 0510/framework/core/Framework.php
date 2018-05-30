<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/5/14
 * Time: 9:39
 */

class Framework
{
    public static function run(){
        //echo "run()";
        self::init();

        self::autoload();

        self::dispatch();

    }

    private static function init()
    {

        // Define path constants
        //路径分隔符
        define("DS",DIRECTORY_SEPARATOR);

        //当前工作目录
        define("ROOT",getcwd().DS);

        //存放WEB应用程序目录
        define("APP_PATH",ROOT."application".DS);

        //存放框架文件目录
        define("FRAMEWORK_PATH",ROOT."framework".DS);

        //存放公共静态资源
        define("PUBLIC_PATH",ROOT."public".DS);


        //application 存放配置文件
        define("CONFIG_PATH", APP_PATH."config" . DS);
        //application 应用控制器类
        define("CONTROLLER_PATH", APP_PATH . "controllers" . DS);
        //application 应用模型类
        define("MODEL_PATH", APP_PATH . "models" . DS);
        //application 应用试图文件
        define("VIEW_PATH", APP_PATH . "views" . DS);


        //框架 核心文件目录
        define("CORE_PATH", FRAMEWORK_PATH . "core" . DS);
        //数据库目录
        define('DB_PATH', FRAMEWORK_PATH . "database" . DS);
        //类库目录
        define("LIB_PATH", FRAMEWORK_PATH . "libraries" . DS);
        //辅助函数目录
        define("HELPER_PATH", FRAMEWORK_PATH . "helpers" . DS);


        //公共目录 上传的文件
        define("UPLOAD_PATH", PUBLIC_PATH . "uploads" . DS);

        //echo PUBLIC_PATH;

        // Define platform, controller, action, for example:
        // index.php?p=admin&c=Goods&a=add

        define("PLATFORM",isset($_REQUEST['P'])?$_REQUEST['P']:'home');

        define("CONTROLLER",isset($_REQUEST['c'])?$_REQUEST['c']:'Index');

        define("ACTION", isset($_REQUEST['a']) ? $_REQUEST['a'] : 'index');

        define("CURR_CONTROLLER_PATH", CONTROLLER_PATH . PLATFORM . DS);

        define("CURR_VIEW_PATH", VIEW_PATH . PLATFORM . DS);


//        require CORE_PATH."";
//        require CORE_PATH."";
//        require DB_PATH."";
//        require CORE_PATH."";
//
//        $GLOBALS['config']=include CONFIG_PATH."";

        session_start();

        echo __CLASS__;

    }

    //自带函数spl_autoload_register
    private static function autoload()
    {

        spl_autoload_register(array(__CLASS__,'load'));
    }


    //Define a custom load method
    private static function load($classname)
    {

//        if(substr($classname,-10) =='Controller'){
//            require_once CURR_CONTROLLER_PATH."$classname.php";
//        }elseif(substr($classname,-5)=="Model"){
//            require_once MODEL_PATH."$classname.php";
//        }

    }

    private static function dispatch()
    {

        //echo CONTROLLER;
//        $controller_name = CONTROLLER."Controller";
//        $action_name = ACTION."Action";
//        $controller = new $controller_name;
//        $controller->$action_name();

    }
}
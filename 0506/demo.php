<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/5/9
 * Time: 17:54
 */


trait MyTrait{

    protected $var = 'myTrait_var';
    protected $var1 = 'myTrait_var1';

//    function __construct(){
//        echo $this->var.PHP_EOL;
//    }

    function a(){
        echo 'Trait'.PHP_EOL;
    }


}

//interface MyInterface{
//    function __construct();
//    function b();
//}

abstract class MyAbstract{
    protected $var2 = 'MyAbstract_var';
    use MyTrait;
    function a(){
        echo 'abstract'.PHP_EOL;
    }
}

class MyClass extends MyAbstract {
    protected $var3 = 'MyClass_var';
    function c(){
        echo 'c'.PHP_EOL;
    }
}

$class = new MyClass();
$class->a();

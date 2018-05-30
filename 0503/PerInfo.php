<?php


class PerInfo {

    //设置私有属性
    private $userName='';
    private $age = 0;
    private $address = '';
    private $iphone = '';


    //构造方法
    public function __construct($userName='Smart',$age,$address='',$iphone=''){

        $this->userName = $userName;
        $this->age = $age;
        $this->address = $address;
        $this->iphone = $iphone;

    }

//    public function getUserName(){
//        return $this->userName;
//    }



//    魔术方法set,判断如果属性值等于age,进行赋值
    public function __set($name,$value){
        if($name == 'age' ){
            $this->$name = $value;
        }else{
            echo '赋值错误';
        }
    }


//    魔术方法get,判断属性值是否存在及判断条件
    public function __get($name)
    {
        $msg = '';
        if(!isset($this->$name)){
            $msg = "{$name} 属性值不存在";
        }else if($name == 'age' && $this->$name >=10){
            $msg =  $this->$name;
        }else{
            $msg = '年龄超出设定范围不存在';
        }
        return $msg;
    }





}

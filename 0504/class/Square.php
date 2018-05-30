<?php

require 'Area.php';

//长方形/长方体
class Square extends Area{
    //put your code here
    
    
    //属性长方体-- 高
    
    protected $heigthNum=0;
    
    
    public function __construct($lengthNum = 0, $widthNum = 0,$heigthNum=0)
    {
        $this->legthNum=$lengthNum;
        $this->widthNum=$widthNum;
        
        $this->heigthNum=$heigthNum;
    }
    
//    面积计算 方法重载
    public function ares()
    {
        $squareAre = $this->legthNum*$this->widthNum;
        return $squareAre;
    }
//    周长计算 方法重载
    public function perimeter()
    {
        $squarePerimeter = ($this->legthNum + $this->widthNum)*2;
        return $squarePerimeter;
    }
 
    //    体积计算
    public function volume(){
        $squareVolume = $this->legthNum*$this->widthNum*$this->heigthNum;
        return $squareVolume;
    }
}

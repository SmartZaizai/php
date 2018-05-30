<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/5/15
 * Time: 13:02
 */

class Model
{

    public static function getData(){
        $data=[
            ['id'=>'smart','name'=>30,'address'=>'china','phone'=>'080'],
            ['id'=>'smart1','name'=>31,'address'=>'chinab','phone'=>'0801'],
            ['id'=>'smart2','name'=>32,'address'=>'chinac','phone'=>'0802'],
            ['id'=>'smart3','name'=>33,'address'=>'chinad','phone'=>'0803'],
        ];
        return $data;
    }

}
//
//foreach (Model::getData() as $val){
//    echo $val['id'].'<br>';
//}
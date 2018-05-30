<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/5/11
 * Time: 14:10
 */

namespace Model\modelPDO;

require 'PDODB.php';

class Sql
{




    public function select($table,$field,$where,$limit){


        $sql = "select {$field} from {$table} where {$where} limit :limit;";

//        echo $sql;

        $stmt = PDBDB::pdo()->prepare($sql);

        $stmt->bindValue(":limit",$limit,\PDO::PARAM_INT);

        $stmt->execute();

        return $stmt->fetchAll(\PDO::FETCH_ASSOC);

    }

}

$s = new Sql();
//var_dump( $s->select('staff','age','age>1',5));

foreach ($s->select('staff','age,name','age>1',10) as $value){
    echo $value['age'].'--'.$value['name'].'<br>';
}
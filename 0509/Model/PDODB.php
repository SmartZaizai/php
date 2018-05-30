<?php


namespace Model\modelPDO;


class PDBDB
{


    private static $dsn='mysql:host=127.0.0.1;dbname=php; charset=utf8; port=3306';
    private static $user='root';
    private static $pass='root';
    private static $pdo = null;


    public static function pdo(){

        if(self::$pdo != null){
            return self::$pdo;
        }

        try{
            return self::$pdo = new \PDO(self::$dsn,self::$user,self::$pass);
        }catch (\PDOException $e){
            self::$pdo=null;
            die('Error'.$e->getMessage());
        }

    }



}

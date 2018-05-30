<?php



$dsn = 'mysql:host=localhost; dbname=php; charset=utf8; port=3306';

$userName = 'root';

$passWord = 'root';

//catch可能发生的错误
try{

    $pdo = new PDO($dsn,$userName,$passWord);

}catch(PDOException $e){

    print 'Connect ERROR!:'.$e->getMessage();
    die();

}


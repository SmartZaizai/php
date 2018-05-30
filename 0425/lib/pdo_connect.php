<?php



//1.数据库链接封装
function connect($url,$dbname,$root,$pass,$charset='utf8',$port='3306',$type='mysql'){

    $dsn="{$type}:host={$url};dbname={$dbname};charset={$charset};port={$port}";
    $userName = $root;
    $passWord = $pass;

    try{
        $pdo = new PDO($dsn,$userName,$passWord);
//        echo '数据库链接成功!';
        return $pdo;

    }catch (PDOException $e){
        print 'Connect ERROR!:'.$e->getMessage();
        die();
    }


}


//$pdo = connect('127.0.0.1','php','root','root');

//默认链接函数；
function dis_connect(){
    $url = '127.0.0.1';
    $dbname = 'php';
    $root = 'root';
    $pass = 'root';

    return connect($url,$dbname,$root,$pass);
}



//2.单条数据插入操作
//insert ignoe table set __=__
function insert_one($pdo,$table,$data=[]) {

    $sql = "insert ignore {$table} set ";

    if(!empty($data)){
        //1.SQL语句拼接
        //2.将data[]数组中的key作为参数以PDO预处理方式进行拼接

        foreach (array_keys($data) as $filed){
            $sql .= " {$filed} =:{$filed},";
        }

        //3.去除最后一个逗号
        $sql = substr($sql,0,strlen($sql)-1).';';


        $stmt = $pdo->prepare( $sql);

        foreach ($data as $key => $value) {
            $stmt->bindValue(":{$key}",$value);
        }

        //echo $stmt->queryString;

        //echo is_array($data);

        if($stmt->execute()){

            if($stmt->rowCount()>0){
                return true;
            }
        } else {
            echo 'STMT Error!:'.$pdo->errorInfo();
            return false;
        }

    }else{
        echo '无要新增的数据';
    }


}

//3.更新操作
//update table set ?=? where
function update($pdo,$table,$data=[],$where){

    $sql = "update {$table} set ";


    foreach (array_keys($data) as $key){
        $sql .= " {$key}=:{$key},";
    }

    $sql = substr($sql,0,strlen($sql)-1);

    if(!empty($where)){
        $sql .= " where {$where} ".';';
    }

    $stmt = $pdo->prepare($sql);

    foreach ($data as $key=>$value){
        $stmt->bindValue(":{$key}",$value);
    }

//    echo $stmt->queryString;
    if($stmt->execute()){
        echo '更新成功';
        return true;
    }else{
        echo '更新失败';
        return false;
    }



}

//4.删除操作
function delete($pdo,$table,$data=[]){


    $sql = "delete from {$table} where  ";

    if(!empty($data)){

        if( count($data)==1 ){
            foreach (array_keys($data) as $key){
                $sql .= "{$key}=:$key ;";
            }
        }else{

            foreach (array_keys($data) as $key){
                $sql .= "{$key}=:$key and ";
            }
            $sql = substr($sql,0,strripos($sql,'and')-1);

        }

    }else{
        echo '查询条件不能为空';
        die();
    }



    $stmt = $pdo->prepare($sql);

    foreach ($data as $key=>$value){
        $stmt->bindValue(":{$key}",$value);
    }

    //echo $stmt->queryString;

    if($stmt->execute()){
        if($stmt->rowCount()>0) {
            echo '<br>删除成功';
            return true;
        }else{
            echo '<br>删除失败';
            return false;
        }
    }else{
        echo '<br>删除失败';
        return false;
    }







}


//4.精准条件查询
function select($pdo,$col=[],$table,$data=[]){


    $sql = "select ";

    if(!empty($col)) {
        if(count($col)==1){
            foreach ($col as $value){
                $sql .= " {$value} ";
            }
        }else{
            foreach ($col as $value){
                $sql .= " {$value} ,";
            }
            $sql=substr($sql,0,strlen($sql)-1);
        }
    }else{
        echo '查询字段不能为空';
        die();
    }
    $sql .= " from {$table} where 1=1 ";




    if(!empty($data)) {

        foreach (array_keys($data) as $key){
            $sql .= " and {$key}=:{$key} ";
        }

    }else{
        $sql .= " and 1=1 ";
//        echo '查询条件不能为空';
//        die();
    }

    $stmt = $pdo->prepare($sql);

    foreach ($data as $key=>$value){
        $stmt->bindValue(":{$key}",$value);
    }

//    echo $sql;
//    die();

    if($stmt->execute()){
        $resall=[];
        while($res = $stmt->fetch(PDO::FETCH_ASSOC)){
           $resall[]=$res;
           //var_dump($res);
        }
        return $resall;

    }else{
        echo '<br>查询失败';
        return false;
    }

}





//5.获取总记录数
function sel_count($pdo,$table){

    $sql = "select count(*) from {$table}";

    return $row =  $pdo->query($sql)->fetchColumn();

}

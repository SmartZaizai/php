<?php


/**
 * 多语句执行与多结果集处理技术
 * 涉及函数:
 * mysqli_multi_query($db,$sql):执行多个查询语句
 * mysqli_store_result($db):获取最后一次查询语句产生的结果集
 * mysqli_more_results($db):检测多次查询是否还是更多的结果集,返回布尔值
 * mysqli_next_result($db):从多结果集中获取下一下结果集
 */


require 'content.php';

$sql = "select name,age,address,iphone from staff where name='李白';";

$sql .= "select name,age,address,iphone from staff where age=205;";

$sql .="select name,age,address,iphone from staff where length(address)<8;";


//1.SQL查询是否成功
$db = mysqli_multi_query($connect,$sql);

/**
 * 1.mysqli_multi_query()与之前的mysqli_query()不同,
 * 查询成功并不返回结果集而是true,失败返回false
 * 2.多语句查询的当前结果集要用专用函数:mysqli_store_result()来获取
 * 成功返回结果集对象,失败返回false
 * 3.mysqli_more_result():判断多语句查询结果中是否还存在更多的结果集，
 * 如果有返回true,否则返回false
 * 4.mysqli_next_result():取出下一下个结果,成功true,失败false
 *
 */

//SQL查询成功>>
if($db){


    //2.对查询结果集合进行遍历
    while( $result = mysqli_store_result($connect) ){


        //3.判断查询结果集数目，存在进行遍历
        if(mysqli_num_rows($result)>0){

            //5.对查询结果子集进行遍历

            while($row=mysqli_fetch_array($result,MYSQLI_ASSOC)){

                print_r($row);

            }
            echo '<hr>';
            mysqli_free_result($result);


        }else{
            echo '无符合查询信息的数据';
            echo '<hr>';
        }


        //判断当前的结果集中,是否还有更多的结果子集
        if(mysqli_more_results($connect)){
            //将结果集指针指向下一下结果子集
            mysqli_next_result($connect);
        }

    }





}else{//SQL查询失败
    exit(mysqli_error($connect).':'.mysqli_error($connect));
}


mysqli_close($connect);
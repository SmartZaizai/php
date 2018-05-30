<?php
//设置连接常量
define("URL","localhost");
define("DB_ID","root");
define("DB_PASS","root");
define("DB_DATA","php");
define("DB_CHARSET","utf8");

$connect = mysqli_connect(URL,DB_ID,DB_PASS,DB_DATA);
if( mysqli_connect_error($connect) ){
    echo '连接失败'.mysqli_connect_error($connect);
}

//选择操作的数据库
mysqli_select_db($connect,DB_DATA);
//设置客户端字符编码
mysqli_set_charset($connect,DB_CHARSET);




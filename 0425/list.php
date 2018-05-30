<style>
    table
    {
        border-collapse:collapse;
    }

    th{
        background-color:green;
        color:white;
        height:50px;
    }

    table,th, td
    {
        border: 1px solid black;
        padding: 10px;
        text-align: center;
    }
    a:link {
        text-decoration:none;
    }

</style>
<?php

require 'lib/pdo_connect.php';

$pdo = dis_connect();

//每页显示记录数
$num = 5;

//总记录数
$rowsCount = sel_count($pdo,'staff');


//总页数  = 向上取整(总记录数/每页显示记录数);
$pages = ceil($rowsCount/$num);

//获取页数，isset默认赋值1;
$page = isset($_GET['p'])?$_GET['p']:1;
//echo $page;
//
//检测页码是否小于1，少于1，赋值1;
//检测页码是否大于总页数，大于，赋值$page;
if($page<1){
    $page = 1;
}else if($page>$pages){
    $page = $pages;
}


// limit 起始算法
$limt = ($page-1) * $num;

$sql = "select * from staff limit {$limt},{$num}";


//
//echo $sql;
//$query = $pdo->prepare($sql);
//// 执行SQL。
//$query->execute();
//// 取得所有结果集。
//$result = $query->fetchAll();
//// 打印查看结果。
//print_r($result);

echo "<table border='1'><tr><th>用户ID</th><th>姓名</th><th>年龄</th><th>地址</th><th>电话</th></tr>";
foreach ($row = $pdo->query($sql) as $value){
    echo "<tr><td>{$value['staff_id']}</td><td>{$value['name']}</td><td>{$value['age']}</td><td>{$value['address']}</td><td>{$value['iphone']}</td></tr>";
}
echo "</table>";
echo "<a href='list.php?p=1'>首页</a><a href='list.php?p=".($page-1)."'>上一页</a>";
for($i=1;$i<=$pages;$i++){
    echo "<a href='list.php?p={$i}'>{$i}</a>&nbsp;&nbsp;";
}
echo "<a href='list.php?p=".($page+1)."'>下一页</a>&nbsp;&nbsp;<a href='list.php?p={$pages}'>尾页</a>";

echo "<form action='list.php' method='get'>";
echo "<select name='p'>";
for($i=1;$i<=$pages;$i++){
    echo "<option value={$i} >第{$i}页</option>";
}
echo "</select>";
echo " <input type='submit' value='Goto' ";
echo "</from>";

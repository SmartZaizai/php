<?php


require 'Jpgraph/Chart.php';
$chart = new \Chart();

$title = '破晓博客'; //标题
$data = array_rand(range(1,100),12);//数据(1到100中随机取10个)
shuffle($data);
/*echo '<pre>';
print_r($data);die;*/
$size = 350; //尺寸
$width = 1500; //宽度
$height = 900; //高度
$legend = array(1,2,3,4,5,6,7,8,9,10,11,12);//说明
/*上面的参数各种图都是用，比如：饼图 折线图 柱形图等等，需要改变的就是下面的chart.php中的function的名字*/
//$chart->createmonthline($title,$data,$size,$height,$width,$legend);
$chart->create3dpie($title,$data,$size,$height,$width,$legend);
//$chart->createcolumnar($title,$data,$size,$height,$width,$legend);
//$chart->createring($title,$data,$size,$height,$width,$legend);

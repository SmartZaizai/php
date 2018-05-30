<?php



// 索引数组
$userinfo = ['username','card','iPhone','gender','birth'];

for($i = 0;$i<count($userinfo);$i++){
	echo key($userinfo).'-->'.current($userinfo).'<br>';
	next($userinfo);
}


reset($userinfo);
echo "<hr>";

while(list($key,$val) = each($userinfo)){
	echo $key.'-->'.$val.'<br>';
}

echo "<hr>";
foreach ($userinfo as $key => $value) {
	echo($key.'--'.$value).'<br>';
}


echo "<hr>";
// 索引数组
$userinfo1 = ['username'=>'孙悟空','card'=>'80089321','iPhone'=>13186596596,'gender'=>'男','birth'=>'2005-05'];



for($i = 0;$i<count($userinfo1);$i++){
	echo key($userinfo1).'-->'.current($userinfo1).'<br>';
	next($userinfo1);
}

reset($userinfo1);
echo "<hr>";

while(list($key,$val) = each($userinfo1)){
	echo $key.'-->'.$val.'<br>';
}

echo "<hr>";


echo('<table border=1>');
foreach ($userinfo1 as $key => $value) {	
	echo('<tr><td>'.$key.'</td><td>'.$value).'</td></tr>';
}
echo('</table');

echo "<hr>";
$years = range(1980, 2000);
echo '<select id="years">';
foreach ($years as  $value) {
	echo '<option value="'.$value.'">'.$value.'</option>';
}


echo "<pre>";

$a=[1,2,3,4,5];
//array_splice($a,0,2);
array_splice($a,2);
print_r($a);

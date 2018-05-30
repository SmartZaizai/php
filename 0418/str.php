<?php 
// 数组排序
$userinfo = ['username'=>'李白','gender'=>'male','dyna'=>'唐朝','career'=>'诗人','age'=>45]; 

echo "<pre>";

print_r($userinfo);

echo "<hr>";

foreach ($userinfo as $key => $value) {
	echo $value.'   --对应ASCII码--->   '.ord($value).'<br>';
}
echo "<hr>";
//
//1.sort() - 以升序对数组排序
//
sort($userinfo,SORT_NUMERIC);
// // sort($arr, SORT_REGULAR);  //忽略类型,其实就是按类型分组,仅在分组中对同类型数据进行排序
// // sort($arr, SORT_NUMERIC);  //全部视为数值类型,字母全转为0,true转为1,
// // sort($arr, SORT_STRING);   //全部视为字符类型,因为数字的ASCII码要小于字母,所有排在前面
// // sort($arr, SORT_NATURAL);  //自然排序,与SORT_STRING结果一致
print_r($userinfo);
echo "<hr color=red>";

//
//2.rsort() - 以降序对数组排序 和sort反操纵
//




//
//3.ksort() - 根据键，以升序对关联数组进行排序
//
//键名正序排列
// ksort($arr);  //因为忽略了类型,5与其它键名类型不同,所以在最后面
// ksort($arr,SORT_STRING); //全部视为字符类型,5的ASCII码在普通字母之前
// ksort($arr,SORT_NUMERIC); //全部视为数值,则字母全转为0,5就是排到了最后面
// print_r($arr);

$age=array("Steve"=>"37","Bill"=>"35","Peter"=>"43");

print_r($age);
ksort($age);
print_r($age);

// 4.krsort() - 根据键，以降序对关联数组进行排序
// 


$age1=array("Bill"=>"35","Steve"=>"28","Peter"=>"43");
print_r($age1);
krsort($age1);
print_r($age1);

//5. arsort(&$arr):数组反转,保留键名
// arsort($arr, SORT_STRING); //键值对应关系不变,反转是指由大到小,所以ASCII小的数字字符排到了后面
// print_r($arr);
$age2=array("Bill"=>5,"Steve"=>"37","Peter"=>"43");
print_r($age2);
arsort($age2);
print_r($age2);


//6. krsort(&$arr): 键名反转排序 
// krsort($arr, SORT_STRING); //键名全部视为字符类型,按字母表逆序排列键名
// print_r($arr);
echo '<hr color=red>';
echo "字符串函数".'<br>';
echo "字符串长度函数>>>".'<br>';
echo '"王者荣耀2018"---strlen()长度为:'.strlen('王者荣耀2018').' ,strlen()获取字节长度<br>';
echo '"王者荣耀2018"---mb_strlen()长度为:'.mb_strlen('王者荣耀2018').' ,mb_strlen()获取字符数长度<br>';


echo '<hr color=green>';
$user = '王者荣耀、腾讯、工作室、擅长英雄、百里守约';
echo $user.'---explode() 根据顿号转换成数组';
$user_arr = explode('、', $user );
print_r($user_arr);
echo '将上述数组---implode() 用"=>"转换成字符串'.'<br>';
$user_arr1 = implode('=>', $userinfo);
echo $user_arr1;

echo '<hr color=red>';

$user1 = '王者荣耀、腾讯、工作室、擅长英雄、百里守约';
echo $user1.'---长度='.strlen($user1).'   “百” 首次出现在'.strpos($user1, '百').'<br>';

echo $user1.'---'.str_replace('百里守约', '孙悟空', $user1);

echo "<hr>";

$user = '王者荣耀、腾讯、工作室、擅长英雄、百里守约、占山为王';
$user_arr2 = explode('、',$user);
print_r($user_arr2);

print_r(str_replace('王','Wang',$user_arr2));
?>
<?php

header("Content-type:text/html;charset=utf-8");



// is_null(var);
// 下述三种情况时，返回TRUE，其它情况返回FALSE;
// 1.赋值为null;
// 2.未赋值;
// 3.未定义，相当于unset()


//1.赋值为null
//
$age = null ; 
var_dump(is_null($age)?true:false);

echo "<br>";


//2.已定义，未赋值
$age1;

@var_dump(is_null($age1));

echo "<br>";


//3.未定义
var_dump(is_null($age2));

echo "<br>";


//4.unset()
$age3=28;

var_dump($age3);
var_dump(is_null($age3));

unset($age3);
var_dump(is_null($age3));


echo "<hr>";






// isset();
// isset()这种检测一个变量是否设置和这个变量是否具有具体的值，当变量满足这两种情况时isset()返回TRUE，
// 
// 
$userName = null;       //被赋值为null时，表示这个变量没有被赋值 false;

var_dump(isset($userName));
echo "<br>";

$sex = 0;
$address='';
$myVar = false;

print (isset($sex).'--'.isset($address).'--'.isset($myVar)); //true 

echo "<br>";
var_dump(isset($iphone));  //未定义 false;
echo "<hr>";







// 
// empty(); 判断变量是否为空
// 1.变量不存在；
// 2.变量存在且其值为-:0,'0','',null,false
// 3.空数组

$money = null;

var_dump(empty($money)); //true;
echo "<br>";

$money1 = 0;
var_dump(empty($money1)); //true;
echo "<br>";

var_dump(empty($money2)); //true;




echo('<hr color=red>');

// 变量作用域
// 1.全局   函数以外创建，仅在当前脚本除函数外的地方使用
// 2.局部   函数内部创建，仅能在函数中使用，外部不可以访问
// 3.静态   函数内部创建，仅在函数中使用，函数执行完值不丢失
// 

$myPhp = '好好学习'; //全局变量



function study(){

	$stutyDate = '3个月';        //局部变量

	// return '时间安排'.$stutyDate;         

	return  $GLOBALS['myPhp'].$stutyDate;    //用$GOLBALS 调用全局变量

}



echo $myPhp.'<br>';
echo study();
echo '<br>';

function test(){

	$a = 0;
	echo $a;
	$a ++ ;

}


test();echo '<br>';
test();echo '<br>';
test();echo '<br>';
test();echo '<br>';
test();echo '<br>';
//执行5次，每次调用时都会将$a的值设为0并输出0，将变量加1的$a++m没有作用，因为一旦退出本函数，则变量$a就不存在。要写一个不会丢失的本次计数值的计数函数，要将变量$a定义为静态的；
//

function test1(){
	static $a = 0;
	echo $a;
	$a++;
}


test1();echo '<br>';
test1();echo '<br>';
test1();echo '<br>';
test1();echo '<br>';
test1();echo '<br>';

//变量$a仅在第一次调用test1函数时被初始化，之后每次调用test1函数都会输出$a的值并加1
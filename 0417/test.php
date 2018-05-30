<?php
header("Content-Type: application/json;charset=utf-8");

if($_REQUEST['getFunction']){
	getList();
}


$userName=$_POST['userName'];
$iPhone=$_POST['iPhone'];
$gender=$_POST['gender'];
$years=$_POST['years'];
$months=$_POST['months'];
static $id = 1;

$userinfo = [
			'id'=>id,
			'userName'=>$userName,
			'iPhone'=>$iPhone,
			'gender'=>$gender,
			'birth'=>$years.'年'.$months.'日'
			];
$id++;

$data = [];

$data = array_push($data, $userinfo);
print_r($data);
// function getList(){
// 	$data = array(
// 		array(
// 			'id' => 1,
// 			'name' => 'xiaoming',
// 			'sex' => '男',
// 			'time' => '2016年1月22日 14:45:46'
// 		),
// 		array(
// 			'id' => 2,
// 			'name' => '老张',
// 			'sex' => '男',
// 			'time' => '2016年1月22日 14:45:46'
// 		),
// 		array(
// 			'id' => 3,
// 			'name' => '捞王',
// 			'sex' => '男',
// 			'time' => '2016年1月22日 14:45:46'
// 		)
// 	);

	$list = json_encode(array('list'=>$data));
	
	print_r($list);
	// print_r(json_encode(array('list'=>$data=array())));

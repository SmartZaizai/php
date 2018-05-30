<?php
header("Content-Type: application/json;charset=utf-8");

// $data = array(
// array(
// 'id' => 1,
// 'name' => 'xiaoming',
// 'sex' => '男',
// 'time' => '2016年1月22日 14:45:46'
// ),
// array(
// 'id' => 2,
// 'name' => '老张',
// 'sex' => '男',
// 'time' => '2016年1月22日 14:45:46'
// ),
// array(
// 'id' => 3,
// 'name' => '捞王',
// 'sex' => '男',
// 'time' => '2016年1月22日 14:45:46'
// )
// );
// $list = json_encode(array('list'=>$data));
// print_r($list);
// // print_r(json_encode(array('list'=>$data=array())));


$userName=isset($_POST['userName'])?$_POST['userName']:'用户';
$iPhone=isset($_POST['iPhone'])?$_POST['iPhone']:'电话';
$gender=isset($_POST['gender'])?$_POST['gender']:'性别';
$years=isset($_POST['years'])?$_POST['years']:'1';
$months=isset($_POST['months'])?$_POST['months']:'2';
// $iPhone=$_POST['iPhone'];
// $gender=$_POST['gender'];
// $years=$_POST['years'];
// $months=$_POST['months'];

// $userName='1a';
// $iPhone='1b';
// $gender='c1';
// $years='d1';
// $months='e1';

static $id = 1;

$userinfo = [
			'id'=>$id,
			'userName'=>$userName,
			'iPhone'=>$iPhone,
			'gender'=>$gender,
			'birth'=>$years.'年'.$months.'日'
			];
$id++;
// print_r($userinfo);
// $data = $userinfo;
// print_r($data);
// echo array_push($data, $userinfo);
static $data=[];
// print_r($data);
//array_push($data, $userinfo);
//print_r($data);
array_push($data, $userinfo);
$list = json_encode(array('list'=>$data));
print_r($list);







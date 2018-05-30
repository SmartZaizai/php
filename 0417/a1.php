<?php

$userName='a';
$iPhone='b';
$gender='c';
$years='d';
$months='e';

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
$data=[];
// print_r($data);
array_push($data, $userinfo);
//print_r($data);
array_push($data, $userinfo);
echo '<pre>';
print_r($data);
// function getList(){
// 	$data = array(
// 		array(
// 			'id' => 1,
// 			'name' => 'xiaoming',
// 			'sex' => '男',
// 			'time' => '2016年1月22日 14:45:46'
// 		),
// 		

$list = json_encode(array('list'=>$data));
print_r($list);
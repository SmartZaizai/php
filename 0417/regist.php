<?php




$userName=$_POST['userName'];
$iPhone=$_POST['iPhone'];
$gender=$_POST['gender'];
$years=$_POST['years'];
$months=$_POST['months'];
// // 
// // 
// // $userName='1';
// // $iPhone='2';
// // $gender='3';
// // $years='4';
// // $months='5';
$userinfo = [$userName,$iPhone,$gender,$years,$months];

$list = json_encode(array('list'=>$userinfo));

// echo "<pre>";
// print_r($userinfo);

// exit(json_encode(['status'=>0,'msg'=>$userinfo]));
exit(json_encode(['status'=>0,'msg'=>'sss']));


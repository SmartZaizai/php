<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>

	<style text="text/css">
		div{
			width: 450px;
			background-color: #70f3ff;
			margin: auto;
			margin-top: 20px;
		}

		table{
			/*border: 1px solid #177cb0;*/
			margin: auto;
		}
		
		.td{
			vertical-align: middle;
    		text-align: right;  
		}

		select,input{
			height: 25px;
		}

		#years{
			width:70px;			
		}

		#save{
			vertical-align: middle;
    		text-align: center; 
		}
		button{
			
			background-color: #4b5cc4;
			border: 0;
			height: 20px;
			width:70px;	
			color: white;

		}
	</style>

	<script type="text/javascript" src="http://apps.bdimg.com/libs/jquery/2.1.4/jquery.min.js"></script>
	<script type="text/javascript">

			$(document).ready(function(){

				//button start
				$('button').click(function(){
					

					// // alert($('#gender:checked').val())
					
					// // alert($("#years").find("option:selected").val());
					// // 
					// // 
					// $.post(//$.post start 

					// 	'regist.php',
					// 	{
					// 		userName:$('#userName').val(),
					// 		iPhone:$('#iPhone').val(),
					// 		gender:$('#gender:checked').val(),
					// 		years:$("#years").find("option:selected").val(),
					// 		months:$("#months").find("option:selected").val()
					// 	}, function(data,status){
							

					// 		$('#regist').html('');
					// 			$str = '';
					// 			$.each(data.list,function(i,val){
					// 			$str = $str + '<tr>';
					// 			$str = $str + '<td> '+val.id+' </td>';
					// 			$str = $str + '<td> '+val.name+' </td>';
					// 			$str = $str + '<td> '+val.sex+' </td>';
					// 			$str = $str + '<td> '+val.time+' </td>';
					// 			$str = $str + '</tr>';
					// 			});
					// 			$('#regist').append($str);
					// 			if(data.list == "" || data.list.length < 0 || data.list == "undefined"){
					// 			$('#regist').html('<td colspan="10" style="height:200px;text-align:center;color: #23527c">暂无相关数据...</td>');
					// 			}
					// 		}






					// 	)//$.post end
					// 	
					
					getList();
					function getList(){
						// jquery ajax 请求
						$.ajax({
							type:'post', //请求方式，默认get
							url :"test.php",
							data:{
								
								userName:$('#userName').val(),
								iPhone:$('#iPhone').val(),
								gender:$('#gender:checked').val(),
								years:$("#years").find("option:selected").val(),
								months:$("#months").find("option:selected").val()

							},success:function(data,status){
								$('#infolist').html('');
								$str = '';
								$.each(data.list,function(i,val){
								$str = $str + '<tr>';
								$str = $str + '<td> '+val.id+' </td>';
								$str = $str + '<td> '+val.name+' </td>';
								$str = $str + '<td> '+val.sex+' </td>';
								$str = $str + '<td> '+val.time+' </td>';
								$str = $str + '</tr>';
								});
								$('#infolist').append($str);
								if(data.list == "" || data.list.length < 0 || data.list == "undefined"){
								$('#infolist').html('<td colspan="10" style="height:200px;text-align:center;color: #23527c">暂无相关数据...</td>');
								}
							},error:function(data,statsu){
								alert("发送请求失败！");
							}
						});
					}


					

				})
				//button end	




			})

	</script>
</head>
<body>
	<div class="info">
		<table>
			<caption>用户信息登记表</caption>
				<tr>
					<td class="td"><label for="userName">姓名</label></td>
					<td><input type="text" name="userName" id="userName" placeholder="请输入姓名..."></td>
					<td></td>
				</tr>
				<tr>
					<td class="td"><label for="iPhone">联系电话</label></td>
					<td><input type="text" name="iPhone" id="iPhone" placeholder="请输入手机号码..."></td>
					<td></td>
				</tr>
				<tr>
					<td class="td"><label for="gender">性别</label></td>
					<td>
						<input type="radio" name="gender" id="gender" value="male">男
						<input type="radio" name="gender" id="gender" value="female">女
						<input type="radio" name="gender" id="gender" value="male" checked="">保密
					</td>
					<td></td>
				</tr>
				<tr>
					<td class="td">出入日期</td>
					<td>
					<?php 
						$years = range(1980, 2000);
						echo '<select id="years">';
						foreach ($years as  $value) {
							echo '<option value="'.$value.'">'.$value.'</option>';
						}
						echo '</select>&nbsp;&nbsp;年&nbsp;&nbsp;';
						$months = range(1, 12);
						echo '<select id="months">';
						foreach ($months as  $value) {
							echo '<option value="'.$value.'">'.$value.'</option>';
						}
						echo '</select>&nbsp;&nbsp;月&nbsp;&nbsp;';
					?>
					</td>
					<td></td>
				</tr>
				<tr>
					<td colspan="3" id="save">
						<button>保存</button>
					</td>
										
				</tr>			
		</table>
	</div>
	<div class="main">
<table>
<thead>
<tr>
<th>id</th>
<th>name</th>
<th>sex</th>
<th>time </th>
</tr>
</thead>
<tbody id="infolist">
</tbody>
</table>
</div>
</body>
</html>
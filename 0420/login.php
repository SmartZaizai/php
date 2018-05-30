<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>

<?php
    include ('inc/header.php');

    if(isset($errors) && !empty($errors)){

        $error_msg = "<p style='color: cyan'>";
        foreach ($errors as $msg){
            $error_msg .= $msg.'<br>';
        }
        echo $error_msg.'</p>';
    }
?>
<form action="login_check.php" method="post">
<fieldset style="width: 300px">
    <legend>用户登录</legend>
    <label for="email">邮箱</label> <input type="text" name="email" id="email"><br>
    <label for="password">密码</label> <input type="password" name="password" id="password"><br>
    <button>登陆</button>
</fieldset>
</form>

<?php
include ('inc/footer.php');
?>
</body>
</html>
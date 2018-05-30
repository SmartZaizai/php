<?php
class Email{
    public function sendEmail(){
        return "短信验证";
    }
}

class Register{
    public function regiser(){
        $email = new Email();
        echo "注册成功，请输入".$email->sendEmail();
    }
}
///在类中直接实例化 存在耦合 不利于代码维护；

$register = new Register();
$register->regiser();
echo "<hr>";

///构造方法注入；
///将实例化类以参数方式传入
class Register1{

    ///引用类实例化存放
    private $em = null;

    public function __construct(Email $email)
    {
        $this->em = $email;
    }

    public function register(){
        echo "注册成功,请输入".$this->em->sendEmail();
    }
}


$em = new Email();
$re = new Register($em);
$re->regiser();
echo "<hr>";


//一般方法中注入
class Register2{
    public function register(Email $email){
        echo "注册成功，请输入".$email->sendEmail();
    }
}

$em = new Email();
$re = new Register2();
$re->register($em);$re->register($em);

echo 'github test';
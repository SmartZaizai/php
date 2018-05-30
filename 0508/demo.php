<?php

namespace Teacher
{

    class Person
    {
        public $name = 'Teacher-Person';
        function __construct()
        {
            echo 'Teacher空间-Person类';
        }
    }

    function Person()
    {
        return 'Teacher空间-Person()函数';
    }

    function teach(){
        echo 'Teacher空间-teach()函数';
    }

}



namespace Teacher\Student
{

//    use Teacher1\Person as Person1;


    new \Teacher1\Person();


    echo '<hr>';

    class Person
    {
        function __construct()
        {
            echo 'Student空间-Person类';
        }
    }

    function Person()
    {
        return 'Student空间-Person()函数';
    }



}



namespace Teacher1
{

    class Person
    {
        public $name = 'Teacher-Person';
        function __construct()
        {
            echo 'Teacher11空间-Person类';
        }
    }

    function Person()
    {
        return 'Teacher1空间-Person()函数';
    }

    function teach(){
        echo 'Teacher1空间-teach()函数';
    }

}


namespace test
{

    use Teacher;

    new Teacher\Person(); //Teacher空间-Person类
    echo '<br>';
    echo (new Teacher\Person())->name; //Teacher空间-Person类Teacher-Person
    echo '<br>';
    echo Teacher\Person();  //Teacher空间-Person()函数

    echo '<hr>';
    use Teacher\Student;

    new Student\Person(); //Student空间-Person类
    echo '<br>';
    echo Student\Person();  //Student空间-Person()函数

}
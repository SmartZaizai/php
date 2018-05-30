<?php
namespace mvc\view;
class View
{
    public $data = [];

    public function __construct($data)
    {
        $this->data = $data;
    }

    public function getData()
    {
        return $this->data;
    }

    public function display($data)
    {
        $table = ''	;

        echo $table;


    }
}
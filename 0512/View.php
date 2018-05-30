<?php



Class View {

    public static function display($data){
        $table = "<h3>信息表</h3>";
        $table.= "<table border='1' cellpadding='0' cellspacing='0'><tr><td>id</td><td>姓名</td><td>地址</td><td>电话</td></tr>";
        foreach ($data as $val){
            $table.= "<tr><td>".$val['id']."</td><td>".$val['name']."</td><td>".$val['address']."</td><td>".$val['phone']."</td></tr>";
        }
        $table.= "</table>";
        return $table;
    }

}
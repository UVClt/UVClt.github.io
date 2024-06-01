<?php
// 1、链接数据库
require './conn.php';
// 2、拼接SQL语句
$sql = "delete from news where id={$_GET['id']}";
// 3、执行SQL语句
if(mysqli_query($link,$sql))
    header('location:./list.php');
else{
    echo '删除成功';
}

?>
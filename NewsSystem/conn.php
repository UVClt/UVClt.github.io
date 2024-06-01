<?php
//1.连接数据库
$link=mysqli_connect('localhost','root','123456','php_db','3306');
// var_dump($link);
//2.设置编码格式
mysqli_set_charset($link,'utf8');
//3.执行sql语句
//插入记录
// $link->query("insert into news values (null,'上课','不要穿拖鞋',now()),(null,'好好听课','不要玩手机',now())");
// //更新数据
// $link->query("update news set title='521刚过' where id=1");
// //删除记录
// $link->query("delete from news where content='不要穿拖鞋'");
// //记录查询
// $rs=mysqli_query($link,"select * from news");
// var_dump($rs);
// echo "<hr>";
// $row=mysqli_fetch_assoc($rs);
// var_dump($row);
// echo "<hr>";
// $row=mysqli_fetch_row($rs);
// var_dump($row);
// echo "<hr>";
// $row=mysqli_fetch_array($rs);
// var_dump($row);
// echo "<hr>";
// $row=mysqli_fetch_object($rs);
// var_dump($row);
// echo "<hr>";
// //关闭连接
// mysqli_close($link);
?>
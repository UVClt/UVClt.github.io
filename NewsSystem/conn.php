<?php
// 连接数据库
// $link = @mysqli_connect('localhost','root','','php_db','3306');
// var_dump($link);

echo '<hr>';
$db=new mysqli('localhost','root','','php_db','3306');
var_dump($db);

// 设置编码
mysqli_set_charset($db,'utf8');
$sql = mysqli_query($db,'select * from news order by id desc');
$data = array();
while($tmp = $sql->fetch_assoc()){
    $data[] = $tmp;
}
$re = array("data"=>$data);
$info = json_encode($re,JSON_UNESCAPED_UNICODE);

$lie = fopen('./info.json','w');
fwrite($lie,$info);











?>
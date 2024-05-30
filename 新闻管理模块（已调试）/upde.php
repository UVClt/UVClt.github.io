<?php
// 1、连接数据库
require './conn.php';
// 获取修改的数据库
$sql = "select * from news where id={$_GET['id']}";
$data = mysqli_query($link,$sql);
$rows = mysqli_fetch_assoc($data);
// 执行修改
if(!empty($_POST)){
    // 获取修改的id
    $id = $_GET['id'];
    // 获取修改的标题
    $title = $_POST['list'];
    // 获取修改的内容
    $content = $_POST['content'];
    // 拼接sql语句
    $sql = "update news set title='$title',content='$content' where id=$id";
    if(mysqli_query($link,$sql))
    // 修改成功跳转到list.php页面
        header('location:list.php');
    else
        echo '错误：' . mysqli_error($link);
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <from method='post' action="">
        标题：<input type="text" name="title" value='<?php echo $rows['title']?>'><br /><br />
        内容：<textarea name="contet" rows="5" cols="30"><?php echo $rows['content']?><br /><br />
        <input type="submit" name="button" value="提交">
        <input type="button" value="返回" onclick="location.href='list.php'">
    </from>
</body>
</html>
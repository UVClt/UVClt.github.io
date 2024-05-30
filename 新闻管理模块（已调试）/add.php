<body>
<?php
if (!empty($_POST)){
//     连接数据库
    require './conn.php';
    // 插入数据
    // 获取时间
    $time = date("Y-m-d h:i:s");
    $sql = "insert into news values (null,'{$_POST['title']}','{$_POST['content']}','{$time}')";
    echo $sql;
    if (mysqli_query($link,$sql))
        header('location:./list.php'); 
    else{
        echo 'sql语句插入失败<br>';
        echo '错误码：' . mysqli_errno($link),'<br>';
        echo '错误信息：' . mysqli_error($link);
    }
}

?>
<form method="post" action="">
    标题：<input type="text" name="title"><br/><br/>
    内容：<textarea name="content" rows="5" cols="30"></textarea><br/><br/>
    <input type="submit" name="button" value="提交">
</form>
</body>

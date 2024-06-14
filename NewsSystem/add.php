
<?php
// if(!empty($_POST)){
//     //2、连接数据库
//     require './conn.php';
//     //3、插⼊数据
//     $time = date("Y-m-d h:i:s"); //获取时间
//     $sql = "insert into news values (null,'{$_POST['title']}','{$_POST['content']}','{$time}')"; //拼接SQL语句
//     if(mysqli_query($db,$sql)){
//         header('location:./list.php');
//     }else{
//         echo 'SQL语句插⼊失败<br>';
//             echo '错误码：' . mysqli_errno($db), '<br>';
//             echo '错误信息：' . mysqli_error($db);
//     }

// }
if (!empty($_POST)) {
	if (!empty($_POST['title'])) {
		if (!(empty($_POST['content']))) {
			$time = date("Y-m-d h:i"); //获取时间date("Y-m-d h:i:s")
			$content = $_POST['content'];
			$title = $_POST['title'];
			// 允许上传的图片后缀
			$allowedExts = array("gif", "jpeg", "jpg", "png");
			$temp = explode(".", $_FILES["file"]["name"]);
			// echo $_FILES["file"]["size"];
			$extension = end($temp);     // 获取文件后缀名
			if ((($_FILES["file"]["type"] == "image/gif")
					|| ($_FILES["file"]["type"] == "image/jpeg")
					|| ($_FILES["file"]["type"] == "image/jpg")
					|| ($_FILES["file"]["type"] == "image/pjpeg")
					|| ($_FILES["file"]["type"] == "image/x-png")
					|| ($_FILES["file"]["type"] == "image/png"))
				&& ($_FILES["file"]["size"] < 10 * 1024 * 1024)   // 小于 200 kb
				&& in_array($extension, $allowedExts)
			) {
				if ($_FILES["file"]["error"] > 0) {
					echo "错误：: " . $_FILES["file"]["error"] . "<br>";
				} else {
					echo "上传文件名: " . $_FILES["file"]["name"] . "<br>";
					echo "文件类型: " . $_FILES["file"]["type"] . "<br>";
					echo "文件大小: " . ($_FILES["file"]["size"] / 1024 / 1024) . " MB<br>";
					echo "文件临时存储的位置: " . $_FILES["file"]["tmp_name"] . "<br>";

					// 判断当期目录下的 upload 目录是否存在该文件
					// 如果没有 upload 目录，你需要创建它，upload 目录权限为 777
					if (file_exists("newsimg/" . $_FILES["file"]["name"])) {
						echo $_FILES["file"]["name"] . " 文件已经存在。 ";
					} else {
						// 如果 upload 目录不存在该文件则将文件上传到 upload 目录下
						move_uploaded_file($_FILES["file"]["tmp_name"], "newsimg/" . $_FILES["file"]["name"]);
						// echo "文件存储在: " . "newsimg/" . $_FILES["file"]["name"];
						$imgurl = "./NewsSystem/newsimg/" . $_FILES["file"]["name"];
						require './conn.php';
						$sql = "insert into news values (null,'{$GLOBALS["title"]}','{$GLOBALS['content']}','{$GLOBALS['imgurl']}','{$GLOBALS['time']}')"; //拼接SQL语句
						// echo $sql;
						if (mysqli_query($db, $sql)) {
							header('location:./list.php');
						} else {
							echo 'SQL语句插⼊失败<br>';
							echo '错误码：' . mysqli_errno($db), '<br>';
							echo '错误信息：' . mysqli_error($db);
						}
					}
				}
			} else {
				myher('非法的文件格式');
			}
		} else {
			myher('内容为空<br>');
		}
	} else {
		myher('标题为空');
	}
}

function myher($err)
{
	// 设置5秒后跳转
	$seconds = 5;
	// 跳转到的目标URL 
	$url = "./add.html";

	header("Refresh: $seconds; url=$url");

	echo "<h2>$err</h2><br>" . "页面将在" . "$seconds" . "秒后自动跳转... 如果你不想等待，请点击<a href='$url'>这里</a>.";
}




// print_r($_FILES["file"]);
?>

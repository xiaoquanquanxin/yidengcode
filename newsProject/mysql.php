<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "phplesson";

 
// 创建连接
$conn = mysqli_connect($servername, $username, $password,$dbname);
 
// 检测连接
if (!$conn) {
    die("连接失败: " . $conn->connect_error);
} 
echo "连接成功<br>";



$newstitle = $_REQUEST['newstitle'];
$newsimg = $_REQUEST['newsimg'];
$addtime = $_REQUEST['addtime'];

$sql = "INSERT INTO `news` ( `newstitle`, `newsimg`, `addtime`) VALUES ( '".$newstitle."', '".$newsimg."', '".$addtime."');";
if (mysqli_query($conn,$sql)) {
	echo "新记录插入成功";
}else {
    echo "shibai<br>: " . $sql . "<br>" . $conn->error;
}

mysqli_close($conn);

?>
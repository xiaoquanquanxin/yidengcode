<?php
//header("Content-type: text/html; charset=utf-8");
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "phplesson";

 
// 创建连接
$conn = mysqli_connect($servername, $username, $password,$dbname);
mysqli_set_charset($conn,"utf8");
// 检测连接
if (!$conn) {
    die("连接失败: " . $conn->connect_error);
} 
echo "连接成功<br>";

$newstitle = $_REQUEST['newstitle'];
$newscontext = $_REQUEST['newscontext'];
$newsimg = $_REQUEST['newsimg'];
$addtime = $_REQUEST['addtime'];
echo $newstitle;
//  插入数据
//$sql = "INSERT INTO `news` (`newsimg`, `addtime`, `newsid`, `newstitle`, `newscontext`) VALUES ('".$newsimg."', '".$addtime."', NULL, '".$newstitle."', '".$newscontext."');";
//if (mysqli_query($conn,$sql)) {
//	echo "新记录插入成功";
//}else {
//    echo "shibai<br>: " . $sql . "<br>" . $conn->error;
//}

//  查询数据并输出
$sql = 'SELECT * FROM `news`';
$arr = array();
$retval = mysqli_query( $conn, $sql );
while($row = mysqli_fetch_array($retval)){
     echo $row['newstitle'].''.$row['newscontext'].'<br>';
     array_push($arr,array('newstitle'=>$row['newstitle'],'newscontext'=>$row['newscontext']));
}
$result = array('errorcode'=>0,'result'=>$arr);
echo json_encode($result);



mysqli_close($conn);
?>
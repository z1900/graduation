<?php
require_once "../../system/connect.php";
connect();
$link=connect();
$uid=$_GET['uid'];
$sql="select * from s_user where uid=$uid";
$result=mysqli_query($link, $sql);
$row=mysqli_fetch_assoc($result) or die(mysqli_error($link));
$filename="../../images/profile/".$row['profile'];//要删除文件的路径和名字
if(file_exists($filename)){
	unlink($filename);
}

$deleteSql="delete from s_user where uid=$uid";
$deleteRow=mysqli_query($link, $deleteSql) or die(mysqli_error($link));
if ($deleteRow==true) {
	echo "<div class='success'>
		<p>删除成功！</p>
	</div>";
	header("refresh:1;url='../admin.php'");
}else{
	echo "<div class='fail'>
		<p>删除是失败！</p>
	</div>";
	header("refresh:1;url='../admin.php'");
}
?>

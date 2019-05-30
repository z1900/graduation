<?php
require_once "../../system/connect.php";
connect();
$link=connect();
$key=$_GET['key'];
$sql="select * from s_user where username like '%{$key}%'";
$result=mysqli_query($link, $sql) or die(mysqli_error($link));

$row=mysqli_fetch_assoc($result);
if ($row['gender']==1) {
	$row['gender']="男";
} else if($row['gender']==2){
	$row['gender']="女";
} else {
	$row['gender']="未选择";
}
if ($key!="" && $key!=null) {
	$resrow=json_encode($row);
	echo $resrow;
}
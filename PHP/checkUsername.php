<?php  
require '../system/connect.php';
$con=connect();
if (!empty($_POST['uname'])) {
	$user=$_POST['uname'];
	$sql="select * from s_user";
	$result=mysqli_query($con, $sql);
	$num=mysqli_fetch_array($result);
	if ($num['username']==$user) {
		echo "<span>用户名已注册！</span>";
	} else if(strlen($user)==0){
		echo "用户名不能为空！";
	} else if (strlen($user)<4 || strlen($user)>10) {
		echo "<span>用户名4-10位</span>";
	} else {
		echo "<span style='color:black;'>用户名可用！</span>";
	}
} 
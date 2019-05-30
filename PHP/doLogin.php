<?php
session_start();
header("content-type:text/html;charset=utf-8");
require_once '../system/connect.php';
connect();
$con=connect();
$username=$_POST['username'];
$password=$_POST['password'];
$verify=$_POST['verify'];
$verifyCode=$_SESSION['codeName'];


if (!empty($username) && !empty($password)) {
	$sql="select * from s_user where username='$username' and password=md5('$password')";
	$result=mysqli_query($con, $sql);
	$row=mysqli_fetch_assoc($result);
	$num=mysqli_num_rows($result);
	if ($num>0) {
		$_SESSION['username']=$username;
		echo '{"status":true,"msg":"登录成功！"}';		
	} else {
		echo '{"success":false,"msg":"<span>用户名或密码错误</span>"}';
	}
} else {
	echo '{"msg":"<span>请填写用户名那个或密码！</span>"}';
}

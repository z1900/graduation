<?php
session_start();
header("content-type:text/html;charset=utf-8");
require_once '../system/connect.php';
connect();
$con=connect();
if (!empty($_POST['uname']) && !empty($_POST['pwd'])) {
	$username=$_POST['uname'];
	$password=md5($_POST['pwd']);
	$verify=$_POST['verify'];
	$verifyCode=$_SESSION['codeName'];

	if ($verify==$verifyCode) {
		$sql="insert into s_user(username,password) values('$username','$password')";
		$num=mysqli_query($con, $sql) or die(mysqli_error($con));	
		if ($num==1) {
			echo '{"status":true, "msg":"注册成功，请登录！"}';
		} else {
			echo '{"status":false, "msg":"<span>注册失败！</span>"}';
		}
	} else {
	echo '{"msg":"<span>验证码错误！</span>"}';
	}
} else {
	echo '{"msg":"<span>用户名或密码不能为空！</span>"}';
}
?>

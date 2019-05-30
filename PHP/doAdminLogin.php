<?php
session_start();
header("content-type:text/html;charset=utf-8");
require_once "../system/connect.php";
connect();
$link=connect();
function _post($str){ 
$val = !empty($_POST[$str]) ? $_POST[$str] : null; 
return $val; 
} 
$username=_post('username');
$password=_post('password');
$sql="select * from admin_user where ausername='$username' and apassword='$password'";
$result=mysqli_query($link, $sql) or die(mysqli_error($link));
$num=mysqli_num_rows($result);
if ($num>0) {
	$_SESSION['admin']=$username;
	echo '{"status":true,"msg":"登录成功！"}';
}else{
	echo '{"status":false,"msg":"<span>登录失败，用户名或密码不正确！</span>"}';
}
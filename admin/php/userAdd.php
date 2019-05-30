<?php
require_once "../../system/connect.php";
connect();
$link=connect();

$username=$_POST['username'];
$password=md5($_POST['password']);
$gender=$_POST['gender'];
$birthdate=$_POST['birthdate'];
$email=$_POST['email'];

$absolutePath=dirname(dirname(dirname(__FILE__)));
$path="$absolutePath/images/profile/";
$ranName=date("YmdHis").mt_rand(100, 999);
$arr=explode(".", $_FILES['profile']['name']);
$postfix=$arr[count($arr)-1];
$newName=$path.$ranName.".".$postfix;
move_uploaded_file($_FILES['profile']['tmp_name'], $newName);
$profile=$ranName.".".$postfix;

$sql="insert into s_user values(null, '$username', '$password', $gender, '$birthdate', '$email', '$profile')";
$status=mysqli_query($link, $sql) or die(mysqli_error($link));

if ($status==true) {
	echo '{"status":true, "msg":"添加成功！"}';
}else{
	echo '{"status":false,"msg":"添加失败！"}';
}

<?php
require_once '../system/connect.php';
connect();
$link=connect();
$uid=$_POST['uid'];
$gender=$_POST['gender'];
$birthdate=$_POST['birthdate'];
$mail=$_POST['mail'];

//处理图像上传
$absolutePath=dirname(dirname(__FILE__));//取绝对路径  当前文件上级目录
$filePath="$absolutePath/images/profile/";
$randomName=date("YmdHis").mt_rand(100, 999);
$arr=explode(".", $_FILES['profile']['name']);//分割图片名   xxx.jpg
$postfix=$arr[count($arr)-1];//取后缀名
$newName=$filePath.$randomName.".".$postfix;
move_uploaded_file($_FILES['profile']['tmp_name'], $newName);//把临时文件移动到指定路径
$profile=$randomName.".".$postfix;

if ($_FILES['profile']['size']!=0) {
	$sql="update s_user set gender=$gender,birthdate='$birthdate',mail='$mail',profile='$profile' 
	where uid=$uid";
} else {
	$sql="update s_user set gender=$gender,birthdate='$birthdate',mail='$mail' where uid=$uid";
}

$num=mysqli_query($link, $sql) or die(mysqli_error($link));
if ($num==1) {
	echo "<div class='success'>
		<p>修改成功！</p>
	</div>";
	header("refresh:3;url='../admin/admin.php'");
}else{
	echo "<div class='fail'>
		<p>更新失败！</p>
	</div>";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title></title>
<link rel="stylesheet" href="../css/success.css">
</head>
<body>
	
</body>
</html>

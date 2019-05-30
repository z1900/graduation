<?php
session_start();
require_once 'system/connect.php';
connect();
$link=connect();
$username=$_SESSION['username'];
$sql="select * from s_user where username='$username'";
$result=mysqli_query($link, $sql);
$row=mysqli_fetch_assoc($result);
?>
<!DOCTYPE html>
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1,user-scalable=0,minimum-scale=1.0, maximum-scale=1.0"">
<meta name="apple-mobile-web-app-capable" content="yes">
<meta name="apple-mobile-web-app-status-bar-style" content="black">
<meta name="format-detection" content="telephone=no">
<meta name="format-detection" content="email=no">
<meta name="keywords" content="">
<meta name="description" content="">
<link rel="shortcut icon" href="images/favicon.ico"/>
<link rel="stylesheet" href="css/layout.css">
<link rel="stylesheet" href="css/view.css">
<script src="svg/iconfont.js"></script>
<title>view</title>
</head>
<body>

<header id="header">
<div class="header-fixed">
<div class="back">
	<a href="personal.php">
		<svg class="icon-h" aria-hidden="true">
            <use xlink:href="#icon-back"></use>
        </svg>
	</a>
</div>
<p>个人资料</p>
	<div class="h-messages">
		<span class="revise"><a href="userEdit.php?uid=<?php echo $row['uid']; ?>">编辑</a></span>
	</div>
</div>
</header>

<section id="datum">
	<img src="images/profile/<?php if($row['profile']=="" && $row['profile']==null){
		echo "profile.png";
		}else{
			echo $row['profile'];
			} ?>" width="100%" height="280px" style="display: block;"/>
	<ul>
		<li class="clearfix">
			<p>用户名</p>
			<span><?php echo $row['username']; ?></span>
		</li>
		<li class="clearfix">
			<p>性别</p>
			<span>
			 	<?php 
			 		if($row['gender']==1){echo "男";}else if($row['gender']==2){echo "女";}else{echo "未选择";}
			 	 ?>
			</span>
		</li>
		<li class="clearfix">
			<p>生日</p>
			<span><?php echo $row['birthdate']; ?></span>
		</li>
		<li class="clearfix">
			<p>邮箱</p>
			<span><?php echo $row['mail'] ?></span>
		</li>
	</ul>
</section>

<section class="logout">      
    <a href="PHP/logout.php">注销</a>
</section>


<script src="js/jquery.min.js"></script>
</body>
</html>

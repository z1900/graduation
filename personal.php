<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1,user-scalable=0,minimum-scale=1.0, maximum-scale=1.0"">
<meta name="apple-mobile-web-app-capable" content="yes">
<meta name="apple-mobile-web-app-status-bar-style" content="black">
<meta name="format-detection" content="telephone=no">
<meta name="format-detection" content="email=no">
<meta name="keywords" content="">
<meta name="description" content="">
<link rel="shortcut icon" href="images/favicon.ico">
<link rel="stylesheet" href="css/layout.css">
<link rel="stylesheet" href="css/botFixed.css">
<link rel="stylesheet" href="css/personal.css">
<script src="svg/iconfont.js"></script>
<title>personal</title>
</head>
<body>
<header id="header">
<?php
session_start();
require_once 'system/connect.php';
connect();
$link=connect();
$username=$_SESSION['username'];
$sql="select * from s_user where username='$username'";
$result=mysqli_query($link, $sql);
$row=mysqli_fetch_assoc($result);

if ($_SESSION['username']==null && $_SESSION['username']=="") {
?>
	<p><a href="register.html">登陆 l 注册</a></p>
<?php
} else {
?>
	<div class="login-success clearfix">
		<div class="uname">
			<h1><?php echo $_SESSION['username']; ?></h1>
			<p><a href="view.php">查看并修改个人资料</a></p>
		</div>
		<div class="profile">
			<img src="images/profile/<?php if($row['profile']=="" && $row['profile']==null){
				echo "profile.png";
				}else{
					echo $row['profile'];
					} ?>" alt="">
		</div>
	</div>
<?php
}
?>
</header>

<section id="function">
	<ul>
		<li>
		<a href="javascript:;" class="clearfix">
		<svg class="ifunction" aria-hidden="true">
           <use xlink:href="#icon-present"></use>
        </svg>
        <p>邀请好友</p>
		</a>
		</li>
		<li>
		<a href="javascript:;" class="clearfix">
		<svg class="ifunction" aria-hidden="true">
            <use xlink:href="#icon-switchover"></use>
        </svg>
        <p>切换至出租模式</p>
		</a>
		</li>
		<li>
		<a href="javascript:;" class="clearfix">
		<svg class="ifunction" aria-hidden="true">
           <use xlink:href="#icon-setting"></use>
        </svg>
        <p>设置</p>
		</a>
		</li>
		<li>
		<a href="javascript:;" class="clearfix">
		<svg class="ifunction" aria-hidden="true">
           <use xlink:href="#icon-help"></use>
        </svg>
        <p>帮助与支持</p>
		</a>
		</li>
		<li>
		<a href="javascript:;" class="clearfix">
		<svg class="ifunction" aria-hidden="true">
           <use xlink:href="#icon-room"></use>
        </svg>
        <p>发布空间</p>
		</a>
		</li>
		<li>
		<a href="javascript:;" class="clearfix">
		<svg class="ifunction" aria-hidden="true">
           <use xlink:href="#icon-feedback"></use>
        </svg>
        <p>向我们反馈</p>
		</a>
		</li>
	</ul>
</section>



<section id="botFixed">
<ul>
	<li>
		<a href="seek.html">
	    <svg class="boticon" aria-hidden="true">
	      <use xlink:href="#icon-search"></use>
	    </svg>
	   <p>探索</p>
       </a>
	</li>
	<li>
		<a href="wish.html">
	    <svg class="boticon" aria-hidden="true">
          <use xlink:href="#icon-like"></use>
        </svg>
	    <p>心愿单</p>
        </a>
	</li>
	<li>
		<a href="journey.html">
	    <svg class="boticon" aria-hidden="true">
          <use xlink:href="#icon-house"></use>
        </svg>
	    <p>旅程</p>
        </a>
	</li>
	<li>
		<a href="messages.html">
	    <svg class="boticon" aria-hidden="true">
            <use xlink:href="#icon-duihuakuan"></use>
        </svg>
	    <p>收件箱</p>
        </a>
	</li>
	<li>
		<a href="personal.php">
	    <svg class="cur-svg" aria-hidden="true">
          <use xlink:href="#icon-personal"></use>
        </svg>
	    <p style="color: #ff5a5f;">我的</p>
         </a>
	</li>
</ul>
</section>
<script src="js/jquery.min.js"></script>	
</body>
</html>
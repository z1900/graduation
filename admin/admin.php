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
<link rel="shortcut icon" href="../images/favicon.ico"/>
<link rel="stylesheet" href="css/layout.css">
<link rel="stylesheet" href="css/admin.css">
</head>
<body >

<?php 
session_start();
require_once "../system/connect.php";
connect();
$link=connect();
$sql="select * from admin_user order by aid";
$result=mysqli_query($link, $sql) or die(mysqli_error($link));

$sqlu="select * from s_user order by uid";
$resultu=mysqli_query($link, $sqlu) or die(mysqli_error($link));
 ?>


<header class="header">
	<h2>后台管理</h2>
	<p><a href="PHP/logout.php">注销</a></p>
</header>

<div class="container clearfix">
	<div class="left" id="adminLeft">
		<span class="active">管理员列表</span>
		<span>注册用户管理</span>
		<span>用户添加</span>
		<span>用户搜索</span>
	</div>
	<div class="right" id="adminRight">
		<div class="rightTop">
			<h2>欢迎管理员：<span><?php echo $_SESSION['admin'] ?></span> </h2>
		</div>
		<div class="rightMid">
			<div class="listShow admin">
				<table cellpadding='' cellspacing='0'>
					<tr>
						<th>管理员编号</th>
						<th>管理员账户</th>
						<th>管理员类别</th>
					</tr>
					<?php 
					while($row=mysqli_fetch_assoc($result)){
					 ?>
					 <tr>
					 	<td><?php echo $row['aid'] ?></td>
					 	<td><?php echo $row['ausername'] ?></td>
					 	<td><?php echo $row['atype'] ?></td>
					 </tr>
					 <?php } ?>
				</table>
			</div>
			<div class="listShow user none">
				<table cellpadding='30' cellspacing='0' border="1" frame="void" rules="rows" id="utable">
					<tr>
						<th>用户编号</th>
						<th>用户名</th>
						<th>性别</th>
						<th>生日</th>
						<th>邮箱</th>
						<th>头像</th>
						<th>操作</th>
					</tr>
					<?php 
					while($rowu=mysqli_fetch_assoc($resultu)){
						?>
						<tr>
							<td><?php echo $rowu['uid'] ?></td>
							<td><?php echo $rowu['username'] ?></td>
							<td>
								<?php  
								if($rowu['gender']==1){
									echo "男";
								}else if($rowu['gender']==2){
									echo "女";
								}else{
									echo "未填写";
								}

								?>
							</td>
							<td><?php if($rowu['birthdate']==''&&$rowu['birthdate']==null){
								echo "未填写";
								}else{
									echo $rowu['birthdate'];
									} ?></td>
							<td><?php if($rowu['mail']==''&&$rowu['mail']==null){
								echo "未填写";
								}else{
									echo $rowu['mail'];
									} ?></td>
							<td>
								<img src="../images/profile/<?php 
								if($rowu['profile']=="" && $rowu['profile']==null){
									echo "backup/profile.png";
									}else{
										echo $rowu['profile'];
									}
								 ?>" alt="">
								
							</td>
							<td>
								<a href="../adminEdit.php?uid=<?php echo $rowu["uid"];?>">修改</a>
								<a href="php/userDelete.php?uid=<?php echo $rowu["uid"];?>" onclick="return confirm('确认删除吗？')">删除</a>
							</td>
						</tr>
						<?php } ?>
					</table>
			</div>
			<div class="listShow userAdd none">
				<h2>请填写用户信息</h2>
				<form id="uadd" method="post" enctype="multipart/form-data">
					<ul>
						<li>
							<label for="username">用户名：</label>
							<input type="text" name="username" id="username" placeholder="用户名">
						</li>
						<li>
							<label for="password">密 &nbsp; 码：</label>
							<input type="password" name="password" id="password" placeholder="密码">
						</li>
						<li>
							<label for="gender">性 &nbsp; 别：</label>
							<select name="gender" id="gender">
								<option value="0" selected="">未选择</option>
								<option value="1">男</option>
								<option value="2">女</option>
							</select>
						</li>
						<li>
							<label for="birthdate">生 &nbsp; 日：</label>
							<input type="date" name="birthdate" id="birthdate" placeholder="生日">
						</li>
						<li>
							<label for="profile">头 &nbsp; 像：</label>
							<input type="file" name="profile" id="profile">
						</li>
						<li>
							<label for="email">邮 &nbsp; 箱：</label>
							<input type="email" name="email" id="email" placeholder="邮箱">
						</li>
						<li>
							<input type="button" value="添 加" id="cadd">
						</li>
					</ul>
				</form>
			</div>
			<div class="listShow userSearch none">
				<form id="usearch">
					<p>
						<label for="key">搜索</label>
						<input type="text" name="key" id="key" placeholder="请输入用户名探索">
						<input type="button" value="搜 索" id="conSearch">
					</p>
				</form>
				<div class="sresult">
					<table cellpadding='30' cellspacing='0' border="1" frame="void" rules="rows" id="stable">
					<tr>
						<th>用户编号</th>
						<th>用户名</th>
						<th>性别</th>
						<th>生日</th>
						<th>邮箱</th>
						<th>头像</th>
						<th>操作</th>
					</tr>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>
	
<script src="../js/jquery.min.js"></script>
<script src="../js/function.js"></script>
<script src="../js/ajax.js"></script>
</body>
</html>
<?php
session_start();
require_once 'system/connect.php';
connect();
$link=connect();
$uid=$_GET['uid'];
$sql="select * from s_user where uid='$uid'";
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
<title>userEdit</title>
</head>
<body>
<header id="header">
<div class="header-fixed">
<div class="back">
	<a href="view.php">
		<svg class="icon-h" aria-hidden="true">
            <use xlink:href="#icon-back"></use>
        </svg>
	</a>
</div>
<p>修改个人信息</p>
<div class="save">
      <a href="javascript:;" id="save">保存</a>
</div>
</div>
</header>

<div id="skin-img">
	<form action="PHP/doUderEdit.php" enctype="multipart/form-data" id="userUpdate" method="post">
		<input type="hidden" name="uid" value="<?php echo $row['uid']; ?>">
		<input type="file" name="profile" id="imgOne" onchange="preImg(this.id,'imgPre');"/>
		<img id="imgPre" src="./images/profile/<?php if($row['profile']=="" && $row['profile']==null){
                  echo "profile.png";
                  }else{
                        echo $row['profile'];
                        } ?>" width="100%" height="280px"/>
                        
		<svg class="camera" aria-hidden="true">
             <use xlink:href="#icon-camera"></use>
       	</svg>
       	<ul>
       		<li>
       			<label for="gender">性别：</label>
       			<select name="gender" id="gender">
       				<option value="1" <?php if($row['gender']==1) echo "selected"; ?>>男</option>
       				<option value="2" <?php if($row['gender']==2) echo "selected"; ?>>女</option>
       			</select>
       		</li>
       		<li>
       			<label for="birthdate">生日：</label>
       			<input type="date" id="birthdate" name="birthdate" value="<?php echo $row['birthdate']; ?>">
       		</li>
       		<li>
       			<label for="mail">邮箱：</label>
       			<input type="email" id="mail" name="mail" value="<?php echo $row['mail']; ?>">
       		</li>
       		<li>
       			<input type="submit" value="保存">
       		</li>
       	</ul>
	</form>
</div>



<script src="js/jquery.min.js"></script>
<script src="js/function.js"></script>
<script>
//头像上传
      function getFileUrl(sourceId) {
            var url;
            if (navigator.userAgent.indexOf("MSIE")>=1) { 
                  url = document.getElementById(sourceId).value;
            } else {
                  url = window.URL.createObjectURL(document.getElementById(sourceId).files.item(0));
            }
            return url;
      }

      function preImg(sourceId, targetId) {
            var url = getFileUrl(sourceId);
            var imgPre = document.getElementById(targetId);
            imgPre.src = url;
      }
</script>
</body>
</html>

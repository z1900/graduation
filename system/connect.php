<?php  
define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PWD', '1070102708');
define('DB_CHARSET', 'utf-8');
define('DB_DBNAME', 'rent');

function connect() {
	$con=mysqli_connect(DB_HOST, DB_USER, DB_PWD, DB_DBNAME) or die ('数据库连接失败<br/>ERROR '.mysql_errno().':'.mysql_error());

	mysqli_set_charset($con, DB_CHARSET);

	return $con;
}

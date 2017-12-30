<?php
	//创建数据库连接(mysql/mysqli)
	$link=mysqli_connect('localhost','root','') or die('数据库连接失败');
	//选择数据库
	mysqli_select_db($link,'newblog') or die('选择数据库失败');
	//设置传输编码
	mysqli_set_charset($link,'UTF8');

?>
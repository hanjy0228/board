<?php
	include "conn.php";
	$sid=$_COOKIE['uid'];
	$arr=array();
	$sql="select * from user,sx where user.uid=sx.sid and sx.sid='$sid'";
	$query=mysqli_query($link,$sql);
	while($rs=mysqli_fetch_array($query)){
		$arr[]=$rs;
	}
	
	foreach($arr as $k=>$v){
		//echo $v['rid']."<br />";
		$rid=$v['rid'];
		$sql="select * from user,sx where `user`.uid=sx.rid and sx.rid='$rid";
		$query=mysqli_query($link,$sql);
		$rows=mysqli_fetch_array($query);
		$newarr[]=$rows;
	}
	/*
	echo "<pre>";
	print_r($arr);
	echo "</pre>";*/
?>

<?php
	
?>
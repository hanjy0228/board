<?php
	include "conn.php";
	if(isset($_POST['sub'])){
		$gname=$_POST['gname'];
		$uid=$_COOKIE['uid'];
		$sql="insert into ngroup(gid,gname,uid) values(null,'$gname','$uid')";
		
		//echo $sql;
		//die();
		$query=mysqli_query($link,$sql);
		if($query){
			//user表里面写gid值
			
			$sql="select * from ngroup where uid='$uid'";
			$query=mysqli_query($link,$sql);
			$rs=mysqli_fetch_array($query);
			$gid=$rs['gid'];
			$sql="update user set gid='$gid' where uid='$uid'";
			$query=mysqli_query($link,$sql);
			if($query){
				echo "分组成功";
			}
		}
		
	}

?>

<form action="group.php" method="post">
	添加组别:<input type='text' name="gname">
	<input type="submit" name="sub" value="添加组别">
</form>
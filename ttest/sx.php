<?php
	include "conn.php";
	if(isset($_GET['uid'])){
		$rid=$_GET['uid'];  //接收者uid
		$sid=$_COOKIE['uid'];  //发送者uid
		
	}
	
	
	if(isset($_POST['sub'])){
		$scon=$_POST['scon'];
		$rid=$_POST['rid'];
		$sid=$_COOKIE['uid'];
		$sql="insert into sx(xid,scon,stime,sid,rid) values(null,'$scon',now(),'$sid','$rid')";
		$query=mysqli_query($link,$sql);
		if($query){
			echo "<script>alert('私信成功')</script>";
			echo "<script>location='index.php'</script>";
		}
	}

?>

<form action="sx.php" method="post">
	<input type="hidden" name="rid" value="<?php echo $rid?>">
	<input type="text" name="scon"><br />
	<input type="submit" name="sub" value="私信">
</form>
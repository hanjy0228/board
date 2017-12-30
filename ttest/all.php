<?php
	include "conn.php";
	if(isset($_GET['id'])){
		$id=$_GET['id'];
		//更新点击率
		$sql="update blog set hits=hits+1 where bid='$id'";
		$query=mysqli_query($link,$sql);
		if($query){
			//查询这一条
			$sql="select * from blog where bid='$id'";
			$query=mysqli_query($link,$sql);
			$rs=mysqli_fetch_array($query);
		}
		
	}

?>
<h3>标题:<?php echo $rs['title']?></h3>
<li><?php echo $rs['time']?></li>
<li>点击率:<?php echo $rs['hits']?></li>
<p><?php echo $rs['content'];?></p>
<hr />
<?php 
	if(isset($_POST['sub'])){
		
		$pcon=$_POST['pcon'];
		$wid=$_POST['wid'];
		$uid=$_COOKIE['uid'];
		
		$sql="insert into pl(pid,pcon,ptime,wid,uid) values(null,'$pcon',now(),'$wid','$uid')";
		$query=mysqli_query($link,$sql);
		if($query){
			echo "<script>location='all.php?id=$wid'</script>";
		}
	}

?>

<form action="all.php" method="post">
	<input type="hidden" name="wid" value="<?php echo $rs['bid'];?>">
	评论:<br /><textarea cols=20 rows=10 name="pcon"></textarea><br />
	<input type="submit" name="sub" value="评论">
</form>

<?php
	$wid=$_GET['id'];
	$sql="select * from pl,user where pl.uid=user.uid and pl.wid='$wid'";
	$query=mysqli_query($link,$sql);
	while($rs=mysqli_fetch_array($query)){

?>
<p>评论内容:<?php echo $rs['pcon'];?></p>
<li>评论时间:<?php echo $rs['ptime'];?></li>
<li>评论者:<?php echo $rs['uname']?></li>
<hr />

<?php
	}
?>









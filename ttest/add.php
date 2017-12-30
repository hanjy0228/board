<?php
	if(!isset($_COOKIE['uid'])){
		$url=$_SERVER['REQUEST_URI'];
		$arr=explode('/',$url);
		$le=count($arr)-1;
		$urlname=$arr[$le];
		
		echo "<script>location='login.php?url=$urlname'</script>";
	}

?>
<?php
	include "conn.php";
	if(isset($_POST['sub'])){
		$title=$_POST['title'];
		$con=$_POST['con'];
		$lei=$_POST['lei'];
		$sql="insert into blog(bid,title,content,time,catalog_id) values(null,'$title','$con',now(),'$lei')";
		$query=mysqli_query($link,$sql);
		if($query){
			header("location:index.php");
		}else{
			echo "error";
		}
	}

?>

<meta charset="utf-8">
<form action="add.php" method="post">
	标题:<input type="text" name="title">
	<select name="lei">
		<?php
			$sql="select * from catalog";
			$query=mysqli_query($link,$sql);
			while($rs=mysqli_fetch_array($query)){
		?>
		<option value="<?php echo $rs['catalog_id']?>"><?php echo $rs['catalog_name']?></option>
		<?php
			}
		?>
	</select>
	<br />
	内容:<textarea cols=20 rows=10 name="con"></textarea><br />
	<input type="submit" name="sub" value="添加文章">
</form>







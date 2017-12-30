<?php
	include "conn.php";
	if(isset($_POST['sub'])){
		$cata=$_POST['cata'];
		$sql="select * from catalog where catalog_name='$name'";
		$query=mysqli_query($link,$sql);
		$rs=mysqli_fetch_array($query);
		if($rs){
			echo "<script>location='catalogadd.php'</script>";
		}else{
			$sql="insert into catalog(catalog_id,catalog_name) values(null,'$cata')";
			$query=mysqli_query($link,$sql);
			if($query){
				echo "success";
			}else{
				echo "error";
			}
		}
	}

?>

<meta charset="utf-8">
<form action="catalogadd.php" method="post">
	分类名:<input type="text" name="cata">
	<input type="submit" name="sub" value="添加分类">
</form>
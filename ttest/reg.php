<?php
	include "conn.php";
	//1:验证是不是有重名
	if(isset($_POST['sub'])){
		$uname=$_POST['uname'];
		$upass=$_POST['pass'];
		
		$sfile=$_FILES['sfile'];
		/*
		 * array(5) { ["name"]=> string(23) "11216943431d69da26o.jpg" 
		 * ["type"]=> string(10) "
		 * image/jpeg" ["tmp_name"]=> string(24) "C:\xampp\tmp\phpF001.tmp" 
		 * ["error"]=> int(0) ["size"]=> int(144955) }
		 */
		
		$sql="select * from user where uname='$uname'";
		$query=mysqli_query($link,$sql);
		$result=mysqli_fetch_array($query);
		if($result){
			echo "<script>alert('重名')</script>";
			echo "<script>location='reg.php'</script>";
		}else{
			//2:用户名是不是合法
			$flag=true;
			$arr=array('%','=','#');
			for($i=0;$i<count($arr);$i++){
				for($j=0;$j<strlen($uname);$j++){
					if($arr[$i]==$uname[$j]){
						$flag=false;
					}
				}
			}
			
			if($flag==false){
				echo "<script>alert('用户名非法')</script>";
				echo "<script>location='reg.php'</script>";
			}else{
				//3:把用户名放入数据库
				$mpass=md5($upass);
				//4:写上传文件
				$hou=$sfile['name'];
				$arr=explode('.',$hou);
				$houlength=count($arr)-1;
				$houname=$arr[$houlength];
				$urlname='./upload/'."header".$uname.".".$houname;
				$rs=move_uploaded_file($sfile['tmp_name'], $urlname);
				if($rs){
					$url='/upload/'."header".$uname.".".$houname;
					//echo $url;
					$sql="insert into user(uid,uname,pass,ulevel,uimg) values(null,'$uname','$mpass',0,'$url')";
					$query=mysqli_query($link,$sql);
					if($query){
						echo "<script>location='login.php'</script>";
					}else{
						echo "<script>location='reg.php'</script>";
					}
				}
				
			}
		}
	}
	
	
	
	
	
	//user(uid,uname,pass,ulevel)

?>

<meta charset="utf-8">
<form action="reg.php" method="post" enctype="multipart/form-data">
	用户名:<input type="text" name="uname"><br />
	密码:<input type="password" name="pass"><br />
	<input type="file" name="sfile">
	<input type="submit" name="sub" value="注册">
</form>
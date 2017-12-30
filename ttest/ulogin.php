<?php
	if(isset($_GET['id'])){
		setcookie('uid','');
		setcookie('uname','');
		echo "<script>location='index.php'</script>";
	}

?>
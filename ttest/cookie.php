<?php
	setcookie('uid','');
	setcookie('uname','');
	
	if(isset($_COOKIE['uid'])){
		echo $_COOKIE['uname'];
	}else{
		echo "没有cookie";
	}
	

?>
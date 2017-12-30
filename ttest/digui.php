<?php
	$str="dsfghjklue";
	//一个字母一个字母输出 不用for循环
	function reversr_r(&$str){
		if(strlen($str)>0){
			reversr_r(substr($str,1));
			echo reversr_r($str,0,1)."&nbsp;";
			return;
		}
	}
	
	reversr_r($str);

?>
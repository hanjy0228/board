<?php
	function getList($plid=0,&$result=array(),$spac=0){
		$spac=$spac+2;
		include "conn1.php";
		$sql="select * from ly where lpid='$plid'";
		$res=mysqli_query($link,$sql);
		while($rs=mysqli_fetch_assoc($res)){
			$rs['lcon']=str_repeat('&nbsp;', $spac)."|--".$rs['lcon'];
			$result[]=$rs;
			getList($rs['lid'],$result,$spac);
		}
		
		return $result;
	}
	
	$rs1=getList();
	foreach($rs1 as $val){
		echo $val['lcon']."<br />";
	}

?>
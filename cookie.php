<?php
/**
 * Created by PhpStorm.
 * User: HanJingYi
 * Date: 2017/12/23
 * Time: 10:14
 */
	setcookie('uid','');
	setcookie('uname','');

	if(isset($_COOKIE['uid'])){
        echo $_COOKIE['uname'];
    }else{
        echo "没有cookie";
    }
?>
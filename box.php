<?php
/**
 * Created by PhpStorm.
 * User: HanJingYi
 * Date: 2017/12/23
 * Time: 14:50
 */
include "conn.php";
$sid=$_COOKIE['sid'];
$sql="select * from user,sx where user.uid=sx.sid and?/* 'user'.uid=sx.rid and*/ sx.sid='$sid'";
$query=mysqli_query($link,$sql);
while($rs=mysqli_fetch_array($query)){
    $arr[]=$rs;

}
foreach($arr as $k=>$v){
    $rid=$v['rid'];
    $sql="select * from user,sx where 'user'.uid=sx.rid and sx.rid='$rid'";
    $query=mysqli_query($link,$sql);
    $rows=mysqli_fetch_array($query);
    $newarr[]=$rows;
}
?>
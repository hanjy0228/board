
<?php
/**
 * Created by PhpStorm.
 * User: HanJingYi
 * Date: 2017/12/23
 * Time: 15:40
 */
include "conn.php";
if(isset($_POST['sub'])){
    $gname=$_POST['gname'];
    $uid=$_COOKIE['uid'];
    $sql="insert into group(gid,gname) VALUES (null,$gname,$uid)";
    $query=mysqli_query($link,$sql);
    if($query){
        //user表里写gid的值
        $sql="select * from group where uid='$uid'";
        $query=mysqli_query($link,$sql);
        $rs=mysqli_fetch_array($query);
        $gid=$rs['gid'];
        $sql="update user set gid='$gid' where uid=$uid";
        $query=mysqli_query($link,$sql);
        if($query){
            echo success;
        }
    }
}
?>
<form action="group.php" method="post">
    添加组别：<input type="text" name="gname">
    <input type="submit" name="sub" value="添加组别">
</form>

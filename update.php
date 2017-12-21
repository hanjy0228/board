<?php
/**
 * Created by PhpStorm.
 * User: HanJingYi
 * Date: 2017/12/14
 * Time: 18:46
 */
include "conn.php";
if(isset($_GET['id'])){
    $id=$_GET['id'];
    //先查找id这一条
    $sql="select * from blog where bid='$id'";
    $query=mysqli_query($link,$sql);
    $rs=mysqli_fetch_array($query);
}
if (isset($_POST['sub'])){
    $title=$_POST['title'];
    $con=$_POST['con'];
    $bid=$_POST['hid'];
    //修改
    $sql=" update blog set title='$title',content='$con' where  bid='$bid'";
    $query=mysqli_query($link,$sql);
    if($query){
        header("location:index.php");
    }
    else{
        echo "fail";
    }
}
?>
<meta charset="UTF-8">
<form action="update.php" method="post">
    <input type="hidden" name="hid" value="<?php echo $rs['bid'];?>">
    标题:<input type="text" name="title" value="<?php echo $rs['title'];?>"><br>
    内容：<textarea cols="20" rows="10" name="con" value="<?php echo $rs['con'];?>"></textarea><br>
    <input type="submit" name="sub" value="change">
</form>

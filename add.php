<?php
/**
 * Created by PhpStorm.
 * User: HanJingYi
 * Date: 2017/12/14
 * Time: 17:41
 */
//先连接数据库
include "conn.php";
if(isset($_POST['sub'])){
    $title=$_POST['title'];
    $con=$_POST['con'];
    //操作数据库插入数据
    
    //拼字符串
    $sql="insert into blog(bid,title,content,time) values(null,'$title','$con',now())";
    //发送字符串
    mysqli_query($link,$sql);
    if($query){
       // echo " insert success";
        header("location:index.php");
    }
    else{
        echo " insert fail";
    }
}

?>
<meta charset="UTF-8">
<form action="add.php" method="post">
    标题;<input type="text" name="title"><br>
    内容：<textarea cols="20" rows="10" name="con"></textarea><br>
    <input type="submit" name="sub" value="push">
</form>

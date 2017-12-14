<?php
/**
 * Created by PhpStorm.
 * User: HanJingYi
 * Date: 2017/12/14
 * Time: 18:37
 */
include "conn.php";
if (isset($_GET['id'])){
    $id=$_GET['id'];

    $sql="delete from blog where bid='$id'";
    mysqli_query($link,$sql);
    if($query){
        echo "<script>alert('succcess')</script>";
        echo "<script>location='index.php'</script>";
    }
}
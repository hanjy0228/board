<?php
/**
 * Created by PhpStorm.
 * User: HanJingYi
 * Date: 2017/12/14
 * Time: 19:01
 */
include"conn.php";
if(isset($_GET['id'])){
    //根据id对访问率更新
    $id=$_GET['id'];
    $sql="update blog set hits=hits+1 where bid='$id'";
    $query=mysqli_query($link,$sql);
    if($query){
        //再查找当前这一条
        $sql=" select * from blog where bid='$id'";
        $query=mysqli_query($link,$sql);
        $rs=mysqli_fetch_array($query);
    }
//    else{
//        echo "fail";
//    }

}


?>
<meta charset="UTF-8">
<h3>标题: <?php echo $rs['title']?></h3>
<li>时间：<?php echo $rs['time']?> </li>
<li>访问率：<?php echo $rs['hits']?></li>
<p> 内容：<?php echo $rs['content']?></p>
<hr>
<?php
if(isset($_POST['sub'])){
    $pcon=$_POST['pcon'];
    $wid=$_POST['wid'];
    $uid=$_COOKIE['uid'];
    $sql="insert into pl(pid,pcon,ptime,wid,uid) VALUES (null,'$pcon',now(),'$wid','$uid')";
    $query=mysqli_query($link,$sql);
    if($query){
        echo"<script>location='all.php?id=$wid'</script>";
    }
}

?>
<form action="all.php" method="post">
    <input type="hidden" name="wid" value="<?php echo $rs['bid'];?>">
    评论：<textarea name="pcon" id="" cols="30" rows="10"></textarea><br>
    <input type="submit" name="sub" value="评论">
</form
<?php
    $wid=$_GET['id'];
    $sql="select * from pl,user where pl.uid=user.uid and pl.wid='$wid'";
$query=mysqli_query($link,$sql);
//$rs=mysqli_fetch_array($query);
while($rs=mysqli_fetch_array($query)){

?>
<p>concent <?php echo $rs['pcon']?></p>
<li>timer<?php echo $rs['timen']?></li>
<li>user<?php echo $rs['uid']?></li>
<hr>
<?php }
?>

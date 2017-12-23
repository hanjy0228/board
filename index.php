<?php
    if(isset($_COOKIE['uid'])){
        $id=$_COOKIE['uid'];
        echo $_COOKIE['uname']."have logined";
        echo "<a href='ulogin.php?id=$id'>ulogin</a>";
    }else{
        echo "<a href='login.php'>not login</a>";
    }
?>
<style>
    *{
        margin: 0;
        padding:0;
    }
    #div1{
        float:left;
    }
    #div2{
        float:right;

    }
</style>
<div id="div1">
<?php
/**
 * Created by PhpStorm.
 * User: HanJingYi
 * Date: 2017/12/14
 * Time: 18:14
 */
include "conn.php";
$sql="select * from blog,user where blog.uid=user.uid";
$query=mysqli_query($link,$sql);
while($rs=mysqli_fetch_array($query)) {
    ?>
    <h3><a href='all.php?id=<?php echo $rs['bid']?>'>标题:<?php echo $rs['title'];?></a>|<a href="del.php?id=<?php echo $rs['bid']?>">删除</a>|<a href="update.php?id=<?php echo $rs['bid']?>">修改</a></h3>
    <li>时间：<?php echo $rs['time'] ?></li>
    <li>作者：<?php echo $rs['uname']?></li>
    <p><?php echo $rs['content'] ?></p>
    <hr>
    <?php
}
?>
</div>

<div id="div2">
    <ul>
        <li>1</li>
    </ul>
</div>

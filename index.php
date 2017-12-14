<?php
/**
 * Created by PhpStorm.
 * User: HanJingYi
 * Date: 2017/12/14
 * Time: 18:14
 */
include "conn.php";
$sql="select * from blog";
$query=myspli_query($link,$sql);
while($rs=mysqli_fetch_array($squery)) {
    ?>
    <h3><a href="all.php?id==<?php echo $rs['bid']?>">标题</a>：<?php echo $rs['title'] ?>|<a href="del.php?id=<?php echo $rs['bid']?>">删除</a>|<a href="update.php?id=<?php echo $rs['bid']?>">修改</a></h3>
    <li>时间：<?php echo $rs['time'] ?></li>
    <p><?php echo $rs['content'] ?></p>
    <hr>
    <?php
}
?>
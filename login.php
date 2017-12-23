<?php
/**
 * Created by PhpStorm.
 * User: HanJingYi
 * Date: 2017/12/21
 * Time: 16:56
 */
include"conn.php";
//if(isset($_COOKIE['uid'])){
//    $id=$_COOKIE['uid'];
//    echo $_COOKIE['uname']."logined";
//
//}else{
//    echo"未登录";
//}
if(isset($_GET['url'])){
    $url=$_GET['url'];
}
if( isset($_POST['sub'])) {
    $uname = $_POST['uname'];
    $upass = $_POST['pass'];
    $mpass=md5($upass);

    $sql="select * from user where uname='$uname' and pass='$mpass'";
    $query=mysqli_query($link,$sql);
    $rs=mysqli_fetch_array($query);
    if($rs){
        setcookie('uid',$rs['uid']);
        setcookie('uname',$rs['uname']);
        if(!isset($_POST['url'])){
            $url=$_POST['url'];
            echo "<script>location='$url'</script>";
        }
        else{
            echo "<script>location='index.php'</script>";
        }
    }
    else{
        echo "<script>location='login.php'</script>";
    }
}
?>

<meta charset="UTF-8">
<form action="login.php" method="post">
    <input type="hidden" name="url" value="<?php echo $url;?>">
    用户名：<input type="text" name="uname"><br>
    密码：<input type="password" name="pass"><br>
    <input type="submit" name="sub" value="登陆">
</form>


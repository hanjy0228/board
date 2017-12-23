<?php
/**
 * Created by PhpStorm.
 * User: HanJingYi
 * Date: 2017/12/21
 * Time: 17:41
 */
if(isset($_GET['id'])){
    setcookie('uid','');
    setcookie('uname','');
    echo"<script>location='index.php'</script>";
}
?>
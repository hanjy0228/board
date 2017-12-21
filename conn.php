<?php
    /**
     * Created by PhpStorm.
     * User: HanJingYi
     * Date: 2017/12/14
     * Time: 17:25
     */
    //php mysql数据连接引擎 jdbc.jar odbc
    //打开数据库连接
    $link=@mysqli_connect('localhost','root','') or die('open fail');
    //选择数据库
    @mysqli_select_db($link,'newblog') or die('select fail');
    //设置传输编码
    mysqli_set_charset('UTF8');

?>
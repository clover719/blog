<?php
header("content-type:text/html;charset=utf-8");
$link=@mysql_connect('localhost','root','12345')or die('连接失败');
mysql_select_db('front1',$link);
mysql_query('set names utf-8');
$sql="select*from myclass";
$query=mysql_query($sql);
$result=mysql_fetch_array($query,MYSQL_ASSOC);
echo '<pre>';
var_dump($result);
echo '</pre>';


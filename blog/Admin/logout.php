<?php
header('content-type:text/html;charset=utf8');
@session_start();
require_once '../Common/function.php';
$_SESSION=array();
jump('退出成功','Admin/login.php',3);
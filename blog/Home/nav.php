<?php
/**
 * 首页导航 数据接口
 */
header("content-type:text/html;charset=utf8");
require_once '../Common/mysql.php';
initDb();

// 导航列表
$sql = "select * from nav order by nav_order asc, id desc";
$navArrs = findAll($sql);

echo json_encode($navArrs);


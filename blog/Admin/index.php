<?php
/*后台功能首页*/
header("content-type:text/html;charset=utf8");
require_once '../Common/function.php';
require_once '../Common/mysql.php';
initDb();
checkLogin();


$sql="select count(*) as newsum from news";
$newsCount=findOne($sql);
$sql="select count(*) as usersum from user";
$userCount=findOne($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>后台首页</title>
  <link rel="stylesheet" href="../Public/css/basic.css" />
  <link rel="stylesheet" href="../Public/css/Admin-index.css">
</head>
<body>
<div class="top">
  <h2>后台首页</h2>
  <span>欢迎<b><?php
    @session_start();
    echo isset($_SESSION['username'])?$_SESSION['username']:'';
   ?></b>登录后台</span>
</div>
<div class="nav">
  <ul>
   <li><a href="index.php">后台首页</a></li>
   <li><a href="addNews.php">发布文章</a></li>
   <li><a href="list.php">文章列表</a></li>
   <li><a href="addNav.php">导航添加</a></li>
   <li><a href="nav.php">导航列表</a></li>
   <li><a href="addPics.php">上传图片</a></li>
   <li><a href="picList.php">相册列表</a></li>
   <li><a href="logout.php" onclick="if(!confirm('确定退出系统吗？')){return false}">退出后台</a></li>
  </ul>
</div>
<div class="banner"><img src="../Public/img/index_banner.jpg" height="900" width="1440" alt=""></div>
<div class="info"><p>本站共有文章<b><?php  echo $newsCount ['newsum'];?></b>篇，注册会员<b>
    <?php echo $userCount['usersum'];?></b>人</p></div>
</body>
</html>
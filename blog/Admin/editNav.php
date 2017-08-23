<?php

header("content-type:text/html;charset=utf8");
require_once '../Common/function.php';
require_once '../Common/mysql.php';
initDb();
checkLogin();

if(!empty($_POST)){
    $nav_name=trim($_POST['nav_name']);
    $nav_url=trim($_POST['nav_url']);
    $nav_order=$_POST['nav_order'];
    $id=$_GET['id'];
    $addtime=time();
    $sql="update nav set nav_name='{$nav_name}',nav_url='{$nav_url}',nav_order={$nav_order},update_time={$addtime} where id={$id}";
    $rs=mysql_query($sql);
    if($rs){
        //修改成功
        jump('修改成功','Admin/nav.php',3);
    }else{
        //修改失败
        jump('修改失败','Admin/editNav.php?id='.$id,3);
    }
}else{
    //修改前
    $id=isset($_GET['id'])?$_GET['id']:0;
    $sql="select id ,nav_name,nav_url,nav_order from nav where id={$id}";
    $nav=findOne($sql);
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>修改导航</title>
  <link rel="stylesheet" href="../Public/css/basic.css">
</head>
<body>
  <div class="top">
  <h2>修改导航</h2>
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
    <li><a href="logout.php">退出后台</a></li>
  </ul>
</div>
<div class="main">
   <form class="form" action="" method="post">
    <label for="txtname">导航名称：</label>
    <input type="text"  name="nav_name" value='<?php  echo $nav['nav_name'] ?>' /><br>
    <label for="txtpswd">导航地址：</label>
    <input type="text"  name="nav_url"  value='<?php echo $nav['nav_url'] ?>'/><br>
    <label for="txtpswd">导航排序：</label>
    <input type="text"  name="nav_order" value="" placeholder="正序排列" /><br>
    <div class="btn">
      <input type="reset"  value='重置'/>
      <input type="submit" value="修改" />
    </div>
  </form>
</div>
</body>
</html>
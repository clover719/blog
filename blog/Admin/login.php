<?php
/*后台登录功能代码*/
header("content-type:text/html;charset=utf8");
require_once '../Common/function.php';
require_once '../Common/mysql.php';
initDb();
if(!empty($_POST)){
  //合法性验证
  if(empty($_POST['username'])){
    back('用户名不能为空');
  }
  if(empty($_POST['password'])){
    back('密码不能为空');
  }
  //逻辑性验证
  //根据用户名去查询用户信息
  $sql="select*from user where username='{$_POST['username']}'";
  $info=findone($sql);
  if(!empty($info)){
    //查询到了用户，需要去校验密码
    if(md5($_POST['password'])!==$info['password']){
      back('密码错误');
    }
    //把用户信息持久化 存入session中
    session_start();
    $_SESSION['username']=$info['username'];
    $_SESSION['user_id']=$info['user_id'];
    jump('登录成功','Admin/index.php',3);
  }else{
    back('用户名不存在');
  }
}
?>


 <!DOCTYPE html>
 <html lang="en">
 <head>
   <meta charset="UTF-8">
   <title>后台登录页</title>
   <link rel="stylesheet" href="../Public/css/basic.css" />
 </head>
 <body>
    <div class="top"><h2>后台登录</h2></div>
    <div class="main">
      <form class="form" action="" method="post">
        <label for="txtname">账号：</label>
        <input type="text"  name="username" value="" /><br>
        <label for="txtpswd">密码：</label>
        <input type="password"  name="password" /><br>
        <div class="btn">
          <input type="reset" />
          <input type="submit" value="登录" />
          <a href="regist.php">没有账号？点击注册</a>
        </div>
      </form>
    </div>
 </body>
 </html>
 <?php
  /*后台注册功能代码*/
  header('content-type:text/html;charset=utf8');
  include_once '../Common/function.php';
  include_once '../Common/mysql.php';
   $link=@mysql_connect('localhost','root','12345')or die('数据库连接失败');
  mysql_select_db('blog',$link); 
  initDb();
  mysql_query('set name utf8');
  

  if(!empty($_POST)){
    if(empty($_POST['username'])){
      back('用户名不能为空');
    }
    if(empty($_POST['password'])||empty($_POST['password1'])){
      back('密码或确认密码不能为空');
    }
    if($_POST['password']!==$_POST['password1']){
      back('两次密码必须一致');
    }
    if(empty($_POST['email'])){
      back('邮箱不能为空');
    }
    if(empty($_POST['mobile'])){
      back('手机号不能为空');
    }
    //逻辑性验证 用户名不能重复
    $sql="select*from user where username='{$_POST['username']}'";
    $query=mysql_query($sql);
    $info=mysql_fetch_array($query,MYSQL_ASSOC);
    if(!empty($info)){
      back('当前用户名:'.$_POST['username'].'已存在,请更换用户名');
    }
    $password=md5($_POST['password']);
    $time=time();
    $sql = "insert into user values (null, '{$_POST['username']}', '{$password}', '{$_POST['email']}', '{$_POST['mobile']}', {$time})";
   

    $rs=mysql_query($sql);
    if($rs){
      //echo'注册成功';
      jump('注册成功','Admin/login.php',3);
  }else{
    back('注册失败'); 
    }


  }
 ?>
 
 <!DOCTYPE html>
 <html lang="en">
 <head>
   <meta charset="UTF-8">
   <title>后台注册页</title>
   <link rel="stylesheet" href="../Public/css/basic.css" />
 </head>
 <body>
  <div class="top"><h2>注册页面</h2></div>
  <div class="main">
    <form class="form" action="" method="post">
      <label for="txtname">用&ensp;户&ensp;名：</label>
      <input type="text" name="username" /><br>
      <label for="txtpswd">密&#12288;&#12288;码：</label>
      <input type="password" name="password" /><br>
      <label for="txtpswd">确认密码：</label>
      <input type="password" name="password1" /><br>  
      <label for="txtpswd">邮&#12288;&#12288;箱：</label>
      <input type="text" name="email" /><br>
      <label for="txtpswd">手&ensp;机&ensp;号：</label>
      <input type="text" name="mobile" /><br>
      <div class="btn">
        <input type="reset" />
        <input type="submit" value="注册" />
        <a href="login.php">已有账号？点击登录</a>
      </div>
    </form>
  </div>
</body>
</html>


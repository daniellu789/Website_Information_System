<?php
session_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="livequery,jquery" />
<meta name="description" content="Helloweba演示平台，演示XHTML、CSS、jquery、PHP案例和示例" />
<title>Login</title>
<link rel="stylesheet" type="text/css" href="../css/main.css" />
<style type="text/css">
#login{width:420px; height:200px; margin:60px auto; border:1px solid #aac6eb}
#login h3{height:32px; line-height:32px; padding-left:8px; background:#e8f5fe}
#login_form{margin:20px 10px}
#login p{height:30px; line-height:30px; margin:10px 0}
#login p label{float:left; width:120px; text-align:right}
.input{width:180px; height:24px; line-height:24px; padding:2px; border:1px solid #d3d3d3}
.sub{height:42px; line-height:42px; position:absolute}
.btn{width:86px; height:33px; background:url(images/login_btn.jpg) no-repeat; border:none; text-indent:-999em; display:block; cursor:pointer; margin-left:120px}
.cur_select{border:1px solid #aac6eb}
#msg,#errmsg{position:absolute; width:200px; height:32px; line-height:32px; left:220px; top:0; color:#f30; font-weight:bold}
.loading{background:url(images/loading.gif) no-repeat 0 6px; padding-left:18px; color:#999}
#result{margin:20px; text-align:center}
#result p{line-height:22px; margin:2px 0}
#result p span{color:#f30; margin:4px; font-weight:bold}
</style>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script>
<script type="text/javascript" src="js/volunteerglobal.js"></script>
</head>

<body>
<div id="header">
</div>

<div id="main">
  <div id="login">
      <h3>用户登录</h3>
      <?php
    if(isset($_SESSION['user'])){
    ?>
      <div id="login_form">
          <p><label>ID：</label> <input type="text" class="input" name="user" id="user" /></p>
          <p><label>Password：</label> <input type="password" class="input" name="pass" id="pass" /></p>
          <div class="sub">
              <input type="submit" class="btn" value="Sign In" />
          </div>
      </div>
      <?php }else{?>
      <div id="login_form">
          <p><label>ID：</label> <input type="text" class="input" name="user" id="user" /></p>
          <p><label>Password：</label> <input type="password" class="input" name="pass" id="pass" /></p>
          <div class="sub">
              <input type="submit" class="btn" value="Sign In" />
          </div>
      </div>
      <?php }?>
  </div> 
  <br />
<br />
<br />

</div>
<div id="footer">

</div>
</body>
</html>

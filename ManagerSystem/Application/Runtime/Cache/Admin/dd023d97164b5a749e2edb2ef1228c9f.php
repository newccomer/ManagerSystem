<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>欢迎登录后台管理系统</title>
<link href="/ManagerSystem/Public/Admin/css/style.css" rel="stylesheet" type="text/css" />
<script language="JavaScript" src="/ManagerSystem/Public/Admin/js/jquery.js"></script>
<script src="/ManagerSystem/Public/Admin/js/cloud.js" type="text/javascript"></script>

<script language="javascript">
	$(function(){
    $('.loginbox').css({'position':'absolute','left':($(window).width()-692)/2});
	$(window).resize(function(){  
    $('.loginbox').css({'position':'absolute','left':($(window).width()-692)/2});
    })  
});  
</script> 

</head>

<body style="background-color:#1c77ac; background-image:url(/ManagerSystem/Public/Admin/images/light.png); background-repeat:no-repeat; background-position:center top; overflow:hidden;">



    <div id="mainBody">
      <div id="cloud1" class="cloud"></div>
      <div id="cloud2" class="cloud"></div>
    </div>  

<!-- 
<div class="logintop">    
    <span>欢迎登录后台管理界面平台</span>    
    <ul>
    <li><a href="#">回首页</a></li>
    <li><a href="#">帮助</a></li>
    <li><a href="#">关于</a></li>
    </ul>    
    </div>
    
    <div class="loginbody"> -->
    
    <span class="systemlogo"></span> 

<style type="text/css">
    .loginbox ul li {margin-bottom: 5px; }
</style>

    <div class="loginbox">

  <form action="" method="post">  
    <ul>


    <li><input name="username" type="text" class="loginuser" value="用户" onclick="JavaScript:this.value=''"/></li>

    <li><input name="password" type="password" class="loginpwd" value="密码" onclick="JavaScript:this.value=''"/></li>

    <li>
        <input name="verify" type="text" class="loginpwd" value="验证码" onclick="JavaScript:this.value=''"style="width: 130px;vertical-align: middle;"maxlength="4"/><img src="/ManagerSystem/index.php/Admin/User/verifyImg" alt="" style="width: 130px;vertical-align: middle;"onclick="this.src='/ManagerSystem/index.php/Admin/User/verifyImg/'+Math.random()"/>
    </li>
    
    <li><input name="" type="submit" class="loginbtn" value="登录"  onclick="javascript:window.location='main.html'"  /><label><input name="" type="checkbox" value="" checked="checked" />记住密码</label><label><a href="#">忘记密码？</a><div><?php echo ((isset($errorlogin) && ($errorlogin !== ""))?($errorlogin):''); ?></div></label></li>
    </ul>

      </form> 
    
    </div>
 

    </div>
    
    
    
    <div class="loginbm">版权所有  2013  <a href="http://www.mycodes.net">源码之家</a> </div>
	
    
</body>

</html>
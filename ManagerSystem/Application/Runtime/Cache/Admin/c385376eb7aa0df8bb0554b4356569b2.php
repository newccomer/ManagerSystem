<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>无标题文档</title>
<link href="/ManagerSystem/Public/Admin/css/style.css" rel="stylesheet" type="text/css" />
</head>

<body>

	<div class="place">
    <span>位置：</span>
    <ul class="placeul">
    <li><a href="#">修改</a></li>
    <li><a href="#">表单</a></li>
    </ul>
    </div>
    
    <div class="formbody">
    

    <div class="formtitle"><span>基本信息</span></div>
    
     <form action="#" method="POST">

<!--     <input type="hidden" name="u_id" value="<?php echo ($userInfo["u_id"]); ?>"> -->
    <ul class="forminfo">

    <li><label>用户名</label><input name="u_name" type="text" class="dfinput" value="<?php echo ($info["u_name"]); ?>" /></li>

    <li><label>密码</label><input name="u_password" type="text" class="dfinput" value="<?php echo ($info["u_password"]); ?>"/></li>
<!-- 
    <li><label>角色</label><input name="r_name" type="text" class="dfinput" value="<?php echo ($info["cx_price"]); ?>" /><input name=""> </li> -->

    <li><label>&nbsp;</label><input name="" type="submit" class="btn" value="确认修改"/>&nbsp;&nbsp;<a href="<?php echo U('showlist');?>"><input name="" type="button" class="btn" value="返回"/></a></li>
    </ul>
    
    </form>
    </div>


</body>

</html>
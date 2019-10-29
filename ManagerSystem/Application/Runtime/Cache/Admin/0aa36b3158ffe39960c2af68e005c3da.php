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
    <li><a href="#">首页</a></li>
    <li><a href="#">表单</a></li>
    </ul>
    </div>
 
<!-- <div class="formbody"> -->
    
    <div class="formtitle"><span>基本信息</span></div>
    <div>【<?php echo ($userinfo["u_name"]); ?>】</div>
   
   <form action="#" method="POST" enctype="multipart/form-data">
<!-- 
    <input type="hidden" name="r_id" value="<?php echo ($roleinfo["role_id"]); ?>"/> -->

   <style type="text/css">
    table{border:2px solid lightblue;}
    td{border: 2px solid black;}
</style>

   <table>

              <?php if(is_array($roleinfo)): foreach($roleinfo as $key=>$v): ?><td >
                    
                        
                            <div style="width: 200px;height: 15px">
                            <input type="radio" name="r_id[]" value="<?php echo ($v["r_id"]); ?>"/>
                          <?php echo ($v["r_name"]); ?></div>  

                    
                  </td><?php endforeach; endif; ?>                  
          </tr>


   </table>

   <ul>
    <li><label>&nbsp;</label><input name="" type="submit" class="btn" value="分配权限"/>&nbsp;&nbsp;<a href="<?php echo U('showlist');?>"><input name="" type="button" class="btn" value="返回"/></a></li>
    </ul>
    
   </form> 
   
<!-- </div> -->

</body>

</html>
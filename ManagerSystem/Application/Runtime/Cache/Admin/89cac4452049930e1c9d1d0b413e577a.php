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
    <div>【<?php echo ($roleinfo["r_name"]); ?>】</div>
   
   <form action="#" method="POST" enctype="multipart/form-data">
<!-- 
    <input type="hidden" name="r_id" value="<?php echo ($roleinfo["role_id"]); ?>"/> -->

   <style type="text/css">
    table{border:2px solid lightblue;}
    td{border: 2px solid black;}
</style>

   <table>
       <?php if(is_array($authinfoA)): foreach($authinfoA as $key=>$v): ?><tr>
            <td width="17%">
                <input type="checkbox" name="a_id[]" value="<?php echo ($v["a_id"]); ?>"
                 <?php if(in_array(($v["a_id"]), is_array($roleinfo["a_id"])?$roleinfo["a_id"]:explode(',',$roleinfo["a_id"]))): ?>check="checked"<?php endif; ?> />

                 <?php echo ($v["a_name"]); ?></td>
                <td width="*">
                    <?php if(is_array($authinfoB)): foreach($authinfoB as $key=>$vv): if($vv['a_pid'] == $v['a_id']): ?><div style="width: 200px;float: left">
                            <input type="checkbox" name="a_id[]" value="<?php echo ($vv["a_id"]); ?>"

                 <?php if(in_array(($vv["a_id"]), is_array($roleinfo["a_id"])?$roleinfo["a_id"]:explode(',',$roleinfo["a_id"]))): ?>check='checked'<?php endif; ?> />
                          <?php echo ($vv["a_name"]); ?></div><?php endif; endforeach; endif; ?> 
              </td>
           </tr><?php endforeach; endif; ?>

   </table>

   <ul>
    <li><label>&nbsp;</label><input name="" type="submit" class="btn" value="分配权限"/>&nbsp;&nbsp;<a href="<?php echo U('showlist');?>"><input name="" type="button" class="btn" value="返回"/></a></li>
    </ul>
    
   </form> 
   
<!-- </div> -->

</body>

</html>
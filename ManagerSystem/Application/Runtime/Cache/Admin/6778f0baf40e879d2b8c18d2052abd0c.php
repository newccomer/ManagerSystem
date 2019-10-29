<?php if (!defined('THINK_PATH')) exit();?>﻿<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>无标题文档</title>
<link href="/ManagerSystem/Public/Admin/css/style.css" rel="stylesheet" type="text/css" />
<script language="JavaScript" src="/ManagerSystem/Public/Admin/js/jquery.js"></script>

<script type="text/javascript">
$(function(){   
    //导航切换
    $(".menuson li").click(function(){
        $(".menuson li.active").removeClass("active")
        $(this).addClass("active");
    });
    
    $('.title').click(function(){
        var $ul = $(this).next('ul');
        $('dd').find('ul').slideUp();
        if($ul.is(':visible')){
            $(this).next('ul').slideUp();
        }else{
            $(this).next('ul').slideDown();
        }
    });
})  
</script>


</head>

<body style="background:#f0f9fd;">
	<div class="lefttop"><span></span>菜单</div>
    
    <dl class="leftmenu">
      
<?php if(is_array($authinfoA)): foreach($authinfoA as $key=>$v): ?><dd>
    <div class="title">
    <span><img src="/ManagerSystem/Public/Admin/images/leftico01.png" /></span><?php echo ($v["a_name"]); ?>
    </div>

    	<ul class="menuson">

            <?php if(is_array($authinfoB)): foreach($authinfoB as $key=>$vv): if($vv['a_pid'] == $v['a_id'] and $vv[is_show] == 1): ?><li><cite></cite><a href="/ManagerSystem/index.php/Admin/<?php echo ($vv["a_controller"]); ?>/<?php echo ($vv["a_action"]); ?>" target="rightFrame"><?php echo ($vv["a_name"]); ?></a><i></i></li><?php endif; endforeach; endif; ?>
         
        </ul>    
    </dd><?php endforeach; endif; ?>   
 
    </dl>
    
</body>
</html>
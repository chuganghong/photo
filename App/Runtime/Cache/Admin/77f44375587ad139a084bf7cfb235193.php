<?php if (!defined('THINK_PATH')) exit();?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>『ThinkPHP管理平台』By ThinkPHP <?php echo (THINK_VERSION); ?></title>
<link rel="stylesheet" type="text/css" href="__PUBLIC__/Css/blue.css" />
<script type="text/javascript" src="__PUBLIC__/Js/Base.js"></script>
<script type="text/javascript" src="__PUBLIC__/Js/prototype.js"></script>
<script type="text/javascript" src="__PUBLIC__/Js/mootools.js"></script>
<script type="text/javascript" src="__PUBLIC__/Js/Think/ThinkAjax.js"></script>
<script type="text/javascript" src="__PUBLIC__/Js/Form/CheckForm.js"></script>
<script type="text/javascript" src="__PUBLIC__/Js/common.js"></script>
<script language="JavaScript">
<!--
//指定当前组模块URL地址 
var URL = '__URL__';
var APP	 =	 '__APP__';
var PUBLIC = '__PUBLIC__';
//-->
</script>
</head>

<body>
<!-- 菜单区域  -->

<!-- 主页面开始 -->
<div id="main" class="main" >

<!-- 主体内容  -->
<div class="content" >
<div class="title">栏目列表</div>
<!--  功能操作区域  -->
<div class="operate" >
<div class="impBtn hMargin fLeft shadow" ><input type="button" id="" name="add" value="新增" onclick="add()" class="add imgButton"></div>
<div class="impBtn hMargin fLeft shadow" ><input type="button" id="" name="edit" value="编辑" onclick="edit()" class="edit imgButton"></div>
<div class="impBtn hMargin fLeft shadow" ><input type="button" id="" name="delete" value="删除" onclick="foreverdel()" class="delete imgButton"></div>
<!-- 查询区域 -->
<div class="fRig">
<form method='post' action="__URL__">
<div class="fLeft"><span id="key"><input type="text" name="name" title="" class="medium" ></span></div>
<div class="impBtn hMargin fLeft shadow" ><input type="submit" id="" name="search" value="查询" onclick="" class="search imgButton"></div>
</div>
<!-- 高级查询区域 -->
<div  id="searchM" class=" none search cBoth" >
</div>
</form>
</div>
<!-- 功能操作区域结束 -->

<!-- 列表显示区域  -->
<div class="list" >
<!-- Think 系统列表组件开始 -->
<table id="checkList" class="list" cellpadding=0 cellspacing=0 ><tr><td height="5" colspan="6" class="topTd" ></td></tr><tr class="row" ><th width="8"><input type="checkbox" id="check" onclick="CheckAll('checkList')"></th><th width="8%"><a href="javascript:sortBy('id','<?php echo ($sort); ?>','index')" title="按照编号<?php echo ($sortType); ?> ">编号<?php if(($order) == "id"): ?><img src="../Public/images/<?php echo ($sortImg); ?>.gif" width="12" height="17" border="0" align="absmiddle"><?php endif; ?></a></th><th><a href="javascript:sortBy('topicName','<?php echo ($sort); ?>','index')" title="按照栏目名称<?php echo ($sortType); ?> ">栏目名称<?php if(($order) == "topicName"): ?><img src="../Public/images/<?php echo ($sortImg); ?>.gif" width="12" height="17" border="0" align="absmiddle"><?php endif; ?></a></th><th><a href="javascript:sortBy('create_time','<?php echo ($sort); ?>','index')" title="按照创建时间<?php echo ($sortType); ?> ">创建时间<?php if(($order) == "create_time"): ?><img src="../Public/images/<?php echo ($sortImg); ?>.gif" width="12" height="17" border="0" align="absmiddle"><?php endif; ?></a></th><th><a href="javascript:sortBy('status','<?php echo ($sort); ?>','index')" title="按照状态<?php echo ($sortType); ?> ">状态<?php if(($order) == "status"): ?><img src="../Public/images/<?php echo ($sortImg); ?>.gif" width="12" height="17" border="0" align="absmiddle"><?php endif; ?></a></th><th >操作</th></tr><?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$user): $mod = ($i % 2 );++$i;?><tr class="row" onmouseover="over(event)" onmouseout="out(event)" onclick="change(event)" ><td><input type="checkbox" name="key"	value="<?php echo ($user["id"]); ?>"></td><td><?php echo ($user["id"]); ?></td><td><a href="javascript:edit('<?php echo (addslashes($user["id"])); ?>')"><?php echo ($user["topicName"]); ?></a></td><td><?php echo (todate($user["create_time"],'y-m-d')); ?></td><td><?php echo (getstatus($user["status"])); ?></td><td> <?php echo (showstatus($user["status"],$user['id'])); ?>&nbsp;<a href="javascript:edit('<?php echo ($user["id"]); ?>')">编辑</a>&nbsp;</td></tr><?php endforeach; endif; else: echo "" ;endif; ?><tr><td height="5" colspan="6" class="bottomTd"></td></tr></table>
<!-- Think 系统列表组件结束 -->

</div>


<!--  分页显示区域 -->
<div class="page"><?php echo ($page); ?></div>
<!-- 列表显示区域结束 -->
</div>
<!-- 主体内容结束 -->
</div>
<!-- 主页面结束 -->
<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>NBSHOP 管理中心 - <?php echo $_page_title?> </title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="/Public/Admin/Styles/general.css" rel="stylesheet" type="text/css" />
<link href="/Public/Admin/Styles/main.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="/Public/umeditor1_2_2-utf8-php/third-party/jquery.min.js"></script>
</head>
<body>
<h1>
    <span class="action-span"><a href="<?php echo $_page_btn_link;?>"><?php echo $_page_btn_name?></a>
    </span>
    <span class="action-span1"><a href="__GROUP__">NBSHOP 管理中心</a></span>
    <span id="search_id" class="action-span1"> - <?php echo $_page_title?> </span>
    <div style="clear:both"></div>
</h1>

<!-- 内容 -->


<!-- 搜索 -->
<div class="form-div search_form_div">
    <form action="/index.php/Admin/Admin/lst" method="GET" name="search_form">
			角色：
        <select name="role_id" onchange="this.parentNode.submit();">
            <option value="0">所有角色</option>
            <?php foreach($rData as $v){?>
            <option value="<?php echo $v['id']?>" <?php if(I('get.role_id') == $v['id']){echo 'selected="selected"';}?>><?php echo $v['role_name']?></option>
            <?php }?>
        </select>
			用户名：
	   		<input type="text" name="username" size="15" value="<?php echo I('get.username'); ?>" />
			<!-- 角色 -->
			
			
		<input type="submit" value=" 搜索 " class="button" />
		
    </form>
</div>
<!-- 列表 -->
<div class="list-div" id="listDiv">
	<table cellpadding="3" cellspacing="1">
    	<tr>
            <th >用户名</th>
            <th >角色</th>
			<th width="60">操作</th>
        </tr>
		<?php foreach ($data as $k => $v): ?>            
			<tr class="tron">
				<td><?php echo $v['username']; ?></td>
				<td><?php echo $v['id'] == 1 ? '超级管理员' : $v['role_name']; ?></td>
		        <td align="center">
		        	<a href="<?php echo U('edit?id='.$v['id'].'&p='.I('get.p')); ?>" title="编辑"><img id="img_edit" src="/Public/Admin/Images/icon_edit.gif" width="16" height="16" border="0" /></a> 
		        	<?php if($v['id'] > 1){ ?>
		        	
	                <a href="<?php echo U('delete?id='.$v['id'].'&p='.I('get.p')); ?>" onclick="return confirm('确定要删除吗？');" title="移除"><img id="img_trash" src="/Public/Admin/Images/icon_trash.gif" width="16" height="16" border="0" /></a> 
		        	<?php }?>
		        </td>
	        </tr>
        <?php endforeach; ?> 
		<?php if(preg_match('/\d/', $page)): ?>  
        <tr><td align="right" nowrap="true" colspan="99" height="30"><?php echo $page; ?></td></tr> 
        <?php endif; ?> 
	</table>
</div>

<script>
</script>

<script src="/Public/Admin/Js/tron.js"></script>

<div id="footer">
共执行 9 个查询，用时 0.025161 秒，Gzip 已禁用，内存占用 3.258 MB<br />
版权所有 &copy; 2016-2017 广州市倾出于蓝科技有限公司，并保留所有权利。</div>
</body>
</html>
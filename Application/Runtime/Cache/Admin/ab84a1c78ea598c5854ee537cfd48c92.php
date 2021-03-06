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

<div class="main-div">
    <form name="main_form" method="POST" action="/index.php/Admin/Role/add.html" enctype="multipart/form-data">
        <table cellspacing="1" cellpadding="3" width="100%">
            <tr>
                <td class="label">角色名称：</td>
                <td>
                    <input  type="text" name="role_name" value="" />
                    <span class="require-field">*</span>
                </td>
            </tr>
            <tr>
                <td class="label">权限列表：</td>
                <td>
                	<?php foreach($pData as $k=>$v){?>
                	<?php echo str_repeat('-',6*$v['level'])?>
                    <input level_id="<?php echo $v['level']?>" type="checkbox" name="pri_id[]" value="<?php echo $v['id']?>" />
                    <?php echo $v['pri_name']?></br>
                    <?php }?>
                </td>
            </tr>
            <tr>
                <td colspan="99" align="center">
                    <input type="submit" class="button" value=" 确定 " />
                    <input type="reset" class="button" value=" 重置 " />
                </td>
            </tr>
        </table>
    </form>
</div>

<!-- 实现权限选中和取消的效果 -->
<script>
	$(':checkbox').click(function(){
		var tmp_level_id = level_id = $(this).attr("level_id");
		//判断是否选中
		if($(this).prop('checked')){
			//alert('1');
			//所有子权限也选中.
			$(this).nextAll(':checkbox').each(function(k,v){
				if($(v).attr("level_id") > level_id){
					//选中
					$(v).prop("checked","checked");
				}else{
					return false;
				}
			});
			$(this).prevAll(':checkbox').each(function(k,v){
				if($(v).attr("level_id") < tmp_level_id){
					//选中
					$(v).prop("checked","checked");
					tmp_level_id--;
				}
			});
		}else{
			$(this).nextAll(':checkbox').each(function(k,v){
				if($(v).attr("level_id") > level_id){
					//选中
					$(v).removeAttr("checked");
				}else{
					return false;
				}
			});
		}
	});
</script>

<div id="footer">
共执行 9 个查询，用时 0.025161 秒，Gzip 已禁用，内存占用 3.258 MB<br />
版权所有 &copy; 2016-2017 广州市倾出于蓝科技有限公司，并保留所有权利。</div>
</body>
</html>
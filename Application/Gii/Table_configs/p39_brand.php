<?php
return array(
	'tableName' => 'p39_brand',    // 表名
	'tableCnName' => '品牌',  // 表的中文名
	'moduleName' => 'Admin',  // 代码生成到的模块
	'withPrivilege' => FALSE,  // 是否生成相应权限的数据
	'topPriName' => '',        // 顶级权限的名称
	'digui' => 0,             // 是否无限级（递归）
	'diguiName' => '',        // 递归时用来显示的字段的名字，如cat_name（分类名称）
	'pk' => 'id',    // 表中主键字段名称
	/********************* 要生成的模型文件中的代码 ******************************/
	// 添加时允许接收的表单中的字段
	'insertFields' => "array('brand_name','url','brand_desc','sort_order')",
	// 修改时允许接收的表单中的字段
	'updateFields' => "array('id','brand_name','url','brand_desc','sort_order')",
	'validate' => "
		array('brand_name', 'require', '品牌名称不能为空！', 1, 'regex', 3),
		array('brand_name', '1,30', '品牌名称的值最长不能超过 30 个字符！', 1, 'length', 3),
		array('url', '1,150', '品牌官网的值最长不能超过 150 个字符！', 2, 'length', 3),
		array('brand_desc', '1,255', '品牌描述的值最长不能超过 255 个字符！', 2, 'length', 3),
		array('sort_order', 'number', '排序依据必须是一个整数！', 2, 'regex', 3),
	",
	/********************** 表中每个字段信息的配置 ****************************/
	'fields' => array(
		'brand_name' => array(
			'text' => '品牌名称',
			'type' => 'text',
			'default' => '',
		),
		'url' => array(
			'text' => '品牌官网',
			'type' => 'text',
			'default' => '',
		),
		'logo' => array(
			'text' => '品牌logo',
			'type' => 'file',
			'thumbs' => array(
				array(350, 350, 2),
				array(150, 150, 2),
				array(50, 50, 2),
			),
			'save_fields' => array('logo', 'big_logo', 'mid_logo', 'sm_logo'),
			'default' => '',
		),
	    'brand_desc' => array(
	        'text' => '品牌描述',
	        'type' => 'textarea',
	        'default' => '',
	    ),
	    'sort_order' => array(
	        'text' => '排序依据',
	        'type' => 'text',
	        'default' => '50',
	    ),
	),
	/**************** 搜索字段的配置 **********************/
	'search' => array(
		array('brand_name', 'normal', '', 'like', '品牌名称'),
	),
);
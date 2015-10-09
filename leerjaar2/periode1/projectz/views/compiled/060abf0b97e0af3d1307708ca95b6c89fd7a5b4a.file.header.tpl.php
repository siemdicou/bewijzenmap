<?php /* Smarty version Smarty-3.1.18, created on 2015-10-08 20:05:00
         compiled from "views/header.tpl" */ ?>
<?php /*%%SmartyHeaderCode:10081800505616b04c60d234-75925668%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '060abf0b97e0af3d1307708ca95b6c89fd7a5b4a' => 
    array (
      0 => 'views/header.tpl',
      1 => 1444323225,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '10081800505616b04c60d234-75925668',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'curr_page' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_5616b04c64be62_42598407',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5616b04c64be62_42598407')) {function content_5616b04c64be62_42598407($_smarty_tpl) {?><div id="imgtitle">
<img src="http://orig00.deviantart.net/5d8d/f/2011/331/6/d/linkin_park_wallpaper_3_by_designsbytopher-d4hjb97.jpg" width="100%" height="200px">
</div>
<div id="menu">
<form action="?page=search" method="POST">
			<a href="?page=home"><img src="http://img3.wikia.nocookie.net/__cb20140321085229/logopedia/images/b/ba/Linkin_Park_logo_2010.png" width="10%;" height="100%;"></a>
	<ul>
		<a href="?page=home"><li <?php if ($_smarty_tpl->tpl_vars['curr_page']->value=='home') {?> class="selected"<?php }?>>Home</li></a>
		<a href="?page=events"><li <?php if ($_smarty_tpl->tpl_vars['curr_page']->value=='events') {?> class="selected"<?php }?>>events</li></a>
		<a href="?page=news"><li <?php if ($_smarty_tpl->tpl_vars['curr_page']->value=='news') {?> class="selected"<?php }?>>newsfeed</li></a>
		<a href="?page=concerten"><li <?php if ($_smarty_tpl->tpl_vars['curr_page']->value=='concerten') {?> class="selected"<?php }?>>concerten</li></a>
		<a href="?page=cd"><li <?php if ($_smarty_tpl->tpl_vars['curr_page']->value=='cd') {?> class="selected"<?php }?>>cd's</li></a>
		<a href="?page=about"><li <?php if ($_smarty_tpl->tpl_vars['curr_page']->value=='about') {?> class="selected"<?php }?>>about</li></a>
<!-- 		<a href="?page=home"><li>newsfeed</li></a>
		<a href="?page=home"><li>newsfeed</li></a>
		<a href="?page=home"><li>newsfeed</li></a> -->

	<input type="text" name="search_string">
	<input type="submit" value="search">
</form>


	</ul>
</div><?php }} ?>

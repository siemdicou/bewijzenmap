<?php /* Smarty version Smarty-3.1.18, created on 2015-10-08 17:39:11
         compiled from "views/events.tpl" */ ?>
<?php /*%%SmartyHeaderCode:131170181156167bdf72ad73-57775900%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'cc2f7b15893431dc2489c1a3646209dd25841728' => 
    array (
      0 => 'views/events.tpl',
      1 => 1444318749,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '131170181156167bdf72ad73-57775900',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_56167bdf75c459_70891735',
  'variables' => 
  array (
    'data' => 0,
    'newsItem' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_56167bdf75c459_70891735')) {function content_56167bdf75c459_70891735($_smarty_tpl) {?>	<section>
	<?php  $_smarty_tpl->tpl_vars['newsItem'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['newsItem']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['data']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['newsItem']->key => $_smarty_tpl->tpl_vars['newsItem']->value) {
$_smarty_tpl->tpl_vars['newsItem']->_loop = true;
?>
	<div id="events">
		
	
	<article>
	
	<h1><?php echo $_smarty_tpl->tpl_vars['newsItem']->value['title'];?>
</h1><br>
	<table width="100%;">
	<tr>
	<td><img src='<?php echo $_smarty_tpl->tpl_vars['newsItem']->value['image'];?>
'></td>
	<td><h3><?php echo $_smarty_tpl->tpl_vars['newsItem']->value['location'];?>
<br>

	<?php echo $_smarty_tpl->tpl_vars['newsItem']->value['date'];?>
</h3><br><br></td>
	</tr>
	</table>
	<content><h4><?php echo $_smarty_tpl->tpl_vars['newsItem']->value['content'];?>
</h4></content>


	</article>
	
	</div>
	<?php } ?>
	</section><?php }} ?>

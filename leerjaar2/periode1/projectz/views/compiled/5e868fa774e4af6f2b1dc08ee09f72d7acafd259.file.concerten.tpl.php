<?php /* Smarty version Smarty-3.1.18, created on 2015-10-08 19:54:20
         compiled from "views/concerten.tpl" */ ?>
<?php /*%%SmartyHeaderCode:283138992560be2869e4db4-35468391%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '5e868fa774e4af6f2b1dc08ee09f72d7acafd259' => 
    array (
      0 => 'views/concerten.tpl',
      1 => 1444326682,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '283138992560be2869e4db4-35468391',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_560be2869e59a2_87882207',
  'variables' => 
  array (
    'data' => 0,
    'newsItem' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_560be2869e59a2_87882207')) {function content_560be2869e59a2_87882207($_smarty_tpl) {?>	<section>
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

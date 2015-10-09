<?php /* Smarty version Smarty-3.1.18, created on 2015-10-08 21:23:28
         compiled from "views/newsarticles.tpl" */ ?>
<?php /*%%SmartyHeaderCode:327211067560be45b8d5016-28286632%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '08a5f4b5596e58361f517860f8b37beb43c98474' => 
    array (
      0 => 'views/newsarticles.tpl',
      1 => 1444332199,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '327211067560be45b8d5016-28286632',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_560be45b93a398_91696145',
  'variables' => 
  array (
    'data' => 0,
    'newsItem' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_560be45b93a398_91696145')) {function content_560be45b93a398_91696145($_smarty_tpl) {?>

<?php echo $_smarty_tpl->getSubTemplate ("search.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>


	<section>
	<?php  $_smarty_tpl->tpl_vars['newsItem'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['newsItem']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['data']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['newsItem']->key => $_smarty_tpl->tpl_vars['newsItem']->value) {
$_smarty_tpl->tpl_vars['newsItem']->_loop = true;
?>
	<div id="newsitem">
		
	
	<article>
	<h1><?php echo $_smarty_tpl->tpl_vars['newsItem']->value['title'];?>
</h1><br>
	<img src='<?php echo $_smarty_tpl->tpl_vars['newsItem']->value['image'];?>
'><br><br>
	<content><?php echo $_smarty_tpl->tpl_vars['newsItem']->value['content'];?>
</content><br><br>
	</article>
	
	</div>
	<?php } ?>
	</section>
	<?php echo $_smarty_tpl->getSubTemplate ("navigation.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<?php }} ?>

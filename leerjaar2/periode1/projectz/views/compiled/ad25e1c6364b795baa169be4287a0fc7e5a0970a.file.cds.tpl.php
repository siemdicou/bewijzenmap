<?php /* Smarty version Smarty-3.1.18, created on 2015-10-08 21:41:04
         compiled from "views/cds.tpl" */ ?>
<?php /*%%SmartyHeaderCode:16001495165616c4752664f0-44261477%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'ad25e1c6364b795baa169be4287a0fc7e5a0970a' => 
    array (
      0 => 'views/cds.tpl',
      1 => 1444333184,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '16001495165616c4752664f0-44261477',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_5616c4752e2d93_16260583',
  'variables' => 
  array (
    'data' => 0,
    'newsItem' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5616c4752e2d93_16260583')) {function content_5616c4752e2d93_16260583($_smarty_tpl) {?>



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
	<img src='<?php echo $_smarty_tpl->tpl_vars['newsItem']->value['img'];?>
'><br><br>
	<content><?php echo $_smarty_tpl->tpl_vars['newsItem']->value['songs'];?>
</content><br><br>
	</article>
	
	</div>
	<?php } ?>
	</section>

<?php }} ?>

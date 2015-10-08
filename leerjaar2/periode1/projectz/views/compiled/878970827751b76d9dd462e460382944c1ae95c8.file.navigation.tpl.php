<?php /* Smarty version Smarty-3.1.18, created on 2015-10-08 09:14:44
         compiled from "views/navigation.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1318878947560be45b946f40-18116573%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '878970827751b76d9dd462e460382944c1ae95c8' => 
    array (
      0 => 'views/navigation.tpl',
      1 => 1444226710,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1318878947560be45b946f40-18116573',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_560be45b949577_21351308',
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_560be45b949577_21351308')) {function content_560be45b949577_21351308($_smarty_tpl) {?>
<ul>
<?php $_smarty_tpl->tpl_vars['start'] = new Smarty_Variable;$_smarty_tpl->tpl_vars['start']->step = 1;$_smarty_tpl->tpl_vars['start']->total = (int) ceil(($_smarty_tpl->tpl_vars['start']->step > 0 ? 3+1 - (1) : 1-(3)+1)/abs($_smarty_tpl->tpl_vars['start']->step));
if ($_smarty_tpl->tpl_vars['start']->total > 0) {
for ($_smarty_tpl->tpl_vars['start']->value = 1, $_smarty_tpl->tpl_vars['start']->iteration = 1;$_smarty_tpl->tpl_vars['start']->iteration <= $_smarty_tpl->tpl_vars['start']->total;$_smarty_tpl->tpl_vars['start']->value += $_smarty_tpl->tpl_vars['start']->step, $_smarty_tpl->tpl_vars['start']->iteration++) {
$_smarty_tpl->tpl_vars['start']->first = $_smarty_tpl->tpl_vars['start']->iteration == 1;$_smarty_tpl->tpl_vars['start']->last = $_smarty_tpl->tpl_vars['start']->iteration == $_smarty_tpl->tpl_vars['start']->total;?>
	<li><a href="?page=news&page_nr=1">1</a></li>
	<li><a href="?page=news&page_nr=2">2</a></li>
	<li><a href="?page=news&page_nr=3">3</a></li>
<?php }} ?>
</ul>
<?php }} ?>

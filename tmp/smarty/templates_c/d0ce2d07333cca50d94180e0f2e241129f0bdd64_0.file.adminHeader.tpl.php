<?php
/* Smarty version 3.1.33, created on 2018-12-11 01:52:22
  from 'C:\OSPanel\domains\ishop.local\views\admin\adminHeader.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5c0eee262b7263_24372455',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'd0ce2d07333cca50d94180e0f2e241129f0bdd64' => 
    array (
      0 => 'C:\\OSPanel\\domains\\ishop.local\\views\\admin\\adminHeader.tpl',
      1 => 1544464134,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:adminLeftColumn.tpl' => 1,
  ),
),false)) {
function content_5c0eee262b7263_24372455 (Smarty_Internal_Template $_smarty_tpl) {
?><!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport"
		  content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title><?php echo $_smarty_tpl->tpl_vars['pageTitle']->value;?>
</title>
	<link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['TemplateAdminWebPath']->value;?>
css/admin.css" type="text/css">
	<link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['templateWebPath']->value;?>
css/node_modules/font-awesome/css/font-awesome.css" type="text/css">
	<?php echo '<script'; ?>
 type="text/javascript" src="/js/node_modules/jquery/dist/jquery.min.js"><?php echo '</script'; ?>
>
	<?php echo '<script'; ?>
 type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['TemplateAdminWebPath']->value;?>
js/admin.js"><?php echo '</script'; ?>
>
</head>
<body>
<div id="header">

	<h1><?php echo $_smarty_tpl->tpl_vars['PageTitle']->value;?>
</h1>
</div>

<?php $_smarty_tpl->_subTemplateRender("file:adminLeftColumn.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<div id="centerColumn"><?php }
}

<?php
/* Smarty version 3.1.33, created on 2018-11-04 17:08:15
  from 'C:\OSPanel\domains\ishop.local\views\default\header.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5bdefd4f2c7297_57671067',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '4e6f12783a385543ce104a34dbc7dd5833adab44' => 
    array (
      0 => 'C:\\OSPanel\\domains\\ishop.local\\views\\default\\header.tpl',
      1 => 1541340494,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:leftColumn.tpl' => 1,
  ),
),false)) {
function content_5bdefd4f2c7297_57671067 (Smarty_Internal_Template $_smarty_tpl) {
?><!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport"
		  content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title><?php echo $_smarty_tpl->tpl_vars['pageTitle']->value;?>
</title>
	<link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['templateWebPath']->value;?>
css/main.css" type="text/css">
	<link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['templateWebPath']->value;?>
css/node_modules/font-awesome/css/font-awesome.css" type="text/css">
	<?php echo '<script'; ?>
 type="text/javascript" src="/js/node_modules/jquery/dist/jquery.min.js"><?php echo '</script'; ?>
>
	<?php echo '<script'; ?>
 type="text/javascript" src="/js/main.js"><?php echo '</script'; ?>
>
</head>
<body>
<div id="header">
	<h1>Internet shop</h1>
</div>

<?php $_smarty_tpl->_subTemplateRender("file:leftColumn.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<div id="centerColumn">

<?php }
}

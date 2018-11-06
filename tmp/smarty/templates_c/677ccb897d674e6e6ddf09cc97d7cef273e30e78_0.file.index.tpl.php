<?php
/* Smarty version 3.1.33, created on 2018-10-08 18:28:04
  from 'C:\OSPanel\domains\ishop.local\views\default\index.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5bbb778462df67_49296270',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '677ccb897d674e6e6ddf09cc97d7cef273e30e78' => 
    array (
      0 => 'C:\\OSPanel\\domains\\ishop.local\\views\\default\\index.tpl',
      1 => 1539012483,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5bbb778462df67_49296270 (Smarty_Internal_Template $_smarty_tpl) {
?><div class="categoryProducts">
	<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['rsProducts']->value, 'item');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['item']->value) {
?>
		<div class="products">
			<a href="/product/<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
/">
				<img src="/images/products/<?php echo $_smarty_tpl->tpl_vars['item']->value['image'];?>
" alt="">
			</a>
			<a href="/product/<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
/"><?php echo $_smarty_tpl->tpl_vars['item']->value['name'];?>
</a>
		</div>
	<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
</div>
<?php }
}

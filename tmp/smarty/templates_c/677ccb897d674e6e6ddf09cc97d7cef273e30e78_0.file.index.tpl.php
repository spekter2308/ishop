<?php
/* Smarty version 3.1.33, created on 2019-01-06 18:29:00
  from 'C:\OSPanel\domains\ishop.local\views\default\index.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5c321ebcc2dfe2_72461109',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '677ccb897d674e6e6ddf09cc97d7cef273e30e78' => 
    array (
      0 => 'C:\\OSPanel\\domains\\ishop.local\\views\\default\\index.tpl',
      1 => 1546788539,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5c321ebcc2dfe2_72461109 (Smarty_Internal_Template $_smarty_tpl) {
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

<div class="paginator">
	<?php if ($_smarty_tpl->tpl_vars['paginator']->value['currentPage'] != 1) {?>
		<span class="p_prev"><a href="<?php echo $_smarty_tpl->tpl_vars['paginator']->value['link'];
echo $_smarty_tpl->tpl_vars['paginator']->value['currentPage']-1;?>
"><i class="fa
		fa-angle-left"></i></a></span>
	<?php }?>

	<strong><span><?php echo $_smarty_tpl->tpl_vars['paginator']->value['currentPage'];?>
</span></strong>

	<?php if ($_smarty_tpl->tpl_vars['paginator']->value['currentPage'] < $_smarty_tpl->tpl_vars['paginator']->value['pageCnt']) {?>
		<span class="p_next"><a href="<?php echo $_smarty_tpl->tpl_vars['paginator']->value['link'];
echo $_smarty_tpl->tpl_vars['paginator']->value['currentPage']+1;?>
"><i class="fa fa-angle-right"></i></a></span>
	<?php }?>
</div><?php }
}

<?php
/* Smarty version 3.1.33, created on 2018-10-09 14:44:04
  from 'C:\OSPanel\domains\ishop.local\views\default\category.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5bbc948423c056_42068547',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'f84bb6f1e40dbdf0aaa10205c5721f59de9b3d5c' => 
    array (
      0 => 'C:\\OSPanel\\domains\\ishop.local\\views\\default\\category.tpl',
      1 => 1539085439,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5bbc948423c056_42068547 (Smarty_Internal_Template $_smarty_tpl) {
?>	<h1 class="pageTitle"><?php echo $_smarty_tpl->tpl_vars['pageTitle']->value;?>
</h1>
	<div class="categoryName">
		<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['rsChildCats']->value, 'item');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['item']->value) {
?>
			<h2>
				<li><a href="/category/<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
/"><?php echo $_smarty_tpl->tpl_vars['item']->value['name'];?>
</a></li>
			</h2>
		<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
	</div>

		<div class="categoryProducts">
			<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['rsProducts']->value, 'item');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['item']->value) {
?>
				<div class="products">
					<li><a href="/product/<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
/">
							<img src="/images/products/<?php echo $_smarty_tpl->tpl_vars['item']->value['image'];?>
" alt="">
						</a>
						<a href="/product/<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
/"><?php echo $_smarty_tpl->tpl_vars['item']->value['name'];?>
</a>
					</li>
				</div>
			<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
		</div>

<?php }
}

<?php
/* Smarty version 3.1.33, created on 2018-11-06 16:33:14
  from 'C:\OSPanel\domains\ishop.local\views\default\product.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5be1981a41a2f8_24938072',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '39be094ac1e83f7e01300b0852bf5b5b9e707c37' => 
    array (
      0 => 'C:\\OSPanel\\domains\\ishop.local\\views\\default\\product.tpl',
      1 => 1541511189,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5be1981a41a2f8_24938072 (Smarty_Internal_Template $_smarty_tpl) {
?><div class="prod-wrap">
	<h3><?php echo $_smarty_tpl->tpl_vars['rsProduct']->value['name'];?>
</h3>

	<img src="/images/products/<?php echo $_smarty_tpl->tpl_vars['rsProduct']->value['image'];?>
" alt="">
	<br>
	Вартість: <?php echo $_smarty_tpl->tpl_vars['rsProduct']->value['price'];?>


	<br>
	<a id="removeCart_<?php echo $_smarty_tpl->tpl_vars['rsProduct']->value['id'];?>
" <?php if (!$_smarty_tpl->tpl_vars['itemInCart']->value) {?> class="hideme" <?php }?> href="#" onclick="removeFromCart(<?php echo $_smarty_tpl->tpl_vars['rsProduct']->value['id'];?>
); return false;" alt="Видалити з корзини">Видалити з корзини</a>
	<a id="addCart_<?php echo $_smarty_tpl->tpl_vars['rsProduct']->value['id'];?>
" <?php if ($_smarty_tpl->tpl_vars['itemInCart']->value) {?> class="hideme" <?php }?> href="#" onclick="addToCart(<?php echo $_smarty_tpl->tpl_vars['rsProduct']->value['id'];?>
); return false;" alt="Додати в
корзину">Додати в корзину</a>
	<h3><br><br>Опис</h3>
</div>
<p><?php echo $_smarty_tpl->tpl_vars['rsProduct']->value['description'];?>
</p><?php }
}

<?php
/* Smarty version 3.1.33, created on 2018-10-15 18:38:27
  from 'C:\OSPanel\domains\ishop.local\views\default\cart.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5bc4b473abd354_28751322',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '51eea7cf3fb1b45722ca54f9776216699e67e040' => 
    array (
      0 => 'C:\\OSPanel\\domains\\ishop.local\\views\\default\\cart.tpl',
      1 => 1539617907,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5bc4b473abd354_28751322 (Smarty_Internal_Template $_smarty_tpl) {
?><div class="ordersData">
	<h3><?php echo $_smarty_tpl->tpl_vars['pageTitle']->value;?>
</h3>
	<?php if (!$_smarty_tpl->tpl_vars['rsProducts']->value) {?>
		<h4 class="emptyCat">
			В корзині пусто
		</h4>
	<?php } else { ?>
	<h4>Дані замовлення</h4>
</div>
<div class="cartOrdersHead">
		<h5>№</h5>
		<h5>Назва</h5>
		<h5>Кількість</h5>
		<h5>Ціна за одиницю</h5>
		<h5>Ціна</h5>
		<h5>Дія</h5>
</div>

<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['rsProducts']->value, 'item', false, NULL, 'products', array (
  'iteration' => true,
));
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['item']->value) {
$_smarty_tpl->tpl_vars['__smarty_foreach_products']->value['iteration']++;
?>
	<div class="cartOrdersInfo">
		<li><?php echo (isset($_smarty_tpl->tpl_vars['__smarty_foreach_products']->value['iteration']) ? $_smarty_tpl->tpl_vars['__smarty_foreach_products']->value['iteration'] : null);?>
</li>
		<li class="prodName">
			<a href="/product/<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
/"><?php echo $_smarty_tpl->tpl_vars['item']->value['name'];?>
</a>
		</li>
		<input name="itemCnt_<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
" id="itemCnt_<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
" type="text" value="1" onchange="conversionPrice(<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
);">
		<span id="itemPrice_<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
" value="<?php echo $_smarty_tpl->tpl_vars['item']->value['price'];?>
"><?php echo $_smarty_tpl->tpl_vars['item']->value['price'];?>
</span>
		<span id="itemRealPrice_<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
"><?php echo $_smarty_tpl->tpl_vars['item']->value['price'];?>
</span>
		<li>
			<a href="#" id="removeCart_<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
" onclick="removeFromCart(<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
); return false;"
			   title="Видалити з корзини">Видалити</a>
			<a href="#" class="hideme" id="addCart_<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
" onclick="addToCart(<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
); return false;"
			   title="Відновити елемент">Відновити</a>
		</li>
	</div>

<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>

<?php }?>

</div>
<?php }
}

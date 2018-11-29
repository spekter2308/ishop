<?php
/* Smarty version 3.1.33, created on 2018-11-28 02:15:54
  from 'C:\OSPanel\domains\ishop.local\views\default\cart.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5bfdd02a726001_77864077',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '51eea7cf3fb1b45722ca54f9776216699e67e040' => 
    array (
      0 => 'C:\\OSPanel\\domains\\ishop.local\\views\\default\\cart.tpl',
      1 => 1543360347,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5bfdd02a726001_77864077 (Smarty_Internal_Template $_smarty_tpl) {
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
<form action="/cart/order/" method="POST">

<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['rsProducts']->value, 'item', false, NULL, 'products', array (
  'iteration' => true,
));
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['item']->value) {
$_smarty_tpl->tpl_vars['__smarty_foreach_products']->value['iteration']++;
?>
	<div class="cartOrdersInfo">
		<div class="cart-img">
			<li><?php echo (isset($_smarty_tpl->tpl_vars['__smarty_foreach_products']->value['iteration']) ? $_smarty_tpl->tpl_vars['__smarty_foreach_products']->value['iteration'] : null);?>
</li>
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
			<li>
				<a href="/product/<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
/">
					<img src="/images/products/<?php echo $_smarty_tpl->tpl_vars['item']->value['image'];?>
" alt="">
				</a>
			</li>
		</div>
		<div class="cart-title">
			<li class="prodName">
				<a href="/product/<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
/"><?php echo $_smarty_tpl->tpl_vars['item']->value['name'];?>
</a>
			</li>
			<li>
				<span id="itemPrice_<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
" value="<?php echo $_smarty_tpl->tpl_vars['item']->value['price'];?>
"><?php echo $_smarty_tpl->tpl_vars['item']->value['price'];?>
грн</span>
				<input name="itemCnt_<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
" id="itemCnt_<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
" type="text" value="1" onchange="conversionPrice(<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
);">
			</li>
		</div>
		<div class="cart-sum">
			<h5>Сума</h5>
			<span id="itemRealPrice_<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
"><?php echo $_smarty_tpl->tpl_vars['item']->value['price'];?>
</span><span>грн</span>
		</div>

	</div>

<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
	<input type="submit" value="Оформити замовлення">
</form>
<?php }?>

</div>
<?php }
}

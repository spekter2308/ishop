<?php
/* Smarty version 3.1.33, created on 2018-12-21 02:52:07
  from 'C:\OSPanel\domains\ishop.local\views\admin\adminOrder.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5c1c2b277dce26_05537985',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '7d670d4fc5e68c047dcec0d13d1420a38cc88409' => 
    array (
      0 => 'C:\\OSPanel\\domains\\ishop.local\\views\\admin\\adminOrder.tpl',
      1 => 1545349926,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5c1c2b277dce26_05537985 (Smarty_Internal_Template $_smarty_tpl) {
?><div class="adminOrderContainer">
	<h4>Керування замовленнями</h4>

	<?php if (!$_smarty_tpl->tpl_vars['rsOrders']->value) {?>
		Немає замовлень
	<?php } else { ?>
		<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['rsOrders']->value, 'item');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['item']->value) {
?>
			<div class="mainOrder">
				<div class="orderNum">
					<span>№ <?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
</span>
				</div>
				<div class="orderDateCreate">
					<h5>Дата створення</h5>
					<span><?php echo $_smarty_tpl->tpl_vars['item']->value['date_created'];?>
</span>
				</div>
				<div class="orderDateMod">
					<h5>Дата зміни замовлення</h5>
					<span><?php echo $_smarty_tpl->tpl_vars['item']->value['date_modification'];?>
</span>
				</div>
				<div class="orderStat">
					<h5>Статус оплати</h5>
					<?php if ($_smarty_tpl->tpl_vars['item']->value['status']) {?>
						<input type="checkbox" id="itemStatus_<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
" checked="checked">
						<span class="orderStat-green">Оплачено</span>
					<?php } else { ?>
						<input type="checkbox" id="itemStatus_<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
">
						<span class="orderStat-red">Не оплачено</span>
					<?php }?>
				</div>
				<div class="orderDataPay">
					<h5>Дата оплати</h5>
					<?php if (is_null($_smarty_tpl->tpl_vars['item']->value['date_payment']) || $_smarty_tpl->tpl_vars['item']->value['date_payment'] <= 0) {?>
						<input type="date" id="datePayment_<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
" value="<?php echo $_smarty_tpl->tpl_vars['item']->value['date_payment'];?>
">
					<?php } else { ?>
						<input type="datetime" id="datePayment_<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
" value="<?php echo $_smarty_tpl->tpl_vars['item']->value['date_payment'];?>
">
					<?php }?>

					<input type="button" value="Зберегти" onclick="updateDatePayment('<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
');">
				</div>
			</div>
			<div class="mainOrderInfo-hidden">
				<div class="mainOrderInfo">
					<div class="mainOrderInfo-left">
						<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['item']->value['children'], 'child');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['child']->value) {
?>
							<div class="orderInfo-left">
								<div class="prodImg">
									<img src="/images/products/<?php echo $_smarty_tpl->tpl_vars['child']->value['image'];?>
">
								</div>
								<div class="prodName">
									<a href="/product/<?php echo $_smarty_tpl->tpl_vars['child']->value['id'];?>
"><?php echo $_smarty_tpl->tpl_vars['child']->value['name'];?>
</a>
								</div>
								<div class="prodPrice">
									<div><?php echo $_smarty_tpl->tpl_vars['child']->value['price'];?>
 грн</div>
									<div><?php echo $_smarty_tpl->tpl_vars['child']->value['amount'];?>
 шт</div>
								</div>
								<div class="summaryInfo">
									<?php echo $_smarty_tpl->tpl_vars['child']->value['price']*$_smarty_tpl->tpl_vars['child']->value['amount'];?>
 грн
								</div>
							</div>
						<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
					</div>
					<div class="orderInfo-right">
						<h4>Додаткова інформація</h4>
						<div class="additionalInfo">
							<span><?php echo $_smarty_tpl->tpl_vars['item']->value['comment'];?>
</span></div>
					</div>
					<div class="orderInfo-bottom">
						<p>Всього до оплати</p>
						<p><?php echo $_smarty_tpl->tpl_vars['item']->value['summary'];?>
 грн</p>
					</div>
				</div>
			</div>

		<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>

	<?php }?>

</div>

<?php echo '<script'; ?>
>
	$(document).ready(function(){
		$('.orderNum').click(function(){
			var parent = $(this).parent();

			$(this).toggleClass('in');
			$(parent).next().slideToggle();
		});
	});
<?php echo '</script'; ?>
>
<?php }
}

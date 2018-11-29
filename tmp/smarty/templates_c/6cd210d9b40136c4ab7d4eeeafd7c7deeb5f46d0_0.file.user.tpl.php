<?php
/* Smarty version 3.1.33, created on 2018-11-30 01:52:34
  from 'C:\OSPanel\domains\ishop.local\views\default\user.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5c006db2a81320_68703876',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '6cd210d9b40136c4ab7d4eeeafd7c7deeb5f46d0' => 
    array (
      0 => 'C:\\OSPanel\\domains\\ishop.local\\views\\default\\user.tpl',
      1 => 1543531950,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5c006db2a81320_68703876 (Smarty_Internal_Template $_smarty_tpl) {
?>
<div id="updateUserData">
	<h3 class="pageTitle"><?php echo $_smarty_tpl->tpl_vars['pageTitle']->value;?>
</h3>
	<div class="userData">
		<div class="inputBox">
			<div class="labelText">Логін (email):</div>
			<input disabled class="userInput" value="<?php echo $_smarty_tpl->tpl_vars['arUser']->value['email'];?>
">
		</div>

		<div class="inputBox">
			<div class="labelText">Ім'я:</div>
			<input type="text" id="newName" name="newName" class="userInput" value="<?php echo $_smarty_tpl->tpl_vars['arUser']->value['name'];?>
">
		</div>
		<div class="inputBox">
			<div class="labelText">Телефон:</div>
			<input type="text" id="newPhone" name="newPhone" value="<?php echo $_smarty_tpl->tpl_vars['arUser']->value['phone'];?>
"
				   pattern="\d+">
		</div>
		<div class="inputBox">
			<div class="labelText">Адреса:</div>
			<input type="text" id="newAdress" name="newAdress" value="<?php echo $_smarty_tpl->tpl_vars['arUser']->value['address'];?>
">
		</div>
		<div class="inputBox">
			<div class="labelText">Новий пароль:</div>
			<input type="password" id="newPwd1" name="newPwd1" value="">
		</div>
		<div class="inputBox">
			<div class="labelText">Повтор нового паролю:</div>
			<input type="password" id="newPwd2" name="newPwd2" value="">
		</div>
		<div class="inputBox">
			<div class="labelText">Старий(нинішній) пароль:</div>
			<input type="password" id="curPwd" name="curPwd" value="">
		</div>
		<input type="button" value="Зберегти зміни" class="button" onclick="updateUserData();">
	</div>
</div>

	<div class="userOrders">
		<h3>Мої замовлення</h3>
		<?php if (!$_smarty_tpl->tpl_vars['rsUserOrders']->value) {?>
			<span>Немає замовлень</span>
		<?php } else { ?>
			<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['rsUserOrders']->value, 'item');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['item']->value) {
?>
				<div class="userOrder">
					<div class="orderNum">№ <?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
</div>
					<div class="orderDate"><?php echo $_smarty_tpl->tpl_vars['item']->value['date_created'];?>
</div>
					<div class="listImg"><img src="/images/products/<?php echo $_smarty_tpl->tpl_vars['item']->value['children'][0]['image'];?>
" alt=""></div>
					<div class="orderCount"><?php echo $_smarty_tpl->tpl_vars['item']->value['count'];?>
 шт.</div>
					<div class="orderSum">на <?php echo $_smarty_tpl->tpl_vars['item']->value['summary'];?>
 грн</div>
					<?php if ($_smarty_tpl->tpl_vars['item']->value['status'] == 1) {?>
						<div class="orderStatus-green"><span>Оплачено</span></div>
					<?php } else { ?>
						<div class="orderStatus-red"><span>Не оплачено</span></div>
					<?php }?>
				</div>
				<div class="userOrderInfo-hidden">
					<div class="userOrderInfo">
						<div class="userOrderInfo-left">
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
			$('.userOrder').click(function(){
				$(this).toggleClass('in').next().slideToggle();
			});
		});
	<?php echo '</script'; ?>
>
<?php }
}

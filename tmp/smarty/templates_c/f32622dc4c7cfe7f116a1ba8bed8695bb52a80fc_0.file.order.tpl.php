<?php
/* Smarty version 3.1.33, created on 2018-11-27 15:06:15
  from 'C:\OSPanel\domains\ishop.local\views\default\order.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5bfd33371f1796_47066496',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'f32622dc4c7cfe7f116a1ba8bed8695bb52a80fc' => 
    array (
      0 => 'C:\\OSPanel\\domains\\ishop.local\\views\\default\\order.tpl',
      1 => 1543320374,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5bfd33371f1796_47066496 (Smarty_Internal_Template $_smarty_tpl) {
?><h3 class="title"><?php echo $_smarty_tpl->tpl_vars['pageTitle']->value;?>
</h3>
<h4>Дані замовлення</h4>
<form id="frmOrder" action="/cart/saveorder/" method="POST">
		<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['rsProducts']->value, 'item', false, NULL, 'products', array (
));
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['item']->value) {
?>
	<div class="orderData">
			<li>
				<a href="/product/<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
/">
					<img src="/images/products/<?php echo $_smarty_tpl->tpl_vars['item']->value['image'];?>
" alt="">
				</a>
			</li>
			<li><a href="href="/product/<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
/""><?php echo $_smarty_tpl->tpl_vars['item']->value['name'];?>
</a></li>
			<li><?php echo $_smarty_tpl->tpl_vars['item']->value['cnt'];?>
шт.</li>
			<li><?php echo $_smarty_tpl->tpl_vars['item']->value['realPrice'];?>
грн.</li>
	</div>
		<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>

	<?php if (isset($_smarty_tpl->tpl_vars['arUser']->value)) {?>
		<?php $_smarty_tpl->_assignInScope('buttonClass', '');?>
		<div id="orderUserInfoBox" class="orderUserInfoBox">
			<h2>Контактні дані</h2>
			<?php $_smarty_tpl->_assignInScope('name', $_smarty_tpl->tpl_vars['arUser']->value['name']);?>
			<?php $_smarty_tpl->_assignInScope('phone', $_smarty_tpl->tpl_vars['arUser']->value['phone']);?>
			<?php $_smarty_tpl->_assignInScope('address', $_smarty_tpl->tpl_vars['arUser']->value['address']);?>
			<div class="customerName">
				<span>Ім'я і прізвище</span>
				<input type="text" id="name" name="name" value="<?php echo $_smarty_tpl->tpl_vars['name']->value;?>
">
			</div>
			<div class="customerPhone">
				<span>Телефон</span>
				<input type="text" id="phone" name="phone" value="<?php echo $_smarty_tpl->tpl_vars['phone']->value;?>
">
			</div>
			<div class="customerAddress">
				<span>Адреса</span>
				<input type="textarea" id="address" name="address" value="<?php echo $_smarty_tpl->tpl_vars['address']->value;?>
">
			</div>
		</div>
		<input <?php echo $_smarty_tpl->tpl_vars['buttonClass']->value;?>
 id="btnSaveOrder" type="button" value="Оформити замовлення" onclick="saveOrder();">
	<?php } else { ?>
				<div id="loginBox">
			<div class="dws-input">
				<div class="menuCaption">
					<h3>Авторизація</h3>
				</div>
				<div class="email input">
					<input type="email" id="loginEmail" name="loginEmail" placeholder="Email">
				</div>
				<div class="password input">
					<input type="password" id="loginPwd" name="loginPwd" placeholder="Пароль">
				</div>
				<div class="loginBtn">
					<input type="button" onclick="login();" value="Увійти">
				</div>
			</div>
		</div>

		<br><span>або</span><br><br>

				<div id="registerBox">
			<div class="menuCaption">
				<h3>Реєстрація нового користувача</h3>
			</div>
								<div class="email input">
					<span>Еmail* :</span>
					<input type="email" id="email" name="email">
				</div>
				<div class="password input">
					<span>Пароль* :</span>
					<input type="password" id="pwd1" name="pwd1">
				</div>
				<div class="password input">
					<span>Повторіть пароль* :</span>
					<input type="password" id="pwd2" name="pwd2">
				</div>
				<div class="name input">
					<span>Ім'я* :</span>
					<input type="text" id="name" name="name">
				</div>
				<div class="phone input">
					<span>Телефон* :</span>
					<input type="text" id="phone" name="phone">
				</div>
				<div class="address input">
					<span>Адреса* :</span>
					<input type="textarea" id="address" name="address">
				</div>
				<input type="button" onclick="registerNewUser();" value="Зареєструватись">
			</div>
		<?php $_smarty_tpl->_assignInScope('buttonClass', "class='hideme'");?>
	<?php }?>

</form><?php }
}

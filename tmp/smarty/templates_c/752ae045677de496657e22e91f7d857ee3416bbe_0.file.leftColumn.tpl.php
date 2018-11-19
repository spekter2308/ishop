<?php
/* Smarty version 3.1.33, created on 2018-11-13 15:47:02
  from 'C:\OSPanel\domains\ishop.local\views\default\leftColumn.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5beac7c63a0123_38716831',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '752ae045677de496657e22e91f7d857ee3416bbe' => 
    array (
      0 => 'C:\\OSPanel\\domains\\ishop.local\\views\\default\\leftColumn.tpl',
      1 => 1542113222,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5beac7c63a0123_38716831 (Smarty_Internal_Template $_smarty_tpl) {
?><div id="leftColumn">

	<div class="leftMenu">
		<div class="menuCaption">Меню</div>
		<ul class="menu">
			<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['rsCategories']->value, 'item');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['item']->value) {
?>
				<li class="mainMenu"><a href="/?controller=category&id=<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
"><?php echo $_smarty_tpl->tpl_vars['item']->value['name'];?>
</a></li>

				<?php if (isset($_smarty_tpl->tpl_vars['item']->value['children'])) {?>
					<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['item']->value['children'], 'itemChildren');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['itemChildren']->value) {
?>
						<li class="subMenu"><a href="/category/<?php echo $_smarty_tpl->tpl_vars['itemChildren']->value['id'];?>
/"><?php echo $_smarty_tpl->tpl_vars['itemChildren']->value['name'];?>
</a></li>
					<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
				<?php }?>

			<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
		</ul>
	</div>

		<?php if (isset($_smarty_tpl->tpl_vars['arUser']->value)) {?>
		<div id="userBox">
			<a href="/user/" id="displayName"><i class="fa fa-user"></i><?php echo $_smarty_tpl->tpl_vars['arUser']->value['displayName'];?>
</a>
			<a href="/user/logout/"><i class="fa fa-sign-out"></i>Выход</a>
		</div>

	<?php } else { ?>
		<div id="userBox" class="hideme">
			<a href="/user/" id="displayName"></a>
			<br>
			<a href="/user/logout/">Выход</a>
		</div><br>

		<div id="loginBox">
		<div class="dws-input">
			<div class="menuCaption">Авторизація</div>
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

		<div id="registerBox">
		<div class="menuCaption showHidden" onclick="showRegisterBox();">
			Реєстрація
		</div>
		<div id="registerBoxHidden">
						<div class="email input">
					<input type="email" id="email" name="email" placeholder="email:">
				</div>
				<div class="password input">
					<input type="password" id="pwd1" name="pwd1" placeholder="пароль">
				</div>
				<div class="password input">
					<input type="password" id="pwd2" name="pwd2" placeholder="повторіть пароль">
				</div>
				<input type="button" onclick="registerNewUser();" value="Зареєструватись">
		</div>
	</div>
	<?php }?>


		<div class="menuCaption">Корзина</div>
	<div class="cartCaption">
		<a href="/cart/" title="Перейти в корзину">В корзині</a>
		<span id="cartCntItems">
			<?php if ($_smarty_tpl->tpl_vars['cartCntItems']->value > 0) {?>
				<?php echo $_smarty_tpl->tpl_vars['cartCntItems']->value;?>

			<?php } else { ?>пусто
			<?php }?>
		</span>
	</div>







</div>



<?php }
}

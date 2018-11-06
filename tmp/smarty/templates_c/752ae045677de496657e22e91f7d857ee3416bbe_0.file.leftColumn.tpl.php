<?php
/* Smarty version 3.1.33, created on 2018-11-06 16:57:20
  from 'C:\OSPanel\domains\ishop.local\views\default\leftColumn.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5be19dc0f25530_22626017',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '752ae045677de496657e22e91f7d857ee3416bbe' => 
    array (
      0 => 'C:\\OSPanel\\domains\\ishop.local\\views\\default\\leftColumn.tpl',
      1 => 1541512639,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5be19dc0f25530_22626017 (Smarty_Internal_Template $_smarty_tpl) {
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

		<div id="userBox" class="hedime">
		<li><a href="/user/" id="displayName"></a></li>
		<li><a href="/user/logout/">Вихід</a></li>
	</div>


		<div id="loginBox">
		<div class="dws-input">
			<div class="menuCaption">Авторизація</div>
			<div class="email input">
				<input type="text" id="loginEmail" name="loginEmail" placeholder="Email">
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
		<div class="registerBoxHidden">
						<div class="email input">
					<input type="text" id="email" name="email" placeholder="email:">
				</div>
				<div class="password input">
					<input type="password" id="pwd1" name="pwd1" placeholder="пароль">
				</div>
				<div class="password input">
					<input type="password" id="pwd2" name="pwd2" placeholder="повторіть пароль">
				</div>
				<input type="button" onclick="registerNewUser();" value="Зареєструватись">
		</div>

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





</div>



<?php }
}

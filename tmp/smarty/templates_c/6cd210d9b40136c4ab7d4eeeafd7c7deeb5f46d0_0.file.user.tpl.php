<?php
/* Smarty version 3.1.33, created on 2018-11-19 15:04:27
  from 'C:\OSPanel\domains\ishop.local\views\default\user.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5bf2a6cbc08ed5_69922409',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '6cd210d9b40136c4ab7d4eeeafd7c7deeb5f46d0' => 
    array (
      0 => 'C:\\OSPanel\\domains\\ishop.local\\views\\default\\user.tpl',
      1 => 1542629066,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5bf2a6cbc08ed5_69922409 (Smarty_Internal_Template $_smarty_tpl) {
?>
<h3 class="pageTitle"><?php echo $_smarty_tpl->tpl_vars['pageTitle']->value;?>
</h3>
<div id="updateUserData">
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
		</div>
	<input type="button" value="Зберегти зміни" class="button" onclick="updateUserData();">
	</div>
<?php }
}

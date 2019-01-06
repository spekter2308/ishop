<?php
/* Smarty version 3.1.33, created on 2018-12-25 11:57:59
  from 'C:\OSPanel\domains\ishop.local\views\admin\adminAdmin.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5c21f11785d6e6_22076290',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '754dede9e6645066339af16b3b61039d34f528f0' => 
    array (
      0 => 'C:\\OSPanel\\domains\\ishop.local\\views\\admin\\adminAdmin.tpl',
      1 => 1545728279,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5c21f11785d6e6_22076290 (Smarty_Internal_Template $_smarty_tpl) {
if (isset($_smarty_tpl->tpl_vars['mainAdmin']->value) && isset($_smarty_tpl->tpl_vars['arAdmin']->value)) {?>
<div class="adminContainer">
	<h4>Додати нового адміністратора</h4>
	<div id="newAdmin">
		<div class="newAdminName">
			<h5>Логін: </h5>
			<input type="text" id="newAdminName" name="newAdminName">
		</div>
		<div class="newAdminPassword">
			<h5>Пароль* :</h5>
			<input type="password" id="newAdminPassword" name="newAdminPassword">
		</div>

		<input type="button" onclick="addAdmin();" value="Додати">
	</div>

		<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['rsAdmins']->value, 'admins');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['admins']->value) {
?>
	<div class="admins">
		<div class="id">
				ID: <?php echo $_smarty_tpl->tpl_vars['admins']->value['id'];?>

			</div>
			<div class="login">
				Login: <?php echo $_smarty_tpl->tpl_vars['admins']->value['login'];?>

			</div>
	</div>
		<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
</div>


<?php } else { ?>

		<div id="loginAdmin">
		<div class="dws-input">
			<div class="menuCaption">
				<h3>Авторизація адміністратора</h3>
				<h4>Введіть логін та пароль головного адміністратора</h4>
			</div>
			<div class="email input">
				<input type="text" id="loginAdmin" name="loginAdmin" placeholder="Login">
			</div>
			<div class="password input">
				<input type="password" id="loginPwd" name="loginPwd" placeholder="Пароль">
			</div>
			<div class="loginBtn">
				<input type="button" onclick="loginAdmin();" value="Увійти">
			</div>
		</div>
	</div>

<?php }
}
}

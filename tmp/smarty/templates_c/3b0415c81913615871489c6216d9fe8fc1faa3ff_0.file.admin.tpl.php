<?php
/* Smarty version 3.1.33, created on 2018-12-23 17:36:15
  from 'C:\OSPanel\domains\ishop.local\views\admin\admin.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5c1f9d5f0e7736_15391253',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '3b0415c81913615871489c6216d9fe8fc1faa3ff' => 
    array (
      0 => 'C:\\OSPanel\\domains\\ishop.local\\views\\admin\\admin.tpl',
      1 => 1545575774,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5c1f9d5f0e7736_15391253 (Smarty_Internal_Template $_smarty_tpl) {
if (isset($_smarty_tpl->tpl_vars['arAdmin']->value)) {?>

<div id="blockNewCategory">
	<div class="newCategory">
		<h4>Нова категорія:</h4>
		<input name="newCategoryName" id="newCategoryName" type="text" value="">
	</div>
	<div class="selectCategory">
		<h4>Додати до:</h4>
		<select name="generalCatId" id="">
			<option value="0">Головна категорія</option>
			<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['rsCategories']->value, 'item');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['item']->value) {
?>
				<option value="<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
"><?php echo $_smarty_tpl->tpl_vars['item']->value['name'];?>
</option>
			<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
		</select>
	</div>
	<input type="button" onclick="newCategory();" value="Додати категорію">
</div>

<?php } else { ?>

		<div id="loginAdmin">
		<div class="dws-input">
			<div class="menuCaption">
				<h3>Авторизація адміністратора</h3>
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

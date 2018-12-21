<?php
/* Smarty version 3.1.33, created on 2018-12-05 20:50:02
  from 'C:\OSPanel\domains\ishop.local\views\admin\adminCategory.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5c080fcab6c569_75506506',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '392c71780d00ae24b96e7c998f8fc65ce80e708c' => 
    array (
      0 => 'C:\\OSPanel\\domains\\ishop.local\\views\\admin\\adminCategory.tpl',
      1 => 1544032202,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5c080fcab6c569_75506506 (Smarty_Internal_Template $_smarty_tpl) {
?><div id="categoriesControl">
	<h2>Управління категоріями</h2>

		<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['rsCategories']->value, 'item');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['item']->value) {
?>
			<div class="categoryControl">
				<div class="catId">
					ID: <?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>

				</div>
				<input type="edit" id="itemName_<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
" value="<?php echo $_smarty_tpl->tpl_vars['item']->value['name'];?>
">
				<select id="parentId_<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
">
					<option value="0">
						Головна категорія
					</option>
					<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['rsMainCategories']->value, 'mainItem');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['mainItem']->value) {
?>
						<option value="<?php echo $_smarty_tpl->tpl_vars['mainItem']->value['id'];?>
" <?php if ($_smarty_tpl->tpl_vars['item']->value['parent_id'] == $_smarty_tpl->tpl_vars['mainItem']->value['id']) {?> selected<?php }?>>
							<?php echo $_smarty_tpl->tpl_vars['mainItem']->value['name'];?>

						</option>
					<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
				</select>
				<input type="button" value="Зберегти" onclick="updateCategory(<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
);">
			</div>
		<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>

</div>
<?php }
}

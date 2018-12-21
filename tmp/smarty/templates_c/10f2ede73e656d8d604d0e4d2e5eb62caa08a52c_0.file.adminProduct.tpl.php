<?php
/* Smarty version 3.1.33, created on 2018-12-18 01:21:20
  from 'C:\OSPanel\domains\ishop.local\views\admin\adminProduct.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5c182160281ed9_64512439',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '10f2ede73e656d8d604d0e4d2e5eb62caa08a52c' => 
    array (
      0 => 'C:\\OSPanel\\domains\\ishop.local\\views\\admin\\adminProduct.tpl',
      1 => 1545085279,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5c182160281ed9_64512439 (Smarty_Internal_Template $_smarty_tpl) {
?><div class="addProductContainer">
	<h4>Додавання товару</h4>
	<div class="addProduct">
		<div class="prodName">
			<h5>Ім'я</h5>
			<input type="edit" id="newItemName" value="">
		</div>
		<div class="prodPrice">
			<h5>Ціна</h5>
			<input type="edit" id="newItemPrice" value="">
		</div>
		<div class="prodCategory">
			<h5>Категорія</h5>
			<select id="newItemCatId">
				<option value="0">
					Головна категорія
				</option>
				<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['rsCategories']->value, 'category');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['category']->value) {
?>
					<option value="<?php echo $_smarty_tpl->tpl_vars['category']->value['id'];?>
">
						<?php echo $_smarty_tpl->tpl_vars['category']->value['name'];?>

					</option>
				<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
			</select>
		</div>
		<div class="prodDesc">
			<h5>Опис</h5>
			<textarea id="newItemDesc"></textarea>
		</div>
		<div class="addProdButton">
			<input type="button" value="Завантажити" onclick="addProduct();">
		</div>
	</div>

</div>

<div class="editProductContainer">
	<h4>Редагувати</h4>
	<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['rsProducts']->value, 'item');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['item']->value) {
?>
		<div class="editProduct">
			<div class="idProd">
				<h5>ID товару:  <?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
</h5>
			</div>
			<div class="first-line">
				<div class="prodName">
					<h5>Ім'я</h5>
					<input type="edit" id="itemName_<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
" value="<?php echo $_smarty_tpl->tpl_vars['item']->value['name'];?>
">
				</div>
				<div class="prodPrice">
					<h5>Ціна</h5>
					<input type="edit" id="itemPrice_<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
" value="<?php echo $_smarty_tpl->tpl_vars['item']->value['price'];?>
">
				</div>
				<div class="prodCategory">
					<h5>Категорія</h5>
					<select id="itemCatId_<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
">
						<option value="0">Головна категорія</option>
						<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['rsCategories']->value, 'itemCat');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['itemCat']->value) {
?>
							<option value="<?php echo $_smarty_tpl->tpl_vars['itemCat']->value['id'];?>
" <?php if ($_smarty_tpl->tpl_vars['item']->value['category_id'] == $_smarty_tpl->tpl_vars['itemCat']->value['id']) {?> selected <?php }?>><?php echo $_smarty_tpl->tpl_vars['itemCat']->value['name'];?>
</option>
						<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
					</select>
				</div>
				<div class="prodDesc">
					<h5>Опис</h5>
					<textarea id="itemDesc_<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
">
						<?php echo $_smarty_tpl->tpl_vars['item']->value['description'];?>

					</textarea>
				</div>
			</div>
			<div class="second-line">
				<div class="prodStatus">
					<h5>Видалити</h5>
					<input type="checkbox" id="itemStatus_<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
" <?php if ($_smarty_tpl->tpl_vars['item']->value['status'] == 0) {?> checked  <?php }?>">
				</div>
				<?php if ($_smarty_tpl->tpl_vars['item']->value['image']) {?>
					<div class="prodImg">
						<img src="/images/products/<?php echo $_smarty_tpl->tpl_vars['item']->value['image'];?>
" alt="">
					</div>
				<?php }?>
				<div class="editProdImg">
					<form id="formImg" action="/admin/upload/" method="POST" enctype="multipart/form-data">
						<i class="fa fa-upload"></i>
						<div>
							<input id="file-input" type="file" name="file">
							<label for="file-input">Виберіть файл</label>
							<input type="hidden" name="itemId" value="<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
">
						</div>
					</form>
				</div>
			</div>
			<div class="editButton">
				<input type="submit" value="Зберегти" onclick="updateProduct('<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
');" form="formImg">
			</div>
		</div>
	<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
</div><?php }
}

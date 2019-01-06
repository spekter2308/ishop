<?php
/* Smarty version 3.1.33, created on 2018-12-24 01:44:48
  from 'C:\OSPanel\domains\ishop.local\views\admin\adminLeftColumn.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5c200fe038da54_05588144',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '6bf294abfdd3d323061a3da6cb879afe28a2d08b' => 
    array (
      0 => 'C:\\OSPanel\\domains\\ishop.local\\views\\admin\\adminLeftColumn.tpl',
      1 => 1545605088,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5c200fe038da54_05588144 (Smarty_Internal_Template $_smarty_tpl) {
?><div id="leftColumn">

	<?php if (isset($_smarty_tpl->tpl_vars['arAdmin']->value)) {?>
	<div class="leftMenu">
		<div class="menuCaption">Меню</div>
		<ul class="menu">
			<li><a href="/admin/">Головна</a></li>
			<li><a href="/admin/category/">Категорії</a></li>
			<li><a href="/admin/products/">Товар</a></li>
			<li><a href="/admin/orders/">Замовлення</a></li>
			<li><a href="/admin/admins/">Адміністатори</a></li>
		</ul>


			<div class="adminBox">
				<a href="/admin/logout/">Вихід</a>
			</div>
		<?php }?>
	</div>



</div><?php }
}

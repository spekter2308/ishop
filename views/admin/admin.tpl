<div id="blockNewCategory">
	<div class="newCategory">
		<h4>Нова категорія:</h4>
		<input name="newCategoryName" id="newCategoryName" type="text" value="">
	</div>
	<div class="selectCategory">
		<h4>Додати до:</h4>
		<select name="generalCatId" id="">
			<option value="0">Головна категорія</option>
			{foreach $rsCategories as $item}
				<option value="{$item['id']}">{$item['name']}</option>
			{/foreach}
		</select>
	</div>
	<input type="button" onclick="newCategory();" value="Додати категорію">
</div>
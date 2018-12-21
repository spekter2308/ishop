<div id="categoriesControl">
	<h2>Управління категоріями</h2>

		{foreach $rsCategories as $item}
			<div class="categoryControl">
				<div class="catId">
					ID: {$item['id']}
				</div>
				<input type="edit" id="itemName_{$item['id']}" value="{$item['name']}">
				<select id="parentId_{$item['id']}">
					<option value="0">
						Головна категорія
					</option>
					{foreach $rsMainCategories as $mainItem}
						<option value="{$mainItem['id']}" {if $item['parent_id'] == $mainItem['id']} selected{/if}>
							{$mainItem['name']}
						</option>
					{/foreach}
				</select>
				<input type="button" value="Зберегти" onclick="updateCategory({$item['id']});">
			</div>
		{/foreach}

</div>

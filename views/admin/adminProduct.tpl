<div class="addProductContainer">
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
				{foreach $rsCategories as $category}
					<option value="{$category['id']}">
						{$category['name']}
					</option>
				{/foreach}
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
	{foreach $rsProducts as $item}
		<div class="editProduct">
			<div class="idProd">
				<h5>ID товару:  {$item['id']}</h5>
			</div>
			<div class="first-line">
				<div class="prodName">
					<h5>Ім'я</h5>
					<input type="edit" id="itemName_{$item['id']}" value="{$item['name']}">
				</div>
				<div class="prodPrice">
					<h5>Ціна</h5>
					<input type="edit" id="itemPrice_{$item['id']}" value="{$item['price']}">
				</div>
				<div class="prodCategory">
					<h5>Категорія</h5>
					<select id="itemCatId_{$item['id']}">
						<option value="0">Головна категорія</option>
						{foreach $rsCategories as $itemCat}
							<option value="{$itemCat['id']}" {if $item['category_id'] == $itemCat['id']} selected {/if}>{$itemCat['name']}</option>
						{/foreach}
					</select>
				</div>
				<div class="prodDesc">
					<h5>Опис</h5>
					<textarea id="itemDesc_{$item['id']}">
						{$item['description']}
					</textarea>
				</div>
			</div>
			<div class="second-line">
				<div class="prodStatus">
					<h5>Видалити</h5>
					<input type="checkbox" id="itemStatus_{$item['id']}" {if $item['status']==0} checked  {/if}">
				</div>
				{if $item['image']}
					<div class="prodImg">
						<img src="/images/products/{$item['image']}" alt="">
					</div>
				{/if}
				<div class="editProdImg">
					<form id="formImg" action="/admin/upload/" method="POST" enctype="multipart/form-data">
						<i class="fa fa-upload"></i>
						<div>
							<input id="file-input" type="file" name="file">
							<label for="file-input">Виберіть файл</label>
							<input type="hidden" name="itemId" value="{$item['id']}">
						</div>
					</form>
				</div>
			</div>
			<div class="editButton">
				<input type="submit" value="Зберегти" onclick="updateProduct('{$item['id']}');" form="formImg">
			</div>
		</div>
	{/foreach}
</div>
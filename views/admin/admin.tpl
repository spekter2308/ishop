{if isset($arAdmin)}

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

{else}

	{*Login form*}
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

{/if}
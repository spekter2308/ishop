<div id="leftColumn">

	<div class="leftMenu">
		<div class="menuCaption">Меню</div>
		<ul class="menu">
			{foreach $rsCategories as $item}
				<li class="mainMenu"><a href="/?controller=category&id={$item['id']}">{$item['name']}</a></li>

				{if isset($item['children'])}
					{foreach $item['children'] as $itemChildren}
						<li class="subMenu"><a href="/category/{$itemChildren['id']}/">{$itemChildren['name']}</a></li>
					{/foreach}
				{/if}

			{/foreach}
		</ul>
	</div>

	{*Розлогінювання*}
	<div id="userBox" class="hedime">
		<li><a href="/user/" id="displayName"></a></li>
		<li><a href="/user/logout/">Вихід</a></li>
	</div>


	{*Login form*}
	<div id="loginBox">
		<div class="dws-input">
			<div class="menuCaption">Авторизація</div>
			<div class="email input">
				<input type="text" id="loginEmail" name="loginEmail" placeholder="Email">
			</div>
			<div class="password input">
				<input type="password" id="loginPwd" name="loginPwd" placeholder="Пароль">
			</div>
			<div class="loginBtn">
				<input type="button" onclick="login();" value="Увійти">
			</div>
		</div>
	</div>


	{*Register form*}
	<div id="registerBox">
		<div class="menuCaption showHidden" onclick="showRegisterBox();">
			Реєстрація
		</div>
		<div class="registerBoxHidden">
		{*<img src="../images/register/men.png" alt="">*}
				<div class="email input">
					<input type="text" id="email" name="email" placeholder="email:">
				</div>
				<div class="password input">
					<input type="password" id="pwd1" name="pwd1" placeholder="пароль">
				</div>
				<div class="password input">
					<input type="password" id="pwd2" name="pwd2" placeholder="повторіть пароль">
				</div>
				<input type="button" onclick="registerNewUser();" value="Зареєструватись">
		</div>

		{*Cart with items*}
		<div class="menuCaption">Корзина</div>
		<div class="cartCaption">
			<a href="/cart/" title="Перейти в корзину">В корзині</a>
			<span id="cartCntItems">
				{if $cartCntItems > 0}
					{$cartCntItems}
				{else}пусто
				{/if}
			</span>
		</div>

	</div>





</div>




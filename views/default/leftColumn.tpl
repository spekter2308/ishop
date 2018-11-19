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
	{if isset($arUser)}
		<div id="userBox">
			<a href="/user/" id="displayName"><i class="fa fa-user"></i>{$arUser['displayName']}</a>
			<a href="/user/logout/"><i class="fa fa-sign-out"></i>Выход</a>
		</div>

	{else}
		<div id="userBox" class="hideme">
			<a href="/user/" id="displayName"></a>
			<br>
			<a href="/user/logout/">Выход</a>
		</div><br>

	{*Login form*}
	<div id="loginBox">
		<div class="dws-input">
			<div class="menuCaption">Авторизація</div>
			<div class="email input">
				<input type="email" id="loginEmail" name="loginEmail" placeholder="Email">
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
		<div id="registerBoxHidden">
		{*<img src="../images/register/men.png" alt="">*}
				<div class="email input">
					<input type="email" id="email" name="email" placeholder="email:">
				</div>
				<div class="password input">
					<input type="password" id="pwd1" name="pwd1" placeholder="пароль">
				</div>
				<div class="password input">
					<input type="password" id="pwd2" name="pwd2" placeholder="повторіть пароль">
				</div>
				<input type="button" onclick="registerNewUser();" value="Зареєструватись">
		</div>
	</div>
	{/if}


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




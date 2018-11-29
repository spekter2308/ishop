<h3 class="title">{$pageTitle}</h3>
<h4>Дані замовлення</h4>
<form id="frmOrder" action="/cart/saveorder/" method="POST">
		{foreach $rsProducts as $item name=products}
	<div class="orderData">
			<li>
				<a href="/product/{$item['id']}/">
					<img src="/images/products/{$item['image']}" alt="">
				</a>
			</li>
			<li><a href="href="/product/{$item['id']}/"">{$item['name']}</a></li>
			<li>{$item['cnt']}шт.</li>
			<li>{$item['realPrice']}грн.</li>
	</div>
		{/foreach}

	{if isset($arUser)}
		{$buttonClass = ""}
		<div id="orderUserInfoBox" class="orderUserInfoBox">
			<h2>Контактні дані</h2>
			{$name = $arUser['name']}
			{$phone = $arUser['phone']}
			{$address = $arUser['address']}
			<div class="customerName">
				<span>Ім'я і прізвище</span>
				<input type="text" id="name" name="name" value="{$name}">
			</div>
			<div class="customerPhone">
				<span>Телефон</span>
				<input type="text" id="phone" name="phone" value="{$phone}">
			</div>
			<div class="customerAddress">
				<span>Адреса</span>
				<input type="textarea" id="address" name="address" value="{$address}">
			</div>
		</div>
		<input {$buttonClass} id="btnSaveOrder" type="button" value="Оформити замовлення" onclick="saveOrder();">
	{else}
		{*Login form*}
		<div id="loginBox">
			<div class="dws-input">
				<div class="menuCaption">
					<h3>Авторизація</h3>
				</div>
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

		<br><span>або</span><br><br>

		{*Register form*}
		<div id="registerBox">
			<div class="menuCaption">
				<h3>Реєстрація нового користувача</h3>
			</div>
				{*<img src="../images/register/men.png" alt="">*}
				<div class="email input">
					<span>Еmail* :</span>
					<input type="email" id="email" name="email">
				</div>
				<div class="password input">
					<span>Пароль* :</span>
					<input type="password" id="pwd1" name="pwd1">
				</div>
				<div class="password input">
					<span>Повторіть пароль* :</span>
					<input type="password" id="pwd2" name="pwd2">
				</div>
				<div class="name input">
					<span>Ім'я* :</span>
					<input type="text" id="name" name="name">
				</div>
				<div class="phone input">
					<span>Телефон* :</span>
					<input type="text" id="phone" name="phone">
				</div>
				<div class="address input">
					<span>Адреса* :</span>
					<input type="textarea" id="address" name="address">
				</div>
				<input type="button" onclick="registerNewUser();" value="Зареєструватись">
			</div>
		{$buttonClass = "class='hideme'"}
	{/if}

</form>
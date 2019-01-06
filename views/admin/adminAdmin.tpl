{if isset($mainAdmin) and isset($arAdmin)}
<div class="adminContainer">
	<h4>Додати нового адміністратора</h4>
	<div id="newAdmin">
		<div class="newAdminName">
			<h5>Логін: </h5>
			<input type="text" id="newAdminName" name="newAdminName">
		</div>
		<div class="newAdminPassword">
			<h5>Пароль* :</h5>
			<input type="password" id="newAdminPassword" name="newAdminPassword">
		</div>

		<input type="button" onclick="addAdmin();" value="Додати">
	</div>

		{foreach $rsAdmins as $admins}
	<div class="admins">
		<div class="id">
				ID: {$admins['id']}
			</div>
			<div class="login">
				Login: {$admins['login']}
			</div>
	</div>
		{/foreach}
</div>


{else}

	{*Login form*}
	<div id="loginAdmin">
		<div class="dws-input">
			<div class="menuCaption">
				<h3>Авторизація адміністратора</h3>
				<h4>Введіть логін та пароль головного адміністратора</h4>
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
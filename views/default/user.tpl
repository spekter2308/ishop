
<h3 class="pageTitle">{$pageTitle}</h3>
<div id="updateUserData">
		<div class="userData">
			<div class="inputBox">
				<div class="labelText">Логін (email):</div>
				<input disabled class="userInput" value="{$arUser['email']}">
			</div>
			<div class="inputBox">
				<div class="labelText">Ім'я:</div>
				<input type="text" id="newName" name="newName" class="userInput" value="{$arUser['name']}">
			</div>
			<div class="inputBox">
				<div class="labelText">Телефон:</div>
				<input type="text" id="newPhone" name="newPhone" value="{$arUser['phone']}"
					   pattern="\d+">
			</div>
			<div class="inputBox">
				<div class="labelText">Адреса:</div>
				<input type="text" id="newAdress" name="newAdress" value="{$arUser['address']}">
			</div>
			<div class="inputBox">
				<div class="labelText">Новий пароль:</div>
				<input type="password" id="newPwd1" name="newPwd1" value="">
			</div>
			<div class="inputBox">
				<div class="labelText">Повтор нового паролю:</div>
				<input type="password" id="newPwd2" name="newPwd2" value="">
			</div>
			<div class="inputBox">
				<div class="labelText">Старий(нинішній) пароль:</div>
				<input type="password" id="curPwd" name="curPwd" value="">
			</div>
		</div>
	<input type="button" value="Зберегти зміни" class="button" onclick="updateUserData();">
	</div>

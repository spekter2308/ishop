
<div id="updateUserData">
	<h3 class="pageTitle">{$pageTitle}</h3>
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
		<input type="button" value="Зберегти зміни" class="button" onclick="updateUserData();">
	</div>
</div>

	<div class="userOrders">
		<h3>Мої замовлення</h3>
		{if !$rsUserOrders}
			<span>Немає замовлень</span>
		{else}
			{foreach $rsUserOrders as $item}
				<div class="userOrder">
					<div class="orderNum">№ {$item['id']}</div>
					<div class="orderDate">{$item['date_created']}</div>
					<div class="listImg"><img src="/images/products/{$item['children'][0]['image']}" alt=""></div>
					<div class="orderCount">{$item['count']} шт.</div>
					<div class="orderSum">на {$item['summary']} грн</div>
					{if $item['status'] == 1}
						<div class="orderStatus-green"><span>Оплачено</span></div>
					{else}
						<div class="orderStatus-red"><span>Не оплачено</span></div>
					{/if}
				</div>
				<div class="userOrderInfo-hidden">
					<div class="userOrderInfo">
						<div class="userOrderInfo-left">
							{foreach $item['children'] as $child}
								<div class="orderInfo-left">
									<div class="prodImg">
										<img src="/images/products/{$child['image']}">
									</div>
									<div class="prodName">
										<a href="/product/{$child['id']}">{$child['name']}</a>
									</div>
									<div class="prodPrice">
										<div>{$child['price']} грн</div>
										<div>{$child['amount']} шт</div>
									</div>
									<div class="summaryInfo">
										{$child['price'] * $child['amount']} грн
									</div>
								</div>
							{/foreach}
						</div>
						<div class="orderInfo-right">
							<h4>Додаткова інформація</h4>
								<div class="additionalInfo">
									<span>{$item['comment']}</span></div>
						</div>
						<div class="orderInfo-bottom">
							<p>Всього до оплати</p>
							<p>{$item['summary']} грн</p>
						</div>
					</div>
				</div>

			{/foreach}
		{/if}
	</div>
	<script>
		$(document).ready(function(){
			$('.userOrder').click(function(){
				$(this).toggleClass('in').next().slideToggle();
			});
		});
	</script>

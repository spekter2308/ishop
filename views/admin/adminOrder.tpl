<div class="adminOrderContainer">
	<h4>Керування замовленнями</h4>

	{if !$rsOrders}
		Немає замовлень
	{else}
		{foreach $rsOrders as $item}
			<div class="mainOrder">
				<div class="orderNum">
					<span>№ {$item['id']}</span>
				</div>
				<div class="orderDateCreate">
					<h5>Дата створення</h5>
					<span>{$item['date_created']}</span>
				</div>
				<div class="orderDateMod">
					<h5>Дата зміни замовлення</h5>
					<span>{$item['date_modification']}</span>
				</div>
				<div class="orderStat">
					<h5>Статус оплати</h5>
					{if $item['status']}
						<input type="checkbox" id="itemStatus_{$item['id']}" checked="checked">
						<span class="orderStat-green">Оплачено</span>
					{else}
						<input type="checkbox" id="itemStatus_{$item['id']}">
						<span class="orderStat-red">Не оплачено</span>
					{/if}
				</div>
				<div class="orderDataPay">
					<h5>Дата оплати</h5>
					{if is_null($item['date_payment']) or $item['date_payment'] <= 0}
						<input type="date" id="datePayment_{$item['id']}" value="{$item['date_payment']}">
					{else}
						<input type="datetime" id="datePayment_{$item['id']}" value="{$item['date_payment']}">
					{/if}

					<input type="button" value="Зберегти" onclick="updateDatePayment('{$item['id']}');">
				</div>
			</div>
			<div class="mainOrderInfo-hidden">
				<div class="mainOrderInfo">
					<div class="mainOrderInfo-left">
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
		$('.orderNum').click(function(){
			var parent = $(this).parent();

			$(this).toggleClass('in');
			$(parent).next().slideToggle();
		});
	});
</script>

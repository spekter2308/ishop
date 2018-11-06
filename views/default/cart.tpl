<div class="ordersData">
	<h3>{$pageTitle}</h3>
	{if !$rsProducts}
		<h4 class="emptyCat">
			В корзині пусто
		</h4>
	{else}
	<h4>Дані замовлення</h4>
</div>
<div class="cartOrdersHead">
		<h5>№</h5>
		<h5>Назва</h5>
		<h5>Кількість</h5>
		<h5>Ціна за одиницю</h5>
		<h5>Ціна</h5>
		<h5>Дія</h5>
</div>

{foreach $rsProducts as $item name=products}
	<div class="cartOrdersInfo">
		<li>{$smarty.foreach.products.iteration}</li>
		<li class="prodName">
			<a href="/product/{$item['id']}/">{$item['name']}</a>
		</li>
		<input name="itemCnt_{$item['id']}" id="itemCnt_{$item['id']}" type="text" value="1" onchange="conversionPrice({$item['id']});">
		<span id="itemPrice_{$item['id']}" value="{$item['price']}">{$item['price']}</span>
		<span id="itemRealPrice_{$item['id']}">{$item['price']}</span>
		<li>
			<a href="#" id="removeCart_{$item['id']}" onclick="removeFromCart({$item['id']}); return false;"
			   title="Видалити з корзини">Видалити</a>
			<a href="#" class="hideme" id="addCart_{$item['id']}" onclick="addToCart({$item['id']}); return false;"
			   title="Відновити елемент">Відновити</a>
		</li>
	</div>

{/foreach}

{/if}

{*чомусь не бачить закриття у footer*}
</div>

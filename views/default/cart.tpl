<div class="ordersData">
	<h3>{$pageTitle}</h3>
	{if !$rsProducts}
		<h4 class="emptyCat">
			В корзині пусто
		</h4>
	{else}
	<h4>Дані замовлення</h4>
</div>
<form action="/cart/order/" method="POST">

{foreach $rsProducts as $item name=products}
	<div class="cartOrdersInfo">
		<div class="cart-img">
			<li>{$smarty.foreach.products.iteration}</li>
			<li>
				<a href="#" id="removeCart_{$item['id']}" onclick="removeFromCart({$item['id']}); return false;"
				   title="Видалити з корзини">Видалити</a>
				<a href="#" class="hideme" id="addCart_{$item['id']}" onclick="addToCart({$item['id']}); return false;"
				   title="Відновити елемент">Відновити</a>
			</li>
			<li>
				<a href="/product/{$item['id']}/">
					<img src="/images/products/{$item['image']}" alt="">
				</a>
			</li>
		</div>
		<div class="cart-title">
			<li class="prodName">
				<a href="/product/{$item['id']}/">{$item['name']}</a>
			</li>
			<li>
				<span id="itemPrice_{$item['id']}" value="{$item['price']}">{$item['price']}грн</span>
				<input name="itemCnt_{$item['id']}" id="itemCnt_{$item['id']}" type="text" value="1" onchange="conversionPrice({$item['id']});">
			</li>
		</div>
		<div class="cart-sum">
			<h5>Сума</h5>
			<span id="itemRealPrice_{$item['id']}">{$item['price']}</span><span>грн</span>
		</div>

	</div>

{/foreach}
	<input type="submit" value="Оформити замовлення">
</form>
{/if}

{*чомусь не бачить закриття у footer*}
</div>

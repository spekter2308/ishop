{*шаблон головної сторінки*}
<div class="categoryProducts">
	{foreach $rsProducts as $item}
		<div class="products">
			<a href="/product/{$item['id']}/">
				<img src="/images/products/{$item['image']}" alt="">
			</a>
			<a href="/product/{$item['id']}/">{$item['name']}</a>
		</div>
	{/foreach}
</div>

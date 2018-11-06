	<h1 class="pageTitle">{$pageTitle}</h1>
	<div class="categoryName">
		{foreach $rsChildCats as $item}
			<h2>
				<li><a href="/category/{$item['id']}/">{$item['name']}</a></li>
			</h2>
		{/foreach}
	</div>

		<div class="categoryProducts">
			{foreach $rsProducts as $item}
				<div class="products">
					<li><a href="/product/{$item['id']}/">
							<img src="/images/products/{$item['image']}" alt="">
						</a>
						<a href="/product/{$item['id']}/">{$item['name']}</a>
					</li>
				</div>
			{/foreach}
		</div>


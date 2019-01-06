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

<div class="paginator">
	{if $paginator['currentPage'] != 1}
		<span class="p_prev"><a href="{$paginator['link']}{$paginator['currentPage']-1}"><i class="fa
		fa-angle-left"></i></a></span>
	{/if}

	<strong><span>{$paginator['currentPage']}</span></strong>

	{if $paginator['currentPage'] < $paginator['pageCnt']}
		<span class="p_next"><a href="{$paginator['link']}{$paginator['currentPage']+1}"><i class="fa fa-angle-right"></i></a></span>
	{/if}
</div>
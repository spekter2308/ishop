{* Сторінка продукта *}
<div class="prod-wrap">
	<h3>{$rsProduct['name']}</h3>

	<img src="/images/products/{$rsProduct['image']}" alt="">
	<br>
	Вартість: {$rsProduct['price']}

	<br>
	<a id="removeCart_{$rsProduct['id']}" {if ! $itemInCart} class="hideme" {/if} href="#" onclick="removeFromCart({$rsProduct['id']}); return false;" alt="Видалити з корзини">Видалити з корзини</a>
	<a id="addCart_{$rsProduct['id']}" {if $itemInCart} class="hideme" {/if} href="#" onclick="addToCart({$rsProduct['id']}); return false;" alt="Додати в
корзину">Додати в корзину</a>
	<h3><br><br>Опис</h3>
</div>
<p>{$rsProduct['description']}</p>
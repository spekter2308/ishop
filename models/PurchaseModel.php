<?php

/**
 * Модель для таблиці продуктів (purchase)
 *
 */

/**
 * Внесення в БД даних продуктів з прив'язкою до замовлення
 *
 * @param integer $orderId ID замолвення
 * @param array $cart масив корзини
 * @return bool TRUE у випадку успішного додавання до БД
 */
function setPurchaseForOrder($orderId, $cart){
	global $db;

	$sql = "INSERT INTO purchase (`order_id`, `product_id`, `price`, `amount`) VALUES ";
	$values = array();
	//формуємо масив строк для запиту для кожного товару
	foreach ($cart as $item) {
		$values[] = "('{$orderId}', '{$item['id']}', '{$item['price']}', '{$item['cnt']}')";
	}

	$sql .= implode($values, ', ');
	$rs = mysqli_query($db, $sql);

	return $rs;
}

/**
 * Отримати всі дані покупок по ID замовлення
 *
 * @param integer $orderId - ID замовлення
 * @return array $rs - масив з даними про покупки по замовленню
 */
function getPurcaseForOrders($orderId){
	global $db;

	$sql = "SELECT purchase.*, products.name, products.image FROM purchase INNER JOIN products ON purchase.product_id = products.id WHERE  purchase.order_id = '{$orderId}'";
	$rs = mysqli_query($db, $sql);
	$rs = createSmartyRsArray($rs);

	return $rs;
}
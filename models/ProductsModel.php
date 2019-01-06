<?php

/**
 * Модель для таблиці продукції
 *
 */

/**
 * Отримуємо товари з пагінатором для кожної сторінки
 *
 * @param integer null $limit ліміт товарів
 * @return array масив товарів
 */
function getLastProducts($offset = 0, $limit = 9){
	global $db;
	$sqlCnt = "SELECT count(id) as cnt FROM `products` WHERE status = '1'";
	$rs = mysqli_query($db, $sqlCnt);
	$cnt = createSmartyRsArray($rs);
	$sql = "SELECT * FROM `products` ORDER BY id DESC";
	$sql .= " LIMIT {$offset}, {$limit}";

	$rs = mysqli_query($db, $sql);
	$rows = createSmartyRsArray($rs);

	return array($rows, $cnt[0]['cnt']);
}


/**
 * Отримати продукти для категорії $catId
 *
 * @param integer $catId ID категорії
 * @return array масив продуктів
 */
function getProductsByCat($catId){
	global $db;
	$sql = "SELECT * FROM products WHERE category_id = $catId AND `status` = 1";
	$rs = mysqli_query($db, $sql);

	return createSmartyRsArray($rs);
}

/**
 *Отримати дані продукта по ID
 *
 * @param integer $id ID продукта
 * @return array масив даних продукта
 */
function getProductById($id){
	global $db;
	$id = intval($id);
	$sql = "SELECT * FROM products WHERE id = $id";
	$rs = mysqli_query($db, $sql);

	return mysqli_fetch_assoc($rs);
}

/**
 * Отримати дані товарів в корзині по Ids
 *
 * @param array $itemIds ID товарів у корзині
 * @return array масив продуктів
 */
function getProductsFromArray($itemIds){
	global $db;
	$strIds = implode($itemIds, ', ');
	$sql = "SELECT * FROM products WHERE id IN ($strIds)";
	$rs = mysqli_query($db, $sql);

	return createSmartyRsArray($rs);
}

/**
 * Вибірка всіх товарів
 *
 * @return array масив всіх товарів
 */
function getProducts(){
	global $db;

	$sql = "SELECT * FROM products ORDER BY `id` DESC";
	$rs = mysqli_query($db, $sql);

	return createSmartyRsArray($rs);
}

/**
 * Додавання товару
 *
 * @param string $itemName ім'я товару
 * @param float $itemPrice ціна товару
 * @param string $itemDesc опис товару
 * @param string $itemCat ID категорії, якій належить товар
 * @return boolean результат виконання
 */
function insertProduct($itemName, $itemPrice, $itemDesc, $itemCat){
	global $db;

	$sql = "INSERT into products SET `name`='{$itemName}', `price`='{$itemPrice}', `description`='{$itemDesc}', `category_id`='{$itemCat}'";

	$rs = mysqli_query($db, $sql);

	return $rs;
}

/**
 * Оновлення даних по товари
 *
 * @param $itemId ID товару
 * @param $itemName Ім'я товару
 * @param $itemPrice Ціна товару
 * @param $itemStatus Статус видалення
 * @param $itemDesc Опис товару
 * @param $itemCat Категорія, до якої належить
 * @param null $newFileName Зображення товару
 */
function updateProduct($itemId, $itemName, $itemPrice, $itemStatus, $itemDesc, $itemCat, $newFileName = null){
	global $db;
	$set = array();

	if($itemName){
		$set[] = "`name` = '{$itemName}'";
	}

	if($itemPrice > 0){
		$set[] = "`price` = '{$itemPrice}'";
	}

	if($itemStatus !== null){
		$set[] = "`status` = '{$itemStatus}'";
	}

	if($itemDesc !== null){
		$set[] = "`description` = '{$itemDesc}'";
	}

	if($itemCat !== null){
		$set[] = "`category_id` = '{$itemCat}'";
	}

	if($newFileName !== null){
		$set[] = "`image` = '{$newFileName}'";
	}

	$setStr = implode($set, ", ");
	$sql = "UPDATE products SET {$setStr} WHERE `id` = '{$itemId}'";

	$rs = mysqli_query($db, $sql);

	return $rs;
}

/**
 * Завантаження зображення
 *
 * @param $itemId ID товару
 * @param $newFileName нове ім'я зображення
 */
function updateProductImage($itemId, $newFileName){
	$rs = updateProduct($itemId, null, null, null, null, null, $newFileName);

	return $rs;
}
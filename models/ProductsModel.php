<?php

/**
 * Модель для таблиці продукції
 *
 */

/**
 * Отримуємо останні додані товари
 *
 * @param integer null $limit ліміт товарів
 * @return array масив товарів
 */
function getLastProducts($limit = null){
	global $db;
	$sql = "SELECT * FROM products ORDER BY id DESC";
	if($limit){
		$sql .= " LIMIT {$limit}";
	}
	$rs = mysqli_query($db, $sql);

	return createSmartyRsArray($rs);
}


/**
 * Отримати продукти для категорії $catId
 *
 * @param integer $catId ID категорії
 * @return array масив продуктів
 */
function getProductsByCat($catId){
	global $db;
	$sql = "SELECT * FROM products WHERE category_id = $catId";
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
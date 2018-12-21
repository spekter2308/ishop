<?php

/**
 * Модель для таблиці категорій (categories)
 *
 */

/**
 * Отримати дочірні категорії
 *
 * @param integer $catId ID категорії
 * return array масив дочірніх категорій
 */
function getChildrenForCat($catId){
	global $db;
	$sql = "SELECT * FROM categories WHERE parent_id = $catId";
	$rs = mysqli_query($db, $sql);

	return createSmartyRsArray($rs);
}

/**
 * Отримати головні категорії з прив'язками дочірніх
 *
 * @return array масив категорій
 */
function getAllMainCatsWithChildren(){
	global $db;
	$sql = 'SELECT * FROM categories WHERE parent_id = 0';
	$rs = mysqli_query($db, $sql);

	$smartyRs = array();
	while ($row = mysqli_fetch_assoc($rs)){
		$rsChildren = getChildrenForCat($row['id']);
		if ($rsChildren){
			$row['children'] = $rsChildren;
		}

		$smartyRs[] = $row;
	}

	return $smartyRs;
}

/**
 * Отримати дані по id
 *
 * @param integer $catId ID категорії
 * @return array масив - строка категорії
 */
function getCatById($catId){
	global $db;
	$catId = intval($catId);
	$sql = "SELECT * FROM categories WHERE id = $catId";

	$rs = mysqli_query($db, $sql);

	return mysqli_fetch_assoc($rs);
}

/**
 * Отримати всі головні категорії
 *
 * @return array масив категорій
 */
function getAllMainCategories(){
	global $db;

	$sql = "SELECT * FROM categories WHERE `parent_id` = 0";
	$rs = mysqli_query($db, $sql);

	return createSmartyRsArray($rs);
}

/**
 * Отримати всі категорії
 *
 * @return array масив категорій
 */
function getAllCategories(){
	global $db;

	$sql = "SELECT * FROM categories ORDER BY `parent_id` ASC";
	$rs = mysqli_query($db, $sql);

	return createSmartyRsArray($rs);
}

/**
 * Додавання нової категорії
 *
 * @param string $catName Назва категорії
 * @param integer $catParentId ID батьківської категорії
 * @return integer id нової категорії
 */
function insertNewCategory($catName, $catParentId = 0){
	global $db;

	$sql = "INSERT INTO categories (`parent_id`, `name`) VALUES ('{$catParentId}', '{$catName}')";
	$rs = mysqli_query($db, $sql);

	$id = $db->insert_id;
	return $id;
}

/**
 *  Модифікація існуючої категорії (зміна назви, зміна підкатегорій)
 *
 * @param $catId ID категорії
 * @param $catNewName Нова назва категорії
 * @param $catParentId ID батьківської категорії
 * @return bool результат виконання
 */
function updateCategory($catId, $catNewName, $catParentId){
	global $db;

	$sql = "UPDATE categories SET `name`='{$catNewName}', `parent_id`='{$catParentId}' WHERE `id`='{$catId}'";
	$rs = mysqli_query($db, $sql);

	return $rs;
}
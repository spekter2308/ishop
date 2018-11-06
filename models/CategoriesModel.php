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
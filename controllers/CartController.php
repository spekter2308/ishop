<?php


/**
 * CartController
 *
 * Контролер роботи з корзиною (/cart/)
 */

//підключаємо моделі
include_once '../models/CategoriesModel.php';
include_once '../models/ProductsModel.php';

/**
 * Додавання продукту в корзину
 *
 * @param integer id GET параметр - ID продукту, який додається
 * return json інформація про операцію (успіх, кількість елементів в корзині)
 */
function addtocartAction(){
	$itemId = isset($_GET['id']) ? intval($_GET['id']) : null;
	if(!$itemId) return false;

	$resData = array();

	//якщо значення не знайдено, то додаємо
	if(isset($_SESSION['cart']) && array_search($itemId, $_SESSION['cart']) === false){
		$_SESSION['cart'][] = $itemId;

		$resData['success'] = 1;
		$resData['cntItems'] = count($_SESSION['cart']);
	} else {
		$resData['success'] = 0;
	}
	echo json_encode($resData);
}

/**
 * Видалення продукту з корзини
 *
 * @param integer id GET параметр - ID продукту, який видаляється
 * return json інформація про операцію (успіх, кількість елементів в корзині)
 */
function removefromcartAction(){
	$itemId = isset($_GET['id']) ? intval($_GET['id']) : null;
	if(!$itemId) exit();

	$resData = array();
	$key = array_search($itemId, $_SESSION['cart']);
	if($key !== false){
		unset($_SESSION['cart'][$key]);
		$resData['success'] = 1;
		$resData['cntItems'] = count($_SESSION['cart']);
	} else {
		$resData['success'] = 0;
	}

	echo json_encode($resData);
}

/**
 * Формування сторінки корзини
 *
 * @link /cart/
 */
function indexAction($smarty){
	$itemsIds = isset($_SESSION['cart']) ? $_SESSION['cart'] : array();

	$rsCategories = getAllMainCatsWithChildren();
	$rsProducts = getProductsFromArray($itemsIds);

	$smarty->assign('pageTitle', 'Корзина');
	$smarty->assign('rsCategories', $rsCategories);
	$smarty->assign('rsProducts', $rsProducts);

	loadTemplate($smarty, 'header');
	loadTemplate($smarty, 'cart');
	loadTemplate($smarty, 'footer');
}
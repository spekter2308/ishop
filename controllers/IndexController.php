<?php

/**
 * Контролер головної сторінки
 */

//підключаємо моделі
include_once '../models/CategoriesModel.php';
include_once '../models/ProductsModel.php';

function testAction(){
	echo "IndexController.php -> testAction";
}

/**
 * Формування головної сторінки сайта
 *
 * @param object $smarty шаблонізатор
 */
function indexAction($smarty){

	//>Пагінатор
	$paginator = array();
	$paginator['perPage'] = 9;
	$paginator['currentPage'] = isset($_GET['page']) ? $_GET['page'] : 1;
	$paginator['offset'] = ($paginator['currentPage'] * $paginator['perPage']) - $paginator['perPage'];
	$paginator['link'] = '/index/?page=';

	list($rsProducts, $allCnt) = getLastProducts($paginator['offset'], $paginator['perPage']);

	$paginator['pageCnt'] = ceil($allCnt / $paginator['perPage']);
	$smarty->assign('paginator', $paginator);
	//<

	$rsCategories = getAllMainCatsWithChildren();

	$smarty->assign("pageTitle", "Головна сторінка сайту");
	$smarty->assign("rsCategories", $rsCategories);
	$smarty->assign('rsProducts', $rsProducts);

   	loadTemplate($smarty, 'header');
   	loadTemplate($smarty, 'index');
   	loadTemplate($smarty, 'footer');
}


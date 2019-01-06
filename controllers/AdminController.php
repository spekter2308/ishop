<?php

/**
 * AdminController.php
 *
 * Контролер бекенду сайту (/admin/)
 *
 */

//підключаємо моделі
include_once "../models/CategoriesModel.php";
include_once "../models/ProductsModel.php";
include_once "../models/OrdersModel.php";
include_once "../models/PurchaseModel.php";
include_once "../models/AdminsModel.php";

$smarty->setTemplateDir(TemplateAdminPrefix);
$smarty->assign('TemplateAdminWebPath', TemplateAdminWebPath);

function indexAction($smarty){

	$rsCategories = getAllMainCategories();

	$smarty->assign('rsCategories', $rsCategories);
	$smarty->assign('PageTitle', 'Керування сайтом');

	loadTemplate($smarty, 'adminHeader');
	loadTemplate($smarty, 'admin');
	loadTemplate($smarty, 'adminFooter');
}

/**
 * AJAX додавання нової категорії
 *
 * @return json масив даних про додавання категорії
 */
function addnewcatAction(){
	$catName = $_POST['newCategoryName'];
	$catParentId = $_POST['generalCatId'];

	$res = insertNewCategory($catName, $catParentId);
	if($res){
		$resData['success'] = true;
		$resData['message'] = "Категорія успішно додана";
	} else {
		$resData['success'] = false;
		$resData['message'] = "Помилка додавання категорії";
	}

	echo json_encode($resData);
	return;
}

/**
 * Сторінка керування категоріями
 *
 * @param type $smarty
 */
function categoryAction($smarty){
	$rsCategories = getAllCategories();
	$rsMainCategories = getAllMainCategories();

	$smarty->assign('rsCategories', $rsCategories);
	$smarty->assign('rsMainCategories', $rsMainCategories);
	$smarty->assign('PageTitle', 'Керування сайтом');

	loadTemplate($smarty, 'adminHeader');
	loadTemplate($smarty, 'adminCategory');
	loadTemplate($smarty, 'adminFooter');
}

/**
 * AJAX модифікація існуючої категорії
 *
 * @param $catId ID категорії
 * @return json масив даних про оновлення категорії
 */
function updatecategoryAction(){
	$itemId = $_POST['itemId'];
	$parentId = $_POST['parentId'];
	$categoryNewName = $_POST['newName'];

	if(!isset($categoryNewName) OR trim($categoryNewName) === ''){

		$resData['success'] = false;
		$resData['message'] = "Введіть ім'я категорії";
	} else {

		$res = updateCategory($itemId, $categoryNewName, $parentId);

		if ($res) {
			$resData['success'] = true;
			$resData['message'] = "Зміни успішно збережено";
		} else {
			$resData['success'] = false;
			$resData['message'] = "Помилка збереження";
		}
	}

	echo json_encode($resData);
	return;
}

/**
 * Сторінка керування товарами
 *
 * @param type $smarty
 */
function productsAction($smarty){
	$rsCategories = getAllCategories();
	//d($rsCategories, 1);
	$rsProducts = getProducts();
	//d($rsProducts, 1);

	$smarty->assign('rsCategories', $rsCategories);
	$smarty->assign('rsProducts', $rsProducts);
	$smarty->assign('PageTitle', 'Керування товарами');

	loadTemplate($smarty, 'adminHeader');
	loadTemplate($smarty, 'adminProduct');
	loadTemplate($smarty, 'adminFooter');
}

/**
 * AJAX додавання товару
 *
 * @return json масив даних про додавання товару
 */
function addproductAction(){
	$itemName = $_POST['itemName'];
	$itemPrice = $_POST['itemPrice'];
	$itemDesc = $_POST['itemDesc'];
	$itemCat = $_POST['itemCatId'];

	if(checkEmptyString($itemName) OR checkEmptyString($itemPrice) OR checkEmptyString($itemDesc)){
		if(checkEmptyString($itemName)){
			$resData['success'] = false;
			$resData['message'] = "Введіть ім'я товару";
		}
		if(checkEmptyString($itemPrice)){
			$resData['success'] = false;
			$resData['message'] = "Введіть ціну товару";
		}
		if(checkEmptyString($itemDesc)){
			$resData['success'] = false;
			$resData['message'] = "Введіть опис товару";
		}

	} else {
		$res = insertProduct($itemName, $itemPrice, $itemDesc, $itemCat);

		if($res){
			$resData['success'] = true;
			$resData['message'] = "Зміни успішно внесені";
		} else {
			$resData['success'] = false;
			$resData['message'] = "Помилка зміни даних";
		}
	}

	echo json_encode($resData);
	return;
}

/**
 * Зміна даних товару
 *
 * @return json масив даних про оновлення інформації про товар
 */
function updateproductAction(){
	$itemId = $_POST['itemId'];
	$itemName = $_POST['itemName'];
	$itemPrice = $_POST['itemPrice'];
	$itemStatus = $_POST['itemStatus'];
	$itemDesc = $_POST['itemDesc'];
	$itemCat = $_POST['itemCatId'];

	$res = updateProduct($itemId, $itemName, $itemPrice, $itemStatus, $itemDesc, $itemCat);

	if($res) {
		$resData['success'] = true;
		$resData['message'] = "Зміни успішно внесені";
	} else {
		$resData['success'] = false;
		$resData['message'] = "Помилка змін даних";
	}

	echo json_encode($resData);
	return;
}

/**
 * Для завантаження на фото на сервер
 *
 */
function uploadAction(){
	$maxSize = 2 * 1024 * 1024;

	$itemId = $_POST['itemId'];
	//отримаємо розширення файлу, який завантажується
	$ext = pathinfo($_FILES['file']['name'], PATHINFO_EXTENSION);
	//створюємо ім'я файлу
	$newFileName = $itemId . '.' . $ext;

	if($_FILES["file"]["size"] > $maxSize){
		echo "Розмір файла перевищує 2 мегабайти";
		return;
	}

	//Чи завантажений файл
	if(is_uploaded_file($_FILES['file']['tmp_name'])){

		//якщо файл завантажено, то переміщуємо його із тимчасової директорії в кінцеву
		$res = move_uploaded_file($_FILES['file']['tmp_name'], $_SERVER['DOCUMENT_ROOT'] . '/images/products/' .
			$newFileName);
		updateProductImage($itemId, $newFileName);
	}
	redirect('/admin/products/');
}

/**
 * Сторінка керування замовленнями
 */
function ordersAction($smarty){
	$rsOrders = getOrders();

	$smarty->assign('rsOrders', $rsOrders);
	$smarty->assign('PageTitle', 'Замовлення');

	loadTemplate($smarty, 'adminHeader');
	loadTemplate($smarty, 'adminOrder');
	loadTemplate($smarty, 'adminFooter');
}

/**
 * Оновлення дати та статусу оплати
 *
 */
function updatedatepaymentAction(){
	$itemId = $_POST['itemId'];
	$itemDatePayment = $_POST['itemDatePayment'];

	$itemStatus = $_POST['itemStatus'];

	$res = updateDatePayment($itemId, $itemDatePayment, $itemStatus);

	if($res) {
		$resData['success'] = true;
		$resData['message'] = "Дата і статус оновлено";
	} else {
		$resData['success'] = false;
		$resData['message'] = "Помилка змін даних";
	}

	echo json_encode($resData);
	return;
}

/**
 * AJAX авторизація нового користувача
 *
 * @return json масив даних нового користувача
 */
function loginAction(){
	$login = isset($_REQUEST['loginAdmin']) ? $_REQUEST['loginAdmin'] : null;
	$login = trim($login);

	$pwd = isset($_REQUEST['loginPwd']) ? $_REQUEST['loginPwd'] : null;
	$pwd = trim($pwd);

	$adminData = loginAdmin($login, $pwd);
	$mainAdmin = checkMainAdmin($login, $pwd);
	if($mainAdmin){
		$_SESSION['mainAdmin'] = 1;
	}

	if($adminData['success']){
		$adminData = $adminData[0];

		$_SESSION['admin'] = $adminData;

		$resData = $_SESSION['admin'];
		$resData['success'] = true;
	} else {
		$resData['success'] = false;
		$resData['message'] = "Невірний логін або пароль";
	}

	echo json_encode($resData);
}

/**
 * Вихід з облікового запису користувача (розлогінювання)
 */
function logoutAction(){
	if(isset($_SESSION['admin']) or isset($_SESSION['mainAdmin'])){
		unset($_SESSION['admin']);
		unset($_SESSION['mainAdmin']);
	}
	redirect('/admin/');
}

/**
 * Відображення та додавання адміністраторів
 */
function adminsAction($smarty){
	$rsAdmins = getAdmins();
	$mainAdmin = isset($_SESSION['mainAdmin']) ? $_SESSION['mainAdmin'] : null;


	$smarty->assign('rsAdmins', $rsAdmins);
	$smarty->assign('mainAdmin', $mainAdmin);
	$smarty->assign('PageTitle', 'Адміністратори сайту');

	loadTemplate($smarty, 'adminHeader');
	loadTemplate($smarty, 'adminAdmin');
	loadTemplate($smarty, 'adminFooter');
}

/**
 * Додавання нового адміністратора
 */
function addnewadminAction(){
	$login = isset($_POST['newAdminName']) ? $_POST['newAdminName'] : null;
	$pwd = isset($_POST['newAdminPassword']) ? $_POST['newAdminPassword'] : null;
	$pwd = md5($pwd);

	$res = addNewAdmin($login, $pwd);
	if($res){
		$resData['success'] = true;
		$resData['message'] = "Додано нового адміністратора";
	} else {
		$resData['success'] = false;
		$resData['message'] = "Помилка додавання";
	}

	echo json_encode($resData);
	return;
}
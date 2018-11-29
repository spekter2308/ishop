<?php


/**
 * CartController
 *
 * Контролер роботи з корзиною (/cart/)
 */

//підключаємо моделі
include_once '../models/CategoriesModel.php';
include_once '../models/ProductsModel.php';
include_once '../models/OrdersModel.php';
include_once '../models/PurchaseModel.php';

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

/**
 * 	Формування сторінки замовлення
 *
 */
function orderAction($smarty){
	 //отримуємо масив ідендифікаторів (ID) продуктів корзини
	$itemIds = isset($_SESSION['cart']) ? $_SESSION['cart'] : null;
	//якщо корзина пуста, то редиректимо в корзину
	if(!$itemIds){
		redirect('/cart/');
		return;
	}

	//отримуємо з масиву $_POST кількість товарів, які купуються
	$itemsCnt = array();
	foreach ($itemIds as $item) {
		//формуємо ключ для масиву POST
		$postVar = 'itemCnt_' . $item;
		//стоворюємо елемент масиву кількості купленого товару
		//ключ масиву - ID товару, значення масиву - кількість товару
		//$itemCnt[1] = 3; товар з ID == 1 купують 3 штуки
		$itemsCnt[$item] = isset($_POST[$postVar]) ? $_POST[$postVar] : null;
	}

	//отримуємо список продуктів по масиву корзини
	$rsProducts = getProductsFromArray($itemIds);

	//додаємо кожному продукту додаткове поле
	//"realPrice" = кількість продуктів * на ціну продукту
	//"cnt"  = кількість товару, який купують

	//&$item - для того, щоб при зміні змінної $item мінявся і елемент масиву $rsProducts
	$i = 0;
	foreach ($rsProducts as &$item){
		$item['cnt'] = isset($itemsCnt[$item['id']]) ? $itemsCnt[$item['id']] : 0;
		if($item['cnt']){
			$item['realPrice'] = $item['cnt'] * $item['price'];
		} else {
			//якщо вийшло, що ковар в корзині є, а кількість рівна нулю, то видаляємо товар
			unset($rsProducts[$i]);
		}
		$i++;
	}

	if(!$rsProducts) {
		echo "Корзина пуста";
		return;
	}

	//отриманий масив товарів, які купують розміщуємо у сесійній змінній
	$_SESSION['saleCart'] = $rsProducts;

	//hideLoginBox змінна - флаг для того, щоб сховати блоки логіна та реєстрації в боковій панелі
	if(!isset($_SESSION['user'])){
		$smarty->assign('hideLoginBox', 1);
	}

	$rsCategories = getAllMainCatsWithChildren();

	$smarty->assign('pageTitle', 'Замовлення');
	$smarty->assign('rsCategories', $rsCategories);
	$smarty->assign('rsProducts', $rsProducts);

	loadTemplate($smarty, 'header');
	loadTemplate($smarty, 'order');
	loadTemplate($smarty, 'footer');
}

/**
 * AJAX функція збереження замовлення
 *
 * @param array $_SESSION['saleCard'] масив продуктів, які купуються
 * @return json інформація про результат виконання
 */
function saveorderAction(){
	//отримує масив товарів, які купуються
	$cart = isset($_SESSION['saleCart']) ? $_SESSION['saleCart'] : null;
	//якщо корзина пуста, то виводимо відповідь з помилкою в форматі json і виходимо з фунткції
	if(!$cart){
		$resData['success'] = false;
		$resData['message'] = 'Немає товарів для замовлення';
		echo json_encode($resData);
		return;
	}

	$name = isset($_POST['name']) ? htmlspecialchars($_POST['name']) : null;
	$phone = $_POST['phone'] ? htmlspecialchars($_POST['phone']) : null;
	$address = $_POST['address'] ? htmlspecialchars($_POST['address']) : null;
	//якщо не всі поля заповнені, то виводимо відповідь з помилкою в форматі json і виходимо з функції
	//d($phone, 1);
	if (!$name || !$phone || !$address){
		$resData['success'] = false;
		$resData['message'] = 'Заповніть пропущені поля';
		echo json_encode($resData);
		return;
	}

	//створюємо нове замовлення і отримуємо його ID
	$orderId = createNewOrder($name, $phone, $address);

	// якщо замовлення не створено, то видаємо помилку і завершуємо функцію
	if (!$orderId) {
		$resData['success'] = false;
		$resData['message'] = 'Помилка створення заказа';
		echo json_encode($resData);
		return;
	}

	//зберігаємо товари для створеного замовлення
	$res = setPurchaseForOrder($orderId, $cart);

	//якщо успішно, то формуємо відповідь, видаляємо змінні корзини
	if ($res){
		$resData['success'] = true;
		$resData['message'] = "Замовлення збережено";
		unset($_SESSION['saleCart']);
		unset($_SESSION['cart']);
	} else {
		$resData['success'] = false;
		$resData['message'] = "Помилка внесення даних для замовлення № " . $orderId;
	}

	echo json_encode($resData);
}
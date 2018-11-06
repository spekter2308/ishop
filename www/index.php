<?php
header('Content-type: text/html; charset=utf-8');

session_start(); //запускаємо сесію

//якщо в сесії немає масиву корзини, то створюємо його
if(!isset($_SESSION['cart'])){
	$_SESSION['cart'] = array();
}

include_once '../config/config.php';				//ініціалізація налаштувань
include_once '../config/db.php';				//ініціалізація бази даних
include_once '../library/mainFunctions.php';		//основні функції

//визначаємо з яким контролером будемо працювати
$controllerName = isset($_GET['controller']) ? ucfirst($_GET['controller']) : 'Index';
//d($controllerName);

//визначаємо з якою ф-ю будемо працювати
$actionName = isset($_GET['action']) ? $_GET['action'] : 'index';

//ініціалізуємо змінну шаблонізатора кількості елементів в корзині
$smarty->assign('cartCntItems', count($_SESSION['cart']));

loadPage($smarty,  $controllerName, $actionName);
//d($controllerName, 1);

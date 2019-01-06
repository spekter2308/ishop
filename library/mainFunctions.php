<?php

/**
 * Основны функції
 */


/**
 * Формування сторінки, яка запитується
 *
 * @param string $controllerName назва контроллера
 * @param string $actionName назва функції обробки сторінки
 */
function loadPage($smarty, $controllerName, $actionName = 'index'){
	include_once PathPrefix . $controllerName . PathPostfix;

	$function = $actionName . 'Action';
	$function($smarty);
}

/**
 * Завантаження шаблону
 * @param object $smarty об'єкт шаблонізатора
 * @param string $templateName назва файлу шаблона
 */
function loadTemplate($smarty, $templateName){
	$smarty->display($templateName . TemplatePostfix);
}

/**
 * Функція відладки. Зупиняє роботу програми та виводить значення змінної $value
 * @param variant $value змінна для виводу її на сторінку
 * @param int $die параметр зупинки програми
 */
function d($value = null, $die = 0){
	function debugOut($a){
		echo '<br><b>'. basename($a['file']). '<br>'
			. "&nbsp;<font color='red'>{$a['line']})</font>"
			. "&nbsp;<font color='green'>{$a['function']}()</font>"
			. "&nbsp; -- ". dirname($a['file']);
	}

	echo '<pre>';
		$trace = debug_backtrace();
		array_walk($trace, 'debugOut');
		echo "\n\n";
	print_r($value);
	echo '</pre>';

	if($die) die;
}

/**
 * Отримування масиву елементів за результатами запиту $rs
 *
 * @param $rs object результат запиту до бд
 * @return array масив результату запиту
 */
function createSmartyRsArray($rs){
	if (!$rs) return false;
	$smartyRs = array();
	while ($row = mysqli_fetch_assoc($rs)){
		$smartyRs[] = $row;
	}
	return $smartyRs;
}

/**
 * Редірект
 *
 * @param string $url адреса для редіректа
 */
function redirect($url){
	if(!$url){
		$url = '/';
	}
	header("Location: $url");
	exit;
}

/**
 * Перевірка на пустоту строки
 *
 * @param string $str строка
 * @return bool результат (true якщо пуста | false якщо не пуста)
 */
function checkEmptyString($str){
	$str = trim($str);

	if(!isset($str) OR $str === ''){
		return true;
	} else {
		return false;
	}
}
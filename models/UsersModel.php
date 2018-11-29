<?php
/**
 *Модель для таблиці користувачів `users`
 *
 */

/**
 * Реєстрація нового користувача
 *
 * @param string $email пошта
 * @param string $pwdMD5 пароль в кодуванні МД5
 * @param string $name ім'я
 * @param string $phone телефон користувача
 * @param string $address адреса користувача
 * @return array масив даних нового користувача
 */
function registerNewUser($email, $pwdMD5, $name, $phone, $address){
	global $db;

	$email = mysqli_real_escape_string($db, $email);
	$pwdMD5 = mysqli_real_escape_string($db, $pwdMD5);
	$name = mysqli_real_escape_string($db, $name);
	$phone = mysqli_real_escape_string($db, $phone);
	$address = mysqli_real_escape_string($db, $address);

	$sql = "INSERT INTO users (email, pwd, name, phone, address) VALUES ('$email', '$pwdMD5', '$name', '$phone', '$address')";
	$rs = mysqli_query($db, $sql);

	if($rs){
		$sql = "SELECT * FROM users WHERE (`email` = '$email' AND `pwd` = '$pwdMD5') LIMIT 1";

		$rs = mysqli_query($db, $sql);
		$rs = createSmartyRsArray($rs);

		if(isset($rs[0])){
			$rs['success'] = true;
		} else {
			$rs['success'] = false;
		}
	} else {
		$rs['success'] = false;
	}
	return $rs;
}

/**
 * Перевірка параметрів для реєстрації користувача
 *
 * @param string $email емейл
 * @param string $pwd1 пароль
 * @param string $pwd2 повтор паролю
 * @return array результат перевірки
 */
function checkRegisterParams($email, $pwd1, $pwd2){
	$res = null;

	if($pwd1 != $pwd2){
		$res['success'] = false;
		$res['message'] = 'Паролі не співпадають';
	}

	if(!$pwd2){
		$res['success'] = false;
		$res['message'] = 'Повторіть password';
	}

	if(!$pwd1){
		$res['success'] = false;
		$res['message'] = 'Введіть password';
	}

	if(!$email){
		$res['success'] = false;
		$res['message'] = 'Введіть email';
	}

	return $res;
}

/**
 * Перевірка почти (чи є емейл адреса в БД)
 *
 * @param string $email
 * @return array масив - строка із таблиці users або пустий масив
 */
function checkUserEmail($email){
	global $db;
	$email = mysqli_real_escape_string($db, $email);
	$sql = "SELECT `id` FROM `users` WHERE `email` = '{$email}'";

	$rs = mysqli_query($db, $sql);
	$rs = createSmartyRsArray($rs);

	return $rs;
}

/**
 * Авторизація користувача
 *
 * @param $email почта (логін)
 * @param $pwd пароль
 * @return array маcив даних користувача
 */
function loginUser($email, $pwd){
	global $db;
	$email = htmlspecialchars(mysqli_real_escape_string($db, $email));
	$pwd = md5($pwd);

	$sql = "SELECT * FROM users WHERE (`email` = '$email' AND `pwd` = '$pwd') LIMIT 1";
	$rs = mysqli_query($db, $sql);

	$rs = createSmartyRsArray($rs);
	if(isset($rs[0])){
		$rs['success'] = true;
	} else {
		$rs['success'] = false;
	}

	return $rs;
}


/**
 * Зміна даних користувача
 *
 * @param $name - ім'я користувача
 * @param $phone - телефон
 * @param $address - адреса
 * @param $pwd1 - новий пароль
 * @param $pwd2 - повтор нового паролю
 * @param $curPwd - нинішній пароль
 * @return bool true - в випадку успіху
 */
function updateUserData($name, $phone, $address, $pwd1, $pwd2, $curPwd){
	global $db;

	$email = htmlspecialchars($db->real_escape_string($_SESSION['user']['email']));
	$name = $db->real_escape_string($name);
	$phone = $db->real_escape_string($phone);
	$address = $db->real_escape_string($address);
	$pwd1 = trim($pwd1);
	$pwd2 = trim($pwd2);

	$newPwd = null;
	if($pwd1 and ($pwd1 == $pwd2)){
		$newPwd = md5($pwd1);
	}

	$sql = "UPDATE users SET ";

	if($newPwd){
		$sql .= "`pwd` = '{$newPwd}', ";
	}

	$sql .= "`name` = '{$name}',
			`phone` = '{$phone}',
			`address` = '{$address}'
			WHERE `email` = '{$email}' AND `pwd` = '{$curPwd}'		
			LIMIT 1";

	$rs = mysqli_query($db, $sql);

	return $rs;
}

/**
 * Отримати дані змовлень нинішнього користувача
 *
 * @return array масив замовлень з прив'язкою до продуктів
 */
function getCurUserOrders(){
	$userId = isset($_SESSION['user']['id']) ? $_SESSION['user']['id'] : null;
	$rs = getOrdersWithProductsByUser($userId);

	return $rs;
}
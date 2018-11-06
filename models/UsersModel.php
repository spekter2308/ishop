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
 * @return array мамив даних користувача
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
<?php

/**
 * Авторизація адміна
 *
 * @param $login логін
 * @param $pwd пароль
 * @return array маcив даних користувача
 */
function loginAdmin($login, $pwd){
	global $db;
	$login = htmlspecialchars(mysqli_real_escape_string($db, $login));
	$pwd = md5($pwd);

	$sql = "SELECT * FROM admin WHERE (`login` = '$login' AND `pwd` = '$pwd') LIMIT 1";
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
 * Авторизація головного адміна
 *
 * @param $login логін
 * @param $pwd пароль
 * @return array маcив даних користувача
 */
function checkMainAdmin($login, $pwd){
	global $db;
	$login = htmlspecialchars(mysqli_real_escape_string($db, $login));
	$pwd = md5($pwd);

	$sql = "SELECT login, pwd FROM admin WHERE `id` = '1'";
	$rs = mysqli_query($db, $sql);
	$rs = createSmartyRsArray($rs);

	if (($login == $rs[0]['login']) AND ($pwd == $rs[0]['pwd'])){
		$res = 1;
	} else {
		$res = 0;
	}

	return $res;
}

/**
 * @return array масив даних всіх адміністраторів
 */
function getAdmins(){
	global $db;

	$sql = "SELECT id, login FROM admin";
	$rs = mysqli_query($db, $sql);
	return createSmartyRsArray($rs);
}

/**
 * Додавання нового адміністратора
 *
 * @param $login логін
 * @param $pwd пароль
 * @return bool результат виконання
 */
function addNewAdmin($login, $pwd){
	global $db;
	$login = htmlspecialchars(mysqli_real_escape_string($db, $login));

	$sql = "INSERT INTO admin (`login`, `pwd`) VALUES ('$login', '$pwd')";
	$rs = mysqli_query($db, $sql);

	return $rs;
}
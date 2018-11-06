<?php

/**
 * Контролер функцій коритсувача
 *
 */

//підключаємо моделі
include_once '../models/CategoriesModel.php';
include_once '../models/UsersModel.php';

/**
 * AJAX реєстрація користувача
 * Ініціалізація сесійної змінної ($_SESSION['user'])
 *
 * @return json масив даних нового користувача
 */
function registerAction(){
	$email = isset($_REQUEST['email']) ? $_REQUEST['email'] : null;
	$email = trim($email);

	$pwd1 = isset($_REQUEST['pwd1']) ? $_REQUEST['pwd1'] : null;
	$pwd2 = isset($_REQUEST['pwd2']) ? $_REQUEST['pwd2'] : null;

	$phone = isset($_REQUEST['phone']) ? $_REQUEST['phone'] : null;
	$address = isset($_REQUEST['address']) ? $_REQUEST['address'] : null;
	$name = isset($_REQUEST['name']) ? $_REQUEST['name'] : null;
	$name = trim($name);

	$resData = null;
	//якщо всі дані введено, то $resData рівна null, інакше опис помилки
	$resData = checkRegisterParams($email, $pwd1, $pwd2);

	//якщо всі дані введено, але такий користувач уже є у базі, то помилка
	if(!$resData && checkUserEmail($email)){
		$resData['success'] = false;
		$resData['message'] = "Користувач з таким ({$email}) уже зареєстрований";
	}

	if(!$resData){
		$pwdMD5 = md5($pwd1);
		//d($pwdMD5, 1);

		$userData = registerNewUser($email, $pwdMD5, $name, $phone, $address);

		if($userData['success']){
			$resData['message'] = 'Користувач успішно зареєструвався';
			$resData['success'] = true;

			$userData = $userData[0];
			$resData['userName'] = $userData['name'] ? $userData['name'] : $userData['email'];
			$resData['userEmail'] = $email;

			$_SESSION['user'] = $userData;
			$_SESSION['user']['displayName'] = $userData['name'] ? $userData['name'] : $userData['email'];
		} else {
			$resData['success'] = false;
			$resData['message'] = 'Помилка реєстрації';
		}

	}

	echo json_encode($resData);
}

/**
 * Вихід з облікового запису користувача (розлогінювання)
 */
function logoutAction(){
	if(isset($_SESSION['user'])){
		unset($_SESSION['user']);
		unset($_SESSION['cart']);
	}
	redirect('/');
}

/**
 * AJAX авторизація нового користувача
 *
 * @return json масив даних нового користувача
 */
function loginAction(){
	$email = isset($_REQUEST['loginEmail']) ? $_REQUEST['loginEmail'] : null;
	$email = trim($email);

	$pwd = isset($_REQUEST['loginPwd']) ? $_REQUEST['loginPwd'] : null;
	$pwd = trim($pwd);

	$userData = loginUser($email, $pwd);

	if($userData['success']){
		$userData = $userData[0];

		$_SESSION['user'] = $userData;
		$_SESSION['user']['displayName'] = $userData['name'] ? $userData['name'] : $userData['email'];

		$resData = $_SESSION['user'];
		$resData['success'] = true;
	} else {
		$resData['success'] = false;
		$resData['message'] = "Невірний логін або пароль";
	}

	echo json_encode($resData);
}
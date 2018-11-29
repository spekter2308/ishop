<?php

/**
 * Модель для таблиці замовлень (orders)
 */

/**
 * Створення замовлення (без прив'язки товару)
 *
 * @param string $name
 * @param string $phone
 * @param string $address
 * @return integer @param ID створюваного товару

 */
function createNewOrder($name, $phone, $address){
	global $db;

	$name = $db->real_escape_string($name);
	$phone = $db->real_escape_string($phone);
	$address = $db->real_escape_string($address);

	//> ініціалізація змінних
	$userId = $_SESSION['user']['id'];
	$comment = "ID користувача: $userId<br>Імя: $name<br>Тел: $phone<br>Адреса: $address";
	$comment = $db->real_escape_string($comment);
	$dateCreated = date('Y.m.d H:i:s');
	$userIp = $_SERVER['REMOTE_ADDR']; //може видати неточну IP адресу
	//<

	//формування запиту до БД
	$sql = "INSERT INTO orders (`user_id`, `date_created`, `date_payment`, `status`, `comment`, `user_ip`) VALUES ('$userId', 
'$dateCreated', null, '0', '$comment', '$userIp')";
	$rs = mysqli_query($db, $sql);

	//отримуємо id створеного замовлення
	if ($rs) {
		return $db->insert_id;
	} else {
		return false;
	}
}

/**
 * Отримати дані всіх замовлень з прив'язкою до товарів по id користувача
 *
 * @param $userId - ID користувача
 * @return array - масив замовлень з прив'язкою до продуктів
 */
function getOrdersWithProductsByUser($userId){
	global $db;
	$userId = intval($userId);
	$sql = "SELECT * FROM orders WHERE `user_id` = '{$userId}' ORDER BY id DESC";

	$rs = mysqli_query($db, $sql);

	$smartyRs = array();
	while($row = mysqli_fetch_assoc($rs)){
		$rsChildren = getPurcaseForOrders($row['id']);

		if($rsChildren){
			$row['children'] = $rsChildren;
			foreach ($rsChildren as $child){
				$row['count'] += $child['amount'];
				$row['summary'] += $child['amount'] * $child['price'];
			}
			$smartyRs[] = $row;
		}
	}

	return $smartyRs;
}
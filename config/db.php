<?php

/**
 * ініціалізація підключення до БД
 *
 */

define(HOST_NAME, 'localhost');
define(DB_NAME, 'ishop');
define(DB_USERNAME, 'root');
define(DB_PASSWORD, '');

$db = mysqli_connect(HOST_NAME, DB_USERNAME, DB_PASSWORD, DB_NAME);

//встановлення кодування по замовченню
mysqli_set_charset($db, "utf-8");


if (!$db) {
	echo "Error connection to database";
	exit();
}

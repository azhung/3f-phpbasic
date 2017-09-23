<?php

define('HOST', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_NAME', 'db_3fblog');

$conn = mysqli_connect(HOST, DB_USERNAME, DB_PASSWORD, DB_NAME);

if (!$conn) {
	echo 'Connect error: ' . mysqli_connect_error();
}

mysqli_set_charset($conn, "utf8");
